<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Live Stream (Streamer)</title>
  <script src="https://cdn.jsdelivr.net/npm/livekit-client/dist/livekit-client.umd.min.js"></script>
</head>
<body style="text-align:center; padding: 50px; background-color: #111; color: #fff;">

  <h2>🎥 You are Live Streaming</h2>
  <button id="startObsBtn" style="padding: 10px 20px; margin-bottom: 20px; display:none;">🎮 Switch to OBS Virtual Camera</button>
  <div id="video-container"></div>
  <p>Room: <span id="roomName"></span></p>
  <p>User: <span id="userName"></span></p>

  <script>
    let room;
    let currentTracks = [];

    document.addEventListener("DOMContentLoaded", async function () {
      const getQueryParam = (param) => new URLSearchParams(window.location.search).get(param);
      const roomName = getQueryParam("room") || "myroom";
      const userName = getQueryParam("user") || "streamer_" + Math.floor(Math.random() * 10000);

      document.getElementById("roomName").textContent = roomName;
      document.getElementById("userName").textContent = userName;

      if (typeof LivekitClient === "undefined") {
        console.error("❌ LiveKit not loaded");
        return;
      }

      try {
        // Connect to room
        const res = await fetch(`/streamtoken?room=${roomName}&user=${userName}`);
        const data = await res.json();
        const token = data.token;

        room = new LivekitClient.Room();
        await room.connect("wss://livekit.superfansstream.xyz", token);
        console.log("✅ Connected to room");
         console.log(room);

const logRoomEvents = (room) => {
  const RoomEvent = LivekitClient.RoomEvent;

  Object.values(RoomEvent).forEach((eventName) => {
    room.on(eventName, (...args) => {
      console.log(`📡 [RoomEvent] ${eventName}:`, ...args);
    });
  });
};

        // Start with default camera
        await startStreaming("default");

        // Attach OBS button
        document.getElementById("startObsBtn").addEventListener("click", async () => {
          await switchToOBS();
        });

        // Show button if OBS cam is available
        const devices = await navigator.mediaDevices.enumerateDevices();
        if (devices.some(d => d.kind === 'videoinput' && d.label.includes("OBS"))) {
          document.getElementById("startObsBtn").style.display = "inline-block";
        }

      } catch (e) {
        console.error("❌ Error:", e);
      }
    });

    async function startStreaming(videoLabel = "default") {
      const devices = await navigator.mediaDevices.enumerateDevices();
      let videoDeviceId = null;

      if (videoLabel !== "default") {
        const device = devices.find(d => d.kind === 'videoinput' && d.label.includes(videoLabel));
        if (!device) {
          alert(`❌ ${videoLabel} not found.`);
          return;
        }
        videoDeviceId = device.deviceId;
      }

      const tracks = await LivekitClient.createLocalTracks({
        audio: true,
        video: videoDeviceId ? { deviceId: { exact: videoDeviceId } } : { facingMode: "user" }
      });

      currentTracks = tracks;
      for (const track of tracks) {
        if (track.kind === "video") {
          const videoEl = track.attach();
          videoEl.style.width = "100%";
          videoEl.style.height = "auto";
          videoEl.style.borderRadius = "12px";
          videoEl.style.boxShadow = "0 4px 12px rgba(0,0,0,0.2)";
          document.getElementById("video-container").appendChild(videoEl);
        }
        await room.localParticipant.publishTrack(track);
      }

      console.log(`📡 Streaming from: ${videoLabel}`);
    }

    async function switchToOBS() {
      // Unpublish current tracks
      currentTracks.forEach(track => {
        room.localParticipant.unpublishTrack(track);
        track.stop();
      });
      document.getElementById("video-container").innerHTML = "";

      // Start streaming from OBS
      await startStreaming("OBS");
    }
  </script>
</body>
</html>
