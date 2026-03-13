{{-- Campus Buddy Topbar Component --}}
@php
$currentRoute = Route::currentRouteName() ?? '';
@endphp
<header class="topbar">
  <!-- Mobile Hamburger Menu Button (Visible only on mobile) -->
  <button class="mobile-hamburger-btn" id="mobileHamburgerBtn" aria-label="Open Menu">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
      stroke-linecap="round" stroke-linejoin="round">
      <line x1="3" y1="12" x2="21" y2="12"></line>
      <line x1="3" y1="6" x2="21" y2="6"></line>
      <line x1="3" y1="18" x2="21" y2="18"></line>
    </svg>
  </button>

  <div class="logo">
    <img src="{{ asset('images/eventImage/logo.png') }}" alt="Campus Buddy Logo" class="logo-img">
    <div class="logo-text">
      <span>Campus</span>
      <span>Buddy</span>
    </div>
  </div>

  <!-- Desktop inline nav -->
  <nav class="desktop-nav">
    <a href="{{ route('dashboard') }}" class="{{ $currentRoute === 'dashboard' ? 'active' : '' }}">Home</a>
    <a href="{{ route('routine') }}" class="{{ $currentRoute === 'routine' ? 'active' : '' }}">Routine</a>
    <a href="{{ route('classtask') }}" class="{{ $currentRoute === 'classtask' ? 'active' : '' }}">ClassTask</a>
    <a href="{{ route('clubs') }}" class="{{ $currentRoute === 'clubs' ? 'active' : '' }}">Clubs</a>
    <a href="{{ route('notes') }}" class="{{ $currentRoute === 'notes' ? 'active' : '' }}">Notes</a>
    <a href="{{ route('community') }}" class="{{ $currentRoute === 'community' ? 'active' : '' }}">Community</a>
    <a href="{{ route('alumni') }}" class="{{ $currentRoute === 'alumni' ? 'active' : '' }}">Alumni</a>
    <a href="{{ route('question-bank') }}" class="{{ $currentRoute === 'question-bank' ? 'active' : '' }}">Q Bank</a>

    <div class="nav-more">
      <button class="more-btn">
        More
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
          stroke-linecap="round" stroke-linejoin="round">
          <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
      </button>
      <div class="more-dropdown-content">
        <a href="{{ route('buddy-chat') }}" class="{{ $currentRoute === 'buddy-chat' ? 'active' : '' }}">🤖 Buddy AI</a>
      </div>
    </div>
  </nav>

  <div class="top-right-section">
    <!-- Search Icon -->
    <a href="#" class="top-action-btn" aria-label="Search">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4a5568" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
      </svg>
    </a>

    <!-- Notification Bell -->
    <div class="notification-container">
      <a href="javascript:void(0)" class="top-action-btn notification-btn" id="notificationBtn" aria-label="Notifications">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4a5568" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
          <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg>
        <span class="notification-badge">3</span>
      </a>

      <div class="notification-dropdown" id="notificationDropdown">
        <div class="notif-header">
          <h3>Notifications</h3>
          <span class="mark-all">Mark all as read</span>
        </div>
        <div class="notif-body">
          <div class="notif-item unread">
            <div class="notif-icon submission">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
              </svg>
            </div>
            <div class="notif-content">
              <p class="notif-text">New CR Submission: <strong>Cloud Computing Assignment 2</strong></p>
              <span class="notif-time">2 mins ago</span>
            </div>
          </div>
          <div class="notif-item unread">
            <div class="notif-icon dashboard">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="3" y1="9" x2="21" y2="9"></line>
                <line x1="9" y1="21" x2="9" y2="9"></line>
              </svg>
            </div>
            <div class="notif-content">
              <p class="notif-text">CR Dashboard Update: <strong>Routine changed for Monday</strong></p>
              <span class="notif-time">1 hour ago</span>
            </div>
          </div>
          <div class="notif-item">
            <div class="notif-icon alert">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
              </svg>
            </div>
            <div class="notif-content">
              <p class="notif-text">Important: <strong>Fees payment deadline approaching</strong></p>
              <span class="notif-time">5 hours ago</span>
            </div>
          </div>
        </div>
        <div class="notif-footer">
          <a href="{{ route('cr-dashboard') }}">View CR Dashboard updates</a>
        </div>
      </div>
    </div>

    <!-- Vertical Divider -->
    <div class="topbar-divider"></div>

    <div class="user-profile-container">
      <!-- Profile Trigger -->
      <div class="user-profile-trigger" id="userProfileIcon">
        <div class="user-avatar-circle">
          @if(Auth::user()->profile_image)
            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
          @else
            <svg viewBox="0 0 24 24" fill="#a0aec0" width="24" height="24">
              <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
            </svg>
          @endif
        </div>

        <div class="user-info">
          <span class="user-name">{{ Auth::user()->name ?? 'Test User' }}</span>
          <span class="user-role">{{ Auth::user()->role ?? '3rd year' }}</span>
        </div>

        <svg class="chevron-down" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4a5568"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
      </div>

      <div class="user-dropdown" id="userDropdown">
        <div class="dropdown-header">
          <div class="dropdown-avatar-wrap" style="width: 60px; height: 60px; margin: 0 auto 10px; border-radius: 50%; overflow: hidden; border: 2px solid #edf2f7;">
            @if(Auth::user()->profile_image)
              <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
            @else
              <div style="width: 100%; height: 100%; background: #f7fafc; display: flex; align-items: center; justify-content: center;">
                <svg viewBox="0 0 24 24" fill="#a0aec0" width="32" height="32">
                  <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
              </div>
            @endif
          </div>
          <p class="dropdown-name">{{ Auth::user()->name ?? 'User' }}</p>
          <p class="dropdown-email">{{ Auth::user()->student_id ?? 'ID Missing' }}</p>
          <p class="dropdown-role">{{ strtoupper(Auth::user()->role ?? 'Student') }}</p>
        </div>

        <div class="dropdown-divider"></div>

        <div class="dropdown-body">
          @if(Auth::check() && in_array(Auth::user()->role, ['cr', 'admin']))
          <a href="{{ route('cr-dashboard') }}" class="dropdown-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
              <circle cx="9" cy="7" r="4" />
              <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            Switch to CR Portal
          </a>
          @endif

          @if(Auth::check() && Auth::user()->role === 'admin')
          <a href="/admin" class="dropdown-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 20h9" />
              <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
            </svg>
            Admin Panel
          </a>
          @endif

          <button class="dropdown-item" onclick="openModal('profileModal')">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="3"></circle>
              <path
                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
              </path>
            </svg>
            Account Settings
          </button>
        </div>

        <div class="dropdown-divider"></div>

        <form action="{{ route('logout') }}" method="POST" id="logout-form">
          @csrf
          <button type="submit" class="logout-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
              <polyline points="16 17 21 12 16 7"></polyline>
              <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
            Log Out
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- ================= PROFILE/ACCOUNT MODAL ================= -->
  <div id="profileModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Account Settings</h2>
        <span class="close" onclick="closeModal('profileModal')">&times;</span>
      </div>
      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="profile_image_update">Profile Picture</label>
          <input type="file" name="profile_image" id="profile_image_update" accept="image/*">
        </div>
        <div class="form-group">
          <label for="dept_update">Department</label>
          <input type="text" name="department" id="dept_update" value="{{ Auth::user()->department }}" required>
        </div>
        <div class="form-group">
          <label for="batch_update">Batch</label>
          <input type="text" name="batch" id="batch_update" value="{{ Auth::user()->batch }}" required>
        </div>
        <div class="form-group">
          <label for="semester_update">Semester</label>
          <input type="text" name="semester" id="semester_update" value="{{ Auth::user()->semester }}" required>
        </div>
        <div class="form-group">
          <label for="section_update">Section</label>
          <input type="text" name="section" id="section_update" value="{{ Auth::user()->section }}" required>
        </div>
        <div class="form-group">
          <label for="major_update">Major (Optional)</label>
          <input type="text" name="major" id="major_update" value="{{ Auth::user()->major }}"
            placeholder="e.g. DS, CS, Robotics">
        </div>
        <button type="submit" class="submit-btn">Update Profile</button>
      </form>
    </div>
  </div>

  <style>
    /* Ensure modal styles are available in topbar too */
    .modal {
      display: none;
      position: fixed;
      z-index: 10000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(5px);
    }

    .modal-content {
      background: white;
      margin: 10% auto;
      padding: 30px;
      width: 400px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .modal-header h2 {
      margin: 0;
      font-size: 20px;
      color: #1b5c7a;
    }

    .close {
      font-size: 24px;
      cursor: pointer;
      color: #aaa;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
      font-size: 14px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 2px solid #edf2f7;
      border-radius: 8px;
    }

    .submit-btn {
      width: 100%;
      padding: 12px;
      background: #00AAFF;
      color: white;
      border: none;
      border-radius: 10px;
      font-weight: 700;
      cursor: pointer;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const profileIcon = document.getElementById('userProfileIcon');
      const dropdown = document.getElementById('userDropdown');

      if (profileIcon && dropdown) {
        profileIcon.addEventListener('click', function (e) {
          e.stopPropagation();
          dropdown.classList.toggle('show');
        });

        document.addEventListener('click', function (e) {
          if (!dropdown.contains(e.target) && e.target !== profileIcon) {
            dropdown.classList.remove('show');
          }
        });
      }

      // Notification toggle
      const notifBtn = document.getElementById('notificationBtn');
      const notifDropdown = document.getElementById('notificationDropdown');

      if (notifBtn && notifDropdown) {
        notifBtn.addEventListener('click', function (e) {
          e.stopPropagation();
          notifDropdown.classList.toggle('show');
          if (dropdown) dropdown.classList.remove('show'); // Hide user dropdown if open
        });

        document.addEventListener('click', function (e) {
          if (!notifDropdown.contains(e.target) && e.target !== notifBtn) {
            notifDropdown.classList.remove('show');
          }
        });
      }

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
</header>

<!-- Include new mobile sidebar -->
@include('includes.mobile-sidebar')