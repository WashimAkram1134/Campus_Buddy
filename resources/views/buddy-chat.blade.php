@extends('layouts.app')

@section('title', 'Campus Buddy | Buddy Chat')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/buddy-chat.css') }}">
    <style>
        /* Force full screen filling and hide footer by default on this page */
        footer, .footer {
            display: none !important;
        }
        
        body, html {
            overflow: hidden;
            background: #ffffff !important;
        }

        .main {
            padding-bottom: 0 !important;
        }

        /* Normal Mode Layout */
        .layout {
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding-top: 100px !important; /* Match topbar height */
            transition: padding-top 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .buddy-chat-wrapper {
            height: calc(100vh - 100px) !important;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            transition: height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Topbar toggle states */
        body.topbar-hidden .topbar {
            transform: translateY(-100%);
            opacity: 0;
            pointer-events: none;
        }
        body.topbar-hidden .layout {
            padding-top: 0 !important;
        }
        body.topbar-hidden .buddy-chat-wrapper {
            height: 100vh !important;
        }

        /* Sidebar toggle states */
        body.sidebars-hidden .chat-sidebar,
        body.sidebars-hidden .options-sidebar {
            display: none !important;
        }

        /* Master Topbar styles */
        .topbar {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s;
            z-index: 1500 !important;
        }

        /* Floating Controls removed - using header toggles */
        .floating-controls { display: none !important; }

        /* Sidebar and Header overrides */
        .buddy-mini-header {
            display: none !important;
        }
        
        /* Show chat header for controls */
        .chat-top-header {
            display: flex !important;
        }

        /* Responsive Topbar Height Adjustments */
        @media (max-width: 1600px) {
            .layout { padding-top: 90px !important; }
            .buddy-chat-wrapper { height: calc(100vh - 90px) !important; }
            body.topbar-hidden .layout { padding-top: 0 !important; }
            body.topbar-hidden .buddy-chat-wrapper { height: 100vh !important; }
        }
        @media (max-width: 1200px) {
            .layout { padding-top: 65px !important; }
            .buddy-chat-wrapper { height: calc(100vh - 65px) !important; }
            body.topbar-hidden .layout { padding-top: 0 !important; }
            body.topbar-hidden .buddy-chat-wrapper { height: 100vh !important; }
        }
        @media (max-width: 768px) {
            .layout { padding-top: 60px !important; }
            .buddy-chat-wrapper { height: calc(100vh - 60px) !important; }
            body.topbar-hidden .layout { padding-top: 0 !important; }
            body.topbar-hidden .buddy-chat-wrapper { height: 100vh !important; }
        }
    </style>
@endpush

@section('content')
  {{-- Floating controls no longer needed as header toggles work in both states --}}

  <div class="buddy-chat-wrapper">
    <!-- ================= SIDEBAR: Chat History ================= -->
    <aside class="chat-sidebar">
      <div class="sidebar-header">
        <span class="sidebar-title">Chats</span>
        <button class="new-chat-btn" id="newChatBtn" title="New Chat">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
          </svg>
        </button>
      </div>

      <div class="sidebar-search">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <circle cx="11" cy="11" r="8" />
          <line x1="21" y1="21" x2="16.65" y2="16.65" />
        </svg>
        <input type="text" id="searchChats" placeholder="Search conversations…">
      </div>

      <span class="sidebar-label">Today</span>

      <a href="#" class="chat-history-item active">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
        </svg>
        <span class="history-text">Assignment Q1 help</span>
        <span class="history-time">2:30 PM</span>
      </a>

      <a href="#" class="chat-history-item">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
        </svg>
        <span class="history-text">Tomorrow's Routine?</span>
        <span class="history-time">10:15 AM</span>
      </a>

      <span class="sidebar-label">Yesterday</span>

      <a href="#" class="chat-history-item">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
        </svg>
        <span class="history-text">Math notes for mid - Fall</span>
        <span class="history-time">Yesterday</span>
      </a>
    </aside>

    <!-- ================= MAIN CHAT AREA ================= -->
    <main class="chat-main" id="chatMain">

      <!-- Chat Top Bar -->
      <div class="chat-top-header">
        <div class="chat-top-left">
          <button class="menu-toggle-btn" id="sidebarToggle" title="Toggle Chats">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round">
              <line x1="3" y1="12" x2="21" y2="12" />
              <line x1="3" y1="6" x2="21" y2="6" />
              <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
          </button>
          <div class="buddy-avatar">
            🤖
          </div>
          <div class="chat-bot-info">
            <h2>Buddy AI</h2>
            <div class="chat-bot-status">
              <span></span> Online
            </div>
          </div>
        </div>

        <div class="chat-top-actions">
          <button class="chat-action-btn" title="Export Chat" id="exportBtn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
              <polyline points="7 10 12 15 17 10" />
              <line x1="12" y1="15" x2="12" y2="3" />
            </svg>
          </button>
          <button class="chat-action-btn" title="Chat Settings">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="3" />
              <path
                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
            </svg>
          </button>
          <button class="chat-action-btn" id="toggleTopbarBtn" title="Toggle Topbar Display">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 8h16M4 16h16"/>
              <path d="M12 4v16" class="toggle-icon-dash" style="opacity: 0.3;"/>
            </svg>
          </button>
          <button class="chat-action-btn" id="toggleSidebarsBtn" title="Toggle Sidebars Display">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
              <path d="M9 3v18M15 3v18"/>
            </svg>
          </button>
        </div>
      </div>

      <!-- Welcome Stage (Empty State) -->
      <div class="welcome-section" id="welcomeSection">
        <div class="welcome-avatar">
          <img src="{{ asset('images/eventImage/logo.png') }}" alt="Buddy">
          <div class="avatar-pulse-ring"></div>
        </div>
        <div class="welcome-text">
          <h1 class="welcome-title">Hi, I'm your <span>Campus Buddy.</span></h1>
          <p class="welcome-subtitle">Ask me anything about your routine, class tasks, or find study materials.
            I'm here to help you excel this semester!</p>
        </div>

        <div class="quick-prompts">
          <div class="quick-prompt-chip">
            <span class="chip-icon">📅</span>
            <div class="chip-content">
              <span class="chip-title">Routine</span>
              <span class="chip-desc">"What is my next class?"</span>
            </div>
          </div>
          <div class="quick-prompt-chip">
            <span class="chip-icon">📝</span>
            <div class="chip-content">
              <span class="chip-title">Tasks</span>
              <span class="chip-desc">"Show me upcoming quizzes."</span>
            </div>
          </div>
          <div class="quick-prompt-chip">
            <span class="chip-icon">📚</span>
            <div class="chip-content">
              <span class="chip-title">Materials</span>
              <span class="chip-desc">"Find AI mid-term notes."</span>
            </div>
          </div>
          <div class="quick-prompt-chip">
            <span class="chip-icon">✨</span>
            <div class="chip-content">
              <span class="chip-title">Motivation</span>
              <span class="chip-desc">"Tell me an inspiring quote."</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Messages Window -->
      <div class="chat-messages" id="chatMessages" style="display: none;">
        <!-- Messages will be injected here -->
      </div>

      <!-- Input Area -->
      <div class="chat-input-section">
        <div class="input-form-container">
          <button class="attachment-btn" title="Add Image">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
              <circle cx="8.5" cy="8.5" r="1.5" />
              <polyline points="21 15 16 10 5 21" />
            </svg>
          </button>
          
          <textarea id="chatInput" placeholder="Message Buddy AI..." rows="1"></textarea>
          
          <button class="main-send-btn" id="sendBtn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <line x1="22" y1="2" x2="11" y2="13" />
              <polygon points="22 2 15 22 11 13 2 9 22 2" />
            </svg>
          </button>
        </div>
        <p class="input-info-text">Buddy AI can make mistakes. Check important info.</p>
      </div>

    </main>

    <!-- ================= RIGHT SIDEBAR: Options ================= -->
    <aside class="options-sidebar">
      <div class="section-card">
        <h3>Section Info</h3>
        <p><strong>Major:</strong> {{ Auth::user()->major ?? 'DS' }}</p>
        <p><strong>Batch:</strong> {{ Auth::user()->batch ?? '61' }}</p>
        <p><strong>Section:</strong> {{ Auth::user()->section ?? 'D' }}</p>
      </div>

      <div class="section-card">
        <h3>Context Mode</h3>
        <div class="toggle-group">
          <span>Smart Context</span>
          <div class="switch active"></div>
        </div>
        <p class="option-help">Buddy will prioritize results for your specific section.</p>
      </div>

      <div class="section-card resources">
        <h3>Quick Resources</h3>
        <a href="{{ route('routine') }}" class="res-link">📅 View Full Routine</a>
        <a href="{{ route('classtask') }}" class="res-link">📝 Check Deadlines</a>
        <a href="{{ route('notes') }}" class="res-link">📚 Browse All PDF</a>
      </div>

      <div class="become-pro-card">
        <div class="pro-badge">PRO</div>
        <div class="pro-content">
          <h4>Become Pro</h4>
          <p>Get accurate answer with premium study resources.</p>
        </div>
        <button class="pro-upgrade-btn">Upgrade Now</button>
      </div>
    </aside>

  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const chatInput = document.getElementById('chatInput');
      const sendBtn = document.getElementById('sendBtn');
      const chatMessages = document.getElementById('chatMessages');
      const welcomeSection = document.getElementById('welcomeSection');
      const sidebarToggle = document.getElementById('sidebarToggle');
      const charSidebar = document.querySelector('.chat-sidebar');
      const optionsSidebar = document.querySelector('.options-sidebar');
      const focusModeBtn = document.getElementById('focusModeBtn');
      const restoreBtn = document.getElementById('restoreBtn');

      // Auto-resize textarea
      chatInput.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
        if (this.scrollHeight > 150) {
          this.style.overflowY = 'scroll';
        } else {
          this.style.overflowY = 'hidden';
        }
      });

      // Handle sending messages
      function sendMessage() {
        const text = chatInput.value.trim();
        if (text === '') return;

        // Hide welcome if first message
        if (welcomeSection.style.display !== 'none') {
          welcomeSection.style.display = 'none';
          chatMessages.style.display = 'flex';
        }

        // Add User Message
        addMessage(text, 'user');
        chatInput.value = '';
        chatInput.style.height = 'auto';

        // Fake Bot response
        setTimeout(() => {
          showTyping();
          setTimeout(() => {
            hideTyping();
            addMessage("I'm looking into that for your specific section " + @json(Auth::user()->section ?? 'D') + ". Give me a moment!", 'bot');
          }, 1500);
        }, 500);
      }

      sendBtn.addEventListener('click', sendMessage);
      chatInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
          e.preventDefault();
          sendMessage();
        }
      });

      function addMessage(text, sender) {
        const row = document.createElement('div');
        row.className = `message-row ${sender}-row`;

        const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

        row.innerHTML = `
                <div class="msg-avatar ${sender}-avatar">${sender === 'bot' ? '🤖' : '👤'}</div>
                <div class="msg-content-wrap">
                    <span class="msg-sender-name">${sender === 'bot' ? 'Buddy' : 'You'}</span>
                    <div class="msg-bubble">${text}</div>
                    <span class="msg-time">${time}</span>
                </div>
            `;

        chatMessages.appendChild(row);
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }

      function showTyping() {
        const row = document.createElement('div');
        row.className = 'message-row bot-row typing-row';
        row.id = 'typingIndicator';
        row.innerHTML = `
                <div class="msg-avatar bot-avatar">🤖</div>
                <div class="msg-content-wrap">
                    <div class="typing-indicator">
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                    </div>
                </div>
            `;
        chatMessages.appendChild(row);
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }

      function hideTyping() {
        const indicator = document.getElementById('typingIndicator');
        if (indicator) indicator.remove();
      }

      // Sidebar Toggle
      sidebarToggle.addEventListener('click', () => {
        charSidebar.classList.toggle('collapsed');
      });

      // Granular UI Toggle logic
      const toggleTopbarBtn = document.getElementById('toggleTopbarBtn');
      const toggleSidebarsBtn = document.getElementById('toggleSidebarsBtn');

      toggleTopbarBtn.addEventListener('click', () => {
        document.body.classList.toggle('topbar-hidden');
      });

      toggleSidebarsBtn.addEventListener('click', () => {
        document.body.classList.toggle('sidebars-hidden');
      });

      // Toggle functionality for the Smart Context switch
      const contextSwitch = document.querySelector('.switch');
      if (contextSwitch) {
        contextSwitch.addEventListener('click', function() {
          this.classList.toggle('active');
        });
      }

      // Quick prompt click
      document.querySelectorAll('.quick-prompt-chip, .suggestion-pill').forEach(chip => {
        chip.addEventListener('click', function () {
          const prompt = this.querySelector('.chip-desc')?.innerText.replace(/"/g, '') || this.innerText;
          chatInput.value = prompt;
          sendMessage();
        });
      });
    });
  </script>
@endpush