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
        <div class="hero-text animate-up">
          <span class="hero-date">{{ now()->format('F j, Y') }}</span>
          <span class="hero-tag">YOUR PERSONALIZED LEARNING HUB</span>
          <h1 class="hero-title">
            Start your day with<br>
            <span class="hero-highlight">campusBuddy,</span>
            {{ Auth::user()->name ?? 'User' }}!
          </h1>
          <p class="hero-subtitle">Always stay updated in your student portal</p>

          @if(Auth::check() && Auth::user()->role === 'cr')
          <a href="{{ route('cr-dashboard') }}" class="cr-panel-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
              stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            CR Management Panel
          </a>
          @endif
        </div>

      </section>

      {{-- ══════════════════════════════════════════════════
      MAIN GRID (left column + right sidebar)
      ══════════════════════════════════════════════════ --}}
      <div class="dashboard-grid">

        {{-- ── LEFT COLUMN ─────────────────────────────── --}}
        <div class="main-col">

          {{-- Section: Study Overview (= Finance row in Pic 1) --}}
          <div class="section-head animate-up delay-1">
            <h2 class="section-title">Study Overview</h2>
          </div>

          <div class="stat-row">
            {{-- 1. SMART SCHEDULE CARD (Left) --}}
            @php
            $nextClass = null;
            $currentClass = null;
            $currentTime = now();

            foreach($todaySchedule as $class) {
            // Parse time_slot like "08:30 AM - 09:50 AM" or just "08:30 AM"
            $parts = explode('-', $class->time_slot);
            $startTimeStr = trim($parts[0]);
            $endTimeStr = isset($parts[1]) ? trim($parts[1]) : $startTimeStr;

            try {
            $startTime = \Carbon\Carbon::createFromFormat('h:i A', $startTimeStr);
            $endTime = \Carbon\Carbon::createFromFormat('h:i A', $endTimeStr);

            // If it's currently during this class
            if ($currentTime->between($startTime, $endTime)) {
            $currentClass = $class;
            break;
            }
            // If this class is in the future
            if ($startTime->isAfter($currentTime)) {
            $nextClass = $class;
            break;
            }
            } catch (\Exception $e) { continue; }
            }
            @endphp

            <a href="{{ route('routine') }}"
              class="stat-card schedule-card animate-scale delay-2 {{ $currentClass ? 'is-class-now' : '' }}">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                  <line x1="16" y1="2" x2="16" y2="6"></line>
                  <line x1="8" y1="2" x2="8" y2="6"></line>
                  <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
              </div>

              @if($currentClass)
              <div class="live-indicator">LIVE</div>
              <p class="stat-value">{{ Str::limit($currentClass->course_title, 14) }}</p>
              <p class="stat-sub">Room {{ $currentClass->room_no }} · Class Now</p>
              @elseif($nextClass)
              <p class="stat-value">{{ Str::limit($nextClass->course_title, 14) }}</p>
              <p class="stat-sub">{{ $nextClass->time_slot }} · Room {{ $nextClass->room_no }}</p>
              @else
              <p class="stat-value">No Class</p>
              <p class="stat-sub">🎉 All classes done for today!</p>
              @endif
              <p class="stat-label">Smart Schedule</p>
            </a>

            {{-- 2. PRIORITY TASK CARD (Center) --}}
            @php $urgentTask = $assignments->first(); @endphp
            <a href="{{ route('classtask') }}" class="stat-card active task-card animate-scale delay-3">
              @if($urgentTask)
              @php
              $createdAt = \Carbon\Carbon::parse($urgentTask->created_at);
              $deadline = \Carbon\Carbon::parse($urgentTask->deadline);
              $totalSeconds = $createdAt->diffInSeconds($deadline);
              $passedSeconds = $createdAt->diffInSeconds(now());
              $percentage = ($totalSeconds > 0) ? min(100, max(0, round(($passedSeconds / $totalSeconds) * 100))) : 0;
              @endphp
              <div class="stat-badge-progress">{{ $percentage }}%</div>
              @endif

              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                </svg>
              </div>

              @if($urgentTask)
              <p class="stat-value">{{ Str::limit($urgentTask->title, 14) }}</p>
              <p class="stat-sub">Due: {{ \Carbon\Carbon::parse($urgentTask->deadline)->format('h:i A, d M') }}</p>
              @else
              <p class="stat-value">Done!</p>
              <p class="stat-sub">All clear for now</p>
              @endif
              <p class="stat-label">Priority Task</p>
            </a>

            {{-- 3. LATEST ANNOUNCEMENT CARD (Right) --}}
            <div class="stat-card announcement-card animate-scale delay-4">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                  </path>
                  <line x1="12" y1="9" x2="12" y2="13"></line>
                  <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
              </div>

              @if($announcements->isNotEmpty())
              <div class="announcement-mini-feed">
                @foreach($announcements as $announcement)
                <div class="mini-announcement-item">
                  @if($announcement->created_at->diffInHours(now()) <= 2) <span class="new-dot">NEW</span>
                    @endif
                    <p class="stat-value mini">{{ Str::limit($announcement->title, 12) }}</p>
                    <p class="stat-sub mini">{{ $announcement->created_at->diffForHumans() }}</p>
                </div>
                @endforeach
              </div>
              @else
              <p class="stat-value">Quiet Day</p>
              <p class="stat-sub">No recent updates</p>
              @endif
              <p class="stat-label">Live Announcements</p>
            </div>
          </div>

          {{-- Section: Recent Events (Global) --}}
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
        <div class="side-col animate-right delay-5">

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

  @if(session('success'))
  <div
    style="position: fixed; bottom: 80px; right: 20px; background: #22c55e; color: white; padding: 15px 25px; border-radius: 12px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); z-index: 99999; animation: slideInRight 0.3s ease;">
    {{ session('success') }}
  </div>
  @endif

  @if(session('error'))
  <div
    style="position: fixed; bottom: 80px; right: 20px; background: #ef4444; color: white; padding: 15px 25px; border-radius: 12px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); z-index: 99999; animation: slideInRight 0.3s ease;">
    {{ session('error') }}
  </div>
  @endif

  <style>
    @keyframes slideInRight {
      from {
        transform: translateX(100%);
        opacity: 0;
      }

      to {
        transform: translateX(0);
        opacity: 1;
      }
    }
  </style>

  <!-- FULL SCREEN IMAGE VIEWER -->
  <div class="image-viewer" id="imageViewer">
    <span class="close-btn" id="closeViewer">&times;</span>
    <img src="" alt="Full size event image" id="viewerImage">
  </div>

  <script>
    (function () {
   endBtn = document.getElementById('chatSend');
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
   ) ();
  </script>

</body>

</html>