@extends('layouts.app')

@section('title', 'Question Bank | Campus Buddy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/question-bank.css') }}">
@endpush

@section('content')
    <!-- ================= HERO BANNER ================= -->
    <section class="hero-banner">
        <img src="{{ asset('images/community/studygroup.jpg') }}" alt="Study Groups" class="hero-bg">
        <div class="hero-overlay-dark"></div>

        <div class="hero-content-wrapper hero-text animate-up">
            <div class="hero-deco hero-deco-1"></div>
            <div class="hero-deco hero-deco-2"></div>
            <div class="hero-deco hero-deco-3"></div>
            <div class="hero-deco hero-deco-4"></div>

            <div class="hero-content">
                <span class="hero-date">{{ now()->format('F j, Y') }}</span>
                <span class="hero-tag">PRACTICE & EXCEL</span>
                <h1>Master your courses with the <span>Question Bank.</span></h1>
                <p class="hero-desc">
                    Access past exams, midterms, finals, and quizzes to prepare effectively.
                    Filter by department, course, or specific topics to find exactly what you need.
                </p>
            </div>
        </div>
    </section>

    <div class="qb-content" id="qb-content">
        @if (session('success'))
            <div class="alert alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="filter-container reveal">
            <div class="filter-bar">
                <form action="{{ route('question-bank') }}" method="GET" style="display: flex; gap: 15px; flex: 1;">
                    <input type="text" name="department" placeholder="Department" class="filter-input" value="{{ request('department') }}">
                    <input type="text" name="course" placeholder="Course" class="filter-input" value="{{ request('course') }}">
                    <input type="text" name="semester" placeholder="Semester" class="filter-input" value="{{ request('semester') }}">
                    <button type="submit" class="filter-btn">Search</button>
                </form>
                <button type="button" id="openUploadBtn" class="upload-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/>
                    </svg>
                    Upload Question
                </button>
            </div>
        </div>

        <div class="question-grid reveal" id="questionGrid">
            @forelse($questions as $question)
                <div class="question-card animate-in trigger-view" 
                     data-dept="{{ $question->department }}"
                     data-code="{{ $question->course_code }}"
                     data-title="{{ $question->title }}"
                     data-difficulty="{{ $question->difficulty }}"
                     data-heading="{{ $question->question_heading }}"
                     data-subs="{{ $question->sub_questions }}"
                     data-tags="{{ $question->tags }}"
                     data-course="{{ $question->course_name }}"
                     data-date="{{ $question->year_semester }}">
                    <div class="question-header">
                        <div class="card-meta">
                            <span class="dept">{{ $question->department }}</span>
                            <span class="code">{{ $question->course_code }}</span>
                        </div>
                        <div class="title-row">
                            <h3>{{ $question->title }}</h3>
                            <span class="difficulty {{ strtolower($question->difficulty) }}">{{ $question->difficulty }}</span>
                        </div>
                    </div>
                    <div class="question-content">
                        <p class="main-question"><strong>{{ $question->question_heading }}</strong></p>
                        <ul class="sub-questions">
                            @foreach(explode("\n", $question->sub_questions) as $sub)
                                @if(trim($sub))
                                    <li>{{ trim($sub) }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="topic-tags">
                            @if($question->tags)
                                @foreach(explode(',', $question->tags) as $tag)
                                    <span>#{{ trim($tag) }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="question-footer">
                        <span class="course">{{ $question->course_name }}</span>
                        <span class="date">{{ $question->year_semester }}</span>
                    </div>
                    <div class="card-action-overlay">
                        <button type="button" class="action-btn view-btn">View</button>
                        @if($question->file_path)
                            <a href="{{ asset('storage/' . $question->file_path) }}" 
                               class="action-btn download-btn stop-prop" 
                               download 
                               onclick="event.stopPropagation()">
                                Download
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <p>No questions found matching your criteria.</p>
                </div>
            @endforelse
        </div>

        <div class="load-more reveal">
            <button class="load-more-btn">Load More Questions</button>
        </div>

        <!-- Buddy Section -->
        <div class="buddy-section reveal">
            <div class="buddy-card">
                <h3>🤖 Need Help with Questions?</h3>
                <p>Based on your department, you might want to check the latest questions.</p>
                <a href="{{ route('buddy-chat') }}" class="btn">Ask Buddy</a>
            </div>
        </div>
    </div>

    <!-- Upload Modal -->
    <div id="uploadModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Upload Question Bank</h2>
                <button type="button" class="close-btn" id="closeUploadModal">&times;</button>
            </div>
            <form action="{{ route('question-bank.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Department</label>
                        <input type="text" name="department" placeholder="e.g., SWE" required>
                    </div>
                    <div class="form-group">
                        <label>Course Code</label>
                        <input type="text" name="course_code" placeholder="e.g., SWE441" required>
                    </div>
                    <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" name="course_name" placeholder="e.g., Object Oriented Programming" required>
                    </div>
                    <div class="form-group">
                        <label>Semester/Year</label>
                        <input type="text" name="year_semester" placeholder="e.g., Fall 2025" required>
                    </div>
                    <div class="form-group full-width">
                        <label>Card Title</label>
                        <input type="text" name="title" placeholder="e.g., OOP - Midterm" required>
                    </div>
                    <div class="form-group">
                        <label>Difficulty</label>
                        <select name="difficulty">
                            <option value="Easy">Easy</option>
                            <option value="Medium" selected>Medium</option>
                            <option value="Hard">Hard</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tags (comma separated)</label>
                        <input type="text" name="tags" placeholder="Abstraction, Polymorphism">
                    </div>
                    <div class="form-group full-width">
                        <label>Question Heading</label>
                        <input type="text" name="question_heading" placeholder="e.g., Q1: Object-Oriented Principles" required>
                    </div>
                    <div class="form-group full-width">
                        <label>Sub Questions (One per line)</label>
                        <textarea name="sub_questions" rows="4" placeholder="Difference between abstraction and encapsulation?" required></textarea>
                    </div>
                    <div class="form-group full-width">
                        <label>Attach PDF (Optional)</label>
                        <input type="file" name="file" accept=".pdf">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="submit-btn">Publish Question Card</button>
                </div>
            </form>
        </div>
    <!-- View Question Modal -->
    <div id="viewQuestionModal" class="modal">
        <div class="modal-content view-modal-content">
            <div class="modal-header">
                <h2>Question Details</h2>
                <button type="button" class="close-btn" onclick="closeModal('viewQuestionModal')">&times;</button>
            </div>
            <div class="view-card-wrapper">
                <div class="question-card static-view">
                    <div class="question-header">
                        <div class="card-meta">
                            <span class="dept" id="viewDept"></span>
                            <span class="code" id="viewCode"></span>
                        </div>
                        <div class="title-row">
                            <h3 id="viewTitle"></h3>
                            <span class="difficulty" id="viewDifficulty"></span>
                        </div>
                    </div>
                    <div class="question-content">
                        <p class="main-question"><strong id="viewHeading"></strong></p>
                        <ul class="sub-questions" id="viewSubs"></ul>
                        <div class="topic-tags" id="viewTags"></div>
                    </div>
                    <div class="question-footer">
                        <span class="course" id="viewCourse"></span>
                        <span class="date" id="viewDate"></span>
                    </div>
                </div>
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
                        // Animate cards if present
                        const children = entry.target.querySelectorAll('.question-card');
                        children.forEach(child => child.classList.add('animate-in'));
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal').forEach(el => {
                observer.observe(el);
            });

            // ================= MODAL LOGICAL (EVENT DELEGATION) =================
            const uploadModal = document.getElementById('uploadModal');
            const viewModal = document.getElementById('viewQuestionModal');
            const openBtn = document.getElementById('openUploadBtn');
            const closeBtn = document.getElementById('closeUploadModal');

            if (openBtn && uploadModal) {
                openBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    uploadModal.style.display = 'flex';
                });
            }

            if (closeBtn && uploadModal) {
                closeBtn.addEventListener('click', () => {
                    uploadModal.style.display = 'none';
                });
            }

            // Global click listener for cards and buttons
            document.addEventListener('click', (e) => {
                const viewTrigger = e.target.closest('.trigger-view');
                
                if (viewTrigger) {
                    e.preventDefault();
                    e.stopPropagation();
                    const data = viewTrigger.dataset;
                    
                    // Populate Modal
                    const fields = {
                        'viewDept': data.dept,
                        'viewCode': data.code,
                        'viewTitle': data.title,
                        'viewDifficulty': data.difficulty,
                        'viewHeading': data.heading,
                        'viewCourse': data.course,
                        'viewDate': data.date
                    };

                    for (const [id, value] of Object.entries(fields)) {
                        const el = document.getElementById(id);
                        if (el) el.textContent = value || '';
                    }

                    // Handle Difficulty Class
                    const diffEl = document.getElementById('viewDifficulty');
                    if (diffEl && data.difficulty) {
                        diffEl.className = `difficulty ${data.difficulty.toLowerCase()}`;
                    }

                    // Subs
                    const subsList = document.getElementById('viewSubs');
                    if (subsList && data.subs) {
                        subsList.innerHTML = '';
                        // Split by any newline sequence
                        data.subs.split(/\r?\n/).forEach(sub => {
                            if (sub.trim()) {
                                const li = document.createElement('li');
                                li.textContent = sub.trim();
                                subsList.appendChild(li);
                            }
                        });
                    }

                    // Tags
                    const tagsDiv = document.getElementById('viewTags');
                    if (tagsDiv) {
                        tagsDiv.innerHTML = '';
                        if (data.tags) {
                            data.tags.split(',').forEach(tag => {
                                const span = document.createElement('span');
                                span.textContent = `#${tag.trim()}`;
                                tagsDiv.appendChild(span);
                            });
                        }
                    }

                    if (viewModal) viewModal.style.display = 'flex';
                }

                // Handle outside clicks
                if (e.target === uploadModal) uploadModal.style.display = 'none';
                if (e.target === viewModal) viewModal.style.display = 'none';
            });
        });

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }
    </script>
@endpush