<aside class="sidebar-left glass-panel">
    <div class="profile-card">
      <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100" class="avatar" alt="Shanae">
      <div class="profile-info">
        <h4>Shanae Forbes</h4>
        <span class="follow-badge">👥 <span id="follower-count">1,240</span> Followers</span>
        <button id="btn-follow" class="btn-follow" onclick="app.toggleFollow()">Follow</button>
      </div>
    </div>
    <nav>
      <button class="nav-btn active" onclick="app.closeModals()">🎥 Studio View</button>
      <button class="nav-btn" onclick="app.openModal('network')">🔴 Live Network</button>
      <button class="nav-btn" onclick="app.openModal('analytics')">📊 Analytics</button>
      <button class="nav-btn" onclick="app.openModal('guests')">👥 Guest List</button>
      <button class="nav-btn" onclick="app.openModal('settings')">⚙️ Settings</button>
      <button class="nav-btn" onclick="app.openModal('help')">❓ Help & Guide</button>
    </nav>
    <div class="earnings-box">
      <div style="font-weight:800; margin-bottom:12px; font-size:12px; text-transform:uppercase; color:var(--text-muted); letter-spacing:1px;">Session Revenue</div>
      <div class="earnings-row"><span>Coins</span><span style="color:#ffd700; font-weight:700;">🪙 <span id="session-coins">0</span></span></div>
      <div class="earnings-row"><span>Cash</span><span class="val-cash">$ <span id="session-cash">0.00</span></span></div>
      <button class="btn-transfer" id="btn-transfer" onclick="app.transfer()">Transfer to Wallet</button>
    </div>
  </aside>
