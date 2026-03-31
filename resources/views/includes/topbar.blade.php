{{-- Campus Buddy Topbar Component --}}
@php
    $currentRoute = Route::currentRouteName() ?? '';
    
    // Fetch latest activities for notifications
    $recentAnnouncements = \App\Models\Announcement::latest()->take(2)->get()->map(function($item) {
        $item->notif_type = 'announcement';
        $item->notif_icon = 'dashboard';
        $item->notif_label = 'CR Announcement';
        return $item;
    });
    
    $recentTasks = \App\Models\ClassTask::latest()->take(2)->get()->map(function($item) {
        $item->notif_type = 'task';
        $item->notif_icon = 'submission';
        $item->notif_label = 'New ClassTask';
        return $item;
    });
    
    $recentMaterials = \App\Models\Material::latest()->take(1)->get()->map(function($item) {
        $item->notif_type = 'material';
        $item->notif_icon = 'alert';
        $item->notif_label = 'New Material';
        return $item;
    });

    /* 4. Alumni Approval Notification */
    $alumniNotif = collect();
    if (Auth::check()) {
        // Show approval if newly approved OR if it was approved recently (within 24 hours)
        $approvedAlumni = \App\Models\AlumniRegistration::where('email', Auth::user()->email)
            ->where('status', 'approved')
            ->orderBy('updated_at', 'desc')
            ->first();

        if ($approvedAlumni) {
            $isNotified = $approvedAlumni->is_notified;
            $wasRecentlyUpdated = $approvedAlumni->updated_at->diffInHours(now()) < 24;

            // Show in notification if NEVER notified, or just show as an item if it was recent
            if (!$isNotified || $wasRecentlyUpdated) {
                $alumniNotif = collect([(object)[
                    'notif_type' => 'alumni',
                    'notif_icon' => 'alert',
                    'notif_label' => 'System',
                    'title' => 'Alumni registration approved!',
                    'created_at' => $approvedAlumni->updated_at
                ]]);
            }
        }
    }
    
    $notifications = $recentAnnouncements->concat($recentTasks)->concat($recentMaterials)->concat($alumniNotif)
        ->sortByDesc('created_at')
        ->values();
        
    $unreadCount = $notifications->count(); // For now, treat all fetched as unread in UI
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
    <a href="{{ route('notes') }}" class="{{ $currentRoute === 'notes' ? 'active' : '' }}">Pdf & Notes</a>
    <a href="{{ route('community') }}" class="{{ $currentRoute === 'community' ? 'active' : '' }}">Community</a>
    <a href="{{ route('alumni') }}" class="{{ $currentRoute === 'alumni' ? 'active' : '' }}">Alumni</a>
    <a href="{{ route('question-bank') }}" class="{{ $currentRoute === 'question-bank' ? 'active' : '' }}">Q Bank</a>

    <a href="{{ route('buddy-chat') }}" class="{{ $currentRoute === 'buddy-chat' ? 'active' : '' }}">Buddy AI</a>
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
        @if($unreadCount > 0)
        <span class="notification-badge" id="notifBadge">{{ $unreadCount }}</span>
        @endif
      </a>

      <div class="notification-dropdown" id="notificationDropdown">
        <div class="notif-header">
          <h3>Notifications</h3>
          <span class="mark-all" id="markAllRead">Mark all as read</span>
        </div>
        <div class="notif-body">
          @forelse($notifications as $notif)
          @php
            $notifUrl = 'javascript:void(0)';
            switch($notif->notif_type) {
                case 'announcement': $notifUrl = route('dashboard') . '#announcement-' . $notif->id; break;
                case 'task': $notifUrl = route('classtask') . '#task-' . $notif->id; break;
                case 'material': $notifUrl = route('notes') . '#material-' . $notif->id; break;
                case 'alumni': $notifUrl = route('alumni'); break;
            }
          @endphp
          <a href="{{ $notifUrl }}" class="notif-item unread" style="text-decoration: none; display: flex; transition: background 0.2s;">
            <div class="notif-icon {{ $notif->notif_icon }}">
              @if($notif->notif_icon === 'submission')
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                </svg>
              @elseif($notif->notif_icon === 'dashboard')
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <line x1="3" y1="9" x2="21" y2="9"></line>
                  <line x1="9" y1="21" x2="9" y2="9"></line>
                </svg>
              @else
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="12" y1="8" x2="12" y2="12"></line>
                  <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
              @endif
            </div>
            <div class="notif-content">
              <p class="notif-text">{{ $notif->notif_label }}: <strong>{{ $notif->title }}</strong></p>
              <span class="notif-time">{{ $notif->created_at->diffForHumans() }}</span>
            </div>
          </a>
          @empty
          <div class="notif-empty" style="padding: 30px 20px; text-align: center; color: #718096;">
            <p>No new notifications</p>
          </div>
          @endforelse
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

          <a href="{{ route('profile.settings') }}" class="dropdown-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="3"></circle>
              <path
                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
              </path>
            </svg>
            Account Settings
          </a>
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

  <!-- Mobile Sidebar integration -->

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
      const markAllBtn = document.getElementById('markAllRead');
      const notifBadge = document.getElementById('notifBadge');

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

      if (markAllBtn) {
        markAllBtn.addEventListener('click', function() {
          if (notifBadge) {
            notifBadge.style.display = 'none';
          }
          const unreadItems = document.querySelectorAll('.notif-item.unread');
          unreadItems.forEach(item => {
            item.classList.remove('unread');
          });
        });
      }

      window.openModal = function (id) {
        const modal = document.getElementById(id);
        if (modal) modal.classList.add('show');
      };

      window.closeModal = function (id) {
        const modal = document.getElementById(id);
        if (modal) modal.classList.remove('show');
      };

      window.onclick = function (event) {
        if (event.target.classList && (event.target.classList.contains('modal') || event.target.classList.contains('account-settings-modal'))) {
          event.target.classList.remove('show');
        }
      }
    });
  </script>
</header>

<!-- Include new mobile sidebar -->
@include('includes.mobile-sidebar')