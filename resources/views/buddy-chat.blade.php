<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Campus Buddy | Buddy Chat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Chat with Buddy AI — your intelligent campus assistant for schedules, tasks, notes, and campus life.">
  <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/buddy-chat.css') }}">
</head>
<body class="chat-page">

@include('includes.menu')

<div class="layout">
  <div class="buddy-chat-wrapper">

    <!-- ================= SIDEBAR: Chat History ================= -->
    <aside class="chat-sidebar">
      <div class="sidebar-header">
        <span class="sidebar-title">Chats</span>
        <button class="new-chat-btn" id="newChatBtn" title="New Chat">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
          </svg>
        </button>
      </div>

      <div class="sidebar-search">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        <input type="text" id="searchChats" placeholder="Search conversations…">
      </div>

      <span class="sidebar-label">Today</span>

      <a class="chat-history-item active" href="#" data-session="1">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
        <span class="history-text">My schedule for today</span>
        <span class="history-time">2m</span>
      </a>

      <a class="chat-history-item" href="#" data-session="2">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
        <span class="history-text">Upcoming deadlines</span>
        <span class="history-time">1h</span>
      </a>

      <a class="chat-history-item" href="#" data-session="3">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
        <span class="history-text">Software engineering notes</span>
        <span class="history-time">3h</span>
      </a>

      <span class="sidebar-label">Yesterday</span>

      <a class="chat-history-item" href="#" data-session="4">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
        <span class="history-text">Clubs joining guide</span>
        <span class="history-time">1d</span>
      </a>

      <a class="chat-history-item" href="#" data-session="5">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
        <span class="history-text">Data structures study plan</span>
        <span class="history-time">1d</span>
      </a>

      <a class="chat-history-item" href="#" data-session="6">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
        <span class="history-text">Alumni connect tips</span>
        <span class="history-time">2d</span>
      </a>

      <span class="sidebar-label">This Week</span>

      <a class="chat-history-item" href="#" data-session="7">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
        <span class="history-text">Exam preparation strategy</span>
        <span class="history-time">3d</span>
      </a>

      <a class="chat-history-item" href="#" data-session="8">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
        <span class="history-text">Semester routine help</span>
        <span class="history-time">5d</span>
      </a>
    </aside>

    <!-- ================= MAIN CHAT ================= -->
    <main class="chat-main" id="chatMain">

      <!-- Chat Top Header -->
      <div class="chat-top-header">
        <div class="chat-top-left">
          <div class="buddy-avatar">🤖</div>
          <div class="chat-bot-info">
            <h2>Buddy AI</h2>
            <div class="chat-bot-status"><span></span> Online — ready to help</div>
          </div>
        </div>
        <div class="chat-top-actions">
          <button class="chat-action-btn" id="clearChatBtn" title="Clear chat">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/>
            </svg>
          </button>
          <button class="chat-action-btn" title="Share conversation">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/>
              <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
            </svg>
          </button>
          <button class="chat-action-btn" title="More options">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="5" r="1"/><circle cx="12" cy="12" r="1"/><circle cx="12" cy="19" r="1"/>
            </svg>
          </button>
        </div>
      </div>

      <!-- Messages Container -->
      <div class="chat-messages" id="chatMessages">

        <!-- Welcome / Empty State shown when no messages -->
        <div class="welcome-section" id="welcomeSection">
          <div class="welcome-avatar">🤖</div>
          <div>
            <h1 class="welcome-title">Hi {{ Auth::user()->name ?? 'there' }}! I'm <span>Buddy AI</span> 👋</h1>
            <p class="welcome-subtitle">Your intelligent campus assistant. Ask me anything about your schedule, tasks, notes, clubs, or campus life!</p>
          </div>

          <div class="quick-prompts" id="quickPrompts">
            <button class="quick-prompt-chip" data-prompt="What classes do I have today?">
              <span class="chip-icon">📅</span>
              <span class="chip-title">Today's Schedule</span>
              <span class="chip-desc">Check your classes and time slots for today</span>
            </button>
            <button class="quick-prompt-chip" data-prompt="What are my upcoming deadlines and assignments?">
              <span class="chip-icon">📋</span>
              <span class="chip-title">Upcoming Deadlines</span>
              <span class="chip-desc">View tasks due soon and prioritize</span>
            </button>
            <button class="quick-prompt-chip" data-prompt="Help me create a study plan for my exams">
              <span class="chip-icon">📚</span>
              <span class="chip-title">Study Plan</span>
              <span class="chip-desc">Get a personalized exam prep strategy</span>
            </button>
            <button class="quick-prompt-chip" data-prompt="Tell me about the clubs and activities on campus">
              <span class="chip-icon">🎭</span>
              <span class="chip-title">Campus Clubs</span>
              <span class="chip-desc">Explore clubs, events, and activities</span>
            </button>
          </div>
        </div>

      </div><!-- /chat-messages -->

      <!-- Scroll to Bottom -->
      <button class="scroll-to-bottom" id="scrollToBottom" title="Scroll to bottom">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="6 9 12 15 18 9"/>
        </svg>
      </button>

      <!-- Input Area -->
      <div class="chat-input-area">
        <div class="input-wrapper" id="inputWrapper">
          <textarea
            id="chatInput"
            class="chat-input"
            placeholder="Ask Buddy anything about campus life…"
            rows="1"
            maxlength="2000"
          ></textarea>

          <div class="input-actions">
            <button class="input-btn" title="Attach file">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/>
              </svg>
            </button>
            <button class="input-btn" title="Voice input" id="voiceBtn">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/>
                <path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/>
              </svg>
            </button>
            <button class="send-btn" id="sendBtn" title="Send message">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>
              </svg>
            </button>
          </div>
        </div>
        <p class="input-hint">Buddy AI can make mistakes. Verify important information. Press <kbd>Enter</kbd> to send, <kbd>Shift+Enter</kbd> for new line.</p>
      </div>

    </main><!-- /chat-main -->

    <!-- ================= CONTEXT PANEL (Right Sidebar) ================= -->
    <aside class="chat-context-panel">

      <!-- Capabilities -->
      <div>
        <p class="context-section-title">Capabilities</p>
        <div class="capability-card" onclick="sendQuickMessage('What classes do I have today?')">
          <div class="cap-icon">📅</div>
          <div class="cap-text">
            <h4>Class Schedule</h4>
            <p>Today's timetable & rooms</p>
          </div>
        </div>
        <div class="capability-card" onclick="sendQuickMessage('Show me all my pending assignments')">
          <div class="cap-icon">📋</div>
          <div class="cap-text">
            <h4>Task Manager</h4>
            <p>Deadlines & pending tasks</p>
          </div>
        </div>
        <div class="capability-card" onclick="sendQuickMessage('Find notes for my current semester')">
          <div class="cap-icon">📚</div>
          <div class="cap-text">
            <h4>Notes & PDFs</h4>
            <p>Course materials & resources</p>
          </div>
        </div>
        <div class="capability-card" onclick="sendQuickMessage('List all campus clubs and how to join them')">
          <div class="cap-icon">🎭</div>
          <div class="cap-text">
            <h4>Campus Life</h4>
            <p>Clubs, events & activities</p>
          </div>
        </div>
      </div>

      <!-- Quick Stats -->
      <div>
        <p class="context-section-title">Your Stats</p>
        <div class="stats-mini-grid">
          <div class="stat-mini-card">
            <span class="stat-mini-val">3</span>
            <span class="stat-mini-label">Classes Today</span>
          </div>
          <div class="stat-mini-card">
            <span class="stat-mini-val" style="color: #f87171;">2</span>
            <span class="stat-mini-label">Due Soon</span>
          </div>
          <div class="stat-mini-card">
            <span class="stat-mini-val" style="color: #a78bfa;">8</span>
            <span class="stat-mini-label">Chats</span>
          </div>
          <div class="stat-mini-card">
            <span class="stat-mini-val" style="color: #fb923c;">5</span>
            <span class="stat-mini-label">Events</span>
          </div>
        </div>
      </div>

      <!-- Popular Topics -->
      <div>
        <p class="context-section-title">Popular Topics</p>
        <div class="topic-chips">
          <button class="topic-chip" onclick="sendQuickMessage('Explain the grading system')">Grading</button>
          <button class="topic-chip" onclick="sendQuickMessage('How to calculate my CGPA?')">CGPA</button>
          <button class="topic-chip" onclick="sendQuickMessage('Show upcoming campus events')">Events</button>
          <button class="topic-chip" onclick="sendQuickMessage('Tell me about the alumni network')">Alumni</button>
          <button class="topic-chip" onclick="sendQuickMessage('Give me exam tips')">Exam Tips</button>
          <button class="topic-chip" onclick="sendQuickMessage('Help me write a study plan')">Study Plan</button>
          <button class="topic-chip" onclick="sendQuickMessage('What internships are available?')">Internships</button>
          <button class="topic-chip" onclick="sendQuickMessage('Campus facilities guide')">Facilities</button>
        </div>
      </div>

    </aside>

  </div><!-- /buddy-chat-wrapper -->
