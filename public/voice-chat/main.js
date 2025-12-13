// Voice Chat Main JavaScript - Laravel Integration
// Uses Agora RTC and RTM SDKs for video/audio communication

// Get Agora App ID from window variable set by Blade template
const appid = window.AGORA_APP_ID || 'cf7a1b4afc7243ed83bf3a0c4679095e';

console.log("_________ Using App ID:", appid);

const token = null

const rtcUid = Math.floor(Math.random() * 2032)
const rtmUid = String(Math.floor(Math.random() * 2032))

const getRoomId = () => {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);

  if (urlParams.get('room')) {
    return urlParams.get('room').toLowerCase()
  }
}

let roomId = getRoomId() || null
if (document.getElementById('form')) {
  document.getElementById('form').roomname.value = roomId
}

let audioTracks = {
  localAudioTrack: null,
  remoteAudioTracks: {},
};
let screenTrack = null;
let cameraTrack = null;
let isTeacher = false;

let micMuted = true

let rtcClient;
let rtmClient;
let channel;

let avatar;

// Get base path for assets
const getAssetPath = (path) => {
  // Remove leading slash if present, Laravel asset() already handles it
  return path.startsWith('/') ? path.substring(1) : path;
}

const loadRtmSdkFromCdn = () => new Promise((resolve, reject) => {
  const existing = document.querySelector('script[data-agora-rtm-cdn]')
  if (existing) {
    existing.addEventListener('load', () => resolve(window.AgoraRTM))
    existing.addEventListener('error', reject)
    return
  }
  const script = document.createElement('script')
  script.src = 'https://download.agora.io/sdk/release/AgoraRTM.min.js'
  script.async = true
  script.dataset.agoraRtmCdn = 'true'
  script.onload = () => resolve(window.AgoraRTM)
  script.onerror = reject
  document.head.appendChild(script)
})

const createRtmClient = async () => {
  console.log('RTM module value', window.AgoraRTM)
  if (window.AgoraRTM && typeof window.AgoraRTM.createInstance === 'function') {
    return window.AgoraRTM.createInstance(appid)
  }
  // try CDN fallback
  const cdn = await loadRtmSdkFromCdn()
  if (cdn && typeof cdn.createInstance === 'function') {
    return cdn.createInstance(appid)
  }
  throw new Error('RTM SDK not loaded or createInstance not available')
}

const initRtm = async (name) => {
  try {
    console.log('RTM: init start', { appid, roomId, rtmUid, rtcUid, avatar, isTeacher })
    rtmClient = await createRtmClient()
    await rtmClient.login({ 'uid': rtmUid, 'token': token })
    console.log('RTM: login ok')

    channel = rtmClient.createChannel(roomId)
    await channel.join()
    console.log('RTM: channel join ok', roomId)

    await rtmClient.addOrUpdateLocalUserAttributes({ 'name': name, 'userRtcUid': rtcUid.toString(), 'userAvatar': avatar, 'role': isTeacher ? 'teacher' : 'student' })
    console.log('RTM: attributes set', { name, userAvatar: avatar, role: isTeacher ? 'teacher' : 'student' })
    // show the current user in the member list immediately
    renderMemberCard({ memberId: rtmUid, name, userRtcUid: rtcUid, userAvatar: avatar })

    await getChannelMembers()

    window.addEventListener('beforeunload', leaveRtmChannel)

    channel.on('MemberJoined', handleMemberJoined)
    channel.on('MemberLeft', handleMemberLeft)
  } catch (err) {
    console.error('RTM init failed', err)
    alert('Could not join RTM. Check console for details.')
  }
}

const initRtc = async () => {
  rtcClient = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });

  rtcClient.on("user-published", handleUserPublished)
  rtcClient.on("user-unpublished", handleUserUnpublished)
  rtcClient.on("user-left", handleUserLeft);


  await rtcClient.join(appid, roomId, token, rtcUid)
  audioTracks.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
  audioTracks.localAudioTrack.setMuted(micMuted)
  await rtcClient.publish(audioTracks.localAudioTrack);

  initVolumeIndicator()
}

let initVolumeIndicator = async () => {
  AgoraRTC.setParameter('AUDIO_VOLUME_INDICATION_INTERVAL', 200);
  rtcClient.enableAudioVolumeIndicator();

  rtcClient.on("volume-indicator", volumes => {
    volumes.forEach((volume) => {
      console.log(`UID ${volume.uid} Level ${volume.level}`);

      try {
        let item = document.getElementsByClassName(`avatar-${volume.uid}`)[0]
        if (!item) return
        if (volume.level >= 50) {
          item.style.borderColor = '#00ff00'
        } else {
          item.style.borderColor = "#fff"
        }
      } catch (error) {
        console.error(error)
      }
    });
  })
}

