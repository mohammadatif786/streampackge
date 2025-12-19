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
