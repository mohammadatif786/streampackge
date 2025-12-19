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
