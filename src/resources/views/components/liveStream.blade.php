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
