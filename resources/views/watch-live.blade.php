<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Watch Live Stream</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/livekit-client/dist/livekit-client.umd.min.js"></script>
  <style>
    body {
      margin: 0;
      padding: 20px;
      font-family: sans-serif;
      background-color: #000;
      color: #fff;
      text-align: center;
    }

    h2 {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }

    #startBtn {
      padding: 12px 24px;
      font-size: 16px;
      margin-bottom: 20px;
      cursor: pointer;
      position: relative;
    }

    #loadingIndicator {
      display: none;
      font-size: 14px;
      margin-top: 10px;
      color: #ccc;
    }

    #video-container {
      width: 100%;
      max-width: 100%;
      margin: 0 auto;
    }

    #video-container video {
      width: 100%;
      height: auto;
      display: block;
    }

    ul#viewerList {
      list-style: none;
      padding: 0;
      margin: 0;
      margin-top: 10px;
      font-size: 0.95rem;
    }

    ul#viewerList li {
      margin: 4px 0;
      color: #ddd;
    }

    p {
      margin: 10px 0;
      font-size: 0.95rem;
      word-break: break-word;
    }

    @media (max-width: 600px) {
      body {
        padding: 10px;
      }

      h2 {
        font-size: 1.2rem;
      }

      #startBtn {
        width: 100%;
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

  <h2>👀 Watching Live Stream</h2>

  <button id="startBtn">▶️ Start Watching</button>
  <div id="loadingIndicator">⏳ Connecting to stream...</div>

  <div id="video-container"></div>

  <p>Room: <span id="roomName"></span></p>
  <p>User: <span id="userName"></span></p>

  <h3>👥 Viewers:</h3>
  <ul id="viewerList"></ul>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const getQueryParam = (param) => new URLSearchParams(window.location.search).get(param);
      const roomName = getQueryParam("room") || "myroom";
      const userName = getQueryParam("user") || "guest_" + Math.floor(Math.random() * 10000);

      document.getElementById("roomName").textContent = roomName;
      document.getElementById("userName").textContent = userName;

      const startBtn = document.getElementById("startBtn");
      const loadingIndicator = document.getElementById("loadingIndicator");
      const viewerList = document.getElementById("viewerList");
      let room;

      startBtn.addEventListener("click", async function () {
        if (typeof LivekitClient === "undefined") {
          console.error("❌ LiveKit not loaded");
          return;
        }

        loadingIndicator.style.display = "block";
        startBtn.disabled = true;

        try {
          const res = await fetch(`/streamtoken?room=${roomName}&user=${userName}`);
          const data = await res.json();
          const token = data.token;

          room = new LivekitClient.Room();

          room.on('trackSubscribed', (track, publication, participant) => {
            if (track.kind === "video") {
              const videoEl = track.attach();
              videoEl.style.width = "100%";
              videoEl.style.height = "auto";
              videoEl.style.display = "block";
              document.getElementById("video-container").appendChild(videoEl);
            }

            if (track.kind === "audio") {
              const audioEl = track.attach();
              document.body.appendChild(audioEl);
            }
          });

          function updateViewerList() {
  const viewerList = document.getElementById('viewerList');
  viewerList.innerHTML = ''; // Clear list

  // Add local user
  const localItem = document.createElement('li');
  localItem.textContent = `${room.localParticipant.identity} (You)`;
  viewerList.appendChild(localItem);

  // Add remote users
  room.remoteParticipants.forEach((participant) => {
    const item = document.createElement('li');
    item.textContent = participant.identity;
    viewerList.appendChild(item);
  });
}


          room.on("participantConnected", updateViewerList);
          room.on("participantDisconnected", updateViewerList);

          await room.connect("wss://livekit.superfansstream.xyz", token);
          console.log("✅ Viewer connected to room");

          updateViewerList();

          startBtn.style.display = "none";
          loadingIndicator.style.display = "none";
        } catch (e) {
          console.error("❌ Error connecting to room:", e);
          loadingIndicator.textContent = "❌ Failed to connect.";
        }
      });
    });
  </script>

</body>
</html>