let handleUserPublished = async (user, mediaType) => {
  await rtcClient.subscribe(user, mediaType);

  if (mediaType === "audio") {
    audioTracks.remoteAudioTracks[user.uid] = [user.audioTrack]
    user.audioTrack.play();
  }
  if (mediaType === "video") {
    const track = user.videoTrack
    const label = track?.getMediaStreamTrack ? track.getMediaStreamTrack().label.toLowerCase() : ''
    const isScreen = label.includes('screen')
    if (isScreen) {
      renderScreenContainer(user.uid)
      track.play(`screen-${user.uid}`)
    } else {
      renderCamContainer(user.uid)
      track.play(`cam-${user.uid}`)
    }
  }
}

let handleUserLeft = async (user) => {
  delete audioTracks.remoteAudioTracks[user.uid]
  removeScreenContainer(user.uid)
  removeCamContainer(user.uid)
}

let handleUserUnpublished = async (user, mediaType) => {
  if (mediaType === "video") {
    removeScreenContainer(user.uid)
    removeCamContainer(user.uid)
  }
}

const renderMemberCard = ({ memberId, name, userRtcUid, userAvatar }) => {
  const container = document.getElementById("members")
  if (!container) return
  const safeAvatar = userAvatar || ''
  const displayName = name || `User ${userRtcUid}`
  console.log("Rendering member", { memberId, displayName, userRtcUid, userAvatar: safeAvatar });
  // ensure we don't duplicate the same member card
  const existing = document.getElementById(memberId)
  if (existing) existing.remove()

  const newMember = `
  <div class="speaker user-rtc-${userRtcUid}" id="${memberId}">
    <img class="user-avatar avatar-${userRtcUid}" src="${safeAvatar}"/>
      <p>${displayName}</p>
  </div>`

  container.insertAdjacentHTML('beforeend', newMember)
}

const removeMemberCard = (memberId) => {
  const el = document.getElementById(memberId)
  if (el) el.remove()
}

const renderScreenContainer = (uid) => {
  const container = document.getElementById('screens')
  if (!container) return
  let el = document.getElementById(`screen-${uid}`)
  if (!el) {
    el = document.createElement('div')
    el.id = `screen-${uid}`
    el.className = 'screen-player'
    const wideBtn = document.createElement('button')
    wideBtn.className = 'screen-btn secondary'
    wideBtn.innerText = 'Fill Width'
    wideBtn.addEventListener('click', () => toggleWide(uid))
    const fullBtn = document.createElement('button')
    fullBtn.className = 'screen-btn'
    fullBtn.innerText = 'Full Screen'
    fullBtn.addEventListener('click', () => toggleFullscreen(uid))
    el.appendChild(wideBtn)
    el.appendChild(fullBtn)
    container.appendChild(el)
  }
}

const removeScreenContainer = (uid) => {
  const el = document.getElementById(`screen-${uid}`)
  if (el) el.remove()
}

const renderCamContainer = (uid) => {
  const container = document.getElementById('cams')
  if (!container) return
  let el = document.getElementById(`cam-${uid}`)
  if (!el) {
    el = document.createElement('div')
    el.id = `cam-${uid}`
    el.className = 'cam-player'
    const wideBtn = document.createElement('button')
    wideBtn.className = 'screen-btn secondary'
    wideBtn.innerText = 'Fill Width'
    wideBtn.addEventListener('click', () => toggleCamWide(uid))
    const fullBtn = document.createElement('button')
    fullBtn.className = 'screen-btn'
    fullBtn.innerText = 'Full Screen'
    fullBtn.addEventListener('click', () => toggleCamFullscreen(uid))
    el.appendChild(wideBtn)
    el.appendChild(fullBtn)
    container.appendChild(el)
  }
}

const removeCamContainer = (uid) => {
  const el = document.getElementById(`cam-${uid}`)
  if (el) el.remove()
}

let handleMemberJoined = async (MemberId) => {
  let { name, userRtcUid, userAvatar } = await rtmClient.getUserAttributesByKeys(MemberId, ['name', 'userRtcUid', 'userAvatar'])
  console.log('RTM: member joined', { MemberId, name, userRtcUid, userAvatar })
  renderMemberCard({ memberId: MemberId, name, userRtcUid, userAvatar })
}

