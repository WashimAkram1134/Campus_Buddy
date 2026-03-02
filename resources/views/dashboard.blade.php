<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Campus Buddy | Student Dashboard</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>

  @include('includes.menu')

  <div class="layout">
    <main class="main">

      <!-- ================= HERO SECTION ================= -->
      <section class="hero-banner">
        <div class="hero-bg-image" style="background-image: url('{{ asset('images/community/dashboardBG.jpg') }}');">
        </div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
          <div class="hero-text">
            <span class="hero-tag">YOUR PERSONALIZED LEARNING HUB</span>
            <h1 class="hero-title">
              Start your day with <br>
              <span class="hero-highlight">campusBuddy,</span> {{ Auth::user()->name ?? 'User' }}!
            </h1>
          </div>

          <div class="hero-mascot">
            <img src="{{ asset('images/dashboard/robot_mascot.png') }}" alt="Buddy Mascot" class="mascot-img">
          </div>
        </div>
      </section>

      <!-- ================= MAIN DASHBOARD BODY ================= -->
      <div class="dashboard-body">

        <!-- LEFT CONTENT -->
        <div class="dashboard-left">

          <!-- FEATURE CARDS -->
          <div class="feature-cards">
            <div class="feature-card">
              <div class="feature-card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                  <line x1="16" y1="2" x2="16" y2="6"></line>
                  <line x1="8" y1="2" x2="8" y2="6"></line>
                  <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
              </div>
              <h3 class="feature-card-title">Today's Study Plan</h3>
              <p class="feature-card-detail"><strong>9:00 AM</strong> — Data Structure, Room 713</p>
              <button class="feature-card-btn">
                AI Schedule Tips
              </button>
            </div>

            <div class="feature-card">
              <div class="feature-card-icon" style="background: rgba(251, 146, 60, 0.1);">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  style="color: #f59e0b;">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                  <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
              </div>
              <h3 class="feature-card-title">Upcoming Tasks</h3>
              <p class="feature-card-detail"><strong>Machine Learning</strong> — Quiz-1, 11:00 AM</p>
              <button class="feature-card-btn" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                AI Reminder
              </button>
            </div>

            <div class="feature-card">
              <div class="feature-card-icon" style="background: rgba(34, 197, 94, 0.1);">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  style="color: #22c55e;">
                  <circle cx="12" cy="12" r="10"></circle>
                  <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                  <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
              </div>
              <h3 class="feature-card-title">Question Bank</h3>
              <p class="feature-card-detail"><strong>OOP - Fall25</strong> — Mid-term prep</p>
              <button class="feature-card-btn" style="background: linear-gradient(135deg, #22c55e, #16a34a);">
                More Questions
              </button>
            </div>
          </div>

          <!-- EVENT SLIDER -->
          @include('includes.eventslider')

        </div>

        <!-- RIGHT SIDEBAR -->
        <aside class="dashboard-sidebar">

          <!-- CHATBOX WIDGET -->
          <div class="chatbox-widget">
            <div class="chatbox-header">
              <img src="{{ asset('images/menuicons/Buddy.png') }}" alt="Buddy" width="30">
              <h3 style="margin:0; font-size:16px;">Chat with Buddy</h3>
            </div>
            <div class="chatbox-body" id="chatBody">
              <div class="chat-bubble buddy-bubble">
                <p>Hi {{ Auth::user()->name ?? 'User' }}! 👋 How can I help you with your studies today?</p>
              </div>
              <div class="chat-bubble buddy-bubble">
                <p>You have a <strong>Data Structure</strong> class at 9:00 AM. Don't forget your notes! 📚</p>
              </div>
            </div>
            <div class="chatbox-footer">
              <input type="text" class="chat-input" id="chatInput" placeholder="Ask Buddy anything...">
              <button class="feature-card-btn" id="sendBtn"
                style="padding: 10px; border-radius: 50%; width:40px; height:40px; justify-content:center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="22" y1="2" x2="11" y2="13"></line>
                  <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
              </button>
            </div>
          </div>

          <!-- DAILY NOTICE PANEL -->
          <div class="daily-notice">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
              <h3 style="margin:0; font-size:18px;">Daily Notice</h3>
              <a href="#" style="font-size:12px; color:var(--accent); text-decoration:none; font-weight:600;">See
                all</a>
            </div>
            <div class="notice-list">
              <div class="notice-item">
                <div class="notice-indicator"></div>
                <div class="notice-content">
                  <h4 style="margin:0; font-size:14px;">Prelim payment due</h4>
                  <p style="margin:5px 0; font-size:12px; color:var(--text-secondary);">Settle your dues before Friday.
                  </p>
                </div>
              </div>
              <div class="notice-item">
                <div class="notice-indicator" style="background:#f59e0b;"></div>
                <div class="notice-content">
                  <h4 style="margin:0; font-size:14px;">Exam schedule</h4>
                  <p style="margin:5px 0; font-size:12px; color:var(--text-secondary);">Mid-term schedule has been
                    updated.</p>
                </div>
              </div>
            </div>
          </div>

        </aside>

      </div>
    </main>
  </div>

  @include('includes.footer')

  <script>
    document.addEventListener('DOMContentLoaded', fun  n () {
      const sendBtn = document.getElementById('sendBt  
      const chatInput = document.getElementById('ch  put');
      const chatBody = document.getElementById('cha  y');

      function sendMessage() {
        const text   atInput.value.trim();
        if (!text) return;

        nst userMsg = document.createElement('div');
        use  .className = 'chat-bubble u  bubble';
        userMsg  erHTML = `<p>${text}</p>`;
            .appendChild(userMsg);
           ut.value = '';
        chatBody.scrollTo p = ch      lHeight;

        se      => {
          const buddyM      t.createElement('div'          dyMsg  ssName = 'chat-bubble budd    ';
          buddyMsg    ML = `<p>I'll help you with that! Pro    "${text}"...</p>`;
          chatBody.app  hil  ddyMsg);
          chatBo    lTop = chatBody.scrollHeight;
        },         }

      if (sendBtn) sendBtn.  ven  tener('click', sendMessage);
      i    nput) chatInput.addEventListener('keypr    ) => {
        if (e.key ===      ndMessage();
      });
    });
  </script>

</body>

</html>