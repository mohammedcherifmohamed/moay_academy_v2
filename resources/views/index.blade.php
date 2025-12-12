<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('voice-chat/vite.svg') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voice Chat Room - Video Meeting</title>
    <link rel="stylesheet" href="{{ asset('voice-chat/style.css') }}">
  </head>
  <body>
    <div id="container">

        <div id="room-header">

          <h1 id="room-name"></h1>

          <div id="room-header-controls">
            <img id="mic-icon" class="control-icon" src="{{ asset('voice-chat/icons/mic-off.svg') }}" />
            <button id="camera-share" class="control-icon control-button">Camera</button>
            <button id="screen-share" class="control-icon control-button">Share Screen</button>
            <img id="leave-icon" class="control-icon" src="{{ asset('voice-chat/icons/leave.svg') }}" />
          </div>
        </div>
    
        <form id="form">
          <div>
            <h3>Select An Avatar:</h3>
          </div>
          <div id="avatars">
              <img class="avatar-selection" src="{{ asset('voice-chat/avatars/male-1.png') }}"/>
              <img class="avatar-selection" src="{{ asset('voice-chat/avatars/male-2.png') }}"/>
              <img class="avatar-selection" src="{{ asset('voice-chat/avatars/male-4.png') }}"/>
              <img class="avatar-selection" src="{{ asset('voice-chat/avatars/male-5.png') }}"/>

              <img class="avatar-selection" src="{{ asset('voice-chat/avatars/female-1.png') }}"/>
              <img class="avatar-selection" src="{{ asset('voice-chat/avatars/female-2.png') }}"/>
              <img class="avatar-selection" src="{{ asset('voice-chat/avatars/female-4.png') }}"/>
              <img class="avatar-selection" src="{{ asset('voice-chat/avatars/female-5.png') }}"/>
          </div> 

          <div id="form-fields">
              <label>Display Name:</label>
              <input required name="displayname" type="text" placeholder="Enter username..."/>
      
              <label>Room Name:</label>
              <input required name="roomname" type="text" placeholder="Enter room name..." value="{{ $roomName ?? '' }}"/>

              <label class="teacher-toggle">
                <input name="isTeacher" type="checkbox"/>
                I am the teacher (can share screen)
              </label>

              <p id="avatar-selected" class="avatar-selected-note">No avatar selected</p>
      
              <input name="username" type="submit" value="Enter Room"/>
          </div>
      </form>
    
        <div id="members">

        </div>

        <div id="cams">
        </div>

        <div id="screens">
        </div>
    </div>
    
    <!-- Agora RTC SDK -->
    <script src="https://download.agora.io/sdk/release/AgoraRTC_N-4.24.1.js"></script>
    <!-- Agora RTM SDK -->
    <script src="https://download.agora.io/sdk/release/AgoraRTM.min.js"></script>
    
    <script>
        // Pass Agora App ID to JavaScript
        window.AGORA_APP_ID = "cf7a1b4afc7243ed83bf3a0c4679095e";
    </script>
    <script type="module" src="{{ asset('voice-chat/main.js') }}"></script>
  </body>
</html>