let handleMemberLeft = async (MemberId) => {
  console.log('RTM: member left', MemberId)
  removeMemberCard(MemberId)
}

let getChannelMembers = async () => {
  let members = await channel.getMembers()

  for (let i = 0; members.length > i; i++) {

    let { name, userRtcUid, userAvatar } = await rtmClient.getUserAttributesByKeys(members[i], ['name', 'userRtcUid', 'userAvatar'])

    console.log('RTM: hydrate member', { memberId: members[i], name, userRtcUid, userAvatar })
    renderMemberCard({ memberId: members[i], name, userRtcUid, userAvatar })
  }
}

const toggleMic = async (e) => {
  const micIcon = document.getElementById('mic-icon')
  if (micMuted) {
    micIcon.src = micIcon.src.replace('mic-off.svg', 'mic.svg')
    micIcon.style.backgroundColor = 'ivory'
    micMuted = false
  } else {
    micIcon.src = micIcon.src.replace('mic.svg', 'mic-off.svg')
    micIcon.style.backgroundColor = 'indianred'
    micMuted = true
  }
  audioTracks.localAudioTrack.setMuted(micMuted)
}

const stopScreenShare = async () => {
  if (!screenTrack) return
  try {
    await rtcClient.unpublish(screenTrack)
  } catch (err) {
    console.error('unpublish screen error', err)
  }
  screenTrack.stop()
  screenTrack.close()
  removeScreenContainer(rtcUid)
  screenTrack = null
  const btn = document.getElementById('screen-share')
  if (btn) {
    btn.textContent = 'Share Screen'
    btn.style.backgroundColor = '#3b82f6'
  }
}

const toggleScreenShare = async () => {
  if (!isTeacher) {
    alert('Only the teacher can share screen in this room.')
    return
  }
  const btn = document.getElementById('screen-share')
  if (screenTrack) {
    await stopScreenShare()
    return
  }
  try {
    screenTrack = await AgoraRTC.createScreenVideoTrack({ encoderConfig: "720p" }, "auto");
    await rtcClient.publish(screenTrack);
    renderScreenContainer(rtcUid)
    screenTrack.play(`screen-${rtcUid}`)
    if (btn) {
      btn.textContent = 'Stop Sharing'
      btn.style.backgroundColor = 'indianred'
    }
    screenTrack.on('track-ended', stopScreenShare)
  } catch (err) {
    console.error('screen share failed', err)
    alert('Screen share failed. Check console for details.')
    await stopScreenShare()
  }
}

let lobbyForm = document.getElementById('form')

const enterRoom = async (e) => {
  e.preventDefault()

  if (!avatar) {
    alert('Please select an avatar')
    return
  }

  roomId = e.target.roomname.value.toLowerCase();
  isTeacher = window.IS_TEACHER || false;

  if (isTeacher) {
    console.log("Attempting to create room as teacher...");
    try {
      const response = await fetch('/teacher/create-room', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ roomName: roomId })
      });
      const result = await response.json();
      console.log("Create room response:", result);
      if (!result.success) {
        alert('Server failed to create room: ' + (result.message || 'Unknown error'));
      } else {
        alert('Room created in DB: ' + roomId);
      }
    } catch (e) {
      console.error("Failed to create room in DB", e);
      alert('Network/JS error creating room: ' + e.message);
    }
  }

  window.history.replaceState(null, null, `?room=${roomId}`);

  initRtc()

  let displayName = e.target.displayname.value;
  initRtm(displayName)

  lobbyForm.style.display = 'none'
  document.getElementById('room-header').style.display = "flex"
  document.getElementById('room-name').innerText = roomId
}

let leaveRtmChannel = async () => {
  await channel.leave()
  await rtmClient.logout()
}

let leaveRoom = async () => {
  await stopScreenShare()
  await stopCamera()
  audioTracks.localAudioTrack.stop()
  audioTracks.localAudioTrack.close()
  rtcClient.unpublish()
  rtcClient.leave()

  leaveRtmChannel()

  if (isTeacher) {
    try {
      // Use sendBeacon for reliability on page unload, or fetch purely for in-page logic
      // Since we are not navigating away, fetch is fine.
      fetch('/teacher/delete-room', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ roomName: roomId })
      });
    } catch (e) {
      console.error("Failed to delete room from DB", e);
    }
  }

  document.getElementById('form').style.display = 'block'
  document.getElementById('room-header').style.display = 'none'
  document.getElementById('members').innerHTML = ''
}

