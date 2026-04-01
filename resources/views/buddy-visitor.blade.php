@extends('layouts.app')

@section('title', 'Campus Buddy | Admission Help')

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
            padding-top: 100px !important;
            transition: padding-top 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .buddy-chat-wrapper {
            height: calc(100vh - 100px) !important;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            transition: height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #f8fafc;
        }

        /* Visitor Specific Overrides */
        .welcome-avatar {
            background: linear-gradient(135deg, #16a34a, #00aaff);
            box-shadow: 0 12px 40px rgba(22, 163, 74, 0.3);
        }
        
        .welcome-title span {
            background: linear-gradient(135deg, #16a34a, #00aaff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 10px 20px rgba(22, 163, 74, 0.1);
        }

        .visitor-badge {
            background: rgba(22, 163, 74, 0.1);
            color: #16a34a;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 15px;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 1px solid rgba(22, 163, 74, 0.2);
        }

        .options-sidebar {
            background: #ffffff;
            border-left: 1px solid #e2e8f0;
        }

        .section-card h3 { 
            color: #16a34a; 
            border-bottom: 2px solid #f0fdf4;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }
        
        .chat-top-header { 
            border-bottom: 1.5px solid #f0f4f8; 
            background: #fff;
        }

        /* FAQ Interactive Items */
        .faq-item {
            cursor: pointer;
            padding: 14px;
            border-radius: 12px;
            background: #fff;
            border: 1.5px solid #e2e8f0;
            margin-bottom: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .faq-item:hover {
            border-color: #16a34a;
            box-shadow: 0 4px 15px rgba(22, 163, 74, 0.1);
            transform: translateX(6px);
            background: #f0fdf4;
        }
        .faq-item span {
            color: #1a202c;
            font-weight: 700;
            font-size: 13.5px;
        }
        .faq-item p {
            font-size: 11.5px;
            color: #718096;
            margin: 0;
        }

        .main-send-btn {
            background: #16a34a !important;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3) !important;
        }
        .main-send-btn:hover {
            background: #15803d !important;
        }

        .res-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 8px;
            color: #4a5568;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s;
        }
        .res-link:hover {
            background: #f0fdf4;
            color: #16a34a;
        }

        /* Message Styling */
        .bot-row .msg-avatar {
            background: linear-gradient(135deg, #16a34a, #00aaff) !important;
        }
        .bot-row .msg-bubble {
            border-left-color: #16a34a;
        }

        /* Mobile specific sidebars logic (reused from buddy-chat) */
        @media (max-width: 768px) {
            .chat-sidebar, .options-sidebar {
                position: fixed;
                top: 60px;
                bottom: 0;
                z-index: 2100;
                width: 280px !important;
                display: none !important;
                box-shadow: 20px 0 50px rgba(0,0,0,0.1);
            }
            .chat-sidebar { left: 0; border-right: none; }
            .options-sidebar { right: 0; border-left: none; }
            body.show-left-sidebar .chat-sidebar { display: flex !important; }
            body.show-right-sidebar .options-sidebar { display: flex !important; }
        }
    </style>
@endpush

@section('content')
<div class="buddy-chat-wrapper">
    <!-- Sidebar: Admission FAQs -->
    <aside class="chat-sidebar" style="width: 320px;">
        <div class="sidebar-header">
            <span class="sidebar-title">Admission Guide</span>
            <div class="visitor-badge" style="margin-bottom: 0;">Visitor Mode</div>
        </div>
        
        <div class="sidebar-search" style="margin-top: 15px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input type="text" placeholder="Search admission topics…">
        </div>
        
        <div class="sidebar-label">Most Asked Questions</div>
        
        <div class="faq-item" onclick="askFAQ('Can I get a scholarship with 4.50 GPA?')">
            <span>💰 GPA & Scholarships</span>
            <p>Requirements for tuition waivers and merit-based grants.</p>
        </div>

        <div class="faq-item" onclick="askFAQ('What are the computer science lab facilities?')">
            <span>💻 Tech Lab Tours</span>
            <p>Explore our state-of-the-art computing and networking labs.</p>
        </div>

        <div class="faq-item" onclick="askFAQ('How to apply for hostel accommodation?')">
            <span>🏠 Residential Life</span>
            <p>Information about campus housing and hostel costs.</p>
        </div>

        <div class="faq-item" onclick="askFAQ('Show me the top events in campus life')">
            <span>🎭 Events & Culture</span>
            <p>See major fests, sports meets, and cultural programs.</p>
        </div>
        
        <div class="faq-item" onclick="askFAQ('Which department has the best alumni network?')">
            <span>🤝 Alumni Connections</span>
            <p>Learn about career paths and corporate tie-ups.</p>
        </div>
    </aside>

    <!-- Main Chat Area -->
    <main class="chat-main" id="chatMain">
        <!-- Top Bar -->
        <div class="chat-top-header">
            <div class="chat-top-left">
                <button class="menu-toggle-btn" id="sidebarToggle" title="Toggle Sidebar">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12" /><line x1="3" y1="6" x2="21" y2="6" /><line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                </button>
                <div class="buddy-avatar">
                    <img src="{{ asset('assets/landing/character.png') }}" alt="Buddy" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
                </div>
                <div class="chat-bot-info">
                    <h2>Buddy AI <span style="font-size: 10px; background: #f0fdf4; color: #16a34a; padding: 2px 6px; border-radius: 4px; margin-left: 6px;">Admission Assist</span></h2>
                    <div class="chat-bot-status"><span></span> I'm online to help you!</div>
                </div>
            </div>
            <div class="chat-top-actions">
                <button class="chat-action-btn" id="toggleSidebarsBtn" title="Toggle Features">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><path d="M9 3v18M15 3v18"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Welcome Stage -->
        <div class="welcome-section" id="welcomeSection">
            <div class="welcome-avatar">
                <img src="{{ asset('assets/landing/character.png') }}">
                <div class="avatar-pulse-ring"></div>
            </div>
            <div class="welcome-text">
                <div class="visitor-badge">Future Buddy Counselor</div>
                <h1 class="welcome-title">Thinking of joining <span>Our University?</span></h1>
                <p class="welcome-subtitle">Ask me anything about admission deadlines, departments, fees, or how it feels to be a student here. I'm your guide to the campus!</p>
            </div>

            <div class="quick-prompts">
                <div class="quick-prompt-chip" onclick="askFAQ('Tell me about the CSE department')">
                    <span class="chip-icon">🏢</span>
                    <div class="chip-content">
                        <span class="chip-title">Department</span>
                        <span class="chip-desc">"Explore Computer Science"</span>
                    </div>
                </div>
                <div class="quick-prompt-chip" onclick="askFAQ('Admission deadline 2024')">
                    <span class="chip-icon">📅</span>
                    <div class="chip-content">
                        <span class="chip-title">Apply</span>
                        <span class="chip-desc">"Current Admission Deadlines"</span>
                    </div>
                </div>
                <div class="quick-prompt-chip" onclick="askFAQ('Fee structure for BBA')">
                    <span class="chip-icon">💰</span>
                    <div class="chip-content">
                        <span class="chip-title">Fees</span>
                        <span class="chip-desc">"How much does it cost?"</span>
                    </div>
                </div>
                <div class="quick-prompt-chip" onclick="askFAQ('Is there a sports club?')">
                    <span class="chip-icon">⚽</span>
                    <div class="chip-content">
                        <span class="chip-title">Clubs</span>
                        <span class="chip-desc">"Sports and Extra-curricular"</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages Window -->
        <div class="chat-messages" id="chatMessages" style="display: none;"></div>

        <!-- Input Area -->
        <div class="chat-input-section">
            <div class="input-form-container">
                <textarea id="chatInput" placeholder="Ask about Admission, Fees, or Department..." rows="1"></textarea>
                <button class="main-send-btn" id="sendBtn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13" /><polygon points="22 2 15 22 11 13 2 9 22 2" />
                    </svg>
                </button>
            </div>
            <p class="input-info-text">Buddy AI provides general guidance. Please verify official dates from the university website.</p>
        </div>
    </main>

    <!-- Right Sidebar: Facts and Quick Stats -->
    <aside class="options-sidebar">
        <div class="section-card">
            <h3>University at a Glance</h3>
            <div style="font-size: 13px; color: #4a5568; line-height: 1.8;">
                <p><strong>🏆 Status:</strong> Top Rated (A Grade)</p>
                <p><strong>🏢 Campus:</strong> 20+ Acre Eco-Campus</p>
                <p><strong>👨‍🏫 Expertise:</strong> 300+ Expert Faculties</p>
                <p><strong>🤝 Partners:</strong> 50+ Global Universities</p>
                <p><strong>📍 Center:</strong> Green Road, Dhaka</p>
            </div>
        </div>

        <div class="section-card">
            <h3>Key Resources</h3>
            <div class="res-links">
                <a href="#" class="res-link">🎓 Scholarship Policy 2024</a>
                <a href="#" class="res-link">📂 Department Roadmaps</a>
                <a href="#" class="res-link">🏗️ Campus Facility Map</a>
                <a href="#" class="res-link">📞 Visit Helpdesk</a>
            </div>
        </div>
        
        <div class="become-pro-card" style="background: linear-gradient(135deg, #16a34a, #0f7632);">
            <div class="pro-badge" style="background: rgba(255,255,255,0.2);">JOIN US</div>
            <div class="pro-content">
                <h4>Ready to join?</h4>
                <p>Fall-2024 admission is now open! Limited seats left.</p>
            </div>
            <a href="{{ route('signup') }}" style="display: block; text-align: center; text-decoration: none; padding: 11px; background: #fff; color: #16a34a; border-radius: 10px; font-weight: 700; margin-top: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">Apply for Admission</a>
        </div>
    </aside>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatInput = document.getElementById('chatInput');
        const sendBtn = document.getElementById('sendBtn');
        const chatMessages = document.getElementById('chatMessages');
        const welcomeSection = document.getElementById('welcomeSection');
        const toggleSidebarsBtn = document.getElementById('toggleSidebarsBtn');
        const sidebarToggle = document.getElementById('sidebarToggle');
        
        // Auto-resize textarea
        chatInput.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        function sendMessage(text) {
            const rawText = text || chatInput.value.trim();
            if (rawText === '') return;

            if (welcomeSection.style.display !== 'none') {
                welcomeSection.style.display = 'none';
                chatMessages.style.display = 'flex';
            }

            addMessage(rawText, 'user');
            if(!text) chatInput.value = '';
            chatInput.style.height = 'auto';

            // Simulate Buddy Response
            setTimeout(() => {
                showTyping();
                setTimeout(() => {
                    hideTyping();
                    const response = getBuddyResponse(rawText.toLowerCase());
                    addMessage(response, 'bot');
                }, 1200);
            }, 400);
        }

        window.askFAQ = function(question) {
            sendMessage(question);
        };

        sendBtn.addEventListener('click', () => sendMessage());
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
                <div class="msg-avatar ${sender}-avatar">${sender === 'bot' ? `<img src="{{ asset('assets/landing/character.png') }}" style="width:100%;height:100%;border-radius:50%;object-fit:cover;">` : '👤'}</div>
                <div class="msg-content-wrap">
                    <span class="msg-sender-name">${sender === 'bot' ? 'Buddy' : 'Future Student'}</span>
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
                <div class="msg-avatar bot-avatar"><img src="{{ asset('assets/landing/character.png') }}" style="width:100%;height:100%;border-radius:50%;object-fit:cover;"></div>
                <div class="msg-content-wrap">
                    <div class="typing-indicator"><div class="typing-dot"></div><div class="typing-dot"></div><div class="typing-dot"></div></div>
                </div>
            `;
            chatMessages.appendChild(row);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function hideTyping() {
            const indicator = document.getElementById('typingIndicator');
            if (indicator) indicator.remove();
        }

        function getBuddyResponse(query) {
            if (query.includes('cse')) return "Actually our Computer Science (CSE) department is our pride! We have 8 specialized labs, including AI and IoT centers. The GPA requirement is usually 3.50+ for merit admission.";
            if (query.includes('deadline')) return "The Fall-2024 general admission deadline is October 25th. However, early bird scholarships are available if you apply before Sept 30th!";
            if (query.includes('scholarship') || query.includes('waiver')) return "We offer up to 100% tuition waivers for Golden GPA 5.00 holders. Even with 4.50, you might qualify for a 25-40% merit scholarship.";
            if (query.includes('bba')) return "The BBA program is accredited internationally. Fees are approximately 140,000 per semester before any waivers.";
            if (query.includes('sport') || query.includes('club')) return "We have a very active Sports Club, Photography Club, and a Debate Society. Campus life is quite vibrant with fests every semester!";
            return "That's a great question! For specific admission details, I recommend browsing our Admission Resource list on the right, or you can ask about specific departments!";
        }

        // Toggle Logic
        sidebarToggle.addEventListener('click', () => {
            document.body.classList.toggle('show-left-sidebar');
        });
        toggleSidebarsBtn.addEventListener('click', () => {
            document.body.classList.toggle('sidebars-hidden');
        });
    });
</script>
@endpush
