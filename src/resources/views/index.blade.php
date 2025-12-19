<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Live — Studio</title>

  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <link rel="stylesheet" href="{{ asset('vendor/streampackage/style.css') }}" />
</head>
<body>

<div class="app-layout">

    @include('streampackage::layout.header')

    @include('streampackage::layout.sidebar-left')

  <main class="stage">

    <div id="modal-help" class="modal-overlay">
      <div class="modal-header">
        <h2>LinkUp Studio Guide</h2>
        <button class="close-btn" onclick="app.closeModals()">×</button>
      </div>
      <div style="max-width:600px;">
        <ul class="help-list">
          <li>
            <strong>1. Going Live 🎥</strong>
            <p>Click the main button at the bottom to start your stream. The button will turn Red and pulsate to indicate you are On Air. A secondary "End Stream" button will appear at the top-right of your video for safety.</p>
          </li>
          <li>
            <strong>2. Private Broadcasts & Subscriptions 🔒</strong>
            <p>In <strong>Settings</strong>, you can switch visibility to "Private". This allows you to set a monthly subscription fee. Revenue is split 50/50 between you and the platform. Viewers can pay via LinkUp Wallet or Credit Card.</p>
          </li>
          <li>
            <strong>3. Earnings & Transfers 💸</strong>
            <p>Gifts received during the show accumulate as "Session Revenue". Click "Transfer to Wallet" to move funds to your main balance. LinkUp automatically deducts the 50% platform fee during this transfer.</p>
          </li>
          <li>
            <strong>4. Managing Guests 👥</strong>
            <p>Open the Guest List to invite users. Once they accept, click "Call" to bring them onto the stage in a split-screen layout. Use the red (X) button on their video feed to remove them.</p>
          </li>
          <li>
            <strong>5. Interaction Tools 💬</strong>
            <p>Use the Right Sidebar to chat, answer Q&A questions, and create 4-option Polls to engage your audience. You can also see who is sending gifts in real-time.</p>
          </li>
        </ul>
      </div>
    </div>

    <div id="modal-settings" class="modal-overlay">
      <div class="modal-header">
        <h2>Broadcast Settings</h2>
        <button class="close-btn" onclick="app.closeModals()">×</button>
      </div>
      <div style="max-width:500px;">
        <div class="form-group">
          <label>Heading (Title)</label>
          <input type="text" id="set-heading" placeholder="e.g. Carnival Warmup! 🎭">
        </div>
        <div class="form-group">
          <label>Category (Select One)</label>
          <select id="set-category">
            <option value="Just Chatting">Just Chatting</option>
            <option value="Reggae & Dancehall">Music: Reggae & Dancehall</option>
            <option value="Soca & Calypso">Music: Soca & Calypso</option>
            <option value="Latin & Reggaeton">Music: Latin & Reggaeton</option>
            <option value="Afrobeats">Music: Afrobeats & Amapiano</option>
            <option value="Hip Hop & R&B">Music: Hip Hop & R&B</option>
            <option value="Gospel">Music: Gospel & Inspirational</option>
            <option value="DJ Set">Live DJ Set</option>
            <option value="Island Food">Food: Island Cooking</option>
            <option value="Street Food">Food: Street Food Review</option>
            <option value="Rum & Mixology">Food: Rum & Mixology</option>
            <option value="Gaming">Gaming (General)</option>
            <option value="Dominoes">Gaming: Dominoes & Board Games</option>
            <option value="Cricket">Sports: Cricket</option>
            <option value="Track">Sports: Track & Field</option>
            <option value="Travel">Travel & Beach Life</option>
            <option value="Carnival">Carnival & Festivals</option>
            <option value="Fashion">Fashion & Design</option>
            <option value="Comedy">Comedy & Skits</option>
            <option value="News">News & Politics</option>
            <option value="Crypto">Tech, Crypto & Finance</option>
            <option value="Education">Education & History</option>
            <option value="Dating">Dating & Relationships</option>
            <option value="Auto">Automotive & Bikes</option>
          </select>
        </div>
        <div class="form-group">
          <label>Location</label>
          <input type="text" id="set-location" value="Port of Spain, Trinidad">
        </div>
        <div class="form-group">
          <label>Cover Image</label>
          <label class="file-upload-box">
            <div id="file-label">Click to upload</div>
            <input type="file" id="cover-upload" accept="image/png, image/jpeg">
          </label>
        </div>

        <div class="form-group">
          <label style="color:var(--brand-yellow); border-bottom:1px solid var(--glass-border); padding-bottom:5px; margin-bottom:15px;">Video Settings</label>
          <div class="video-settings-grid">
            <div>
              <span class="mini-label">Base (Canvas) Resolution</span>
              <select id="set-res-base">
                <option value="1920x1080">1920x1080</option>
                <option value="1280x720">1280x720</option>
              </select>
            </div>
            <div>
              <span class="mini-label">Output (Scaled) Resolution</span>
              <select id="set-res-out">
                <option value="1920x1080">1920x1080</option>
                <option value="1280x720" selected>1280x720</option>
                <option value="854x480">854x480</option>
              </select>
            </div>
          </div>
          <div style="margin-top:10px;">
            <span class="mini-label">Downscale Filter</span>
            <select id="set-filter">
              <option value="bicubic">Bicubic (Sharpened scaling, 16 samples)</option>
              <option value="lanczos">Lanczos (Sharpened scaling, 36 samples)</option>
              <option value="bilinear">Bilinear (Fastest, but blurry)</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label>Visibility</label>
          <div class="visibility-toggle">
            <button class="v-btn active" id="btn-public" onclick="app.toggleVisibility('public')">Public</button>
            <button class="v-btn" id="btn-private" onclick="app.toggleVisibility('private')">Private</button>
          </div>
          <div class="private-settings" id="private-options">
            <label style="color:#28a4ff">Sub Fee</label>
            <input type="number" id="sub-price" placeholder="5.00" oninput="app.calcSplit()">
            <div style="margin-top:10px; font-size:12px; color:#aaa;">
              You earn: <span id="share-user" style="color:#fff;">$0.00</span>
            </div>
          </div>
        </div>
        <button class="btn-pill" style="width:100%;" onclick="app.saveSettings()">Save & Update</button>
      </div>
    </div>

    <div id="modal-topup" class="modal-overlay">
      <div class="modal-header">
        <h2>Buy Coins</h2>
        <button class="close-btn" onclick="app.closeModals()">×</button>
      </div>
      <div class="coin-shop-grid">
        <div class="coin-pack" onclick="app.buyCoins(100, 0.99)">
          <span class="pack-amount">100 🪙</span>
          <span class="pack-price">$0.99</span>
        </div>
        <div class="coin-pack" onclick="app.buyCoins(500, 4.99)">
          <span class="pack-amount">500 🪙</span>
          <span class="pack-price">$4.99</span>
        </div>
        <div class="coin-pack" onclick="app.buyCoins(1000, 9.99)">
          <span class="pack-amount">1000 🪙</span>
          <span class="pack-price">$9.99</span>
        </div>
        <div class="coin-pack" onclick="app.buyCoins(5000, 49.99)">
          <span class="pack-amount">5000 🪙</span>
          <span class="pack-price">$49.99</span>
        </div>
      </div>
    </div>

    <div id="modal-guests" class="modal-overlay">
      <div class="modal-header">
        <h2>Guests</h2>
        <button class="close-btn" onclick="app.closeModals()">×</button>
      </div>
      <div style="display:flex; gap:10px; margin-bottom:20px;">
        <input type="text" placeholder="Username..." style="flex:1;">
        <button style="padding:10px 20px; background:var(--brand-yellow); color:#000; font-weight:700; border:none; border-radius:8px;">Invite</button>
      </div>
      <div style="background:rgba(255,255,255,0.05); padding:10px; border-radius:8px; display:flex; justify-content:space-between; align-items:center;">
        <div style="display:flex; gap:10px; align-items:center;">
          <div style="width:30px; height:30px; background:#444; border-radius:50%; display:grid; place-items:center;">JD</div>
          <span>John Doe</span>
        </div>
        <button onclick="app.addGuest('John Doe')" style="padding:6px 12px; background:var(--success); color:#fff; border:none; border-radius:6px; cursor:pointer;">Call</button>
      </div>
    </div>

    <div id="modal-network" class="modal-overlay">
      <div class="modal-header">
        <h2>🔴 Live Network</h2>
        <button class="close-btn" onclick="app.closeModals()">×</button>
      </div>
      <div class="live-network-grid">
        <div class="live-card">
          <div class="live-thumb">
            <div class="live-tag">LIVE</div>
            <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=400">
          </div>
          <div class="live-meta">
            <strong>DJ Island Vibes</strong><br>
            <small style="color:#aaa">Reggae</small>
            <div class="live-stats-row">
              <span>👤 1.2k</span><span>❤️ 5k</span><span>🎁 340</span>
            </div>
          </div>
        </div>
        <div class="live-card">
          <div class="live-thumb">
            <div class="live-tag">LIVE</div>
            <img src="https://images.unsplash.com/photo-1566737236500-c8ac43014a67?w=400">
          </div>
          <div class="live-meta">
            <strong>Jerk Cooking 101</strong><br>
            <small style="color:#aaa">Food</small>
            <div class="live-stats-row">
              <span>👤 450</span><span>❤️ 2.1k</span><span>🎁 120</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="modal-analytics" class="modal-overlay">
      <div class="modal-header">
        <h2>Analytics</h2>
        <button class="close-btn" onclick="app.closeModals()">×</button>
      </div>
      <div style="height:300px; background:rgba(255,255,255,0.02); border-radius:12px; padding:20px;">
        <canvas id="chart-analytics"></canvas>
      </div>
    </div>

    <div class="video-grid" id="video-grid">
      <div class="video-slot">
        <button id="btn-end-overlay" class="btn-end-overlay" onclick="app.toggleLive()">End Stream ⏹</button>

        <div class="stats-overlay">
          <div class="stat-badge">👤 <span id="live-viewers">0</span></div>
          <div class="stat-badge">❤️ <span id="live-likes">0</span></div>
        </div>

        <div class="stream-info-layer">
          <div class="stream-heading" id="display-heading">Heading Not Set</div>
          <div class="stream-category" id="display-category">Just Chatting</div>
          <div class="stream-location" id="display-location">📍 Port of Spain, Trinidad</div>
        </div>

        <div id="cover-layer" class="cover-layer">
          <div class="cover-placeholder">
            <div style="font-size:30px">🖼️</div>
            <div>No Cover Image</div>
          </div>
        </div>

        <div class="reaction-dock">
          <button class="reaction-btn" onclick="app.sendReaction('bottle')">🍾</button>
          <button class="reaction-btn" onclick="app.sendReaction('heart')">❤️</button>
        </div>

        <video id="host-video" autoplay playsinline muted></video>

        <div class="slot-label">Host</div>
      </div>
    </div>

    <div class="controls-dock">
      <button class="btn-pill" id="btn-live" onclick="app.toggleLive()">Go Live</button>
      <div style="width:1px; height:30px; background:rgba(255,255,255,0.1); margin:0 10px;"></div>
      <button class="btn-circle" id="btn-mic" onclick="app.toggleMic()" title="Mic">🎤</button>
      <button class="btn-circle" id="btn-cam" onclick="app.toggleCam()" title="Cam">📷</button>
      <button class="btn-circle" onclick="app.openModal('settings')" title="Settings">⚙️</button>
    </div>
  </main>

    @include('streampackage::layout.sidebar-right')

