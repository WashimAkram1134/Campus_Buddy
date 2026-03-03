<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Campus Buddy | Student Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>

  @include('includes.menu')

  <div class="layout">
    <main class="main dashboard-container">

      {{-- ══════════════════════════════════════════════════
      HERO BANNER
      Layout: Pic 1 (contained, rounded)
      Content: Pic 2/3 (blurred campus BG, robot mascot, existing text)
      ══════════════════════════════════════════════════ --}}
      <section class="hero-banner">
        {{-- blurred campus background from Pic 2/3 --}}
        <img src="{{ asset('images/community/dashboardBG.jpg') }}" alt="Background" class="hero-bg">
        <div class="hero-overlay"></div>

        {{-- decorative dots matching Pic 1 --}}
        <div class="hero-deco hero-deco-1"></div>
        <div class="hero-deco hero-deco-2"></div>
        <div class="hero-deco hero-deco-3"></div>
        <div class="hero-deco hero-deco-4"></div>

        {{-- hero text — keeping Pic 2/3 wording --}}
        <div class="hero-text">
          <span class="hero-date">{{ now()->format('F j, Y') }}</span>
          <span class="hero-tag">YOUR PERSONALIZED LEARNING HUB</span>
          <h1 class="hero-title">
            Start your day with<br>
            <span class="hero-highlight">campusBuddy,</span>
            {{ Auth::user()->name ?? 'User' }}!
          </h1>
          <p class="hero-subtitle">Always stay updated in your student portal</p>
        </div>

      </section>

      {{-- ══════════════════════════════════════════════════
      MAIN GRID (left column + right sidebar)
      ══════════════════════════════════════════════════ --}}
      <div class="dashboard-grid">

        {{-- ── LEFT COLUMN ─────────────────────────────── --}}
        <div class="main-col">

          {{-- Section: Study Overview (= Finance row in Pic 1) --}}
          <div class="section-head">
            <h2 class="section-title">Study Overview</h2>
          </div>

          <div class="stat-row">
            {{-- Card 1: Today's Study Plan --}}
            <div class="stat-card">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                  <line x1="16" y1="2" x2="16" y2="6"></line>
                  <line x1="8" y1="2" x2="8" y2="6"></line>
                  <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
              </div>
              <p class="stat-value">9:00 AM</p>
              <p class="stat-sub">Data Structure · Room 713</p>
              <p class="stat-label">Today's Study Plan</p>
            </div>

            {{-- Card 2: Upcoming Tasks (ACTIVE — thick blue border like Pic 1) --}}
            <div class="stat-card active">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                </svg>
              </div>
              <p class="stat-value">MCQ Quiz</p>
              <p class="stat-sub">Machine Learning · 11:00 AM</p>
              <p class="stat-label">Upcoming Tasks</p>
            </div>

            {{-- Card 3: Question Bank --}}
            <div class="stat-card">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                  <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
              </div>
              <p class="stat-value">OOP</p>
              <p class="stat-sub">Fall25 · Mid-term prep</p>
              <p class="stat-label">Question Bank</p>
            </div>
          </div>

          {{-- Section: Recent Events (= Enrolled Courses row in Pic 1, images from Pic 3) --}}
          <div class="section-head">
            <h2 class="section-title">Recent Events</h2>
            <a href="#" class="section-link">See all</a>
          </div>

          @php
          $imageDir = public_path('images/eventImage/');
          $eventImages = [];
          if (is_dir($imageDir)) {
          foreach (['jpg','jpeg','png','gif','webp'] as $ext) {
          $eventImages = array_merge($eventImages, glob($imageDir . "*.$ext"));
          }
          }
          @endphp

          <div class="event-scroll-container">
            @if(empty($eventImages))
            <p style="color:var(--text-muted); font-size:14px;">No event images found.</p>
            @else
            @foreach($eventImages as $index => $eventImg)
            <div class="event-card-scroll">
              <img src="{{ asset('images/eventImage/' . basename($eventImg)) }}" alt="Event Image">
              <div class="event-card-overlay">
                <div class="event-card-date">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                  </svg>
                  {{ ['March 15, 2026', 'April 2, 2026', 'May 10, 2026', 'June 5, 2026'][$index % 4] }}
                </div>
                <h4 class="event-card-title">{{ ['Spring Fest 2026', 'Tech Symposium', 'Cultural Night', 'Sports
                  Day'][$index % 4] }}</h4>
                <p class="event-card-desc">{{ ['Join us for the biggest festival', 'Explore latest technologies',
                  'Celebrate diversity with us', 'Annual sports competition'][$index % 4] }}</p>
                <span class="event-card-btn">
                  Learn More
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9 18 15 12 9 6"></polyline>
                  </svg>
                </span>
              </div>
            </div>
            @endforeach
            @endif
          </div>

        </div>{{-- /main-col --}}

        {{-- ── RIGHT SIDEBAR ───────────────────────────── --}}
        <div class="side-col">

          {{-- BUDDY AI CHATBOX (replaces "Course Instructors" from Pic 1) --}}
          <div class="section-head">
            <h2 class="section-title">Chat with Buddy</h2>
          </div>

          <div class="chatbox-widget">
            <div class="chatbox-header">
              <img src="{{ asset('images/mascot/Buddy.png') }}" alt="Buddy Avatar">
              <h3>Buddy AI Assistant</h3>
            </div>

            <div class="chatbox-body" id="chatBody">
              <div class="chat-bubble buddy-bubble">
                Hi {{ Auth::user()->name ?? 'there' }}! 👋 How can I help you with your studies today?
              </div>
              <div class="chat-bubble buddy-bubble">
                You have a <strong>Data Structure</strong> class at 9:00 AM. Don't forget your notes! 📚
              </div>
            </div>

            <div class="chatbox-footer">
              <input id="chatInput" type="text" class="chat-input" placeholder="Ask Buddy anything...">
              <button id="chatSend" class="chat-send-btn" aria-label="Send">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="22" y1="2" x2="11" y2="13"></line>
                  <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
              </button>
            </div>
          </div>

        </div>{{-- /side-col --}}

      </div>{{-- /dashboard-grid --}}
    </main>
  </div>

  @include('includes.footer')

  <!-- FULL SCREEN IMAGE VIEWER -->
  <div class="image-viewer" id="imageViewer">
    <span class="close-btn" id="closeViewer">&times;</span>
    <img src="" alt="Full size event image" id="viewerImage">
  </div>

  <script>
    (function () {
      const sendBtn = document.getElementById('chatSend');
      const chatInput = document.getElementById('chatInput');
      const chatBody = document.getElementById('chatBody');

      function sendMessage() {
        const text = chatInput.value.trim();
        if (!text) return;

        // User message
        const userMsg = document.createElement('div');
        userMsg.className = 'chat-bubble user-bubble';
        userMsg.textContent = text;
        chatBody.appendChild(userMsg);
        chatInput.value = '';
        chatBody.scrollTop = chatBody.scrollHeight;

        // Buddy AI response (simulation)
        setTimeout(function () {
          const buddyMsg = document.createElement('div');
          buddyMsg.className = 'chat-bubble buddy-bubble';
          buddyMsg.textContent = 'Got it! Looking into that for you. 🔍';
          chatBody.appendChild(buddyMsg);
          chatBody.scrollTop = chatBody.scrollHeight;
        }, 800);
      }

      if (sendBtn) sendBtn.addEventListener('click', sendMessage);
      if (chatInput) chatInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') sendMessage();
      });

      // Image Viewer Logic
      const viewer = document.getElementById('imageViewer');
      const viewerImg = document.getElementById('viewerImage');
      const closeBtn = document.getElementById('closeViewer');
      const eventImages = document.querySelectorAll('.event-card-scroll img');

      if (eventImages.length > 0) {
        eventImages.forEach(img => {
          img.addEventListener('click', function () {
            viewerImg.src = this.src;
            viewer.classList.add('show');
          });
        });
      }

      if (closeBtn) {
        closeBtn.addEventListener('click', function () {
          viewer.classList.remove('show');
        });
      }

      // Close on clicking outside the image
      if (viewer) {
        viewer.addEventListener('click', function (e) {
          if (e.target === viewer) {
            viewer.classList.remove('show');
          }
        });
      }
    })();
  </script>

</body>

</html>