@extends('layouts.app')

@section('title', 'Class Tasks | Campus Buddy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/classtask.css') }}">
@endpush

@section('content')
    <div class="page-container">
        <!-- ================= HERO SECTION ================= -->
        <section class="hero-banner reveal active">
            <img src="{{ asset('images/classtask/classtask_hero.jpg') }}" alt="Class Tasks" class="hero-bg">
            <div class="hero-overlay-dark"></div>

            <div class="hero-content-wrapper hero-text animate-up">
                <div class="hero-deco hero-deco-1"></div>
                <div class="hero-deco hero-deco-2"></div>
                <div class="hero-deco hero-deco-3"></div>
                <div class="hero-deco hero-deco-4"></div>

                <div class="hero-content">
                    <span class="hero-date">{{ now()->format('F j, Y') }}</span>
                    <span class="hero-tag">ORGANIZATION & DEADLINES</span>
                    <h1>Stay Ahead of Your <span>Class Tasks.</span></h1>
                    <p class="hero-desc">
                        Your personalized dashboard for tracking assignments, quizzes, and presentations.
                        Never miss a deadline with Buddy's smart reminders and organization tools.
                    </p>
                </div>
            </div>
        </section>

        @if(session('success'))
            <div class="alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                ❌ Please correct the following errors:
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <style>
            .alert-success {
                margin: 20px 40px;
                padding: 15px 25px;
                background: #e6fffa;
                border-left: 5px solid #38b2ac;
                border-radius: 10px;
                color: #2c7a7b;
                font-weight: 600;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
                animation: slideDown 0.5s ease;
            }

            .alert-error {
                margin: 20px 40px;
                padding: 15px 25px;
                background: #fff5f5;
                border-left: 5px solid #f56565;
                border-radius: 10px;
                color: #c53030;
                font-weight: 600;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
                animation: slideDown 0.5s ease;
            }

            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>

        <!-- ================= TASK OVERVIEW ================= -->
        <div class="task-page-content">
            <div class="task-stats-row">
                <div class="stat-card active-tasks reveal">
                    <div class="stat-icon"><i class="fas fa-tasks"></i></div>
                    <div class="stat-info">
                        <h3>{{ $tasks->where('progress', '!=', 'Completed')->count() }}</h3>
                        <p>Active Tasks</p>
                    </div>
                </div>
                <div class="stat-card due-tasks reveal">
                    <div class="stat-icon"><i class="fas fa-clock"></i></div>
                    <div class="stat-info">
                        <h3>{{ $tasks->where('deadline', '<', now()->addDays(3))->where('deadline', '>', now())->count() }}
                        </h3>
                        <p>Due Soon</p>
                    </div>
                </div>
                <div class="stat-card completed-tasks reveal">
                    <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-info">
                        <h3>{{ $tasks->where('progress', 'Completed')->count() }}</h3>
                        <p>Completed</p>
                    </div>
                </div>
            </div>

            <!-- ================= MAIN CONTENT ================= -->
            <div class="main-split">
                <!-- LEFT: TASK LIST -->
                <div class="task-list-section">
                    <div class="section-title-row reveal">
                        <h2>Ongoing <span>ClassTasks</span></h2>
                        <div class="task-filters">
                            <button class="filter-btn active" data-filter="all">All</button>
                            <button class="filter-btn" data-filter="assignment">Assignments</button>
                            <button class="filter-btn" data-filter="quiz">Quizzes</button>
                            <button class="filter-btn" data-filter="presentation">Presentations</button>
                        </div>
                    </div>

                    <div class="tasks-grid" id="tasksGrid">
                        @foreach($tasks as $task)
                            <div class="task-item reveal {{ $task->type }}" data-type="{{ $task->type }}">
                                <div class="task-type-badge">{{ ucfirst($task->type) }}</div>
                                <div class="task-main">
                                    <div class="task-header">
                                        <h3>{{ $task->title }}</h3>
                                        <span class="course-code">{{ $task->course_code }}</span>
                                    </div>
                                    <p class="task-topic">{{ $task->topic }}</p>

                                    <div class="task-meta">
                                        <div class="meta-item deadline">
                                            <i class="far fa-calendar-alt"></i>
                                            <span>Deadline: {{ \Carbon\Carbon::parse($task->deadline)->format('M d, h:i A') }}</span>
                                        </div>
                                        @if($task->duration_or_slot)
                                            <div class="meta-item duration">
                                                <i class="far fa-clock"></i>
                                                <span>{{ $task->duration_or_slot }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="buddy-tips-mini">
                                        @if($task->tip_1)
                                            <div class="tip-pill"><i class="fas fa-lightbulb"></i> {{ $task->tip_1 }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="task-actions">
                                    <div class="progress-info">
                                        <span class="status-label">Status</span>
                                        <span class="status-value {{ str_replace(' ', '-', strtolower($task->progress)) }}">{{ $task->progress }}</span>
                                    </div>
                                    <button class="view-task-btn" onclick="openTaskDetails({{ json_encode($task) }})">View
                                        Details</button>
                                </div>
                            </div>
                        @endforeach

                        @if($tasks->isEmpty())
                            <div class="no-tasks-box reveal">
                                <img src="{{ asset('images/icons/empty_tasks.png') }}" alt="No tasks">
                                <p>Hooray! No pending tasks found for your section.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- RIGHT: BUDDY ASSISTANT SIDEBAR -->
                <div class="buddy-sidebar">
                    <div class="buddy-card reveal">
                        <div class="buddy-header">
                            <img src="{{ asset('images/menuicons/Buddy.png') }}" alt="Buddy" class="buddy-img">
                            <div class="buddy-greeting">
                                <h4>Buddy AI</h4>
                                <span>Study Assistant</span>
                            </div>
                        </div>
                        <div class="buddy-body">
                            <p class="buddy-prompt">"I'm keeping an eye on your <strong>{{ $task->course_code ?? 'upcoming' }}</strong> tasks. Would you like me to find relevant notes for these topics?"</p>
                            <div class="buddy-actions">
                                <button class="buddy-btn primary">Find Notes</button>
                                <button class="buddy-btn secondary">Set Reminder</button>
                            </div>
                        </div>
                    </div>

                    <div class="calendar-mini reveal">
                        <div class="cal-header">
                            <i class="fas fa-calendar-day"></i>
                            <h4>Upcoming Deadlines</h4>
                        </div>
                        <div class="deadline-items">
                            @foreach($tasks->where('deadline', '>', now())->sortBy('deadline')->take(3) as $task)
                                <div class="deadline-item">
                                    <div class="date-box">
                                        <span class="day">{{ \Carbon\Carbon::parse($task->deadline)->format('d') }}</span>
                                        <span class="month">{{ \Carbon\Carbon::parse($task->deadline)->format('M') }}</span>
                                    </div>
                                    <div class="item-info">
                                        <h5>{{ $task->title }}</h5>
                                        <p>{{ $task->course_code }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= TASK DETAILS MODAL ================= -->
    <div id="taskModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeTaskModal()">&times;</span>
            <div class="modal-body" id="modalBody">
                <!-- Content dynamically typed by JS -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ================= REVEAL ANIMATIONS =================
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal').forEach(el => {
                observer.observe(el);
            });

            // ================= FILTERING LOGIC =================
            const filterBtns = document.querySelectorAll('.filter-btn');
            const taskItems = document.querySelectorAll('.task-item');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    const type = btn.getAttribute('data-filter');

                    taskItems.forEach(item => {
                        if (type === 'all' || item.getAttribute('data-type') === type) {
                            item.style.display = 'flex';
                            item.classList.remove('active');
                            setTimeout(() => item.classList.add('active'), 50);
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });

        // ================= MODAL LOGIC =================
        function openTaskDetails(task) {
            const modal = document.getElementById('taskModal');
            const body = document.getElementById('modalBody');

            body.innerHTML = `
                <div class="modal-header-info">
                    <span class="modal-type-badge ${task.type}">${task.type.toUpperCase()}</span>
                    <h2>${task.title}</h2>
                    <span class="modal-course">${task.course_code}</span>
                </div>
                
                <div class="modal-grid">
                    <div class="modal-info-item">
                        <label>Topic:</label>
                        <p>${task.topic || 'General'}</p>
                    </div>
                    <div class="modal-info-item">
                        <label>Deadline:</label>
                        <p>${new Date(task.deadline).toLocaleString()}</p>
                    </div>
                </div>

                <div class="buddy-wisdom-section">
                    <h4><img src="{{ asset('images/menuicons/Buddy.png') }}" width="24"> Buddy's Personal Tips</h4>
                    <div class="tips-container">
                        <div class="tip-card">
                            <h5>Key Focus</h5>
                            <p>${task.tip_1 || 'No specific tip provided yet.'}</p>
                        </div>
                        <div class="tip-card">
                            <h5>Pro-Tip</h5>
                            <p>${task.tip_2 || 'Stay focused and manage your time!'}</p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer-actions">
                    <a href="{{ route('buddy-chat') }}" class="modal-btn chat-btn">Discuss with Buddy</a>
                    <button class="modal-btn close-btn" onclick="closeTaskModal()">Close</button>
                </div>
            `;

            modal.style.display = 'flex';
            setTimeout(() => modal.classList.add('open'), 10);
        }

        function closeTaskModal() {
            const modal = document.getElementById('taskModal');
            modal.classList.remove('open');
            setTimeout(() => modal.style.display = 'none', 300);
        }

        window.onclick = function (event) {
            const modal = document.getElementById('taskModal');
            if (event.target == modal) {
                closeTaskModal();
            }
        }
    </script>
@endpush