</div>

<script>
class App {
  constructor() {
    this.isLive = false;
    this.micOn = true;
    this.camOn = true;

    this.wallet = 1450.00;
    this.userCoins = 50;

    this.following = false;
    this.followers = 1240;
    this.viewers = 0;
    this.likes = 0;

    this.sCoins = 0;
    this.sCash = 0;
    this.settings = { visibility: 'public', price: 0 };

    this.initGifts();
    this.initChart();
    this.setupImageUpload();
  }

  // --- MEDIA TOGGLES ---
  toggleMic() {
    const btn = document.getElementById('btn-mic');
    this.micOn = !this.micOn;

    if (this.isLive) {
      const v = document.getElementById('host-video');
      if (v.srcObject) {
        const tracks = v.srcObject.getAudioTracks();
        if (tracks[0]) {
          tracks[0].enabled = this.micOn;
        }
      }
    }

    if (!this.micOn) {
      btn.innerHTML = "🚫";
      btn.style.background = "rgba(255,77,77,0.5)";
    } else {
      btn.innerHTML = "🎤";
      btn.style.background = "rgba(255,255,255,0.2)";
    }
  }

  toggleCam() {
    const btn = document.getElementById('btn-cam');
    this.camOn = !this.camOn;

    if (this.isLive) {
      const v = document.getElementById('host-video');
      if (v.srcObject) {
        const tracks = v.srcObject.getVideoTracks();
        if (tracks[0]) {
          tracks[0].enabled = this.camOn;
        }
      }
    }

    if (!this.camOn) {
      btn.innerHTML = "🚫";
      btn.style.background = "rgba(255,77,77,0.5)";
    } else {
      btn.innerHTML = "📷";
      btn.style.background = "rgba(255,255,255,0.2)";
    }
  }

