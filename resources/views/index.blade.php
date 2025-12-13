<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('voice-chat/vite.svg') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voice Chat Room - Video Meeting</title>
    <link rel="stylesheet" href="{{ asset('voice-chat/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div id="container">
        <h2 style="text-align: center; color: white;">
            {{ $isTeacher ? 'Teacher Dashboard' : 'Student Dashboard' }}
        </h2>
        
        <div style="position: absolute; top: 10px; right: 20px;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="background-color: indianred; color: white; border: none; padding: 5px 10px; cursor: pointer; border-radius: 4px;">Logout</button>
            </form>
        </div>

        <div id="room-header">

          <h1 id="room-name"></h1>

          <div id="room-header-controls">
            <img id="mic-icon" class="control-icon" src="{{ asset('voice-chat/icons/mic-off.svg') }}" />
            <button id="camera-share" class="control-icon control-button">Camera</button>
            <button id="screen-share" class="control-icon control-button">Share Screen</button>
            <img id="leave-icon" class="control-icon" src="{{ asset('voice-chat/icons/leave.svg') }}" />
          </div>
        </div>
    
        @if($isTeacher)
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
              <input required name="displayname" type="text" placeholder="Enter username..." value="{{ $userName }}"/>
      
              <label>Room Name:</label>
              <input required name="roomname" type="text" placeholder="Enter room name..." value="{{ $roomName ?? '' }}"/>


              <p id="avatar-selected" class="avatar-selected-note">No avatar selected</p>
      
              <input name="username" type="submit" value="Start Room"/>
          </div>
      </form>
      @endif

      @if(!$isTeacher && isset($rooms) && count($rooms) > 0)
        <div id="available-rooms" style="margin-top: 20px; text-align: center;">
            <h3>Available Rooms:</h3>
            <ul style="list-style: none; padding: 0;">
                @foreach($rooms as $room)
                    <li style="margin: 10px 0;">
                        <span style="font-weight: bold; margin-right: 10px;">{{ $room->title }}</span>
                        <button onclick="window.joinRoomDirectly('{{ $room->title }}')" style="padding: 5px 10px; cursor: pointer;">Join</button>
                    </li>
                @endforeach
            </ul>
        </div>
      @elseif(!$isTeacher)
        <div style="margin-top: 20px; text-align: center;">
            <p>No active rooms at the moment.</p>
        </div>
      @endif
    
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
        window.IS_TEACHER = {{ $isTeacher ? 'true' : 'false' }};
        window.USER_NAME = "{{ $userName }}";
    </script>
    <script type="module" src="{{ asset('voice-chat/main.js') }}"></script>
  </body>
</html>