</div><!-- /layout -->

<script>
document.addEventListener('DOMContentLoaded', function () {
  const chatInput    = document.getElementById('chatInput');
  const sendBtn      = document.getElementById('sendBtn');
  const chatMessages = document.getElementById('chatMessages');
  const welcomeSection = document.getElementById('welcomeSection');
  const quickPrompts = document.getElementById('quickPrompts');
  const newChatBtn   = document.getElementById('newChatBtn');
  const clearChatBtn = document.getElementById('clearChatBtn');
  const scrollBtn    = document.getElementById('scrollToBottom');
  const historyItems = document.querySelectorAll('.chat-history-item');

  let messageCount = 0;
  let isTyping = false;
  const userName = "{{ Auth::user()->name ?? 'You' }}";

  /* ─── SAMPLE AI RESPONSES ───────────────────────────── */
  const smartReplies = {
    schedule: [
      "📅 Here's your schedule for today:\n\n**9:00 AM** — Data Structures (Lab 201)\n**11:00 AM** — Software Engineering (Room 305)\n**2:00 PM** — Database Systems (Room 102)\n\nYou have 3 classes today. Remember to bring your lab notebook! 🎒",
      "Your classes look good today! Head to Lab 201 first for Data Structures at 9am. Don't forget your assignment submission!"
    ],
    assignment: [
      "📋 Your upcoming deadlines:\n\n🔴 **Data Structures Assignment** — Due Tomorrow\n🟠 **Software Engineering Report** — Due in 3 days\n🟡 **Database Project** — Due next week\n\nI recommend starting with the DS assignment right away! Want me to help you create a checklist?",
      "You have 2 urgent tasks! The Data Structures assignment is due tomorrow — would you like help breaking it down into smaller steps?"
    ],
    study: [
      "📚 Great idea! Here's a personalized study plan:\n\n**Day 1-2:** Review lecture slides & notes\n**Day 3-4:** Practice past exam questions\n**Day 5:** Group study session\n**Day 6:** Mock test\n**Day 7:** Review weak areas\n\nWant me to set reminders for each session?",
      "I'll help you prepare! First, let me know which subjects you're most concerned about, and I'll prioritize accordingly."
    ],
    clubs: [
      "🎭 Here are the active clubs on campus:\n\n🤖 **Robotics Club** — Meets every Friday, 5PM\n💻 **Programming Club** — Meets Tuesday & Thursday\n🎨 **Art & Design Society** — Meets Wednesday\n🎵 **Music Club** — Meets Saturday\n\nTo join, visit the Student Affairs office or contact the club president. Want details on any specific club?",
    ],
    default: [
      "I'm here to help! 😊 You can ask me about your schedule, assignments, notes, clubs, or anything about campus life. What would you like to know?",
      "That's a great question! Let me help you with that. As your campus buddy, I have access to your academic information and campus resources. Could you tell me more about what you need?",
      "I understand! Let me look into that for you. 🔍 In the meantime, feel free to explore the quick prompts on the left for common requests.",
      "Sure! I can assist with that. Campus life can be overwhelming, but that's what I'm here for. 🤖✨",
    ]
  };

  function getBotReply(userMessage) {
    const msg = userMessage.toLowerCase();
    if (msg.includes('schedule') || msg.includes('class') || msg.includes('today') || msg.includes('timetable'))
      return smartReplies.schedule[Math.floor(Math.random() * smartReplies.schedule.length)];
    if (msg.includes('assignment') || msg.includes('deadline') || msg.includes('task') || msg.includes('due'))
      return smartReplies.assignment[Math.floor(Math.random() * smartReplies.assignment.length)];
    if (msg.includes('study') || msg.includes('exam') || msg.includes('plan') || msg.includes('prepare'))
      return smartReplies.study[Math.floor(Math.random() * smartReplies.study.length)];
    if (msg.includes('club') || msg.includes('activit') || msg.includes('join') || msg.includes('event'))
      return smartReplies.clubs[0];
    return smartReplies.default[Math.floor(Math.random() * smartReplies.default.length)];
  }

  function formatText(text) {
    return text
      .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
      .replace(/\n/g, '<br>');
  }

  function getCurrentTime() {
    return new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
  }

  /* ─── HIDE WELCOME & SHOW MESSAGES ─────────────────── */
  function ensureMessagesVisible() {
    if (welcomeSection && welcomeSection.parentNode === chatMessages) {
      welcomeSection.style.animation = 'none';
      welcomeSection.style.opacity = '0';
      welcomeSection.style.transform = 'scale(0.95)';
      welcomeSection.style.transition = 'all 0.25s ease';
      setTimeout(() => {
        if (welcomeSection.parentNode) welcomeSection.parentNode.removeChild(welcomeSection);
      }, 250);
    }
  }

  /* ─── APPEND USER MESSAGE ───────────────────────────── */
  function appendUserMessage(text) {
    ensureMessagesVisible();
    messageCount++;
    const row = document.createElement('div');
    row.className = 'message-row user-row';
    row.style.animationDelay = '0s';
    row.innerHTML = `
      <div class="msg-avatar user-avatar">👤</div>
      <div class="msg-content-wrap">
        <span class="msg-sender-name">${userName}</span>
        <div class="msg-bubble">${formatText(text)}</div>
        <span class="msg-time">${getCurrentTime()}</span>
      </div>
    `;
    chatMessages.appendChild(row);
    scrollToBottom();
  }

  /* ─── SHOW TYPING INDICATOR ─────────────────────────── */
  function showTypingIndicator() {
    const row = document.createElement('div');
    row.className = 'message-row bot-row';
    row.id = 'typingRow';
    row.style.animationDelay = '0s';
    row.innerHTML = `
      <div class="msg-avatar bot-avatar">🤖</div>
      <div class="msg-content-wrap">
        <span class="msg-sender-name">Buddy AI</span>
        <div class="typing-indicator">
          <div class="typing-dot"></div>
          <div class="typing-dot"></div>
          <div class="typing-dot"></div>
        </div>
      </div>
    `;
    chatMessages.appendChild(row);
    scrollToBottom();
  }

  /* ─── APPEND BOT MESSAGE ────────────────────────────── */
  function appendBotMessage(text, suggestions = []) {
    const typingRow = document.getElementById('typingRow');
    if (typingRow) typingRow.remove();

    const row = document.createElement('div');
    row.className = 'message-row bot-row';
    row.style.animationDelay = '0s';

    let pillsHTML = '';
    if (suggestions.length > 0) {
      pillsHTML = `<div class="suggestion-pills">
        ${suggestions.map(s => `<button class="suggestion-pill" onclick="sendQuickMessage('${s}')">${s}</button>`).join('')}
      </div>`;
    }

    row.innerHTML = `
      <div class="msg-avatar bot-avatar">🤖</div>
      <div class="msg-content-wrap">
        <span class="msg-sender-name">Buddy AI</span>
        <div class="msg-bubble">${formatText(text)}</div>
        ${pillsHTML}
        <span class="msg-time">${getCurrentTime()}</span>
      </div>
    `;
    chatMessages.appendChild(row);
    scrollToBottom();
    isTyping = false;
  }

  /* ─── SEND MESSAGE LOGIC ────────────────────────────── */
  function sendMessage(text) {
    text = text.trim();
    if (!text || isTyping) return;

    isTyping = true;
    chatInput.value = '';
    chatInput.style.height = 'auto';

    appendUserMessage(text);

    setTimeout(() => showTypingIndicator(), 300);

    const delay = 1000 + Math.random() * 800;
    const reply = getBotReply(text);

    // Pick 2 suggestions based on context
    const allSuggestions = ['More details', 'What else?', 'Show my tasks', 'Today\'s schedule', 'Help me study'];
    const suggestions = allSuggestions.sort(() => 0.5 - Math.random()).slice(0, 2);

    setTimeout(() => appendBotMessage(reply, suggestions), delay);
  }

  /* ─── SCROLL TO BOTTOM ──────────────────────────────── */
  function scrollToBottom(smooth = true) {
    chatMessages.scrollTo({
      top: chatMessages.scrollHeight,
      behavior: smooth ? 'smooth' : 'instant'
    });
  }

  /* ─── SCROLL BTN VISIBILITY ─────────────────────────── */
  chatMessages.addEventListener('scroll', function () {
    const nearBottom = chatMessages.scrollHeight - chatMessages.scrollTop - chatMessages.clientHeight < 100;
    scrollBtn.classList.toggle('visible', !nearBottom && messageCount > 0);
  });

  scrollBtn.addEventListener('click', () => scrollToBottom());

  /* ─── SEND ON BUTTON CLICK ──────────────────────────── */
  sendBtn.addEventListener('click', function () {
    sendMessage(chatInput.value);
  });

  /* ─── SEND ON ENTER (SHIFT+ENTER = NEWLINE) ─────────── */
  chatInput.addEventListener('keydown', function (e) {
    if (e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      sendMessage(chatInput.value);
    }
  });

  /* ─── AUTO-RESIZE TEXTAREA ──────────────────────────── */
  chatInput.addEventListener('input', function () {
    this.style.height = 'auto';
    this.style.height = Math.min(this.scrollHeight, 120) + 'px';
  });

  /* ─── QUICK PROMPT CHIPS ────────────────────────────── */
  if (quickPrompts) {
    quickPrompts.addEventListener('click', function (e) {
      const chip = e.target.closest('.quick-prompt-chip');
      if (chip) {
        const prompt = chip.dataset.prompt;
        chatInput.value = prompt;
        sendMessage(prompt);
      }
    });
  }

  /* ─── GLOBAL FUNCTION for inline onclick ────────────── */
  window.sendQuickMessage = function(text) {
    chatInput.value = text;
    sendMessage(text);
  };

  /* ─── NEW CHAT BUTTON ───────────────────────────────── */
  newChatBtn.addEventListener('click', function () {
    resetChat();
  });

  clearChatBtn.addEventListener('click', function () {
    if (messageCount > 0 && confirm('Clear this conversation?')) {
      resetChat();
    }
  });

  function resetChat() {
    // Remove all message rows
    const rows = chatMessages.querySelectorAll('.message-row, .date-separator');
    rows.forEach(r => r.remove());

    // Re-insert welcome section if removed
    if (!chatMessages.querySelector('#welcomeSection')) {
      const welcome = document.createElement('div');
      welcome.id = 'welcomeSection';
      welcome.className = 'welcome-section';
      welcome.innerHTML = `
        <div class="welcome-avatar">🤖</div>
        <div>
          <h1 class="welcome-title">Hi ${userName}! I'm <span>Buddy AI</span> 👋</h1>
          <p class="welcome-subtitle">Your intelligent campus assistant. Ask me anything about your schedule, tasks, notes, clubs, or campus life!</p>
        </div>
        <div class="quick-prompts" id="quickPrompts">
          <button class="quick-prompt-chip" data-prompt="What classes do I have today?">
            <span class="chip-icon">📅</span><span class="chip-title">Today's Schedule</span><span class="chip-desc">Check your classes and time slots for today</span>
          </button>
          <button class="quick-prompt-chip" data-prompt="What are my upcoming deadlines and assignments?">
            <span class="chip-icon">📋</span><span class="chip-title">Upcoming Deadlines</span><span class="chip-desc">View tasks due soon and prioritize</span>
          </button>
          <button class="quick-prompt-chip" data-prompt="Help me create a study plan for my exams">
            <span class="chip-icon">📚</span><span class="chip-title">Study Plan</span><span class="chip-desc">Get a personalized exam prep strategy</span>
          </button>
          <button class="quick-prompt-chip" data-prompt="Tell me about the clubs and activities on campus">
            <span class="chip-icon">🎭</span><span class="chip-title">Campus Clubs</span><span class="chip-desc">Explore clubs, events, and activities</span>
          </button>
        </div>`;
      welcome.querySelector('#quickPrompts').addEventListener('click', function (e) {
        const chip = e.target.closest('.quick-prompt-chip');
        if (chip) sendMessage(chip.dataset.prompt);
      });
      chatMessages.appendChild(welcome);
      // Re-trigger animation
      setTimeout(() => { welcome.style.opacity = '1'; }, 10);
    }

    messageCount = 0;
    isTyping = false;
    scrollBtn.classList.remove('visible');

    // Update sidebar active state
    historyItems.forEach(i => i.classList.remove('active'));
  }

  /* ─── SIDEBAR HISTORY NAVIGATION ───────────────────── */
  historyItems.forEach(item => {
    item.addEventListener('click', function (e) {
      e.preventDefault();
      historyItems.forEach(i => i.classList.remove('active'));
      this.classList.add('active');
    });
  });

  /* ─── WELCOME SECTION INITIAL ANIMATION ─────────────── */
  if (welcomeSection) {
    setTimeout(() => { welcomeSection.style.opacity = '1'; }, 100);
  }
});
</script>

</body>
</html>
