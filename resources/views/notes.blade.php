@extends('layouts.app')

@section('title', 'PDF & Notes | Campus Buddy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/notes.css') }}">
@endpush

@section('content')
    <!-- ================= HERO BANNER ================= -->
    <section class="hero-banner">
        <img src="{{ asset('images/notes/notes_hero.png') }}" alt="PDF & Notes" class="hero-bg">
        <div class="hero-overlay-dark"></div>

        <div class="hero-content-wrapper hero-text animate-up">
            <div class="hero-deco hero-deco-1"></div>
            <div class="hero-deco hero-deco-2"></div>
            <div class="hero-deco hero-deco-3"></div>
            <div class="hero-deco hero-deco-4"></div>

            <div class="hero-content">
                <span class="hero-date">{{ now()->format('F j, Y') }}</span>
                <span class="hero-tag">RESOURCES & MATERIALS</span>
                <h1 class="desktop-only">Access your <span>PDF & Notes</span> <em>anytime, anywhere.</em></h1>
                <h1 class="mobile-only">Access your <span>PDF & Notes</span></h1>

                <p class="hero-desc">
                    Your centralized repository for class materials, lecture slides, and student-contributed notes.
                    Stay organized and prepare for your exams with ease.
                </p>

                <div class="search-container">
                    <div class="filter-bar">
                        <div class="filter-input-group">
                            <input type="text" id="deptFilter" placeholder="Department">
                        </div>
                        <div class="filter-input-group">
                            <input type="text" id="courseFilter" placeholder="Course">
                        </div>
                        <div class="filter-input-group">
                            <input type="text" id="semesterFilter" placeholder="Semester">
                        </div>
                        <button class="search-btn" id="filterBtn">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(session('success'))
        <div class="alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">
            ❌ {{ session('error') }}
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
        .alert-success,
        .alert-error {
            margin: 20px 40px;
            padding: 15px 25px;
            border-radius: 10px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            animation: slideDown 0.5s ease;
            position: relative;
            z-index: 10;
        }

        .alert-success {
            background: #e6fffa;
            border-left: 5px solid #38b2ac;
            color: #2c7a7b;
        }

        .alert-error {
            background: #fff5f5;
            border-left: 5px solid #f56565;
            color: #c53030;
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

    <!-- ================= SPLIT SECTION ================= -->
    <div class="notes-container">

        <!-- LEFT: CLASS MATERIALS (PDFs) -->
        <div class="resources-section pdf-section reveal">
            <div class="section-header">
                <div class="header-title">
                    <div class="icon-box pdf">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                            <polyline points="14 2 14 8 20 8" />
                        </svg>
                    </div>
                    <h2>Class Materials</h2>
                </div>
                <span class="count">{{ $classMaterials->count() }} Files</span>
            </div>
            <div class="resources-grid collapsed" id="pdfGrid">
                @foreach($classMaterials as $index => $material)
                    <div class="resource-card pdf-card animate-up" 
                         data-dept="{{ strtolower($material->department) }}"
                         data-course="{{ strtolower($material->course_code) }}"
                         style="animation-delay: {{ 0.1 * ($index + 1) }}s">
                        <div class="pdf-visual">
                            <div class="pdf-corner"></div>
                            <div class="pdf-logo">{{ strtoupper($material->file_extension) }}</div>
                            <div class="pdf-icon-symbol">
                                @if($material->file_extension == 'pdf')
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                        <polyline points="14 2 14 8 20 8" />
                                    </svg>
                                @else
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                        <line x1="12" y1="8" x2="12" y2="16" />
                                        <line x1="8" y1="12" x2="16" y2="12" />
                                    </svg>
                                @endif
                            </div>
                        </div>
                        <div class="card-info">
                            <h3>{{ $material->title }}</h3>
                            <p>{{ $material->course_code }}</p>
                            <div class="card-meta-row">
                                <span class="size-badge">{{ strtoupper($material->file_extension) }}</span>
                                <div class="card-actions-mini">
                                    <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank"
                                        class="mini-view-btn pdf">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </a>
                                    <a href="{{ asset('storage/' . $material->file_path) }}" download
                                        class="mini-dl-btn pdf">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                            <polyline points="7 10 12 15 17 10" />
                                            <line x1="12" y1="15" x2="12" y2="3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if($classMaterials->isEmpty())
                    <div class="empty-resources">
                        <p>No class materials uploaded yet for your section.</p>
                    </div>
                @endif
            </div>
            <div class="view-more-container">
                <button class="view-more-btn" onclick="toggleGrid('pdfGrid', this)">
                    <span>View More</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- RIGHT: HAND NOTES -->
        <div class="resources-section notes-section reveal">
            <div class="section-header">
                <div class="header-title">
                    <div class="icon-box note">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                        </svg>
                    </div>
                    <h2>Hand Notes</h2>
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <button onclick="openModal('noteUploadModal')" class="upload-trigger-btn">
                        + Upload Note
                    </button>
                    <span class="count">{{ $handNotes->count() }} Files</span>
                </div>
            </div>

            <div class="resources-grid collapsed" id="notesGrid">
                @foreach($handNotes as $index => $material)
                    <div class="resource-card notebook-card animate-up" 
                         data-dept="{{ strtolower($material->department) }}"
                         data-course="{{ strtolower($material->course_code) }}"
                         style="animation-delay: {{ 0.1 * ($index + 1) }}s">
                        <div class="notebook-visual">
                            <div class="notebook-rings">
                                <span></span><span></span><span></span><span></span><span></span>
                            </div>
                            <div class="notebook-body">
                                <div class="notebook-text">{{ strtoupper($material->file_extension) }}</div>
                            </div>
                        </div>
                        <div class="card-info">
                            <h3>{{ $material->title }}</h3>
                            <p>{{ $material->course_code }}</p>
                            <div class="card-meta-row">
                                <span class="size-badge note">{{ strtoupper($material->file_extension) }}</span>
                                <div class="card-actions-mini">
                                    <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank"
                                        class="mini-view-btn note">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </a>
                                    <a href="{{ asset('storage/' . $material->file_path) }}" download
                                        class="mini-dl-btn note">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                            <polyline points="7 10 12 15 17 10" />
                                            <line x1="12" y1="15" x2="12" y2="3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if($handNotes->isEmpty())
                    <div class="empty-resources">
                        <p>No hand notes uploaded yet.</p>
                    </div>
                @endif
            </div>
            <div class="view-more-container">
                <button class="view-more-btn" onclick="toggleGrid('notesGrid', this)">
                    <span>View More</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- ================= PERSONALIZED ROUTINE BANNER ================= -->
    <section class="personalized-banner reveal">
        <div class="banner-content">
            <h2 class="banner-title">Summarize PDF or Notes</h2>
            <a href="{{ route('buddy-chat') }}" class="banner-chat-btn">Chat with Buddy</a>
            <img src="{{ asset('images/menuicons/Buddy.png') }}" alt="Buddy" class="banner-mascot">
        </div>
    </section>

    <!-- ================= HAND NOTE UPLOAD MODAL ================= -->
    <div id="noteUploadModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Upload Hand Note</h2>
                <span class="close" onclick="closeModal('noteUploadModal')">&times;</span>
            </div>
            <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="hand_note">
                <div class="form-group">
                    <label for="note_course_code">Course Code</label>
                    <input type="text" name="course_code" id="note_course_code" placeholder="e.g. CSE 421"
                        required>
                </div>
                <div class="form-group">
                    <label for="note_title">Note Title</label>
                    <input type="text" name="title" id="note_title" placeholder="e.g. Chapter 3 Summary" required>
                </div>
                <div class="form-group">
                    <label for="note_file">Upload File (PDF, PPTX, DOCS - Max 64MB)</label>
                    <input type="file" name="file" id="note_file" accept=".pdf,.pptx,.docx,.doc" required
                        class="file-input">
                </div>
                <button type="submit" class="submit-btn">Upload Note</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openModal(id) {
            document.getElementById(id).style.display = 'flex';
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }

        window.onclick = function (event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        }

        function toggleGrid(gridId, btn) {
            const grid = document.getElementById(gridId);
            const span = btn.querySelector('span');
            const svg = btn.querySelector('svg');

            grid.classList.toggle('collapsed');

            if (grid.classList.contains('collapsed')) {
                span.textContent = 'View More';
                svg.style.transform = 'rotate(0deg)';
            } else {
                span.textContent = 'Show Less';
                svg.style.transform = 'rotate(180deg)';
            }
        }

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

            // ================= SEARCH FILTERING LOGIC =================
            const deptFilter = document.getElementById('deptFilter');
            const courseFilter = document.getElementById('courseFilter');
            const semesterFilter = document.getElementById('semesterFilter');
            const filterBtn = document.getElementById('filterBtn');
            const allCards = document.querySelectorAll('.resource-card');

            function applyFilters() {
                const deptVal = deptFilter.value.toLowerCase().trim();
                const courseVal = courseFilter.value.toLowerCase().trim();
                const semVal = semesterFilter.value.toLowerCase().trim();

                allCards.forEach(card => {
                    const cardDept = card.getAttribute('data-dept') || "";
                    const cardCourse = card.getAttribute('data-course') || "";
                    
                    let isMatch = true;

                    if (deptVal && !cardDept.includes(deptVal)) isMatch = false;
                    if (courseVal && !cardCourse.includes(courseVal)) isMatch = false;

                    if (isMatch) {
                        card.classList.remove('hidden-search');
                    } else {
                        card.classList.add('hidden-search');
                    }
                });

                updateSectionVisiblity();
            }

            function updateSectionVisiblity() {
                const sections = [
                    { gridId: 'pdfGrid', countClass: '.pdf-section .count' },
                    { gridId: 'notesGrid', countClass: '.notes-section .count' }
                ];

                sections.forEach(section => {
                    const grid = document.getElementById(section.gridId);
                    const allCardsInSection = grid.querySelectorAll('.resource-card');
                    const visibleCards = grid.querySelectorAll('.resource-card:not(.hidden-search)');
                    const emptyMsg = grid.querySelector('.search-empty');
                    
                    if (visibleCards.length === 0) {
                        if (!emptyMsg) {
                            const msg = document.createElement('div');
                            msg.className = 'empty-resources search-empty';
                            msg.innerHTML = '<p>No results match your search filters.</p>';
                            grid.appendChild(msg);
                        } else {
                            emptyMsg.style.display = 'block';
                        }
                    } else if (emptyMsg) {
                        emptyMsg.style.display = 'none';
                    }

                    // Update count display
                    const countEl = document.querySelector(section.countClass);
                    if (countEl) {
                        countEl.textContent = `${visibleCards.length} ${visibleCards.length === 1 ? 'File' : 'Files'}`;
                    }
                });
            }

            filterBtn.addEventListener('click', applyFilters);

            // Optional: Live filtering as user types
            [deptFilter, courseFilter, semesterFilter].forEach(input => {
                input.addEventListener('keyup', (e) => {
                    if (e.key === 'Enter') applyFilters();
                });
            });
        });
    </script>
@endpush