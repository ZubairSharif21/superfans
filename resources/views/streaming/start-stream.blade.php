<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>🔴 Live Stream - {{ $userName }}</title>
    
    <link rel="shortcut icon" type="image/jpg" href="{{url('assets/images/stream_logo.png')}}"/>
	<link rel="icon" type="image/svg+xml" href="{{url('assets/images/stream_logo.png')}}">
	<!--Favicon-->
	{{-- <link rel="icon" href="images/stream_logo.png" type="image/png"/> --}}
	
  <script src="https://cdn.jsdelivr.net/npm/livekit-client/dist/livekit-client.umd.min.js"></script>
  <style>
    :root{
      --bg:#111;
      --panel:#222;
      --brand:#6b21a8;   /* purple */
      --brand-dark:#4b0082;
      --text:#fff;
      --muted:#bdbdbd;
      --chip:#2b2b2b;
      --border:#343434;
      --accent:#8b5cf6;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      background:var(--bg);
      color:var(--text);
      font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;
      overflow:hidden; /* we will manage scroll inside columns */
    }

    /* ---------- Layout (matches the mockup) ---------- */
    .page{
      display:grid;
      grid-template-columns: 1fr 300px; /* main stage + right requests rail */
      gap:12px;
      height:100vh;
      padding:10px;
    }

    /* Stage (video + band under it) */
    .stage{
      display:flex;
      flex-direction:column;
      min-width:0;
      overflow:hidden;
      border-radius:16px;
    }

    /* Video area */
    .video-wrap{
      position:relative;
      background:#000;
      border:2px solid #000;
      border-radius:12px;
      min-height:220px;
      display:flex;
      align-items:center;
      justify-content:center;
      overflow:hidden;
    }
    #video-container video{
      width:100%;
      height:auto;
      display:block;
      border-radius:8px;
    }

    /* Band below video: purple card + info card (like screenshot) */
    .band{
      display:grid;
      grid-template-columns: 280px 1fr; /* purple profile at left, info at right */
      gap:0;
      margin-top:10px;
      border:2px solid #2a2a2a;
      border-radius:10px;
      overflow:hidden;
      background:#1a1a1a;
    }

    /* Left purple block */
    .profile-card{
      background:var(--brand-dark);
      padding:14px;
      display:flex;
      flex-direction:column;
      gap:14px;
      min-height:170px;
    }
    .profile-top{
      display:flex;
      align-items:center;
      gap:12px;
    }
    .avatar{
      width:64px;height:64px;border-radius:50%;
      background:#777; flex:0 0 64px;
      border:3px solid #e5e5e5;
    }
    .profile-meta{
      line-height:1.25;
      text-align:left;
    }
    .profile-name{
      font-weight:700;
      font-size:16px;
    }
    .row-muted{
      color:#e9e9e9;
      font-size:13px;
      opacity:.9;
    }
  

    .donos{
      margin-top:2px;
      text-align:left;
    }
    .donos h4{
      margin:0 0 8px 0;font-size:14px;letter-spacing:.5px;
    }
    .donos .btns{
      display:flex;gap:8px;flex-wrap:wrap;
    }
    .chip-btn{
      background:#fff;color:var(--brand-dark);
      border:0;border-radius:10px;padding:6px 10px;
      font-weight:700;font-size:12px;cursor:pointer;
    }

    /* Right info card (name + tags + bio + lists) */
    .info-card{
      background:#f8f8f8; color:#111;
      padding:14px 16px;
    }
    .title-line{
      display:flex;align-items:center;gap:10px;flex-wrap:wrap;
      margin-bottom:10px;
    }
    .stream-name{
      font-weight:700;font-size:16px;display:flex;align-items:center;gap:8px;
      color:#1b1b1b;
    }
    .tags{
      display:flex;gap:8px;flex-wrap:wrap;
    }
    .tag{
      background:#e8e8e8;border:1px solid #d6d6d6;
      border-radius:999px;padding:4px 10px;font-size:12px;
    }
    .bio{
      margin:6px 0 10px 0;font-size:14px;color:#5b21b6;
    }

    .lists{
      display:grid;grid-template-columns: 1fr 1fr;gap:20px;
      border-top:2px solid #d9d9d9;margin-top:10px;padding-top:12px;
    }
    .list h5{margin:0 0 8px 0;color:#5b21b6;letter-spacing:.3px}
    .list ul{margin:0;padding-left:16px}
    .list li{color:#333;font-size:13px;line-height:1.5}

    .action-bar{
      border-top:4px solid #6b21a8; margin-top:12px; padding-top:10px;
      display:flex; justify-content:space-between; align-items:center; color:#222;
      font-size:14px;
    }
    .follow{
      display:flex; align-items:center; gap:8px; font-weight:700;
      color:#20925a;
    }
    .subtle{opacity:.85}

    /* Right rail (join requests) */
    .rail{
      background:#141414;border:2px solid #2a2a2a;border-radius:12px;
      padding:8px;display:grid;grid-template-rows: auto 1fr;min-width:0;
      overflow:hidden;
    }
    .rail h4{margin:4px 6px 8px 6px;font-size:14px;color:#cfcfcf}
    .tiles{
      overflow:auto;padding:2px 4px 8px 4px;
      display:grid;grid-template-columns: 1fr;gap:10px;
    }
    .tile{
      background:#0e0e0e;border:2px solid #5b21b6;border-radius:10px;
      height:100px;display:flex;align-items:center;justify-content:center;
      color:#a0a0a0;font-size:13px;position:relative;
    }
    .tile .speaker{
      position:absolute;top:8px;right:8px;background:#222;border-radius:50%;
      width:24px;height:24px;display:flex;align-items:center;justify-content:center;
      border:1px solid #444;
    }

    /* Scroll behaviors */
    .video-wrap, .tiles{scrollbar-width:thin}
    .tiles::-webkit-scrollbar{height:8px;width:8px}
    .tiles::-webkit-scrollbar-thumb{background:#2f2f2f;border-radius:10px}

    /* ------------- Responsive ------------- */
    @media (max-width: 1100px){
      .page{grid-template-columns: 1fr 240px;}
      .band{grid-template-columns: 240px 1fr;}
    }
    @media (max-width: 820px){
      body{overflow:auto}
      .page{
        grid-template-columns: 1fr;
        height:auto; /* let content flow */
      }
      .rail{
        order:3;margin-top:8px;min-height:320px;
      }
      .band{
        grid-template-columns: 1fr; /* stack purple card above info on small screens */
      }
      .profile-card{border-bottom:3px solid #7540d8;border-right:none}
    }
  </style>
 <style>
  .live-dot {
  display: flex;
  align-items: center;
  gap: 6px;
  font-weight: 600;
  color: #e9e9e9;
  font-size: 14px;
}

.live-dot i {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: #ff3b3b;
  display: inline-block;
  position: relative;
}

.live-dot i::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background: rgba(255, 59, 59, 0.6);
  animation: pulse 1.5s infinite;
}

@keyframes pulse {
  0% {
    transform: scale(1);
    opacity: 0.8;
  }
  70% {
    transform: scale(2.2);
    opacity: 0;
  }
  100% {
    transform: scale(1);
    opacity: 0;
  }
}

/* Custom css */
/* Modern modal (sm-prefix styling) */
.sm-modal {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,.8);
  z-index: 999999;
}
.sm-modal-dialog {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}
.sm-modal-content {
  background: blueviolet;
  color: white;
  padding: 35px 40px;
  width: 95%;
  max-width: 520px;
  border-radius: 22px;
  position: relative;
  animation: smFade .35s ease;
  text-align: center;
}
@keyframes smFade { from{opacity:0; transform:scale(.9);} to{opacity:1; transform:scale(1);} }

.sm-close-btn {
  position: absolute;
  right: 18px;
  top: 15px;
  font-size: 40px;
  color: white;
  background: none;
  border: none;
  cursor: pointer;
}

.sm-modal-title {
  font-size: 27px;
  margin-bottom: 10px;
}
.sm-modal-desc {
  font-size: 16px;
  margin-bottom: 25px;
}

/* Cards layout */
.sm-plans {
  display: grid;
  gap: 15px;
}
.sm-card {
  background: white;
  color: #3b3b3b;
  border: none;
  border-radius: 14px;
  padding: 15px 20px;
  width: 100%;
  cursor: pointer;
  transition: .25s;
}
.sm-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 15px rgba(0,0,0,.25);
}
.sm-card-title {
  font-size: 18px;
  font-weight: bold;
}
.sm-card-price {
  font-size: 15px;
  opacity: .8;
}

/* Highlight "popular" plan */
.sm-popular {
  outline: 4px dashed #111;
}

/* footer */
.sm-contact {
  color: white;
  text-decoration: underline;
  display: block;
  margin-top: 15px;
  font-size: 15px;
}
.sm-footer {
  margin-top: 20px;
  font-size: 14px;
  opacity: .85;
}

</style>
</head>
<body>
  <div class="page">
    <!-- LEFT: stage (video + band) -->
    <section class="stage">
      <!-- Video -->
      <div class="video-wrap">
        <div id="video-container"><!-- video attaches here --></div>
      </div>

      <!-- Band below video (purple profile + info) -->
      <div class="band">
        <!-- Purple profile / donations (NO fabricated numbers) -->
        <aside class="profile-card">
          <div class="profile-top">
                @if ($profile_picture != null)

                        <img src="{{ asset('assets/images/' . $profile_picture . '') }}"
                             style="width: 92px; height: 92px; border-radius: 74px; border: 4px solid white; ">
                    @else
                        <img src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                             style="width: 92px; height: 92px; border-radius: 74px;">

                    @endif
            <div class="profile-meta">
              <div class="profile-name">{{ $userName }}</div>
             <div class="row-muted">{{ number_format($followers) }} followers</div>

              <!--@if(!empty($roomName))-->
              <!--  <div class="row-muted">{{ $roomName }}</div>-->
              <!--@endif-->
              <br />
           <div class="live-dot">
    <i></i>  <span id="viewer-count">0</span> Users Live
</div>

            </div>
          </div>

          <div class="donos">
            <h4>💰 DONACIONES</h4>
            <div class="btns">
              <!-- placeholders only; wire up later -->
              <button class="chip-btn" type="button">5€</button>
              <button class="chip-btn" type="button">10€</button>
              <button class="chip-btn" type="button">20€</button>
              <button class="chip-btn" type="button">Persnlz</button>
            </div>
          </div>
        </aside>

        <!-- Info card (name + tags + bio + lists) -->
        <section class="info-card">
          <div class="title-line">
            <div class="stream-name">
              <span>🎥 {{ $userName }}</span>
            </div>
            <div class="tags">
              @foreach(array_filter(array_map('trim', explode(',', $tags ?? ''))) as $t)
                <span class="tag">{{ $t }}</span>
              @endforeach
            </div>
          </div>

          @if(!empty($bio))
            <div class="bio">{{ $bio }}</div>
          @endif

          <div class="lists">
            <div class="list">
              <h5>SUPER DONANTES</h5>
              <ul>
                <!-- Leave empty for now to avoid fabricating data -->
              </ul>
            </div>
            <div class="list">
              <h5>SUPER FANS</h5>
              <ul>
                <!-- Leave empty for now to avoid fabricating data -->
              </ul>
            </div>
          </div>

          <!--<div class="action-bar">-->
          <!--  <div class="follow">✅ Followed</div>-->
          <!--  <div class="subtle">Subscribe • To see this post | $0.99</div>-->
          <!--</div>-->
        </section>
      </div>
    </section>

    <!-- RIGHT: requests rail (empty placeholders initially) -->
    <aside class="rail">
      <h4>Join Requests</h4>
      <div class="tiles" id="requests">
        <!-- simple placeholders; replace with real users when available -->
        <div class="tile"><span>Waiting…</span><div class="speaker">🔇</div></div>
        <div class="tile"><span>Waiting…</span><div class="speaker">🔇</div></div>
        <div class="tile"><span>Waiting…</span><div class="speaker">🔇</div></div>
        <div class="tile"><span>Waiting…</span><div class="speaker">🔇</div></div>
        <div class="tile"><span>Waiting…</span><div class="speaker">🔇</div></div>
        <div class="tile"><span>Waiting…</span><div class="speaker">🔇</div></div>
      </div>
    </aside>
  </div>
<!-- ❗ Custom Streaming Error Modal -->
<!-- ❗ Custom Streaming Error Modal -->
<div class="sm-modal" id="sm-serverPackModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="sm-modal-dialog">
    <div class="sm-modal-content">

      <!-- Close button -->
      <button class="sm-close-btn" onclick="sm_closeServerPackModal()">×</button>

      <h3 class="sm-modal-title">🎥 {!! __('content.stream_title_band') !!}</h3>
      <p class="sm-modal-desc">
        {!! __('content.stream_body_band') !!}
      </p>

      <!-- Pricing Cards -->
      <div class="sm-plans">
        
        <form action="{{ route('redsys.now') }}" method="POST">@csrf
          <input type="hidden" name="plan" value="1K">
          <input type="hidden" name="amount" value="99">
          <input type="hidden" name="influencer_id" value="{{ $user_id }}">
          <input type="hidden" name="payment_type" value="recurring">
          <button type="submit" class="sm-card"> 
            {!! __('content.stream_form_band1') !!}
          </button>
        </form>

        <form action="{{ route('redsys.now') }}" method="POST">@csrf
          <input type="hidden" name="plan" value="5K">
                    <input type="hidden" name="amount" value="199">
          <input type="hidden" name="influencer_id" value="{{ $user_id }}">
                    <input type="hidden" name="payment_type" value="recurring">

          <button type="submit" class="sm-card sm-popular">
            {!! __('content.stream_form_band2') !!}
          </button>
        </form>

        <form action="{{ route('redsys.now') }}" method="POST">@csrf
          <input type="hidden" name="plan" value="25K">
                    <input type="hidden" name="amount" value="499.00">
          <input type="hidden" name="influencer_id" value="{{ $user_id }}">
          <input type="hidden" name="payment_type" value="recurring">
          <button type="submit" class="sm-card">
            {!! __('content.stream_form_band3') !!}
          </button>
        </form>

        <form action="{{ route('redsys.now') }}" method="POST">@csrf
          <input type="hidden" name="plan" value="100K">
                    <input type="hidden" name="amount" value="999">
          <input type="hidden" name="payment_type" value="recurring">
          <input type="hidden" name="influencer_id" value="{{ $user_id }}">
          <button type="submit" class="sm-card">
            {!! __('content.stream_form_band4') !!}
          </button>
        </form>

      </div>

      <a href="mailto:hello@superfanss.app" class="sm-contact">
            {!! __('content.stream_moreForm_band') !!}</a>

      <p class="sm-footer">
            {!! __('content.stream_footer_band') !!}
      </p>

    </div>
  </div>
</div>
<script>
function sm_openServerPackModal() {
  document.getElementById("sm-serverPackModal").style.display = "block";
}
function sm_closeServerPackModal() {
  document.getElementById("sm-serverPackModal").style.display = "none";
}
</script>


  <script>
    let room;

    async function initStream () {
      const roomName = @json($roomName);
      const userName = @json($userName);

      try {
        // 1) Get LiveKit token
        const tokenRes = await fetch(`/streamtoken?room=${encodeURIComponent(roomName)}&user=${encodeURIComponent(userName)}`);
        if (!tokenRes.ok) throw new Error('Failed to get token');
        const { token } = await tokenRes.json();

        // 2) Connect
        room = new LivekitClient.Room();
        await room.connect("wss://livekit.superfansstream.xyz", token);
        console.log("✅ Connected:", roomName);


// --- Viewer count updater ---
function updateViewerCount() {
  if (!room || !room.participants) return;
  const count = room.participants.size; // counts remote viewers
  document.getElementById("viewer-count").textContent = count;
}

// listen for join/leave
room.on(LivekitClient.RoomEvent.ParticipantConnected, updateViewerCount);
room.on(LivekitClient.RoomEvent.ParticipantDisconnected, updateViewerCount);

// initialize (now it's safe)
updateViewerCount();

        // 3) Capture and publish
        const tracks = await LivekitClient.createLocalTracks({ audio: true, video: { facingMode: "user" }});
        for (const track of tracks) {
          if (track.kind === "video") {
            const el = track.attach();
            // ensure our video container is empty first
            const vc = document.getElementById("video-container");
            vc.innerHTML = "";
            vc.appendChild(el);
          }
          await room.localParticipant.publishTrack(track);
        }
        console.log("📡 Streaming started");
      } catch (err) {
        console.error("❌ Stream init error:", err);
sm_openServerPackModal();
        // alert("Could not start stream");
      }
    }

    initStream();
  </script>
</body>
</html>
 