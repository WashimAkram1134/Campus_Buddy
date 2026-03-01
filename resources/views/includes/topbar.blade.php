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
    <a href="#">ClassTask</a>
    <a href="#">Clubs</a>
    <a href="{{ route('notes') }}" class="{{ $currentRoute === 'notes' ? 'active' : '' }}">Notes</a>
    <a href="{{ route('community') }}" class="{{ $currentRoute === 'community' ? 'active' : '' }}">Community</a>
    <a href="{{ route('alumni') }}" class="{{ $currentRoute === 'alumni' ? 'active' : '' }}">Alumni</a>
    <a href="{{ route('question-bank') }}" class="{{ $currentRoute === 'question-bank' ? 'active' : '' }}">Q Bank</a>
  </nav>

  <div class="top-icons">
    <img src="{{ asset('images/topbaricons/notification.png') }}" alt="Notifications" class="top-icon">
    <img src="{{ asset('images/topbaricons/settings.png') }}" alt="Settings" class="top-icon">
    <img src="{{ asset('images/topbaricons/user.png') }}" alt="User" class="top-icon">
  </div>
</header>
