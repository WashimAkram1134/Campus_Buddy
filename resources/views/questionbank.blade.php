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
        <div class="filter-container reveal">
            <div class="filter-bar">
                <input type="text" placeholder="Department" class="filter-input">
                <input type="text" placeholder="Course" class="filter-input">
                <input type="text" placeholder="Semester" class="filter-input">
                <button class="filter-btn">Search</button>
            </div>
        </div>

        <div class="question-grid collapsed reveal" id="questionGrid">
            <!-- Sample Questions -->
            <div class="question-card">
                <div class="question-header">
                    <div class="card-meta">
                        <span class="dept">SWE</span>
                        <span class="code">SWE441</span>
                    </div>
                    <div class="title-row">
                        <h3>OOP - Fall 2025</h3>
                        <span class="difficulty medium">Medium</span>
                    </div>
                </div>
                <div class="question-content">
                    <p class="main-question"><strong>Q1: Object-Oriented Principles</strong></p>
                    <ul class="sub-questions">
                        <li>Difference between abstraction and encapsulation?</li>
                        <li>Real-world example using a modern language.</li>
                        <li>Role of access modifiers in data hiding.</li>
                    </ul>
                    <div class="topic-tags">
                        <span>#Abstraction</span>
                        <span>#Encapsulation</span>
                        <span>#Polymorphism</span>
                    </div>
                </div>
                <div class="question-footer">
                    <span class="course">Object Oriented Programming</span>
                    <span class="date">Fall 2025</span>
                </div>
                <div class="card-action-overlay">
                    <button class="action-btn view-btn">View</button>
                    <button class="action-btn download-btn">Download</button>
                </div>
            </div>

            <div class="question-card">
                <div class="question-header">
                    <div class="card-meta">
                        <span class="dept">CSE</span>
                        <span class="code">CSE331</span>
                    </div>
                    <div class="title-row">
                        <h3>Data Structures - Midterm</h3>
                        <span class="difficulty hard">Hard</span>
                    </div>
                </div>
                <div class="question-content">
                    <p class="main-question"><strong>Q3: Sorting & Complexity</strong></p>
                    <ul class="sub-questions">
                        <li>Time complexity of the quicksort algorithm.</li>
                        <li>Analysis of best, average, and worst-cases.</li>
                        <li>Avoiding worst-case using pivot selection.</li>
                    </ul>
                    <div class="topic-tags">
                        <span>#Sorting</span>
                        <span>#QuickSort</span>
                        <span>#Big-O</span>
                    </div>
                </div>
                <div class="question-footer">
                    <span class="course">Data Structures</span>
                    <span class="date">Spring 2026</span>
                </div>
                <div class="card-action-overlay">
                    <button class="action-btn view-btn">View</button>
                    <button class="action-btn download-btn">Download</button>
                </div>
            </div>

            <div class="question-card">
                <div class="question-header">
                    <div class="card-meta">
                        <span class="dept">SWE</span>
                        <span class="code">SWE425</span>
                    </div>
                    <div class="title-row">
                        <h3>Database - Final</h3>
                        <span class="difficulty easy">Easy</span>
                    </div>
                </div>
                <div class="question-content">
                    <p class="main-question"><strong>Q2: Relational Keys & Integrity</strong></p>
                    <ul class="sub-questions">
                        <li>Differences between primary and unique keys.</li>
                        <li>Multiple unique keys implementation in SQL.</li>
                        <li>Foreign keys and referential integrity.</li>
                    </ul>
                    <div class="topic-tags">
                        <span>#Keys</span>
                        <span>#SQL</span>
                        <span>#Integrity</span>
                    </div>
                </div>
                <div class="question-footer">
                    <span class="course">Database Management</span>
                    <span class="date">Spring 2024</span>
                </div>
                <div class="card-action-overlay">
                    <button class="action-btn view-btn">View</button>
                    <button class="action-btn download-btn">Download</button>
                </div>
            </div>

            <div class="question-card">
                <div class="question-header">
                    <div class="card-meta">
                        <span class="dept">DS</span>
                        <span class="code">DS331</span>
                    </div>
                    <div class="title-row">
                        <h3>Algorithms - Quiz 3</h3>
                        <span class="difficulty medium">Medium</span>
                    </div>
                </div>
                <div class="question-content">
                    <p class="main-question"><strong>Q1: Searching & Divide/Conquer</strong></p>
                    <ul class="sub-questions">
                        <li>Implement an iterative binary search algorithm.</li>
                        <li>Time and space complexity analysis.</li>
                        <li>Why binary search requires a sorted array.</li>
                    </ul>
                    <div class="topic-tags">
                        <span>#BinarySearch</span>
                        <span>#Algorithms</span>
                        <span>#Searching</span>
                    </div>
                </div>
                <div class="question-footer">
                    <span class="course">Algorithm Analysis</span>
                    <span class="date">Fall 2023</span>
                </div>
                <div class="card-action-overlay">
                    <button class="action-btn view-btn">View</button>
                    <button class="action-btn download-btn">Download</button>
                </div>
            </div>

            <div class="question-card">
                <div class="question-header">
                    <div class="card-meta">
                        <span class="dept">IT</span>
                        <span class="code">ITE450</span>
                    </div>
                    <div class="title-row">
                        <h3>Computer Networks - Midterm</h3>
                        <span class="difficulty hard">Hard</span>
                    </div>
                </div>
                <div class="question-content">
                    <p class="main-question"><strong>Q4: OSI Model & TCP/IP</strong></p>
                    <ul class="sub-questions">
                        <li>Role of the Transport layer in OSI.</li>
                        <li>Differences between TCP and UDP protocols.</li>
                        <li>IP routing process across subnets.</li>
                    </ul>
                    <div class="topic-tags">
                        <span>#OSI</span>
                        <span>#TCP/IP</span>
                        <span>#Networking</span>
                    </div>
                </div>
                <div class="question-footer">
                    <span class="course">Computer Networks</span>
                    <span class="date">Spring 2025</span>
                </div>
                <div class="card-action-overlay">
                    <button class="action-btn view-btn">View</button>
                    <button class="action-btn download-btn">Download</button>
                </div>
            </div>

            <div class="question-card">
                <div class="question-header">
                    <div class="card-meta">
                        <span class="dept">SWE</span>
                        <span class="code">SWE311</span>
                    </div>
                    <div class="title-row">
                        <h3>Software Engineering - Final</h3>
                        <span class="difficulty medium">Medium</span>
                    </div>
                </div>
                <div class="question-content">
                    <p class="main-question"><strong>Q5: Agile Methodologies</strong></p>
                    <ul class="sub-questions">
                        <li>Core principles of the Agile manifesto.</li>
                        <li>Roles of Scrum Master and Product Owner.</li>
                        <li>Structure of a standard sprint cycle.</li>
                    </ul>
                    <div class="topic-tags">
                        <span>#Agile</span>
                        <span>#Scrum</span>
                        <span>#SDLC</span>
                    </div>
                </div>
                <div class="question-footer">
                    <span class="course">Software Engineering</span>
                    <span class="date">Fall 2024</span>
                </div>
                <div class="card-action-overlay">
                    <button class="action-btn view-btn">View</button>
                    <button class="action-btn download-btn">Download</button>
                </div>
            </div>
        </div>

        <div class="load-more reveal">
            <button class="load-more-btn">Load More Questions</button>
        </div>

        <!-- Buddy Section -->
        <div class="buddy-section reveal">
            <div class="buddy-card">
                <h3>🤖 Need Help with Questions?</h3>
                <p>Based on your department, you might want to check the last 5 OOP quizzes.</p>
                <a href="{{ route('buddy-chat') }}" class="btn">Ask Buddy</a>
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

            // ================= GRID TOGGLE =================
            const grid = document.getElementById('questionGrid');
            const loadMoreBtn = document.querySelector('.load-more-btn');

            if (loadMoreBtn && grid) {
                loadMoreBtn.addEventListener('click', function () {
                    grid.classList.toggle('collapsed');
                    if (grid.classList.contains('collapsed')) {
                        loadMoreBtn.textContent = 'Load More Questions';
                    } else {
                        loadMoreBtn.textContent = 'Show Less';
                    }
                });
            }
        });
    </script>
@endpush