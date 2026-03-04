<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CR Dashboard - Campus Buddy</title>
  <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/cr-dashboard.css') }}">
  <style>
    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 10000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(5px);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 5% auto;
      padding: 30px;
      border: none;
      width: 500px;
      border-radius: 20px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
      animation: slideInDown 0.4s ease;
    }

    @keyframes slideInDown {
      from {
        transform: translateY(-30px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .modal-header h2 {
      margin: 0;
      color: #1b5c7a;
      font-size: 24px;
    }

    .close {
      color: #aaa;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover {
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
      color: #555;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px;
      border: 2px solid #edf2f7;
      border-radius: 10px;
      font-size: 14px;
      transition: all 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
      outline: none;
      border-color: #00AAFF;
      box-shadow: 0 0 0 4px rgba(0, 170, 255, 0.1);
    }

    .submit-btn {
      width: 100%;
      padding: 14px;
      background: #00AAFF;
      color: white;
      border: none;
      border-radius: 12px;
      font-weight: 700;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s;
      margin-top: 10px;
    }

    .submit-btn:hover {
      background: #0088cc;
      transform: translateY(-2px);
    }
  </style>
</head>

<body>

  @include('includes.menu')

  <div class="layout">
    <main class="main">

      <section class="cr-hero">
        <img src="{{ asset('images/community/dashboardBG.jpg') }}" alt="Campus" class="cr-hero-bg">
        <div class="cr-hero-overlay"></div>

        <a href="{{ route('dashboard') }}" class="back-btn-top-right">← Back to Dashboard</a>

        <div class="cr-hero-content">
          <span class="cr-hero-tag">CLASS REPRESENTATIVE PORTAL</span>
          <h1>Welcome to the CR Dashboard, <br><span>{{ Auth::user()->name ?? 'CR' }}!</span></h1>
          <p class="cr-hero-subtitle">Manage class schedules, announcements, and resources effectively.</p>
        </div>
      </section>

      <!-- ================= CR QUICK ACTIONS ================= -->
      <section class="cr-cards" id="crCards">
        <div class="cards-header">
          <h2>⚡ Quick Actions</h2>
        </div>

        <div class="cards-row">
          <div class="card">
            <h3>📢 Announcements</h3>
            <div class="card-box">Post new class announcement</div>
            <button onclick="openModal('announcementModal')">Create Post</button>
          </div>

          <div class="card">
            <h3>📅 Schedule</h3>
            <div class="card-box">Update class routine</div>
            <button onclick="openModal('scheduleModal')">Manage Schedule</button>
          </div>

          <div class="card">
            <h3>📚 assignments</h3>
            <div class="card-box">Post new class assignment</div>
            <button onclick="openModal('assignmentModal')">Create Assignment</button>
          </div>

          <div class="card">
            <h3>👥 Class Roster</h3>
            <div class="card-box">View student details</div>
            <button>View Students</button>
          </div>
        </div>
      </section>

      <!-- ================= SCHEDULE MODAL ================= -->
      <div id="scheduleModal" class="modal">
        <div class="modal-content">
          <div class="modal-header">
            <h2>Manage Schedule</h2>
            <span class="close" onclick="closeModal('scheduleModal')">&times;</span>
          </div>
          <form action="{{ route('schedule.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="course_code">Course Code</label>
              <input type="text" name="course_code" id="course_code" placeholder="e.g. CSE 421" required>
            </div>
            <div class="form-group">
              <label for="course_title">Course Title</label>
              <input type="text" name="course_title" id="course_title" placeholder="e.g. Artificial Intelligence"
                required>
            </div>
            <div class="form-group">
              <label for="teacher_initial">Teacher Initial</label>
              <input type="text" name="teacher_initial" id="teacher_initial" placeholder="e.g. AJ" required>
            </div>
            <div class="form-row" style="display: flex; gap: 15px;">
              <div class="form-group" style="flex: 1;">
                <label for="section">Section</label>
                <input type="text" name="section" id="section" value="{{ Auth::user()->section }}" readonly
                  style="background: #f4f6f8; cursor: not-allowed;">
              </div>
              <div class="form-group" style="flex: 1;">
                <label for="major">Major</label>
                <input type="text" name="major" id="major" value="{{ Auth::user()->major }}" readonly
                  style="background: #f4f6f8; cursor: not-allowed;" placeholder="Non-Major">
              </div>
            </div>
            <div class="form-group">
              <label for="room_no">Room No</label>
              <input type="text" name="room_no" id="room_no" placeholder="e.g. 713" required>
            </div>

            <div class="form-row" style="display: flex; gap: 15px;">
              <div class="form-group" style="flex: 1;">
                <label for="type">Course Type</label>
                <select name="type" id="type" required onchange="toggleLabSection(this.value)">
                  <option value="theory">Theory</option>
                  <option value="lab">Lab</option>
                </select>
              </div>
              <div class="form-group" id="lab_section_group" style="flex: 1; display: none;">
                <label for="lab_section">Lab Section</label>
                <input type="text" name="lab_section" id="lab_section" placeholder="e.g. B1, B2">
              </div>
            </div>

            <script>
              function toggleLabSection(type) {
                const labGroup = document.getElementById('lab_section_group');
                const labInput = document.getElementById('lab_section');
                if (type === 'lab') {
                  labGroup.style.display = 'block';
                  labInput.required = true;
                } else {
                  labGroup.style.display = 'none';
                  labInput.required = false;
                  labInput.value = '';
                }
              }
            </script>
            <div class="form-group">
              <label for="day">Day</label>
              <select name="day" id="day" required>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
              </select>
            </div>
            <div class="form-group">
              <label for="time_slot">Time Slot</label>
              <select name="time_slot" id="time_slot" required>
                <option value="8.30 am-10.00 am">8.30 am-10.00 am</option>
                <option value="10.00 am-11.30 am">10.00 am-11.30 am</option>
                <option value="11.30 am-1.00 pm">11.30 am-1.00 pm</option>
                <option value="1.00 pm-2.30 pm">1.00 pm-2.30 pm</option>
                <option value="2.30 pm-4.00 pm">2.30 pm-4.00 pm</option>
                <option value="4.00 pm-5.30 pm">4.00 pm-5.30 pm</option>
              </select>
            </div>
            <button type="submit" class="submit-btn" style="margin-top: 15px;">Save Schedule</button>
          </form>
        </div>
      </div>

      <!-- ================= ANNOUNCEMENT MODAL ================= -->
      <div id="announcementModal" class="modal">
        <div class="modal-content">
          <div class="modal-header">
            <h2>Post Announcement</h2>
            <span class="close" onclick="closeModal('announcementModal')">&times;</span>
          </div>
          <form action="{{ route('announcements.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" placeholder="e.g. Class Cancelled" required>
            </div>
            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" id="content" rows="4"
                style="width: 100%; padding: 12px; border: 2px solid #edf2f7; border-radius: 10px;"
                placeholder="Details..." required></textarea>
            </div>
            <button type="submit" class="submit-btn" style="margin-top: 15px;">Post Announcement</button>
          </form>
        </div>
      </div>

      <!-- ================= ASSIGNMENT MODAL ================= -->
      <div id="assignmentModal" class="modal">
        <div class="modal-content">
          <div class="modal-header">
            <h2>Create Assignment</h2>
            <span class="close" onclick="closeModal('assignmentModal')">&times;</span>
          </div>
          <form action="{{ route('assignments.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="course_code_assign">Course Code</label>
              <input type="text" name="course_code" id="course_code_assign" placeholder="e.g. CSE 421" required>
            </div>
            <div class="form-group">
              <label for="assign_title">Assignment Title</label>
              <input type="text" name="title" id="assign_title" placeholder="e.g. Project Proposal" required>
            </div>
            <div class="form-group">
              <label for="deadline">Deadline</label>
              <input type="datetime-local" name="deadline" id="deadline" required>
            </div>
            <div class="form-group">
              <label for="description">Description (Optional)</label>
              <textarea name="description" id="description" rows="3"
                style="width: 100%; padding: 12px; border: 2px solid #edf2f7; border-radius: 10px;"
                placeholder="Details..."></textarea>
            </div>
            <button type="submit" class="submit-btn" style="margin-top: 15px;">Create Assignment</button>
          </form>
        </div>
      </div>

    </main>
  </div>

  @include('includes.footer')

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // ================= SCROLL ANIMATIONS =================
      const animateObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
            const children = entry.target.querySelectorAll('.card');
            children.forEach(child => {
              child.classList.add('animate-in');
            });
            animateObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.15 });

      const crCards = document.querySelector('.cr-cards');
      if (crCards) animateObserver.observe(crCards);

      // ================= MODAL LOGIC =================
      window.openModal = function (id) {
        const modal = document.getElementById(id);
        if (modal) modal.style.display = "block";
      };

      window.closeModal = function (id) {
        const modal = document.getElementById(id);
        if (modal) modal.style.display = "none";
      };

      window.onclick = function (event) {
        if (event.target.classList.contains('modal')) {
          event.target.style.display = "none";
        }
      }
    });
  </script>

</body>

</html>