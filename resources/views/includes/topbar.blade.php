{{-- Campus Buddy Topbar Component --}}
@php
$currentRoute = Route::currentRouteName() ?? '';
@endphp
<header class="topbar">
  <div class="logo">
    <img src="{{ asset('images/eventImage/logo.png') }}" alt="Campus Buddy Logo" class="logo-img">
    <span class="logo-text">Campus Buddy</span>
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

  <div class="top-icons">
    @if(Auth::check() && in_array(Auth::user()->role, ['cr', 'admin']))
    <a href="{{ route('cr-dashboard') }}" class="cr-portal-btn @if($currentRoute === 'cr-dashboard') active @endif"
      title="Go to CR Portal">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
        <circle cx="9" cy="7" r="4" />
        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
      </svg>
      CR Portal
    </a>
    @endif

    @if(Auth::check() && Auth::user()->role === 'admin')
    <a href="/admin" class="admin-panel-btn" title="Go to Admin Panel">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 20h9" />
        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
      </svg>
      Admin Panel
    </a>
    @endif
    <img src="{{ asset('images/topbaricons/notification.png') }}" alt="Notifications" class="top-icon">
    <img src="{{ asset('images/topbaricons/settings.png') }}" alt="Settings" class="top-icon"
      onclick="openModal('profileModal')">

    <div class="user-profile-container">
      <img src="{{ asset('images/topbaricons/user.png') }}" alt="User" class="top-icon" id="userProfileIcon">

      <div class="user-dropdown" id="userDropdown">
        <div class="dropdown-header">
          <p class="dropdown-name">{{ Auth::user()->name ?? 'User' }}</p>
          <p class="dropdown-email">{{ Auth::user()->student_id ?? 'ID Missing' }}</p>
          <p class="dropdown-role">{{ strtoupper(Auth::user()->role ?? 'Student') }}</p>
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
      <form action="{{ route('profile.update') }}" method="POST">
        @csrf
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