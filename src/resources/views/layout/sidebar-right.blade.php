  <aside class="sidebar-right glass-panel">
    <div class="tabs">
      <button class="tab active" onclick="app.setTab(this, 'chat')">Chat</button>
      <button class="tab" onclick="app.setTab(this, 'qna')">Q&A</button>
      <button class="tab" onclick="app.setTab(this, 'polls')">Polls</button>
    </div>

    <div id="tab-chat" class="tab-body active">
      <div class="chat-msg" style="color:#aaa; justify-content:center;">Room Open</div>
    </div>

    <div id="tab-qna" class="tab-body">
      <div class="qna-input-box">
        <input type="text" id="qna-input" placeholder="Ask a question..." style="font-size:12px;">
        <button class="btn-sm" style="background:var(--success); color:#fff;" onclick="app.submitQuestion()">Ask</button>
      </div>
      <div id="qna-list"></div>
    </div>

    <div id="tab-polls" class="tab-body">
      <div class="poll-creator" id="poll-creator">
        <h4 style="margin:0 0 12px 0;">Create Poll</h4>
        <input type="text" id="p-q" placeholder="Question...">
        <input type="text" id="p-o1" placeholder="Option 1">
        <input type="text" id="p-o2" placeholder="Option 2">
        <input type="text" id="p-o3" placeholder="Option 3">
        <input type="text" id="p-o4" placeholder="Option 4">
        <button class="btn-pill" style="width:100%; margin-top:12px; font-size:12px; color:#2fa4e6" onclick="app.createPoll()">Launch Poll</button>
      </div>
      <div id="active-poll" style="margin-top:20px;"></div>
    </div>

    <div style="border-top:1px solid var(--glass-border); padding:10px; background:rgba(0,0,0,0.2);">
      <div class="gift-grid" id="gift-grid"></div>
    </div>
  </aside>
