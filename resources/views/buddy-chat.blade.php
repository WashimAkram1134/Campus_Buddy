@extends('layouts.app')

@section('title', 'Campus Buddy | Buddy Chat')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/buddy-chat.css') }}">
    <style>
        /* Override for topbar height */
        .buddy-chat-wrapper {
            height: calc(100vh - 100px);
        }
        @media (max-width: 1600px) {
            .buddy-chat-wrapper { height: calc(100vh - 90px); }
        }
        @media (max-width: 1200px) {
            .buddy-chat-wrapper { height: calc(100vh - 65px); }
        }
        @media (max-width: 768px) {
            .buddy-chat-wrapper { height: calc(100vh - 60px); }
        }

        /* Hide the minimal header since we use the master topbar */
        .buddy-mini-header {
            display: none !important;
        }

        /* Adjust layout padding-top which is already handled by layouts.app but let's be sure */
        .layout {
            padding-top: 0 !important;
        }
    </style>
@endpush

@section('content')
  <!-- Floating Restore Button (Visible only in Focus Mode) -->
  <button class="restore-btn" id="restoreBtn" title="Restore sidebars and header">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
      stroke-linecap="round" stroke-linejoin="round">
      <path d="M15 3h6v6" />
      <path d="M9 21H3v-6" />
      <path d="M21 3l-7 7" />
      <path d="M3 21l7-7" />
    </svg>
  </button>

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
          <button class="chat-action-btn" id="focusModeBtn" title="Focus Mode (Full Screen)">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" />
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
        <div class="input-container">
          <textarea id="chatInput" placeholder="How can I help you today?..." rows="1"></textarea>
          <div class="input-actions">
            <button class="input-tool-btn" title="Add Image">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <polyline points="21 15 16 10 5 21" />
              </svg>
            </button>
            <button class="send-btn" id="sendBtn">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="22" y1="2" x2="11" y2="13" />
                <polygon points="22 2 15 22 11 13 2 9 22 2" />
              </svg>
            </button>
          </div>
        </div>
        <p class="input-notice">Buddy AI can make mistakes. Check important information.</p>
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

      <div class="promo-card">
        <div class="promo-icon">💎</div>
        <h4>Buddy Premium</h4>
        <p>Get priority AI processing and detailed study roadmaps.</p>
        <button class="promo-btn">Upgrade</button>
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

      // Focus Mode logic
      focusModeBtn.addEventListener('click', () => {
        document.body.classList.add('focus-mode');
        restoreBtn.style.display = 'flex';
      });

      restoreBtn.addEventListener('click', () => {
        document.body.classList.remove('focus-mode');
        restoreBtn.style.display = 'none';
      });

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