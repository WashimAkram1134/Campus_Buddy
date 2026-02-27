<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Campus Buddy | Question Bank</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/question-bank.css') }}">
</head>
<body>

@include('includes.menu')

<div class="layout">
  <main class="main">
    <!-- ================= HERO BANNER ================= -->
    <section class="hero-banner">
      <img src="{{ asset('images/community/studygroup.jpg') }}" alt="Study Groups" class="hero-bg">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <span class="hero-tag">PRACTICE & EXCEL</span>
        <h1>Master your courses with the <em>Question Bank.</em></h1>
        <p class="hero-desc">
          Access past exams, midterms, finals, and quizzes to prepare effectively.
          Filter by department, course, or specific topics to find exactly what you need.
        </p>
      </div>
    </section>

    <div class="qb-content" id="qb-content">
      <div class="filter-container animate-on-scroll">
        <div class="filter-bar">
          <input type="text" placeholder="Department" class="filter-input">
          <input type="text" placeholder="Course" class="filter-input">
          <input type="text" placeholder="Topic" class="filter-input">
          <button class="filter-btn">Search</button>
        </div>
      </div>

    <div class="question-grid">
      <!-- Sample Questions -->
      <div class="question-card">
        <div class="question-header">
          <h3>OOP - Fall 2025</h3>
          <span class="difficulty medium">Medium</span>
        </div>
        <div class="question-content">
          <p class="main-question"><strong>Q1: Object-Oriented Design Principles</strong></p>
          <ul class="sub-questions">
            <li>What is the difference between abstraction and encapsulation?</li>
            <li>Provide a real-world example demonstrating both concepts using a modern language.</li>
            <li>Explain the role of access modifiers in enforcing data hiding.</li>
          </ul>
          <div class="topic-tags">
            <span>#Abstraction</span>
            <span>#Encapsulation</span>
            <span>#Polymorphism</span>
          </div>
        </div>
        <div class="question-footer">
          <span class="course">Object Oriented Programming</span>
          <span class="date">2 days ago</span>
        </div>
        <div class="card-action-overlay">
          <button class="action-btn view-btn">View</button>
          <button class="action-btn download-btn">Download</button>
        </div>
      </div>

      <div class="question-card">
        <div class="question-header">
          <h3>Data Structures - Midterm</h3>
          <span class="difficulty hard">Hard</span>
        </div>
        <div class="question-content">
          <p class="main-question"><strong>Q3: Sorting Algorithms & Complexity</strong></p>
          <ul class="sub-questions">
            <li>Explain the detailed time complexity of the quicksort algorithm.</li>
            <li>Provide a complete analysis of its best, average, and worst-case scenarios.</li>
            <li>How can the worst-case scenario be avoided using pivot selection methods?</li>
          </ul>
          <div class="topic-tags">
            <span>#Sorting</span>
            <span>#QuickSort</span>
            <span>#Big-O</span>
          </div>
        </div>
        <div class="question-footer">
          <span class="course">Data Structures</span>
          <span class="date">1 week ago</span>
        </div>
        <div class="card-action-overlay">
          <button class="action-btn view-btn">View</button>
          <button class="action-btn download-btn">Download</button>
        </div>
      </div>

      <div class="question-card">
        <div class="question-header">
          <h3>Database - Final</h3>
          <span class="difficulty easy">Easy</span>
        </div>
        <div class="question-content">
          <p class="main-question"><strong>Q2: Relational Database Keys & Integrity</strong></p>
          <ul class="sub-questions">
            <li>What are the core differences between a primary key and a unique key?</li>
            <li>Can a table have multiple unique keys? Explain with a short SQL snippet.</li>
            <li>How do foreign keys maintain referential integrity between tables?</li>
          </ul>
          <div class="topic-tags">
            <span>#Keys</span>
            <span>#SQL</span>
            <span>#Integrity</span>
          </div>
        </div>
        <div class="question-footer">
          <span class="course">Database Management</span>
          <span class="date">3 days ago</span>
        </div>
        <div class="card-action-overlay">
          <button class="practice-btn">Practice Now <span>&rarr;</span></button>
        </div>
      </div>

      <div class="question-card">
        <div class="question-header">
          <h3>Algorithms - Quiz 3</h3>
          <span class="difficulty medium">Medium</span>
        </div>
        <div class="question-content">
          <p class="main-question"><strong>Q1: Searching & Divide-and-Conquer</strong></p>
          <ul class="sub-questions">
            <li>Implement a binary search algorithm either recursively or iteratively.</li>
            <li>Explain its time and space complexity analysis mathematically.</li>
            <li>Why does binary search require a sorted array to function correctly?</li>
          </ul>
          <div class="topic-tags">
            <span>#BinarySearch</span>
            <span>#Algorithms</span>
            <span>#Searching</span>
          </div>
        </div>
        <div class="question-footer">
          <span class="course">Algorithm Analysis</span>
          <span class="date">5 days ago</span>
        </div>
        <div class="card-action-overlay">
          <button class="practice-btn">Practice Now <span>&rarr;</span></button>
        </div>
      </div>
    </div>

    <div class="load-more">
      <button class="load-more-btn">Load More Questions</button>
    </div>

    <!-- Buddy Section -->
    <div class="buddy-section animate-on-scroll">
      <div class="buddy-card">
        <h3>🤖 Need Help with Questions?</h3>
        <p>Based on your department, you might want to check the last 5 OOP quizzes.</p>
        <a href="#" class="btn">Ask Buddy</a>
      </div>
    </div>
    
    </div> <!-- End qb-content -->

  </main>
</div>

@include('includes.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Animate the section itself
                entry.target.classList.add('animate-in');

                // Animate children (cards)
                const children = entry.target.querySelectorAll('.question-card');
                children.forEach(child => {
                    child.classList.add('animate-in');
                });

                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    // Observe all animated sections
    const sections = document.querySelectorAll('.animate-on-scroll, .question-grid');
    sections.forEach(section => observer.observe(section));
});
</script>

</body>
</html>
