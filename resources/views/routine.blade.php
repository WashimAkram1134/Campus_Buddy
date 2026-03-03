<?php
  // Helper to get class for a specific day and time slot
  $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  $timeSlots = ['8.30-10.00', '10.00-11.30', '11.30-1.00', '1.00-2.30', '2.30-4.00'];
  
  $scheduleMap = [];
  foreach($schedules as $s) {
      $scheduleMap[$s->day][$s->time_slot] = $s;
  }
  
  // Today's schedule for sidebar
  $todayName = now()->format('l');
  $todaysClasses = $schedules->where('day', $todayName)->sortBy('time_slot');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Class Routine - Campus Buddy</title>
  <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/routine.css') }}">
</head>

<body>

  @include('includes.menu')

  <div class="layout">
    <main class="main">

      <section class="routine-hero">
        <img src="{{ asset('images/community/dashboardBG.jpg') }}" alt="Campus" class="routine-hero-bg">
        <div class="routine-hero-overlay"></div>

        <div class="routine-hero-content">
          <span class="routine-hero-tag">STAY ON TRACK</span>
          <h1>Your Class <span>Routine</span></h1>
          <p class="routine-hero-subtitle">Organize your academic life with your personalized weekly schedule.</p>
        </div>

        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
      </section>

      <!-- ================= MAIN LAYOUT ================= -->
      <section class="routine-main" id="routineMain">

        <!-- LEFT SIDEBAR: TODAY'S SCHEDULE -->
        <aside class="today-sidebar">
          <div class="sidebar-header">
            <h2>Today's Schedule</h2>
            <span class="badge">Today</span>
          </div>

          <div class="mini-timeline">
            @forelse($todaysClasses as $class)
            <div class="mini-card">
              <div class="mini-time">{{ explode('-', $class->time_slot)[0] }}</div>
              <div class="mini-details">
                <h4>{{ $class->course_title }} {{ $class->section ? '('.$class->section.')' : '' }}</h4>
                <p>Room {{ $class->room_no }} • {{ $class->teacher_initial }}</p>
                @if($class->major)
                <p style="font-size: 10px; opacity: 0.8;">{{ $class->major }}</p>
                @endif
              </div>
            </div>
            @empty
            <div class="mini-card break">
              <div class="mini-details">
                <h4>No classes today!</h4>
                <p>Enjoy your break.</p>
              </div>
            </div>
            @endforelse
          </div>
        </aside>

        <!-- RIGHT SIDE: WEEKLY ROUTINE & TABS -->
        <div class="weekly-schedule">

          <div class="schedule-header">
            <div class="day-tabs">
              @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
              <button class="day-tab {{ strtolower($todayName) == $day ? 'active' : '' }}" data-day="{{ $day }}">{{
                ucfirst(substr($day, 0, 3)) }}</button>
              @endforeach
            </div>
            <button class="download-btn" id="viewFullBtn">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
              Full Routine
            </button>

            <button class="doc-download-btn" id="downloadPdfBtn">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
              Download PDF
            </button>
          </div>

          <div class="schedule-timeline" id="routineTimeline">
            <!-- Day Groups -->
            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
            <div class="day-group {{ $todayName == $day ? 'active' : '' }}" id="group-{{ strtolower($day) }}">
              <h3 class="day-heading">{{ $day }}</h3>

              @php $dayClasses = $schedules->where('day', $day)->sortBy('time_slot'); @endphp

              @forelse($dayClasses as $class)
              <div class="class-card">
                <div class="class-time">
                  <span class="time-start">{{ explode('-', $class->time_slot)[0] }}</span>
                  <span class="time-end">{{ explode('-', $class->time_slot)[1] }}</span>
                </div>
                <div class="class-details">
                  <h3 class="subject">{{ $class->course_title }}</h3>
                  <p class="instructor">Instructor: {{ $class->teacher_initial }} {{ $class->major ? '• '.$class->major
                    : '' }}</p>
                  <div class="class-meta">
                    <span class="venue">Room {{ $class->room_no }}</span>
                    <span class="type type-lecture">{{ $class->course_code }} ({{ $class->section }})</span>
                  </div>
                </div>
              </div>
              @empty
              <div class="class-card break-card">
                <div class="class-time"><span class="time-start">Off Day</span></div>
                <div class="class-details">
                  <h3 class="subject">No Classes</h3>
                  <p>Relax and recharge!</p>
                </div>
              </div>
              @endforelse
            </div>
            @endforeach
          </div>

          <!-- ================= FULL WEEK TABLE VIEW ================= -->
          <div class="full-routine-table" id="fullRoutineTable">
            <table>
              <thead>
                <tr>
                  <th class="col-time">Time</th>
                  @foreach($days as $day)
                  <th>{{ $day }}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach($timeSlots as $slot)
                <tr>
                  <td class="col-time">{{ $slot }}</td>
                  @foreach($days as $day)
                  <td>
                    @if(isset($scheduleMap[$day][$slot]))
                    <div class="table-class">
                      <strong>{{ $scheduleMap[$day][$slot]->course_code }} ({{ $scheduleMap[$day][$slot]->section
                        }})</strong><br>
                      <span>{{ $scheduleMap[$day][$slot]->teacher_initial }}</span>
                      <small>Room: {{ $scheduleMap[$day][$slot]->room_no }}</small>
                    </div>
                    @endif
                  </td>
                  @endforeach
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </section>

      <!-- ================= PERSONALIZED ROUTINE BANNER ================= -->
      <section class="personalized-banner">
        <div class="banner-content">
          <h2 class="banner-title">Personalized Routine</h2>
          <a href="#" class="banner-chat-btn">Chat with Buddy</a>
          <img src="{{ asset('images/menuicons/Buddy.png') }}" alt="Buddy" class="banner-mascot">
        </div>
      </section>

    </main>
  </div>

  @include('includes.footer')

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // ================= TAB SWITCHING LOGIC =================
      const tabs = document.querySelectorAll('.day-tab');
      const groups = document.querySelectorAll('.day-group');
      const viewFullBtn = document.getElementById('viewFullBtn');
      let isFullView = false;

      const routineTimeline = document.getElementById('routineTimeline');
      const fullRoutineTable = document.getElementById('fullRoutineTable');

      // ================= ANIMATION TRIGGERS =================
      const animateObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
            animateObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.15 });

      const sidebar = document.querySelector('.today-sidebar');
      const schedule = document.querySelector('.weekly-schedule');
      if (sidebar) animateObserver.observe(sidebar);
      if (schedule) animateObserver.observe(schedule);

      // Click on individual tab
      tabs.forEach(tab => {
        tab.addEventListener('click', function () {
          if (isFullView) {
            isFullView = false;
            viewFullBtn.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> Full Routine';
            viewFullBtn.classList.remove('active');
            document.getElementById('routineMain').classList.remove('full-view-active');
            document.getElementById('downloadPdfBtn').style.display = 'none';
            routineTimeline.style.display = 'flex';
            fullRoutineTable.style.display = 'none';
            document.querySelector('.day-tabs').style.display = 'flex';
          }

          tabs.forEach(t => t.classList.remove('active'));
          this.classList.add('active');
          const targetDay = this.getAttribute('data-day');

          groups.forEach(group => {
            group.classList.remove('active');
            group.style.display = 'none';
            if (group.id === 'group-' + targetDay) {
              group.style.display = 'block';
              setTimeout(() => { group.classList.add('active'); }, 50);
            }
          });
        });
      });

      // Click "Full Routine" button
      viewFullBtn.addEventListener('click', function () {
        if (!isFullView) {
          isFullView = true;
          this.innerHTML = 'Hide Routine';
          this.classList.add('active');
          document.getElementById('routineMain').classList.add('full-view-active');
          document.getElementById('downloadPdfBtn').style.display = 'inline-flex';
          document.querySelector('.day-tabs').style.display = 'none';
          routineTimeline.style.display = 'none';
          fullRoutineTable.style.display = 'block';
        } else {
          isFullView = false;
          this.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> Full Routine';
          this.classList.remove('active');
          document.getElementById('routineMain').classList.remove('full-view-active');
          document.getElementById('downloadPdfBtn').style.display = 'none';
          routineTimeline.style.display = 'flex';
          fullRoutineTable.style.display = 'none';
          document.querySelector('.day-tabs').style.display = 'flex';
          document.querySelector('.day-tab.active').click();
        }
      });

      // Initial state fix for day groups
      const activeTab = document.querySelector('.day-tab.active');
      if (activeTab) {
        const targetDay = activeTab.getAttribute('data-day');
        groups.forEach(group => {
          if (group.id === 'group-' + targetDay) {
            group.style.display = 'block';
            group.classList.add('active');
          } else {
            group.style.display = 'none';
          }
        });
      }

      document.getElementById('downloadPdfBtn').addEventListener('click', function () {
        window.print();
      });
    });
  </script>

</body>

</html>