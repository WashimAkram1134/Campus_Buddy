@extends('layouts.app')

@section('title', 'Campus Buddy | Student Dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
{{-- ══════════════════════════════════════════════════
HERO BANNER
Standardized structure matching all pages
══════════════════════════════════════════════════ --}}
<section class="hero-banner" style="background-image: url('{{ asset('images/community/dashboardBG.jpg') }}');">
    <div class="hero-overlay"></div>

    <div class="hero-content-wrapper hero-text animate-up">
        <div class="hero-deco hero-deco-1"></div>
        <div class="hero-deco hero-deco-2"></div>
        <div class="hero-deco hero-deco-3"></div>
        <div class="hero-deco hero-deco-4"></div>

        <div class="hero-content">
            <span class="hero-date">{{ now()->format('F j, Y') }}</span>
            <span class="hero-tag">STUDENT PORTAL</span>
            <h1>Start your day with <span>campusBuddy, {{ Auth::user()->name }}!</span></h1>
            <p class="hero-desc">Our goal is to empower your journey by providing essential campus information.</p>
        </div>
    </div>
</section>

<div class="dashboard-container mt-10">
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
            <a href="{{ route('classtask') }}{{ $urgentTask ? '#task-'.$urgentTask->id : '' }}"
              class="stat-card active task-card animate-scale delay-3 {{ $urgentTask ? $urgentTask->type . '-card' : '' }}"
              style="padding: 0; align-items: stretch; text-align: left;">
              @if($urgentTask)
              @php
              $createdAt = \Carbon\Carbon::parse($urgentTask->created_at);
              $deadline = \Carbon\Carbon::parse($urgentTask->deadline);
              $totalSeconds = $createdAt->diffInSeconds($deadline);
              $passedSeconds = $createdAt->diffInSeconds(now());
              $percentage = ($totalSeconds > 0) ? min(100, max(0, round(($passedSeconds / $totalSeconds) * 100))) : 0;

              $remaining = \Carbon\Carbon::now()->diffInDays($deadline, false);
              $remaining = round($remaining);
              @endphp

              <div class="card-header" style="padding: 15px 20px; position: relative;">
                <div class="card-title-group"
                  style="display: flex; flex-direction: column; gap: 4px; padding-right: 80px;">
                  <span class="card-course"
                    style="font-size: 10px; padding: 2px 6px; background: rgba(0, 170, 255, 0.1); color: #00AAFF; font-weight: 800; border-radius: 4px; width: fit-content;">{{
                    $urgentTask->course_code }}</span>
                  <h3 class="card-title" style="font-size: 16px; font-weight: 700; color: #1a1a1a; margin: 0;">{{
                    Str::limit($urgentTask->title, 25) }}</h3>
                  <span class="card-progress {{ $urgentTask->type === 'quiz' ? 'quiz-progress' : '' }}"
                    style="background: #f0eded; color: #666; padding: 4px 8px; border-radius: 8px; font-size: 11px; font-weight: 700; width: fit-content; margin-top: 4px;">{{
                    $percentage }}%</span>
                </div>

                <div class="task-type-badge"
                  style="position: absolute; top: 15px; right: 20px; font-size: 10px; font-weight: 800; text-transform: uppercase; padding: 4px 10px; border-radius: 50px; background: {{ $urgentTask->type === 'assignment' ? '#ff6b6b' : ($urgentTask->type === 'quiz' ? '#6496ff' : '#64c850') }}; color: white; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                  {{ $urgentTask->type }}
                </div>
              </div>

              <div class="card-timeline"
                style="display: flex; align-items: center; padding: 10px 15px; background: #faf8f5; margin: 0 15px 15px 15px; border-radius: 10px; gap: 8px;">
                <div class="timeline-item" style="display: flex; align-items: flex-start; gap: 8px; flex: 1;">
                  <span class="timeline-icon" style="font-size: 14px;">📅</span>
                  <div>
                    <p class="timeline-label"
                      style="font-size: 10px; color: #999; font-weight: 600; text-transform: uppercase;">Due</p>
                    <p class="timeline-value" style="font-size: 12px; font-weight: 700;">{{ $deadline->format('d M') }}
                    </p>
                  </div>
                </div>
                <div class="timeline-divider" style="width: 1px; height: 30px; background: #e0ddd8;"></div>
                <div class="timeline-item" style="display: flex; align-items: flex-start; gap: 8px; flex: 1;">
                  <span class="timeline-icon" style="font-size: 14px;">⏰</span>
                  <div>
                    <p class="timeline-label"
                      style="font-size: 10px; color: #999; font-weight: 600; text-transform: uppercase;">Left</p>
                    <p class="timeline-value" style="font-size: 12px; font-weight: 700;">
                      @if($remaining > 0) {{ $remaining }}d @elseif($remaining == 0) <span
                        style="color:#ef4444;">Today</span> @else <span style="color:#666;">Overdue</span> @endif
                    </p>
                  </div>
                </div>
              </div>

              @if($urgentTask->topic)
              <div class="card-topic" style="padding: 10px 20px; border-top: 1px solid #f0eded; flex: 1;">
                <p class="topic-label"
                  style="font-size: 10px; color: #999; font-weight: 600; text-transform: uppercase; margin-bottom: 4px;">
                  Topic</p>
                <p class="topic-value" style="font-size: 13px; font-weight: 600; color: #1a1a1a;">{{
                  Str::limit($urgentTask->topic, 40) }}</p>
              </div>
              @endif

              <p class="stat-label"
                style="padding: 10px 20px; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #8b5cf6; font-weight: 800; border-top: 1px solid #f0eded; margin: 0;">
                Priority Task</p>
              @else
              <div
                style="flex: 1; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px;">
                <div class="stat-icon" style="margin-bottom: 15px;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                  </svg>
                </div>
                <p class="stat-value">Done!</p>
                <p class="stat-sub">All clear for now</p>
                <p class="stat-label">Priority Task</p>
              </div>
              @endif
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
                <div class="mini-announcement-item"
                  onclick="openAnnouncementModal('{{ addslashes($announcement->title) }}', '{{ addslashes($announcement->content) }}', '{{ $announcement->created_at->diffForHumans() }}')">
                  @if($announcement->created_at->diffInHours(now()) <= 2) <span class="new-dot">NEW</span>
                    @endif
                    <h4 class="stat-value mini">{{ Str::limit($announcement->title, 25) }}</h4>
                    <p class="announcement-snippet">{{ Str::limit($announcement->content, 60) }}</p>
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

          <div class="event-scroll-container">
            @forelse($events as $event)
              <div class="event-card-scroll" 
                   data-title="{{ $event->title }}" 
                   data-description="{{ $event->description }}" 
                   data-date="{{ $event->event_date ? $event->event_date->format('M d, Y') : 'N/A' }}">
                <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}">
                <div class="event-card-overlay">
                  <div class="event-card-date">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                      <line x1="16" y1="2" x2="16" y2="6"></line>
                      <line x1="8" y1="2" x2="8" y2="6"></line>
                      <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    {{ $event->event_date ? $event->event_date->format('M d, Y') : 'N/A' }}
                  </div>
                  <h4 class="event-card-title">{{ $event->title }}</h4>
                  <span class="event-card-btn">
                    Learn More
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                  </span>
                </div>
              </div>
            @empty
              <p style="color:var(--text-muted); font-size:14px; padding: 20px;">No recent events uploaded by Admin.</p>
            @endforelse
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

  <!-- ANNOUNCEMENT DETAIL MODAL -->
  <div id="announcementDetailModal" class="modal announcement-modal-custom">
    <div class="modal-content">
      <div class="modal-header">
        <h2 id="modalAnnounceTitle">Announcement Details</h2>
        <span class="close" onclick="closeAnnouncementModal()">&times;</span>
      </div>
      <div class="modal-body">
        <div class="announce-meta-top">
          <span class="announce-badge">LATEST UPDATE</span>
          <span id="modalAnnounceTime" class="announce-time"></span>
        </div>
        <p id="modalAnnounceContent" class="announce-full-text"></p>
      </div>
      <div class="modal-footer">
        <button class="submit-btn" onclick="closeAnnouncementModal()">Got it</button>
      </div>
    </div>
  </div>

  <!-- FULL SCREEN EVENT VIEWER -->
  <style>
    .event-detail-modal { background: #fff; border-radius: 16px; overflow: hidden; width: 95%; max-width: 700px; box-shadow: 0 10px 40px rgba(0,0,0,0.4); display: flex; flex-direction: column; animation: zoomIn 0.3s ease; }
    .event-detail-hero { width: 100%; height: auto; background: #eaeff2; }
    .event-detail-hero img { width: 100%; height: auto; object-fit: cover; border-radius: 0 !important; }
    .event-detail-content { padding: 25px; color: #333; }
    .detail-date { color: var(--primary); font-size: 13px; font-weight: 600; display: block; margin-bottom: 5px;}
    .detail-title { font-size: 22px; font-weight: 800; color: #1a202c; margin-bottom: 12px; }
    .detail-desc { font-size: 15px; color: #4a5568; line-height: 1.6; max-height: 250px; overflow-y: auto; }
    #closeViewer { position: absolute; z-index: 10000; font-size: 40px; cursor: pointer; color: white; top: -10px; right: 20px; }
  </style>

  <div class="image-viewer" id="imageViewer" style="z-index: 99999;">
    <span class="close-btn" id="closeViewer" onclick="document.getElementById('imageViewer').classList.remove('show')">&times;</span>
    <div class="event-detail-modal">
        <div class="event-detail-hero">
            <img src="" alt="Event" id="viewerImage">
        </div>
        <div class="event-detail-content">
            <span id="viewerDate" class="detail-date"></span>
            <h2 id="viewerTitle" class="detail-title"></h2>
            <p id="viewerDescription" class="detail-desc"></p>
        </div>
    </div>
  </div>

  <script>
    (function () {
      const sendBtn = document.getElementById('chatSend');
      const chatInput = document.getElementById('chatInput');
      const chatBody = document.getElementById('chatBody');

      function sendMessage() {
        const text = chatInput.value.trim();
        if (!text) return;

        // Redirect to Buddy Chat with the message
        window.location.href = "{{ route('buddy-chat') }}?message=" + encodeURIComponent(text);
      }

      if (sendBtn) sendBtn.addEventListener('click', sendMessage);
      if (chatInput) chatInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') sendMessage();
      });

      // Event Detail Viewer Logic
      const viewer = document.getElementById('imageViewer');
      const viewerImg = document.getElementById('viewerImage');
      const viewerTitle = document.getElementById('viewerTitle');
      const viewerDate = document.getElementById('viewerDate');
      const viewerDesc = document.getElementById('viewerDescription');
      const closeBtn = document.getElementById('closeViewer');
      const learnMoreButtons = document.querySelectorAll('.event-card-btn');

      learnMoreButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
          e.stopPropagation();
          const card = this.closest('.event-card-scroll');
          const data = card.dataset;
          
          viewerImg.src = card.querySelector('img').src;
          viewerTitle.textContent = data.title;
          viewerDate.textContent = data.date;
          viewerDesc.textContent = data.description;
          
          if (viewer) viewer.classList.add('show');
        });
      });

      if (closeBtn && viewer) {
        closeBtn.addEventListener('click', function () {
          viewer.classList.remove('show');
        });
      }

      window.addEventListener('click', function(event) {
        if (event.target === viewer) {
            viewer.classList.remove('show');
        }
      });
      // Announcement Modal Logic
      window.openAnnouncementModal = function (title, content, time) {
        document.getElementById('modalAnnounceTitle').innerText = title;
        document.getElementById('modalAnnounceContent').innerText = content;
        document.getElementById('modalAnnounceTime').innerText = 'Posted ' + time;
        document.getElementById('announcementDetailModal').style.display = 'flex';
      };

      window.closeAnnouncementModal = function () {
        document.getElementById('announcementDetailModal').style.display = 'none';
      };

      // Close modals on clicking outside
      window.onclick = function (event) {
        if (event.target.classList.contains('modal')) {
          event.target.style.display = "none";
        }
      }
    }) ();
  </script>
</div>
@endsection