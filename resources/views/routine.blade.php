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

    <!-- ================= ROUTINE HERO SECTION ================= -->
    <section class="routine-hero">
      <div class="routine-hero-bg"></div>
      
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
          <!-- Mini Card 1 -->
          <div class="mini-card">
            <div class="mini-time">09:00 AM</div>
            <div class="mini-details">
              <h4>Data Structures</h4>
              <p>Room 713</p>
            </div>
          </div>
          <!-- Mini Card 2 -->
          <div class="mini-card highlight">
            <div class="mini-time">11:00 AM</div>
            <div class="mini-details">
              <h4>Machine Learning</h4>
              <p>CSE Lab 2 - Quiz!</p>
            </div>
          </div>
          <!-- Mini Card 3 -->
          <div class="mini-card break">
            <div class="mini-time">12:30 PM</div>
            <div class="mini-details">
              <h4>Lunch Break</h4>
            </div>
          </div>
          <!-- Mini Card 4 -->
          <div class="mini-card">
            <div class="mini-time">02:00 PM</div>
            <div class="mini-details">
              <h4>OOP Lecture</h4>
              <p>Room 405</p>
            </div>
          </div>
        </div>
      </aside>

      <!-- RIGHT SIDE: WEEKLY ROUTINE & TABS -->
      <div class="weekly-schedule">
        
        <div class="schedule-header">
          <div class="day-tabs">
            <button class="day-tab active" data-day="monday">Mon</button>
            <button class="day-tab" data-day="tuesday">Tue</button>
            <button class="day-tab" data-day="wednesday">Wed</button>
            <button class="day-tab" data-day="thursday">Thu</button>
            <button class="day-tab" data-day="friday">Fri</button>
          </div>
          <button class="download-btn" id="viewFullBtn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
            Full Routine
          </button>
        </div>

        <div class="schedule-timeline" id="routineTimeline">
          <!-- Day Groups -->
          <div class="day-group active" id="group-monday">
            <h3 class="day-heading">Monday</h3>
            <div class="class-card">
              <div class="class-time"><span class="time-start">09:00 AM</span><span class="time-end">10:30 AM</span></div>
              <div class="class-details">
                <h3 class="subject">Data Structures and Algorithms</h3>
                <p class="instructor">Prof. Sarah Jenkins</p>
                <div class="class-meta">
                  <span class="venue">Room 713</span>
                  <span class="type type-lecture">Lecture</span>
                </div>
              </div>
            </div>
            <div class="class-card">
              <div class="class-time"><span class="time-start">11:00 AM</span><span class="time-end">12:30 PM</span></div>
              <div class="class-details">
                <h3 class="subject">Machine Learning Fundamentals</h3>
                <p class="instructor">Dr. Alan Turing</p>
                <div class="class-meta">
                  <span class="venue">CSE Lab 2</span>
                  <span class="type type-lab">Lab / Quiz</span>
                </div>
              </div>
            </div>
          </div>

          <div class="day-group" id="group-tuesday">
            <h3 class="day-heading">Tuesday</h3>
            <div class="class-card">
              <div class="class-time"><span class="time-start">10:00 AM</span><span class="time-end">11:30 AM</span></div>
              <div class="class-details">
                <h3 class="subject">Database Management Systems</h3>
                <p class="instructor">Prof. John Doe</p>
                <div class="class-meta">
                  <span class="venue">Room 301</span>
                  <span class="type type-lecture">Lecture</span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="day-group" id="group-wednesday">
            <h3 class="day-heading">Wednesday</h3>
            <div class="class-card">
              <div class="class-time"><span class="time-start">08:00 AM</span><span class="time-end">09:30 AM</span></div>
              <div class="class-details">
                <h3 class="subject">Operating Systems</h3>
                <p class="instructor">Dr. Linus</p>
                <div class="class-meta">
                  <span class="venue">Room 205</span>
                  <span class="type type-lecture">Lecture</span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="day-group" id="group-thursday">
            <h3 class="day-heading">Thursday</h3>
            <div class="class-card break-card">
              <div class="class-time"><span class="time-start">All Day</span></div>
              <div class="class-details">
                <h3 class="subject">Project Work</h3>
                <p class="instructor">Library / Makerspace</p>
              </div>
            </div>
          </div>
          
          <div class="day-group" id="group-friday">
            <h3 class="day-heading">Friday</h3>
            <div class="class-card">
              <div class="class-time"><span class="time-start">09:00 AM</span><span class="time-end">12:00 PM</span></div>
              <div class="class-details">
                <h3 class="subject">AI Hackathon Prep</h3>
                <p class="instructor">Mentors</p>
                <div class="class-meta">
                  <span class="venue">Auditorium</span>
                  <span class="type type-lab">Workshop</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
</div>

@include('includes.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ================= TAB SWITCHING LOGIC =================
    const tabs = document.querySelectorAll('.day-tab');
    const groups = document.querySelectorAll('.day-group');
    const viewFullBtn = document.getElementById('viewFullBtn');
    let isFullView = false;

    // Click on individual tab
    tabs.forEach(tab => {
      tab.addEventListener('click', function() {
        if (isFullView) {
            // Revert back to single tab view
            isFullView = false;
            viewFullBtn.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> Full Routine';
            viewFullBtn.classList.remove('active');
        }
        
        // Update active tab styling
        tabs.forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        
        const targetDay = this.getAttribute('data-day');
        
        // Show only target group
        groups.forEach(group => {
            group.classList.remove('active');
            if(group.id === 'group-' + targetDay) {
                // Add tiny delay for animation
                setTimeout(() => {
                    group.classList.add('active');
                }, 50);
            }
        });
      });
    });

    // Click "Full Routine" button
    viewFullBtn.addEventListener('click', function() {
        if (!isFullView) {
            isFullView = true;
            this.innerHTML = 'Collapse Routine';
            this.classList.add('active');
            
            // Remove active style from tabs
            tabs.forEach(t => t.classList.remove('active'));
            
            // Show all groups
            groups.forEach(group => {
                group.classList.add('active');
            });
            
            // Trigger actual download/print dialog after a short delay so DOM renders all
            setTimeout(() => {
                window.print();
            }, 500);
        } else {
            // Revert back to Monday (or first tab)
            isFullView = false;
            this.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> Full Routine';
            this.classList.remove('active');
            tabs[0].click(); // Simulate click on first tab
        }
    });

    // Entrance Animation
    const animateObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                animateObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    const sidebar = document.querySelector('.today-sidebar');
    const weekly = document.querySelector('.weekly-schedule');
    if (sidebar) animateObserver.observe(sidebar);
    if (weekly) animateObserver.observe(weekly);
});
</script>

</body>
</html>
