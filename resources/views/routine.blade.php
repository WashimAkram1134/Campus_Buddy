<?php
  // Helper to get class for a specific day and time slot
  $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  $timeSlots = ['8.30 am-10.00 am', '10.00 am-11.30 am', '11.30 am-1.00 pm', '1.00 pm-2.30 pm', '2.30 pm-4.00 pm', '4.00 pm-5.30 pm'];
  
  $scheduleMap = [];
  foreach($schedules as $s) {
      $scheduleMap[$s->day][$s->time_slot] = $s;
  }
  
  if (!function_exists('parseRoutineTime')) {
    function parseRoutineTime($timeStr, $now) {
        $timeStr = str_replace('.', ':', trim($timeStr));
        try {
            return \Carbon\Carbon::parse($timeStr);
        } catch (\Exception $e) {
            // Fallback for old format
            $h_m = explode(':', $timeStr);
            $h = (int)$h_m[0]; $m = isset($h_m[1]) ? (int)$h_m[1] : 0;
            if ($h >= 1 && $h <= 7) $h += 12;
            return $now->copy()->setTime($h, $m, 0);
        }
    }
  }

  // Today's schedule for sidebar
  $todayName = now()->format('l');
  $todaysClasses = $schedules->where('day', $todayName)->sortBy(function($s) {
      return parseRoutineTime(explode('-', $s->time_slot)[0], now());
  });

  if (!function_exists('getClassStatus')) {
      function getClassStatus($timeSlot, $dayName) {
          $now = now();
          $today = $now->format('l');
          
          if ($today !== $dayName) return null;

          $parts = explode('-', $timeSlot);
          if(count($parts) < 2) return 'Upcoming';
          
          $startTime = parseRoutineTime($parts[0], $now);
          $endTime = parseRoutineTime($parts[1], $now);
          
          if ($now->greaterThan($endTime)) return 'Completed';
          if ($now->between($startTime, $endTime)) return 'Ongoing';
          return 'Upcoming';
      }
  }
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
        <img src="{{ asset('images/routine/hero.png') }}" alt="Campus" class="routine-hero-bg">
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
            @php $status = getClassStatus($class->time_slot, $todayName); @endphp
            <div class="mini-card {{ strtolower($status) }}">
              <div class="mini-time">{{ explode('-', $class->time_slot)[0] }}</div>
              <div class="mini-details">
                <div class="status-indicator-dot"></div>
                <h4>{{ $class->course_title }}{{ $class->lab_section ? ' ('.$class->lab_section.')' : '' }} {{
                  $class->section ? '('.$class->section.')' : '' }}</h4>
                <p>Room {{ $class->room_no }} • {{ $class->teacher_initial }}</p>
                <span class="mini-status-tag">{{ $status }}</span>
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

              @php $dayClasses = $schedules->where('day', $day)->sortBy(function($s) {
              return parseRoutineTime(explode('-', $s->time_slot)[0], now());
              }); @endphp

              @forelse($dayClasses as $class)
              @php $status = getClassStatus($class->time_slot, $day); @endphp
              <div class="class-card {{ strtolower($status) }}">
                <div class="class-time">
                  <span class="time-start">{{ explode('-', $class->time_slot)[0] }}</span>
                  <span class="time-end">{{ explode('-', $class->time_slot)[1] }}</span>
                </div>
                <div class="class-details">
                  <div class="class-header-row">
                    <h3 class="subject">{{ $class->course_title }}</h3>
                    @if($status)
                    <span class="status-badge {{ strtolower($status) }}">{{ $status }}</span>
                    @endif
                  </div>
                  <p class="instructor">Instructor: {{ $class->teacher_initial }} {{ $class->major ? '• '.$class->major
                    : '' }}</p>
                  <div class="class-meta">
                    <span class="venue">Room {{ $class->room_no }}</span>
                    <span class="type type-lecture">{{ $class->course_code }}{{ $class->lab_section ?
                      '('.$class->lab_section.')' : '' }} ({{ $class->section }})</span>
                  </div>
                </div>

                @if(auth()->user()->role === 'cr')
                <div class="class-actions">
                  <button onclick="openEditModal({{ json_encode($class) }})" class="action-btn edit-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    Edit
                  </button>
                  <form action="{{ route('schedule.destroy', $class) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this class?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn delete-btn">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      </svg>
                      Delete
                    </button>
                  </form>
                </div>
                @endif
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
            <div class="full-table-header">
              <h3>Class Routine | {{ auth()->user()->department }} | Sec: {{ auth()->user()->section }} | Batch: {{
                auth()->user()->batch }}</h3>
            </div>
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
                      <strong>{{ $scheduleMap[$day][$slot]->course_code }}{{ $scheduleMap[$day][$slot]->lab_section ?
                        '('.$scheduleMap[$day][$slot]->lab_section.')' : '' }} ({{ $scheduleMap[$day][$slot]->section
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

  @if(auth()->user()->role === 'cr')
  <!-- ================= EDIT SCHEDULE MODAL ================= -->
  <div id="editScheduleModal" class="routine-modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Edit Schedule</h2>
        <span class="close-modal" onclick="closeEditModal()">&times;</span>
      </div>
      <form id="editScheduleForm" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group-grid">
          <div class="form-field">
            <label>Course Code</label>
            <input type="text" name="course_code" id="edit_course_code" required>
          </div>
          <div class="form-field">
            <label>Course Title</label>
            <input type="text" name="course_title" id="edit_course_title" required>
          </div>
          <div class="form-field">
            <label>Instructor</label>
            <input type="text" name="teacher_initial" id="edit_teacher_initial" required>
          </div>
          <div class="form-field">
            <label>Room No</label>
            <input type="text" name="room_no" id="edit_room_no" required>
          </div>
          <div class="form-field">
            <label>Day</label>
            <select name="day" id="edit_day" required>
              @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
              <option value="{{ $day }}">{{ $day }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-field">
            <label>Time Slot</label>
            <select name="time_slot" id="edit_time_slot" required>
              <option value="8.30 am-10.00 am">8.30 am-10.00 am</option>
              <option value="10.00 am-11.30 am">10.00 am-11.30 am</option>
              <option value="11.30 am-1.00 pm">11.30 am-1.00 pm</option>
              <option value="1.00 pm-2.30 pm">1.00 pm-2.30 pm</option>
              <option value="2.30 pm-4.00 pm">2.30 pm-4.00 pm</option>
              <option value="4.00 pm-5.30 pm">4.00 pm-5.30 pm</option>
            </select>
          </div>
          <div class="form-field">
            <label>Type</label>
            <select name="type" id="edit_type" required onchange="toggleEditLabSection(this.value)">
              <option value="theory">Theory</option>
              <option value="lab">Lab</option>
            </select>
          </div>
          <div class="form-field" id="edit_lab_section_group" style="display: none;">
            <label>Lab Section</label>
            <input type="text" name="lab_section" id="edit_lab_section" placeholder="e.g. B1, B2">
          </div>
          <div class="form-field">
            <label>Section</label>
            <input type="text" name="section" id="edit_section" readonly
              style="background: #f4f6f8; cursor: not-allowed;">
          </div>
          <div class="form-field">
            <label>Major</label>
            <input type="text" name="major" id="edit_major" readonly style="background: #f4f6f8; cursor: not-allowed;">
          </div>
        </div>
        <button type="submit" class="save-btn">Update Schedule</button>
      </form>
    </div>
  </div>

  <script>
    function toggleEditLabSection(type) {
      const labGroup = document.getElementById('edit_lab_section_group');
      const labInput = document.getElementById('edit_lab_section');
      if (type === 'lab') {
        labGroup.style.display = 'block';
      } else {
        labGroup.style.display = 'none';
        labInput.value = '';
      }
    }
  </script>
  @endif

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

      // ================= CR EDIT MODAL =================
      window.openEditModal = function (classData) {
        const modal = document.getElementById('editScheduleModal');
        const form = document.getElementById('editScheduleForm');

        // Update form action URL
        form.action = `/schedule/${classData.id}`;

        // Populate fields
        document.getElementById('edit_course_code').value = classData.course_code;
        document.getElementById('edit_course_title').value = classData.course_title;
        document.getElementById('edit_teacher_initial').value = classData.teacher_initial;
        document.getElementById('edit_room_no').value = classData.room_no;
        document.getElementById('edit_day').value = classData.day;
        document.getElementById('edit_time_slot').value = classData.time_slot;
        document.getElementById('edit_section').value = classData.section;
        document.getElementById('edit_major').value = classData.major || '';
        document.getElementById('edit_type').value = classData.type || 'theory';
        document.getElementById('edit_lab_section').value = classData.lab_section || '';

        // Trigger visibility toggle
        toggleEditLabSection(classData.type || 'theory');

        modal.style.display = 'block';
      };

      window.closeEditModal = function () {
        document.getElementById('editScheduleModal').style.display = 'none';
      };

      // Close modal on outside click
      window.addEventListener('click', function (event) {
        const modal = document.getElementById('editScheduleModal');
        if (event.target == modal) {
          modal.style.display = 'none';
        }
      });
    });
  </script>

</body>

</html>