  // --- Q&A LOGIC ---
  submitQuestion() {
    const input = document.getElementById('qna-input');
    const txt = input.value;
    if (!txt) return;
    this.addQuestion("Me", txt);
    input.value = "";
  }

  addQuestion(user, text) {
    const list = document.getElementById('qna-list');
    const div = document.createElement('div');
    div.className = 'qna-card';
    div.innerHTML = `
      <span class="qna-user">${user}</span>
      <div class="qna-text">${text}</div>
      <div class="qna-actions">
        <button class="btn-sm btn-answer" onclick="this.closest('.qna-card').remove()">Mark Answered</button>
      </div>`;
    list.prepend(div);
  }

  // --- CARIBBEAN GIFTS ---
  initGifts() {
    const grid = document.getElementById('gift-grid');
    const items = [
      {i:'🍹', n:'Sex on Beach', c:50}, {i:'🥭', n:'Mango Salsa', c:30},
      {i:'🍗', n:'Jerk Chicken', c:100}, {i:'🥁', n:'Steel Pan', c:200},
      {i:'🥃', n:'Rum', c:50}, {i:'🥥', n:'Coconut', c:20},
      {i:'🍺', n:'Red Stripe', c:50}, {i:'🧩', n:'Dominoes', c:10},
      {i:'💃', n:'Soca', c:100}, {i:'🏖️', n:'Beach', c:500},
      {i:'🌴', n:'Palm Tree', c:500}, {i:'🌶️', n:'Pepper', c:10},
      {i:'🛥️', n:'Yacht', c:5000}, {i:'👑', n:'Carnival King', c:1000},
      {i:'🌮', n:'Tacos', c:50}, {i:'🚀', n:'Rocket', c:5000}
    ];

    items.forEach(g => {
      const el = document.createElement('div');
      el.className = 'gift-item';
      el.innerHTML = `
        <div style="font-size:20px">${g.i}</div>
        <div style="font-size:9px; font-weight:600; color:#ddd; margin-top:2px;">${g.n}</div>
        <small style="font-size:9px;color:#ffd700">🪙${g.c}</small>`;
      el.onclick = () => {
        if (!this.isLive) return alert("Go Live first!");

        if (this.userCoins < g.c) {
          alert("Not enough coins!");
          this.openModal('topup');
          return;
        }

        this.userCoins -= g.c;
        document.getElementById('user-coins').innerText = this.userCoins;

        this.sCoins += g.c;
        this.sCash += (g.c * 0.005);
        this.updateEarningsUI();

        const c = document.getElementById('tab-chat');
        c.innerHTML += `<div class="chat-msg"><strong>User:</strong> Sent ${g.n} ${g.i}</div>`;
        c.scrollTop = c.scrollHeight;

        confetti({ particleCount:20, spread:40, origin:{x:0.9, y:0.8} });
      };
      grid.appendChild(el);
    });
  }

