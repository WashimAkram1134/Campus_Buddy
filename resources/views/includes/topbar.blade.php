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
    @if(view()->shared('user', Auth::user()) && Auth::user() && Auth::user()->role === 'cr')
    <a href="{{ route('cr-dashboard') }}" class="{{ $currentRoute === 'cr-dashboard' ? 'active' : '' }}">CR Portal</a>
    @endif
    <a href="{{ route('classtask') }}" class="{{ $currentRoute === 'classtask' ? 'active' : '' }}">ClassTask</a>
    <a href="{{ route('clubs') }}" class="{{ $currentRoute === 'clubs' ? 'active' : '' }}">Clubs</a>
    <a href="{{ route('notes') }}" class="{{ $currentRoute === 'notes' ? 'active' : '' }}">Notes</a>
    <a href="{{ route('community') }}" class="{{ $currentRoute === 'community' ? 'active' : '' }}">Community</a>
    <a href="{{ route('alumni') }}" class="{{ $currentRoute === 'alumni' ? 'active' : '' }}">Alumni</a>
    <a href="{{ route('question-bank') }}" class="{{ $currentRoute === 'question-bank' ? 'active' : '' }}">Q Bank</a>
  </nav>

  <div class="top-icons">
    <img src="{{ asset('images/topbaricons/notification.png') }}" alt="Notifications" class="top-icon">
    <img src="{{ asset('images/topbaricons/settings.png') }}" alt="Settings" class="top-icon">

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
    });
  </script>
</header>