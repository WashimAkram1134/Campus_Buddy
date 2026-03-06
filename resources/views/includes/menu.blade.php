{{-- Campus Buddy Menu Component --}}
@php
$currentRoute = Route::currentRouteName() ?? '';
@endphp

{{-- Include topbar --}}
@include('includes.topbar')

<!-- ================= MOBILE MENU ================= -->
<nav class="mobile-menu">
  <a href="{{ route('dashboard') }}" class="{{ $currentRoute === 'dashboard' ? 'active' : '' }}">
    <img src="{{ asset('images/menuicons/home.png') }}" alt="Home" width="20" height="20"
      style="vertical-align: middle;">
    <span>Home</span>
  </a>
  <a href="{{ route('routine') }}" class="{{ $currentRoute === 'routine' ? 'active' : '' }}">
    <img src="{{ asset('images/menuicons/routine.png') }}" alt="Routine" width="20" height="20"
      style="vertical-align: middle;">
    <span>Routine</span>
  </a>
  <a href="{{ route('classtask') }}" class="{{ $currentRoute === 'classtask' ? 'active' : '' }}">
    <img src="{{ asset('images/menuicons/Classtask.png') }}" alt="ClassTask" width="20" height="20"
      style="vertical-align: middle;">
    <span>ClassTask</span>
  </a>
  <a href="{{ route('clubs') }}" class="{{ $currentRoute === 'clubs' ? 'active' : '' }}">
    <img src="{{ asset('images/menuicons/clubs.png') }}" alt="Clubs" width="20" height="20"
      style="vertical-align: middle;">
    <span>Clubs</span>
  </a>
  <a href="{{ route('notes') }}" class="{{ $currentRoute === 'notes' ? 'active' : '' }}">
    <img src="{{ asset('images/menuicons/pdf&Notes.png') }}" alt="Notes & Pdf" width="20" height="20"
      style="vertical-align: middle;">
    <span>Notes & Pdf</span>
  </a>
  <a href="{{ route('community') }}" class="{{ $currentRoute === 'community' ? 'active' : '' }}">
    <img src="{{ asset('images/menuicons/community.png') }}" alt="Community" width="20" height="20"
      style="vertical-align: middle;">
    <span>Community</span>
  </a>
  <a href="{{ route('alumni') }}" class="{{ $currentRoute === 'alumni' ? 'active' : '' }}">
    <img src="{{ asset('images/menuicons/alumni.png') }}" alt="Alumni" width="20" height="20"
      style="vertical-align: middle;">
    <span>Alumni</span>
  </a>
  <a href="{{ route('question-bank') }}" class="{{ $currentRoute === 'question-bank' ? 'active' : '' }}">
    <img src="{{ asset('images/menuicons/questionBank.png') }}" alt="Question Bank" width="20" height="20"
      style="vertical-align: middle;">
    <span>Q Bank</span>
  </a>
  <a href="{{ route('buddy-chat') }}" class="{{ $currentRoute === 'buddy-chat' ? 'active' : '' }}">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
      stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle;">
      <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
    </svg>
    <span>Buddy AI</span>
  </a>
</nav>