  // --- SETTINGS (LOCATION) ---
  saveSettings() {
    document.getElementById('display-heading').innerText =
      document.getElementById('set-heading').value || "No Heading";

    document.getElementById('display-category').innerText =
      document.getElementById('set-category').value;

    document.getElementById('display-location').innerText =
      "📍 " + (document.getElementById('set-location').value || "Unknown");

    this.closeModals();
    alert("Updated!");
  }

  // --- CORE LOGIC ---
  sendReaction(type) {
    if (!this.isLive) return alert("Go Live to react!");

    if (type === 'heart') {
      this.likes++;
      document.getElementById('live-likes').innerText = this.likes;
      this.spawnFloat('❤️');
    } else {
      this.spawnFloat('🍾');
    }
  }

  spawnFloat(emoji) {
    const el = document.createElement('div');
    el.innerText = emoji;
    el.className = 'floater';
    el.style.left = (Math.random() * 80 + 10) + '%';
    el.style.bottom = '100px';
    document.querySelector('.video-slot').appendChild(el);
    setTimeout(() => el.remove(), 2000);
  }

  buyCoins(amount, cost) {
    if (this.wallet < cost) return alert("Insufficient Wallet Funds.");

    this.wallet -= cost;
    this.userCoins += amount;

    document.getElementById('wallet-balance').innerText = '$' + this.wallet.toFixed(2);
    document.getElementById('user-coins').innerText = this.userCoins;

    this.closeModals();
    confetti({ particleCount:50, spread:70, origin:{x:0.9, y:0.1} });
    alert(`Bought ${amount} coins!`);
  }

