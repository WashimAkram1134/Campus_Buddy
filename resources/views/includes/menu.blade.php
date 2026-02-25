{{-- Campus Buddy Menu Component --}}
@php
    $currentRoute = Route::currentRouteName() ?? '';
@endphp

{{-- Include topbar --}}
@include('includes.topbar')

<!-- ================= MOBILE MENU ================= -->
<nav class="mobile-menu">
  <a href="{{ route('dashboard') }}" class="{{ $currentRoute === 'dashboard' ? 'active' : '' }}">
    <img src="{{ asset('images/menuicons/home.png') }}" alt="Home" width="20" height="20" style="vertical-align: middle;">
    <span>Home</span>
  </a>
  <a href="#" class="">
    <img src="{{ asset('images/menuicons/routine.png') }}" alt="Routine" width="20" height="20" style="vertical-align: middle;">
    <span>Routine</span>
  </a>
  <a href="#" class="">
    <img src="{{ asset('images/menuicons/Classtask.png') }}" alt="ClassTask" width="20" height="20" style="vertical-align: middle;">
    <span>ClassTask</span>
  </a>
  <a href="#" class="">
    <img src="{{ asset('images/menuicons/clubs.png') }}" alt="Clubs" width="20" height="20" style="vertical-align: middle;">
    <span>Clubs</span>
  </a>
  <a href="#" class="">
    <img src="{{ asset('images/menuicons/pdf&Notes.png') }}" alt="Notes & Pdf" width="20" height="20" style="vertical-align: middle;">
    <span>Notes & Pdf</span>
  </a>
  <a href="#" class="">
    <img src="{{ asset('images/menuicons/community.png') }}" alt="Community" width="20" height="20" style="vertical-align: middle;">
    <span>Community</span>
  </a>
  <a href="#" class="">
    <img src="{{ asset('images/menuicons/alumni.png') }}" alt="Alumni" width="20" height="20" style="vertical-align: middle;">
    <span>Alumni</span>
  </a>
  <a href="#" class="">
    <img src="{{ asset('images/menuicons/questionBank.png') }}" alt="Question Bank" width="20" height="20" style="vertical-align: middle;">
    <span>Q Bank</span>
  </a>
</nav>

<!-- ================= DESKTOP SIDEBAR ================= -->
<nav class="sidebar">
  @if($currentRoute === 'dashboard')
    <div class="buddy-box">
      <img src="{{ asset('images/menuicons/Buddy.png') }}" alt="Buddy">
      <button>Chat With Buddy</button>
    </div>
  @endif

  <a href="{{ route('dashboard') }}" class="menu {{ $currentRoute === 'dashboard' ? 'active' : '' }}">
    <img src="{{ asset('images/menuicons/home.png') }}" alt="Home" width="20" height="20" style="vertical-align: middle;">
    <p>Home</p>
  </a>
  <a href="#" class="menu">
    <img src="{{ asset('images/menuicons/routine.png') }}" alt="Routine" width="20" height="20" style="vertical-align: middle;">
    <p>Routine</p>
  </a>
  <a href="#" class="menu">
    <img src="{{ asset('images/menuicons/Classtask.png') }}" alt="ClassTask" width="20" height="20" style="vertical-align: middle;">
    <p>ClassTask</p>
  </a>
  <a href="#" class="menu">
    <img src="{{ asset('images/menuicons/clubs.png') }}" alt="Clubs" width="20" height="20" style="vertical-align: middle;">
    <p>Clubs</p>
  </a>
  <a href="#" class="menu">
    <img src="{{ asset('images/menuicons/pdf&Notes.png') }}" alt="Notes & Pdf" width="20" height="20" style="vertical-align: middle;">
    <p>Notes & Pdf</p>
  </a>
  <a href="#" class="menu">
    <img src="{{ asset('images/menuicons/community.png') }}" alt="Community" width="20" height="20" style="vertical-align: middle;">
    <p>Community</p>
  </a>
  <a href="#" class="menu">
    <img src="{{ asset('images/menuicons/alumni.png') }}" alt="Alumni" width="20" height="20" style="vertical-align: middle;">
    <p>Alumni</p>
  </a>
  <a href="#" class="menu">
    <img src="{{ asset('images/menuicons/questionBank.png') }}" alt="Question Bank" width="20" height="20" style="vertical-align: middle;">
    <p>Q Bank</p>
  </a>
</nav>

<!-- ================= SOCIAL MEDIA FOOTER ================= -->
<div class="social-footer">
  <a href="https://www.facebook.com" target="_blank" class="social-icon" title="Facebook">
    <img src="{{ asset('images/topbaricons/facebook.svg') }}" alt="Facebook" width="20" height="20">
  </a>
  <a href="https://twitter.com" target="_blank" class="social-icon" title="Twitter">
    <img src="{{ asset('images/topbaricons/twitter.svg') }}" alt="Twitter" width="20" height="20">
  </a>
  <a href="mailto:contact@campusbuddy.com" class="social-icon" title="Email">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
  </a>
</div>
