<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Class Tasks - Campus Buddy</title>
  <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/classtask.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>

  @include('includes.menu')

  <div class="layout">
    <main class="main">

      <!-- ================= HERO SECTION ================= -->
      <section class="classtask-hero">
        <img src="{{ asset('images/community/studygroup.jpg') }}" alt="Class Tasks" class="hero-bg">
        <div class="hero-overlay-dark"></div>

        <div class="hero-content-wrapper">
          <div class="hero-left-circle"></div>
          <div class="hero-right-circle"></div>

          <div class="hero-inner">
            <span class="hero-tag">TRACK YOUR PROGRESS</span>
            <h1 class="hero-title">
              <span class="title-main">Class</span>
              <span class="title-accent">Tasks</span>
            </h1>
            <p class="hero-subtitle">Get information, timeline, and AI guidance for all your academic tasks</p>

            <div class="hero-stats">
              <div class="stat-box">
                <span class="stat-value">12</span>
                <span class="stat-label">Active Tasks</span>
              </div>
              <div class="stat-box">
                <span class="stat-value">4</span>
                <span class="stat-label">Due This Week</span>
              </div>
              <div class="stat-box">
                <span class="stat-value">8</span>
                <span class="stat-label">Completed</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      @php
      $assignmentCount = $tasks->where('type', 'assignment')->count();
      $quizCount = $tasks->where('type', 'quiz')->count();
      $presentationCount = $tasks->where('type', 'presentation')->count();
      $totalCount = $tasks->count();
      @endphp

      <!-- ================= FILTER BAR ================= -->
      <div class="filter-bar-wrapper">
        <div class="filter-bar">
          <button class="filter-btn active" data-filter="all">
            <span class="filter-icon">📋</span>
            <span>All Tasks</span>
            <span class="count">{{ $totalCount }}</span>
          </button>
          <button class="filter-btn" data-filter="assignments">
            <span class="filter-icon">📝</span>
            <span>Assignments</span>
            <span class="count">{{ $assignmentCount }}</span>
          </button>
          <button class="filter-btn" data-filter="quizzes">
            <span class="filter-icon">❓</span>
            <span>Quizzes</span>
            <span class="count">{{ $quizCount }}</span>
          </button>
          <button class="filter-btn" data-filter="presentations">
            <span class="filter-icon">🎤</span>
            <span>Presentations</span>
            <span class="count">{{ $presentationCount }}</span>
          </button>
        </div>
      </div>

      <!-- ================= MAIN CONTENT ================= -->
      <div class="classtask-container">

        <!-- SECTION 1: ASSIGNMENTS -->
        <section class="task-section assignments-section" data-section="assignments"
          style="{{ $assignmentCount == 0 ? 'display:none;' : '' }}">
          <div class="section-header-wrapper">
            <div class="section-icon assignment-icon">
              <svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z" />
                <polyline points="13 2 13 9 20 9" />
                <line x1="9" y1="13" x2="15" y2="13" />
                <line x1="9" y1="17" x2="15" y2="17" />
              </svg>
            </div>
            <div class="section-title-group">
              <h2 class="section-title">Assignments</h2>
              <p class="section-desc">Complete your coursework with AI guidance to help you succeed</p>
            </div>
          </div>

          <div class="task-cards-grid">
            @foreach($tasks->where('type', 'assignment') as $task)
            <div class="info-card assignment-card animate-in">
              <div class="card-status-bar assignment-bar"></div>
              <div class="card-header">
                <h3 class="card-title">{{ $task->title }}</h3>
                @php
                $totalTime =
                \Carbon\Carbon::parse($task->created_at)->diffInSeconds(\Carbon\Carbon::parse($task->deadline));
                $passedTime = \Carbon\Carbon::parse($task->created_at)->diffInSeconds(\Carbon\Carbon::now());
                $percentage = ($totalTime > 0) ? min(100, max(0, round(($passedTime / $totalTime) * 100))) : 0;
                @endphp
                <span class="card-progress">{{ $percentage }}%</span>

                @if(auth()->user()->role === 'cr' && $task->user_id === auth()->id())
                <div class="card-actions">
                  <button class="action-btn edit-btn" onclick="openEditModal({{ json_encode($task) }})">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                    </svg>
                  </button>
                  <form action="{{ route('classtask.destroy', $task->id) }}" method="POST"
                    onsubmit="return confirm('Delete this task?')" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="action-btn delete-btn">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                        <line x1="10" y1="11" x2="10" y2="17" />
                        <line x1="14" y1="11" x2="14" y2="17" />
                      </svg>
                    </button>
                  </form>
                </div>
                @endif
              </div>

              <div class="card-timeline">
                <div class="timeline-item">
                  <span class="timeline-icon">📅</span>
                  <div>
                    <p class="timeline-label">Due</p>
                    <p class="timeline-value">{{ \Carbon\Carbon::parse($task->deadline)->format('F d, Y') }}</p>
                  </div>
                </div>
                <div class="timeline-divider"></div>
                <div class="timeline-item">
                  <span class="timeline-icon">⏰</span>
                  <div>
                    <p class="timeline-label">Remaining</p>
                    <p class="timeline-value">
                      @php
                      $remaining = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($task->deadline), false);
                      $remaining = round($remaining);
                      @endphp
                      @if($remaining > 0)
                      {{ $remaining }} days
                      @elseif($remaining == 0)
                      Today
                      @else
                      Overdue
                      @endif
                    </p>
                  </div>
                </div>
              </div>

              <div class="card-topic">
                <p class="topic-label">Topic</p>
                <p class="topic-value">{{ $task->topic }}</p>
              </div>

              <div class="buddy-box assignment-buddy">
                <div class="buddy-header">
                  <div class="buddy-mascot-wrapper">
                    <img src="{{ asset('images/menuicons/Buddy.png') }}" alt="Campus Buddy" class="buddy-mascot">
                  </div>
                  <div class="buddy-title-group">
                    <span class="buddy-label">Campus Buddy</span>
                    <span class="buddy-subtitle">Study Guide</span>
                  </div>
                </div>

                <div class="buddy-content">
                  @if($task->tip_1)
                  <div class="buddy-tip-item">
                    <span class="tip-icon">📚</span>
                    <span class="tip-text">{{ $task->tip_1 }}</span>
                  </div>
                  @endif
                  @if($task->tip_2)
                  <div class="buddy-tip-item">
                    <span class="tip-icon">⚡</span>
                    <span class="tip-text">{{ $task->tip_2 }}</span>
                  </div>
                  @endif
                </div>

                <button class="buddy-help-btn">
                  <span class="help-icon">💬</span>
                  <span>Get Help from Buddy</span>
                </button>
              </div>
            </div>
            @endforeach
          </div>
        </section>

        <!-- SECTION 2: QUIZZES -->
        <section class="task-section quizzes-section" data-section="quizzes"
          style="{{ $quizCount == 0 ? 'display:none;' : '' }}">
          <div class="section-header-wrapper">
            <div class="section-icon quiz-icon">
              <svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 16.01v.01" />
                <path
                  d="M12 12c0-1.657.895-3 2-3s2 1.343 2 3c0 1-1.791 1.572-1.903 2.831C13.93 14.258 12.545 15 12 15" />
              </svg>
            </div>
            <div class="section-title-group">
              <h2 class="section-title">Quizzes</h2>
              <p class="section-desc">Prepare and review quiz topics with expert guidance</p>
            </div>
          </div>

          <div class="task-cards-grid">
            @foreach($tasks->where('type', 'quiz') as $task)
            <div class="info-card quiz-card animate-in">
              <div class="card-status-bar quiz-bar"></div>
              <div class="card-header">
                <h3 class="card-title">{{ $task->title }}</h3>
                @php
                $totalTime =
                \Carbon\Carbon::parse($task->created_at)->diffInSeconds(\Carbon\Carbon::parse($task->deadline));
                $passedTime = \Carbon\Carbon::parse($task->created_at)->diffInSeconds(\Carbon\Carbon::now());
                $percentage = ($totalTime > 0) ? min(100, max(0, round(($passedTime / $totalTime) * 100))) : 0;
                @endphp
                <span class="card-progress quiz-progress">{{ $percentage }}%</span>

                @if(auth()->user()->role === 'cr' && $task->user_id === auth()->id())
                <div class="card-actions">
                  <button class="action-btn edit-btn" onclick="openEditModal({{ json_encode($task) }})">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                    </svg>
                  </button>
                  <form action="{{ route('classtask.destroy', $task->id) }}" method="POST"
                    onsubmit="return confirm('Delete this task?')" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="action-btn delete-btn">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                        <line x1="10" y1="11" x2="10" y2="17" />
                        <line x1="14" y1="11" x2="14" y2="17" />
                      </svg>
                    </button>
                  </form>
                </div>
                @endif
              </div>

              <div class="card-timeline">
                <div class="timeline-item">
                  <span class="timeline-icon">📅</span>
                  <div>
                    <p class="timeline-label">Quiz Date</p>
                    <p class="timeline-value">{{ \Carbon\Carbon::parse($task->deadline)->format('F d, Y') }}</p>
                  </div>
                </div>
                <div class="timeline-divider"></div>
                <div class="timeline-item">
                  <span class="timeline-icon">⏰</span>
                  <div>
                    <p class="timeline-label">Duration</p>
                    <p class="timeline-value">{{ $task->duration_or_slot }}</p>
                  </div>
                </div>
              </div>

              <div class="card-topic">
                <p class="topic-label">Topic</p>
                <p class="topic-value">{{ $task->topic }}</p>
              </div>

              <div class="buddy-box quiz-buddy">
                <div class="buddy-header">
                  <div class="buddy-mascot-wrapper">
                    <img src="{{ asset('images/menuicons/Buddy.png') }}" alt="Campus Buddy" class="buddy-mascot">
                  </div>
                  <div class="buddy-title-group">
                    <span class="buddy-label">Campus Buddy</span>
                    <span class="buddy-subtitle">Study Guide</span>
                  </div>
                </div>

                <div class="buddy-content">
                  @if($task->tip_1)
                  <div class="buddy-tip-item">
                    <span class="tip-icon">🔄</span>
                    <span class="tip-text">{{ $task->tip_1 }}</span>
                  </div>
                  @endif
                  @if($task->tip_2)
                  <div class="buddy-tip-item">
                    <span class="tip-icon">⏱️</span>
                    <span class="tip-text">{{ $task->tip_2 }}</span>
                  </div>
                  @endif
                </div>

                <button class="buddy-help-btn">
                  <span class="help-icon">💬</span>
                  <span>Get Help from Buddy</span>
                </button>
              </div>
            </div>
            @endforeach
          </div>
        </section>

        <!-- SECTION 3: PRESENTATIONS -->
        <section class="task-section presentations-section" data-section="presentations"
          style="{{ $presentationCount == 0 ? 'display:none;' : '' }}">
          <div class="section-header-wrapper">
            <div class="section-icon presentation-icon">
              <svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <polygon points="23 7 16 12 23 17 23 7" />
                <rect x="1" y="5" width="15" height="14" rx="2" ry="2" />
              </svg>
            </div>
            <div class="section-title-group">
              <h2 class="section-title">Presentations</h2>
              <p class="section-desc">Learn presentation skills and get feedback on your topics</p>
            </div>
          </div>

          <div class="task-cards-grid">
            @foreach($tasks->where('type', 'presentation') as $task)
            <div class="info-card presentation-card animate-in">
              <div class="card-status-bar presentation-bar"></div>
              <div class="card-header">
                <h3 class="card-title">{{ $task->title }}</h3>
                @php
                $totalTime =
                \Carbon\Carbon::parse($task->created_at)->diffInSeconds(\Carbon\Carbon::parse($task->deadline));
                $passedTime = \Carbon\Carbon::parse($task->created_at)->diffInSeconds(\Carbon\Carbon::now());
                $percentage = ($totalTime > 0) ? min(100, max(0, round(($passedTime / $totalTime) * 100))) : 0;
                @endphp
                <span class="card-progress">{{ $percentage }}%</span>

                @if(auth()->user()->role === 'cr' && $task->user_id === auth()->id())
                <div class="card-actions">
                  <button class="action-btn edit-btn" onclick="openEditModal({{ json_encode($task) }})">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                    </svg>
                  </button>
                  <form action="{{ route('classtask.destroy', $task->id) }}" method="POST"
                    onsubmit="return confirm('Delete this task?')" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="action-btn delete-btn">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                        <line x1="10" y1="11" x2="10" y2="17" />
                        <line x1="14" y1="11" x2="14" y2="17" />
                      </svg>
                    </button>
                  </form>
                </div>
                @endif
              </div>

              <div class="card-timeline">
                <div class="timeline-item">
                  <span class="timeline-icon">📅</span>
                  <div>
                    <p class="timeline-label">Presentation Date</p>
                    <p class="timeline-value">{{ \Carbon\Carbon::parse($task->deadline)->format('F d, Y') }}</p>
                  </div>
                </div>
                <div class="timeline-divider"></div>
                <div class="timeline-item">
                  <span class="timeline-icon">⏰</span>
                  <div>
                    <p class="timeline-label">Slot Time</p>
                    <p class="timeline-value">{{ $task->duration_or_slot }}</p>
                  </div>
                </div>
              </div>

              <div class="card-topic">
                <p class="topic-label">Topic</p>
                <p class="topic-value">{{ $task->topic }}</p>
              </div>

              <div class="buddy-box presentation-buddy">
                <div class="buddy-header">
                  <div class="buddy-mascot-wrapper">
                    <img src="{{ asset('images/menuicons/Buddy.png') }}" alt="Campus Buddy" class="buddy-mascot">
                  </div>
                  <div class="buddy-title-group">
                    <span class="buddy-label">Campus Buddy</span>
                    <span class="buddy-subtitle">Presentation Coach</span>
                  </div>
                </div>

                <div class="buddy-content">
                  @if($task->tip_1)
                  <div class="buddy-tip-item">
                    <span class="tip-icon">🎯</span>
                    <span class="tip-text"><strong>Structure:</strong> {{ $task->tip_1 }}</span>
                  </div>
                  @endif
                  @if($task->tip_2)
                  <div class="buddy-tip-item">
                    <span class="tip-icon">🎤</span>
                    <span class="tip-text"><strong>Delivery:</strong> {{ $task->tip_2 }}</span>
                  </div>
                  @endif
                </div>

                <button class="buddy-help-btn">
                  <span class="help-icon">💬</span>
                  <span>Get Help from Buddy</span>
                </button>
              </div>
            </div>
            @endforeach
          </div>
        </section>

      </div>

    </main>
  </div>

  @include('includes.footer')

  <script>
    // Filter func      ality with smooth animations
    docum ent.q        lectorAll('.filter-btn').forEach(btn         tn.addEventListener('cli        unction () {
        const filter = this.dataset.filter;

        // Update active bu               document.querySelectorAi        tn').forEach(b => b.classList.remove(        e'));
        this.classList.add('active');

        // Animat        ith fade effect
        const            = document.querySelectorAll('.task-section');

        sections.forEach(se               const shouldSh            r === 'all' || section.dataset.se            filter;

          if (shouldShow) {
            section.style.displa            ';
            // Small delay               play:block to apply before ad              
            requestAnimationFrame(() => {
                          style.opa            ;
              section.style             = 'translateY(0)';
            });
                                 section.              y = '0';
            section.sty            rm = 'tra          20                          tTime    t(() => {
              section.style.display =     one';
            }, 300);             }
          });
      });
    });

    // Sc       animation usin    Inte    ection Observer
    const observerOptions = {
      root:      l,
      rootMargin: '0px 0        px 0px',
      threshold: 0.          

    const observer = new IntersectionObs          ntries) => {
      entries.forEach         =                if (entry.isIntersec    ng) {
          entry.target.classList.add('animate-in');
            observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Observe all task       ions, section headers,    nd task    document.querySelectorAll('.task-section, .section-header-wrapper, .task-card, .info-card').forEach(el => {
      observer.observe(el);
    });
  </script>

</body>

</html>