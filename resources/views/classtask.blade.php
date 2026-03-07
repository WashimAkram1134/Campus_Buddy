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
          <div class="hero-deco hero-deco-1"></div>
          <div class="hero-deco hero-deco-2"></div>
          <div class="hero-deco hero-deco-3"></div>
          <div class="hero-deco hero-deco-4"></div>

          <div class="hero-inner">
            <span class="hero-date">{{ now()->format('F j, Y') }}</span>
            <span class="hero-tag">TRACK YOUR PROGRESS</span>
            <h1 class="hero-title">
              <span class="title-main">Class</span>
              <span class="title-accent">Tasks</span>
            </h1>
            <p class="hero-subtitle">Get information, timeline, and AI guidance for all your academic tasks</p>

            @php
            $totalCount = $tasks->count();
            $dueCount = $tasks->filter(function($t) {
            return \Carbon\Carbon::parse($t->deadline)->isFuture();
            })->count();
            $completedCount = $tasks->filter(function($t) {
            return \Carbon\Carbon::parse($t->deadline)->isPast();
            })->count();

            $assignmentCount = $tasks->where('type', 'assignment')->count();
            $quizCount = $tasks->where('type', 'quiz')->count();
            $presentationCount = $tasks->where('type', 'presentation')->count();
            @endphp

            <div class="hero-stats">
              <div class="stat-box">
                <span class="stat-value">{{ $totalCount }}</span>
                <span class="stat-label">Active Tasks</span>
              </div>
              <div class="stat-box">
                <span class="stat-value">{{ $dueCount }}</span>
                <span class="stat-label">Due Task</span>
              </div>
              <div class="stat-box">
                <span class="stat-value">{{ $completedCount }}</span>
                <span class="stat-label">Completed</span>
              </div>
            </div>
          </div>
        </div>
      </section>


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
            <div id="task-{{ $task->id }}" class="info-card assignment-card animate-in">
              <div class="card-status-bar assignment-bar"></div>
              <div class="card-header">
                <div class="card-title-group">
                  <span class="card-course">{{ $task->course_code }}</span>
                  <h3 class="card-title">{{ $task->title }}</h3>
                </div>
                @php
                $createdAt = \Carbon\Carbon::parse($task->created_at);
                $deadline = \Carbon\Carbon::parse($task->deadline);
                $totalSeconds = $createdAt->diffInSeconds($deadline);
                $passedSeconds = $createdAt->diffInSeconds(now());
                $percentage = ($totalSeconds > 0) ? min(100, max(0, round(($passedSeconds / $totalSeconds) * 100))) : 0;
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

                <a href="{{ route('buddy-chat') }}" class="buddy-help-btn">
                  <span class="help-icon">💬</span>
                  <span>Get Help from Buddy</span>
                </a>
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
            <div id="task-{{ $task->id }}" class="info-card quiz-card animate-in">
              <div class="card-status-bar quiz-bar"></div>
              <div class="card-header">
                <div class="card-title-group">
                  <span class="card-course">{{ $task->course_code }}</span>
                  <h3 class="card-title">{{ $task->title }}</h3>
                </div>
                @php
                $createdAt = \Carbon\Carbon::parse($task->created_at);
                $deadline = \Carbon\Carbon::parse($task->deadline);
                $totalSeconds = $createdAt->diffInSeconds($deadline);
                $passedSeconds = $createdAt->diffInSeconds(now());
                $percentage = ($totalSeconds > 0) ? min(100, max(0, round(($passedSeconds / $totalSeconds) * 100))) : 0;
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

                <a href="{{ route('buddy-chat') }}" class="buddy-help-btn">
                  <span class="help-icon">💬</span>
                  <span>Get Help from Buddy</span>
                </a>
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
            <div id="task-{{ $task->id }}" class="info-card presentation-card animate-in">
              <div class="card-status-bar presentation-bar"></div>
              <div class="card-header">
                <div class="card-title-group">
                  <span class="card-course">{{ $task->course_code }}</span>
                  <h3 class="card-title">{{ $task->title }}</h3>
                </div>
                @php
                $createdAt = \Carbon\Carbon::parse($task->created_at);
                $deadline = \Carbon\Carbon::parse($task->deadline);
                $totalSeconds = $createdAt->diffInSeconds($deadline);
                $passedSeconds = $createdAt->diffInSeconds(now());
                $percentage = ($totalSeconds > 0) ? min(100, max(0, round(($passedSeconds / $totalSeconds) * 100))) : 0;
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

                <a href="{{ route('buddy-chat') }}" class="buddy-help-btn">
                  <span class="help-icon">💬</span>
                  <span>Get Help from Buddy</span>
                </a>
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
    // Filter functionality with smooth animations
    document.querySelectorAll('.filter-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        const filter = this.dataset.filter;

        // Update active button
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        // Animate with fade effect
        const sections = document.querySelectorAll('.task-section');

        sections.forEach(section => {
          const shouldShow = filter === 'all' || section.dataset.section === filter;

          if (shouldShow) {
            section.style.display = 'block';
            requestAnimationFrame(() => {
              section.style.opacity = '1';
              section.style.transform = 'translateY(0)';
            });
          } else {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';
            setTimeout(() => {
              section.style.display = 'none';
            }, 300);
          }
        });
      });
    });

    // Scroll animation using Intersection Observer
    const observerOptions = {
      root: null,
      rootMargin: '0px',
      threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-in');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Observe all task sections, section headers, and task cards
    document.querySelectorAll('.task-section, .section-header-wrapper, .task-card, .info-card').forEach(el => {
      observer.observe(el);
    });

    // Deep-linking Highlight Logic
    window.addEventListener('load', () => {
      if (window.location.hash) {
        const targetId = window.location.hash.substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
          // Ensure the section is visible if it was hidden by initial filters
          const section = targetElement.closest('.task-section');
          if (section) {
            section.style.display = 'block';
            section.style.opacity = '1';
            section.style.transform = 'translateY(0)';
          }

          // Trigger highlight animation
          setTimeout(() => {
            targetElement.classList.add('highlight-task');
            targetElement.classList.add('animate-in'); // Ensure it's fully visible

            // Remove highlight after a while
            setTimeout(() => {
              targetElement.classList.remove('highlight-task');
            }, 6000);
          }, 500);
        }
      }
    });
  </script>

  <!-- Edit Task Modal -->
  <div id="editTaskModal" class="modal"
    style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5); overflow:auto;">
    <div class="modal-content"
      style="background:#fff; margin:5% auto; padding:20px; border-radius:12px; width:50%; max-width:600px; box-shadow:0 5px 15px rgba(0,0,0,0.3); position:relative;">
      <div class="modal-header"
        style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #eee; padding-bottom:15px; margin-bottom:15px;">
        <h2 id="editModalTitle">Edit ClassTask</h2>
        <span style="font-size:28px; cursor:pointer;" onclick="closeEditModal()">&times;</span>
      </div>
      <form id="editTaskForm" method="POST">
        @csrf @method('PUT')
        <div class="form-group" style="margin-bottom:15px;">
          <label>Task Type</label>
          <select name="type" id="edit_type" required onchange="updateEditLabels(this.value)"
            style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
            <option value="assignment">Assignment</option>
            <option value="quiz">Quiz</option>
            <option value="presentation">Presentation</option>
          </select>
        </div>
        <div class="form-group" style="margin-bottom:15px;">
          <label>Course Code</label>
          <input type="text" name="course_code" id="edit_course_code" required
            style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
        </div>
        <div class="form-group" style="margin-bottom:15px;">
          <label id="editTitleLabel">Title</label>
          <input type="text" name="title" id="edit_title" required
            style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
        </div>
        <div class="form-group" style="margin-bottom:15px;">
          <label>Topic</label>
          <input type="text" name="topic" id="edit_topic"
            style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
        </div>
        <div style="display:flex; gap:15px; margin-bottom:15px;">
          <div style="flex:1;">
            <label id="editDateLabel">Due Date</label>
            <input type="datetime-local" name="deadline" id="edit_deadline" required
              style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
          </div>
          <div style="flex:1;">
            <label id="editDurationLabel">Duration/Slot</label>
            <input type="text" name="duration_or_slot" id="edit_duration"
              style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
          </div>
        </div>
        <div class="form-group" style="margin-bottom:15px;">
          <label>Buddy Tip 1</label>
          <textarea name="tip_1" id="edit_tip_1" rows="2"
            style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;"></textarea>
        </div>
        <div class="form-group" style="margin-bottom:15px;">
          <label>Buddy Tip 2</label>
          <textarea name="tip_2" id="edit_tip_2" rows="2"
            style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;"></textarea>
        </div>
        <button type="submit" class="submit-btn"
          style="width:100%; padding:14px; background:#00AAFF; color:#fff; border:none; border-radius:10px; font-weight:700; cursor:pointer; margin-top:10px; box-shadow: 0 4px 6px rgba(0, 170, 255, 0.2); transition: all 0.3s ease;">Update
          Task Details</button>
      </form>
    </div>
  </div>

  <style>
    .card-actions {
      display: flex;
      gap: 8px;
      align-items: center;
      margin-left: auto;
    }

    .action-btn {
      background: #f7fafc;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
      padding: 6px;
      cursor: pointer;
      transition: all 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #4a5568;
    }

    .action-btn:hover {
      background: #edf2f7;
      transform: translateY(-1px);
    }

    .edit-btn:hover {
      color: var(--primary);
      border-color: var(--primary);
    }

    .delete-btn:hover {
      color: #e53e3e;
      border-color: #e53e3e;
    }

    .card-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 15px;
      margin-bottom: 20px;
    }

    .card-title-group {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .card-course {
      display: inline-block;
      padding: 2px 8px;
      background: rgba(0, 170, 255, 0.1);
      color: #00AAFF;
      font-size: 11px;
      font-weight: 800;
      border-radius: 4px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      width: fit-content;
    }
  </style>

  <script>
    function openEditModal(task) {
      const modal = document.getElementById('editTaskModal');
      const form = document.getElementById('editTaskForm');

      form.action = `/classtask/${task.id}`;
      document.getElementById('edit_type').value = task.type;
      document.getElementById('edit_course_code').value = task.course_code;
      document.getElementById('edit_title').value = task.title;
      document.getElementById('edit_topic').value = task.topic || '';
      document.getElementById('edit_duration').value = task.duration_or_slot || '';
      document.getElementById('edit_tip_1').value = task.tip_1 || '';
      document.getElementById('edit_tip_2').value = task.tip_2 || '';

      if (task.deadline) {
        const date = new Date(task.deadline).toISOString().slice(0, 16);
        document.getElementById('edit_deadline').value = date;
      }

      updateEditLabels(task.type);
      modal.style.display = 'block';
    }

    function closeEditModal() {
      document.getElementById('editTaskModal').style.display = 'none';
    }

    function updateEditLabels(type) {
      const titleLabel = document.getElementById('editTitleLabel');
      const dateLabel = document.getElementById('editDateLabel');
      const durationLabel = document.getElementById('editDurationLabel');
      const modalTitle = document.getElementById('editModalTitle');

      if (type === 'quiz') {
        modalTitle.innerText = "Edit Quiz";
        titleLabel.innerText = "Quiz Title";
        dateLabel.innerText = "Quiz Date";
        durationLabel.innerText = "Duration";
      } else if (type === 'presentation') {
        modalTitle.innerText = "Edit Presentation";
        titleLabel.innerText = "Presentation Title";
        dateLabel.innerText = "Presentation Date";
        durationLabel.innerText = "Slot Time";
      } else {
        modalTitle.innerText = "Edit Assignment";
        titleLabel.innerText = "Assignment Title";
        dateLabel.innerText = "Due Date";
        durationLabel.innerText = "Status/Progress";
      }
    }

    // Close modal on outside click
    window.onclick = function (event) {
      const modal = document.getElementById('editTaskModal');
      if (event.target == modal) {
        closeEditMod();
      }
    }
  </script>
</body>

</html>