const avatarsList = [
  'male-1.png', 'male-2.png', 'male-4.png', 'male-5.png',
  'female-1.png', 'female-2.png', 'female-4.png', 'female-5.png'
];

window.joinRoomDirectly = async (roomName) => {
  roomId = roomName.toLowerCase();
  isTeacher = false; // Always false for direct join (students)

  const randomAvatar = avatarsList[Math.floor(Math.random() * avatarsList.length)];
  avatar = getAssetPath(`voice-chat/avatars/${randomAvatar}`); // Assuming asset path logic

  // Fix asset path if needed, or just construct it:
  // simpler: relative path from public
  avatar = `${window.location.origin}/voice-chat/avatars/${randomAvatar}`;

  // Update URL
  window.history.replaceState(null, null, `?room=${roomId}`);

  initRtc();

  let displayName = window.USER_NAME || "Student";
  initRtm(displayName);

  if (lobbyForm) lobbyForm.style.display = 'none';
  const avRooms = document.getElementById('available-rooms');
  if (avRooms) avRooms.style.display = 'none';

  document.getElementById('room-header').style.display = "flex"
  document.getElementById('room-name').innerText = roomId
}


if (lobbyForm) {
  lobbyForm.addEventListener('submit', enterRoom)
}
if (document.getElementById('leave-icon')) {
  document.getElementById('leave-icon').addEventListener('click', leaveRoom)
}
if (document.getElementById('mic-icon')) {
  document.getElementById('mic-icon').addEventListener('click', toggleMic)
}
if (document.getElementById('screen-share')) {
  document.getElementById('screen-share').addEventListener('click', toggleScreenShare)
}
if (document.getElementById('camera-share')) {
  document.getElementById('camera-share').addEventListener('click', toggleCamera)
}

const toggleFullscreen = (uid) => {
  const el = document.getElementById(`screen-${uid}`)
  if (!el) return
  if (document.fullscreenElement === el) {
    document.exitFullscreen().catch(() => { })
  } else {
    el.requestFullscreen?.().catch(() => { })
  }
}

const toggleWide = (uid) => {
  const el = document.getElementById(`screen-${uid}`)
  if (!el) return
  el.classList.toggle('screen-wide')
}

const toggleCamFullscreen = (uid) => {
  const el = document.getElementById(`cam-${uid}`)
  if (!el) return
  if (document.fullscreenElement === el) {
    document.exitFullscreen().catch(() => { })
  } else {
    el.requestFullscreen?.().catch(() => { })
  }
}

const toggleCamWide = (uid) => {
  const el = document.getElementById(`cam-${uid}`)
  if (!el) return
  el.classList.toggle('cam-wide')
}

const stopCamera = async () => {
  if (!cameraTrack) return
  try {
    await rtcClient.unpublish(cameraTrack)
  } catch (err) {
    console.error('unpublish camera error', err)
  }
  cameraTrack.stop()
  cameraTrack.close()
  removeCamContainer(rtcUid)
  cameraTrack = null
  const btn = document.getElementById('camera-share')
  if (btn) {
    btn.textContent = 'Camera'
    btn.style.backgroundColor = '#3b82f6'
  }
}

async function toggleCamera() {
  if (!isTeacher) {
    alert('Only the teacher can turn on camera in this room.')
    return
  }
  const btn = document.getElementById('camera-share')
  if (cameraTrack) {
    await stopCamera()
    return
  }
  try {
    cameraTrack = await AgoraRTC.createCameraVideoTrack({ encoderConfig: "480p_16_9" });
    await rtcClient.publish(cameraTrack);
    renderCamContainer(rtcUid)
    cameraTrack.play(`cam-${rtcUid}`)
    if (btn) {
      btn.textContent = 'Stop Camera'
      btn.style.backgroundColor = 'indianred'
    }
    cameraTrack.on('track-ended', stopCamera)
  } catch (err) {
    console.error('camera start failed', err)
    alert('Camera start failed. Check console for details.')
    await stopCamera()
  }
}

const avatars = document.getElementsByClassName('avatar-selection')
const avatarSelectedNote = document.getElementById('avatar-selected')

Array.from(avatars).forEach(img => {
  img.addEventListener('click', () => {
    Array.from(avatars).forEach(a => {
      a.style.borderColor = "#fff"
      a.style.opacity = .5
    })
    avatar = img.src
    img.style.borderColor = "#00ff00"
    img.style.opacity = 1
    if (avatarSelectedNote) {
      avatarSelectedNote.innerText = 'Avatar selected'
    }
  })
})

