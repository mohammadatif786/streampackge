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