  setupImageUpload() {
    const upload = document.getElementById('cover-upload');
    if (!upload) return;

    upload.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (!file) return;

      const r = new FileReader();
      r.onload = (evt) => {
        const layer = document.getElementById('cover-layer');
        layer.style.backgroundImage = `url(${evt.target.result})`;
        layer.innerHTML = '';
        document.getElementById('file-label').innerText = "Loaded: " + file.name;
      };
      r.readAsDataURL(file);
    });
  }

  openModal(id) {
    document.querySelectorAll('.modal-overlay').forEach(m => m.classList.remove('active'));
    const modal = document.getElementById(`modal-${id}`);
    if (modal) modal.classList.add('active');
  }

  closeModals() {
    document.querySelectorAll('.modal-overlay').forEach(m => m.classList.remove('active'));
  }

  setTab(target, id) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-body').forEach(b => b.classList.remove('active'));

    target.classList.add('active');
    const body = document.getElementById(`tab-${id}`);
    if (body) body.classList.add('active');
  }

  toggleFollow() {
    const btn = document.getElementById('btn-follow');
    const c = document.getElementById('follower-count');

    this.following = !this.following;

    if (this.following) {
      this.followers++;
      btn.innerText = "Following";
      btn.classList.add('following');
      confetti({ particleCount:30, spread:40, origin:{x:0.1, y:0.2} });
    } else {
      this.followers--;
      btn.innerText = "Follow";
      btn.classList.remove('following');
    }

    c.innerText = this.followers.toLocaleString();
  }

  addGuest(name) {
    const grid = document.getElementById('video-grid');
    const slot = document.createElement('div');
    slot.className = 'video-slot';
    slot.innerHTML = `
      <img src="https://source.unsplash.com/random/300x300?face&sig=${Math.random()}" style="opacity:0.8">
      <div class="slot-label">${name}</div>
      <button class="btn-kick" onclick="this.parentElement.remove()">✕</button>`;
    grid.appendChild(slot);
    this.closeModals();
  }

  createPoll() {
    const q = document.getElementById('p-q').value;
    const o1 = document.getElementById('p-o1').value;
    const o2 = document.getElementById('p-o2').value;
    const o3 = document.getElementById('p-o3').value;
    const o4 = document.getElementById('p-o4').value;

    if (!q || !o1 || !o2 || !o3 || !o4) return alert("Fill all fields");

    const container = document.getElementById('active-poll');
    container.innerHTML = `
      <div class="poll-display">
        <strong style="display:block; margin-bottom:10px;">${q}</strong>

        <div style="font-size:12px; display:flex; justify-content:space-between;">
          <span>${o1}</span><span>0%</span>
        </div>
        <div class="poll-bar-bg"><div class="poll-bar-fill" style="width:0%"></div></div>

        <div style="font-size:12px; display:flex; justify-content:space-between;">
          <span>${o2}</span><span>0%</span>
        </div>
        <div class="poll-bar-bg"><div class="poll-bar-fill" style="width:0%"></div></div>

        <div style="font-size:12px; display:flex; justify-content:space-between;">
          <span>${o3}</span><span>0%</span>
        </div>
        <div class="poll-bar-bg"><div class="poll-bar-fill" style="width:0%"></div></div>

        <div style="font-size:12px; display:flex; justify-content:space-between;">
          <span>${o4}</span><span>0%</span>
        </div>
        <div class="poll-bar-bg"><div class="poll-bar-fill" style="width:0%"></div></div>

        <button onclick="this.parentElement.remove()" style="background:transparent; border:none; color:var(--danger); font-size:11px; cursor:pointer;">End Poll</button>
      </div>`;

    setTimeout(() => {
      const fills = container.querySelectorAll('.poll-bar-fill');
      if (fills[0]) fills[0].style.width = "40%";
      if (fills[1]) fills[1].style.width = "20%";
      if (fills[2]) fills[2].style.width = "30%";
      if (fills[3]) fills[3].style.width = "10%";
    }, 1000);

    ['p-q','p-o1','p-o2','p-o3','p-o4'].forEach(id => document.getElementById(id).value = '');
  }

  async toggleLive() {
    const btn = document.getElementById('btn-live');
    const overlayBtn = document.getElementById('btn-end-overlay');
    const cover = document.getElementById('cover-layer');
    const hostVideo = document.getElementById('host-video');

    if (!this.isLive) {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
        hostVideo.srcObject = stream;
        this.isLive = true;
        this.st = Date.now();

        btn.textContent = "End Stream";
        btn.classList.add('danger');
        overlayBtn.classList.add('visible');

        document.getElementById('live-indicator').classList.add('active');
        cover.classList.add('hidden');

        this.ti = setInterval(() => {
          const s = Math.floor((Date.now() - this.st) / 1000);
          document.getElementById('timer').innerText =
            new Date(s * 1000).toISOString().substr(11, 8);

          if (Math.random() > 0.95) {
            this.addQuestion(
              "SimUser_" + Math.floor(Math.random() * 100),
              "When is the next show?"
            );
          }
        }, 1000);
      } catch (e) {
        alert("Camera Error");
      }
    } else {
      if (hostVideo.srcObject) {
        hostVideo.srcObject.getTracks().forEach(t => t.stop());
        hostVideo.srcObject = null;
      }

      this.isLive = false;
      clearInterval(this.ti);

      btn.textContent = "Go Live";
      btn.classList.remove('danger');
      overlayBtn.classList.remove('visible');

      document.getElementById('live-indicator').classList.remove('active');
      cover.classList.remove('hidden');
    }
  }

  toggleVisibility(mode) {
    this.settings.visibility = mode;
    const isP = mode === 'private';

    document.getElementById('btn-public').className = isP ? 'v-btn' : 'v-btn active';
    document.getElementById('btn-private').className = isP ? 'v-btn active' : 'v-btn';
    document.getElementById('private-options').style.display = isP ? 'block' : 'none';
  }

  calcSplit() {
    const val = parseFloat(document.getElementById('sub-price').value) || 0;
    this.settings.price = val;
    document.getElementById('share-user').innerText = `$${(val * 0.5).toFixed(2)}`;
  }

  updateEarningsUI() {
    document.getElementById('session-coins').innerText = this.sCoins.toLocaleString();
    document.getElementById('session-cash').innerText = this.sCash.toFixed(2);
    if (this.sCash > 0) {
      document.getElementById('btn-transfer').classList.add('ready');
    }
  }

  transfer() {
    if (this.sCash <= 0) return;

    const total = this.sCash;
    const plat = total * 0.5;
    const user = total * 0.5;

    this.wallet += user;
    document.getElementById('wallet-balance').innerText = '$' + this.wallet.toFixed(2);

    this.sCoins = 0;
    this.sCash = 0;
    this.updateEarningsUI();
    document.getElementById('btn-transfer').classList.remove('ready');

    alert(
      `Transfer Complete!\n\n` +
      `Total Session Revenue: $${total.toFixed(2)}\n\n` +
      `LinkUp Platform Fee (50%): -$${plat.toFixed(2)}\n` +
      `Added to your Wallet (50%): +$${user.toFixed(2)}`
    );
  }

  initChart() {
    const ctx = document.getElementById('chart-analytics');
    if (!ctx) return;

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: [1, 2, 3, 4, 5],
        datasets: [{
          label: 'Viewers',
          data: [10, 30, 25, 60, 100],
          borderColor: '#dfff00',
          fill: true,
          backgroundColor: 'rgba(223, 255, 0, 0.1)'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        scales: {
          x: { display: false },
          y: { grid: { color: 'rgba(255,255,255,0.1)' } }
        }
      }
    });
  }
}

window.addEventListener('DOMContentLoaded', () => {
  window.app = new App();
});
</script>

</body>
</html>
