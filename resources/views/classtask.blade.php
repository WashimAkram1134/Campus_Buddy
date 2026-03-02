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
      <img src="{{ asset('images/community/dashboardBG.jpg') }}" alt="Class Tasks" class="hero-bg">
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

    <!-- ================= FILTER BAR ================= -->
    <div class="filter-bar-wrapper">
      <div class="filter-bar">
        <button class="filter-btn active" data-filter="all">
          <span class="filter-icon">📋</span>
          <span>All Tasks</span>
        </button>
        <button class="filter-btn" data-filter="assignments">
          <span class="filter-icon">📋</span>
          <span>Assignments</span>
        </button>
        <button class="filter-btn" data-filter="quizzes">
          <span class="filter-icon">❓</span>
          <span>Quizzes</span>
        </button>
        <button class="filter-btn" data-filter="presentations">
          <span class="filter-icon">🎤</span>
          <span>Presentations</span>
        </button>
      </div>
    </div>

    <!-- ================= MAIN CONTENT ================= -->
    <div class="classtask-container">
      
      <!-- SECTION 1: ASSIGNMENTS -->
      <section class="task-section assignments-section" data-section="assignments">
        <div class="section-header-wrapper">
          <div class="section-icon assignment-icon">📋</div>
          <div class="section-title-group">
            <h2 class="section-title">Assignments</h2>
            <p class="section-desc">Complete your coursework with AI guidance to help you succeed</p>
          </div>
          <div class="section-badge">3 Active</div>
        </div>

        <div class="task-cards-grid">
          <!-- Assignment Card 1 -->
          <div class="info-card assignment-card">
            <div class="card-status-bar assignment-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Data Structures & Algorithms</h3>
              <span class="card-progress">70%</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Due</p>
                  <p class="timeline-value">March 15, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Remaining</p>
                  <p class="timeline-value">8 days</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Tree Traversal & Sorting Algorithms</p>
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
                <div class="buddy-tip-item">
                  <span class="tip-icon">📚</span>
                  <span class="tip-text">Break the assignment into smaller tasks. Start with understanding tree structures, then practice different traversal methods (DFS, BFS).</span>
                </div>
                <div class="buddy-tip-item">
                  <span class="tip-icon">⚡</span>
                  <span class="tip-text">Use recursion wisely! Focus on time complexity analysis.</span>
                </div>
              </div>
              
              <button class="buddy-help-btn">
                <span class="help-icon">💬</span>
                <span>Get Help from Buddy</span>
              </button>
            </div>
          </div>

          <!-- Assignment Card 2 -->
          <div class="info-card assignment-card">
            <div class="card-status-bar assignment-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Database Design Project</h3>
              <span class="card-progress">45%</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Due</p>
                  <p class="timeline-value">March 22, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Remaining</p>
                  <p class="timeline-value">15 days</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Relational Database Normalization</p>
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
                <div class="buddy-tip-item">
                  <span class="tip-icon">🎯</span>
                  <span class="tip-text">Focus on normalization forms (1NF, 2NF, 3NF). Design your ER diagram first before implementing.</span>
                </div>
                <div class="buddy-tip-item">
                  <span class="tip-icon">✅</span>
                  <span class="tip-text">Check primary and foreign keys are correctly set up. Avoid redundancy by following normalization rules.</span>
                </div>
              </div>
              
              <button class="buddy-help-btn">
                <span class="help-icon">💬</span>
                <span>Get Help from Buddy</span>
              </button>
            </div>
          </div>

          <!-- Assignment Card 3 -->
          <div class="info-card assignment-card">
            <div class="card-status-bar assignment-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Web Development Homework</h3>
              <span class="card-progress">90%</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Due</p>
                  <p class="timeline-value">March 10, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Remaining</p>
                  <p class="timeline-value">2 days</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Responsive Design with CSS Grid & Flexbox</p>
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
                <div class="buddy-tip-item">
                  <span class="tip-icon">📱</span>
                  <span class="tip-text">Remember the mobile-first approach! Use CSS Grid for 2D layouts and flexbox for 1D components.</span>
                </div>
                <div class="buddy-tip-item">
                  <span class="tip-icon">🔍</span>
                  <span class="tip-text">Test on different screen sizes using browser dev tools. Consider viewport meta tags and media queries.</span>
                </div>
              </div>
              
              <button class="buddy-help-btn">
                <span class="help-icon">💬</span>
                <span>Get Help from Buddy</span>
              </button>
            </div>
          </div>
        </div>
      </section>

      <!-- SECTION 2: QUIZZES -->
      <section class="task-section quizzes-section" data-section="quizzes">
        <div class="section-header-wrapper">
          <div class="section-icon quiz-icon">❓</div>
          <div class="section-title-group">
            <h2 class="section-title">Quizzes</h2>
            <p class="section-desc">Prepare and review quiz topics with expert guidance</p>
          </div>
          <div class="section-badge">2 Active</div>
        </div>

        <div class="task-cards-grid">
          <!-- Quiz Card 1 -->
          <div class="info-card quiz-card">
            <div class="card-status-bar quiz-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Operating Systems Midterm Quiz</h3>
              <span class="card-progress quiz-progress">Not Started</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Quiz Date</p>
                  <p class="timeline-value">March 12, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Duration</p>
                  <p class="timeline-value">1 hour</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Process Management, Scheduling & Deadlock</p>
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
                <div class="buddy-tip-item">
                  <span class="tip-icon">🔄</span>
                  <span class="tip-text">Review scheduling algorithms (FCFS, SJF, Round Robin, Priority). Master deadlock conditions and prevention strategies.</span>
                </div>
                <div class="buddy-tip-item">
                  <span class="tip-icon">⏱️</span>
                  <span class="tip-text">Practice with real-world examples and state diagrams. Allocate 20 mins per section for time management.</span>
                </div>
              </div>
              
              <button class="buddy-help-btn">
                <span class="help-icon">💬</span>
                <span>Get Help from Buddy</span>
              </button>
            </div>
          </div>

          <!-- Quiz Card 2 -->
          <div class="info-card quiz-card">
            <div class="card-status-bar quiz-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Discrete Mathematics Pop Quiz</h3>
              <span class="card-progress quiz-progress">In Progress</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Quiz Date</p>
                  <p class="timeline-value">March 11, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Attempts Left</p>
                  <p class="timeline-value">1 out of 2</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Graph Theory, Boolean Algebra & Logic</p>
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
                <div class="buddy-tip-item">
                  <span class="tip-icon">📊</span>
                  <span class="tip-text">Master graph representations (adjacency matrix vs adjacency list). Practice truth tables and De Morgan's laws.</span>
                </div>
                <div class="buddy-tip-item">
                  <span class="tip-icon">🧠</span>
                  <span class="tip-text">Understand propositional logic, quantifiers, and predicates. Do practice problems on graph traversal (DFS, BFS).</span>
                </div>
              </div>
              
              <button class="buddy-help-btn">
                <span class="help-icon">💬</span>
                <span>Get Help from Buddy</span>
              </button>
            </div>
          </div>
        </div>
      </section>

      <!-- SECTION 3: PRESENTATIONS -->
      <section class="task-section presentations-section" data-section="presentations">
        <div class="section-header-wrapper">
          <div class="section-icon presentation-icon">🎤</div>
          <div class="section-title-group">
            <h2 class="section-title">Presentations</h2>
            <p class="section-desc">Learn presentation skills and get feedback on your topics</p>
          </div>
          <div class="section-badge">2 Active</div>
        </div>

        <div class="task-cards-grid">
          <!-- Presentation Card 1 -->
          <div class="info-card presentation-card">
            <div class="card-status-bar presentation-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Artificial Intelligence Seminar</h3>
              <span class="card-progress">60%</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Presentation Date</p>
                  <p class="timeline-value">March 18, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Slot Time</p>
                  <p class="timeline-value">2:00 PM - 2:30 PM</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Machine Learning Models in Healthcare Applications</p>
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
                <div class="buddy-tip-item">
                  <span class="tip-icon">🎯</span>
                  <span class="tip-text"><strong>Structure:</strong> Introduction → Problem → Solution → Results → Conclusion. Use visuals & diagrams for clarity.</span>
                </div>
                <div class="buddy-tip-item">
                  <span class="tip-icon">🎤</span>
                  <span class="tip-text"><strong>Delivery:</strong> Practice 3-4 times. Keep slides to 10-12 max. Speak clearly, maintain eye contact, handle Q&A confidently.</span>
                </div>
              </div>
              
              <button class="buddy-help-btn">
                <span class="help-icon">💬</span>
                <span>Get Help from Buddy</span>
              </button>
            </div>
          </div>

          <!-- Presentation Card 2 -->
          <div class="info-card presentation-card">
            <div class="card-status-bar presentation-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Cloud Computing Architecture</h3>
              <span class="card-progress">30%</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Presentation Date</p>
                  <p class="timeline-value">March 25, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Slot Time</p>
                  <p class="timeline-value">3:00 PM - 3:30 PM</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Microservices: Design Patterns & Scalability</p>
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
                <div class="buddy-tip-item">
                  <span class="tip-icon">🏗️</span>
                  <span class="tip-text">Use live demos or video recordings for impact. Explain API communication between services clearly with diagrams.</span>
                </div>
                <div class="buddy-tip-item">
                  <span class="tip-icon">⚙️</span>
                  <span class="tip-text">Include deployment considerations and auto-scaling strategies. Discuss pros/cons vs monolithic architecture and prepare for Q&A.</span>
                </div>
              </div>
              
              <button class="buddy-help-btn">
                <span class="help-icon">💬</span>
                <span>Get Help from Buddy</span>
              </button>
            </div>
          </div>
        </div>
      </section>

    </div>

  </main>
</div>

@include('includes.footer')

<script>
  // Filter functionality
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const filter = this.dataset.filter;
      
      // Update active button
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      
      // Show/hide sections
      document.querySelectorAll('.task-section').forEach(section => {
        if (filter === 'all') {
          section.style.display = 'block';
        } else if (section.dataset.section === filter) {
          section.style.display = 'block';
        } else {
          section.style.display = 'none';
        }
      });
    });
  });
</script>

</body>
</html>
      
      <!-- SECTION 1: ASSIGNMENTS -->
      <section class="task-section assignments-section">
        <div class="section-header-wrapper">
          <div class="section-icon assignment-icon">📋</div>
          <div class="section-title-group">
            <h2 class="section-title">Assignments</h2>
            <p class="section-desc">Complete your coursework and submit on time</p>
          </div>
          <div class="section-badge">3 Active</div>
        </div>

        <div class="task-cards-grid">
          <!-- Assignment Card 1 -->
          <div class="task-card assignment-card">
            <div class="card-status-bar assignment-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Data Structures & Algorithms</h3>
              <span class="card-progress">70%</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Due</p>
                  <p class="timeline-value">March 15, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Remaining</p>
                  <p class="timeline-value">8 days</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Tree Traversal & Sorting Algorithms</p>
            </div>

            <div class="buddy-box assignment-buddy">
              <div class="buddy-header">
                <span class="buddy-icon">🤖</span>
                <span class="buddy-label">AI Buddy Tips</span>
              </div>
              <p class="buddy-text">Break the assignment into smaller tasks. Start with understanding tree structures, then practice different traversal methods (DFS, BFS). Use recursion wisely! Focus on time complexity analysis for each algorithm.</p>
            </div>
          </div>

          <!-- Assignment Card 2 -->
          <div class="task-card assignment-card">
            <div class="card-status-bar assignment-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Database Design Project</h3>
              <span class="card-progress">45%</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Due</p>
                  <p class="timeline-value">March 22, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Remaining</p>
                  <p class="timeline-value">15 days</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Relational Database Normalization</p>
            </div>

            <div class="buddy-box assignment-buddy">
              <div class="buddy-header">
                <span class="buddy-icon">🤖</span>
                <span class="buddy-label">AI Buddy Tips</span>
              </div>
              <p class="buddy-text">Focus on normalization forms (1NF, 2NF, 3NF). Design your ER diagram first before implementing. Check your primary and foreign keys are correctly set up. Avoid redundancy in your tables by following normalization rules.</p>
            </div>
          </div>

          <!-- Assignment Card 3 -->
          <div class="task-card assignment-card">
            <div class="card-status-bar assignment-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Web Development Homework</h3>
              <span class="card-progress">90%</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Due</p>
                  <p class="timeline-value">March 10, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Remaining</p>
                  <p class="timeline-value">2 days</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Responsive Design with CSS Grid & Flexbox</p>
            </div>

            <div class="buddy-box assignment-buddy">
              <div class="buddy-header">
                <span class="buddy-icon">🤖</span>
                <span class="buddy-label">AI Buddy Tips</span>
              </div>
              <p class="buddy-text">Remember the mobile-first approach! Use CSS Grid for 2D layouts and flexbox for 1D components. Test on different screen sizes using browser dev tools. Consider viewport meta tags and media queries for better responsiveness.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- SECTION 2: QUIZZES -->
      <section class="task-section quizzes-section">
        <div class="section-header-wrapper">
          <div class="section-icon quiz-icon">❓</div>
          <div class="section-title-group">
            <h2 class="section-title">Quizzes</h2>
            <p class="section-desc">Test your knowledge with online quizzes</p>
          </div>
          <div class="section-badge">2 Active</div>
        </div>

        <div class="task-cards-grid">
          <!-- Quiz Card 1 -->
          <div class="task-card quiz-card">
            <div class="card-status-bar quiz-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Operating Systems Midterm Quiz</h3>
              <span class="card-progress quiz-progress">Not Started</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Quiz Date</p>
                  <p class="timeline-value">March 12, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Duration</p>
                  <p class="timeline-value">1 hour</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Process Management, Scheduling & Deadlock</p>
            </div>

            <div class="buddy-box quiz-buddy">
              <div class="buddy-header">
                <span class="buddy-icon">🤖</span>
                <span class="buddy-label">AI Study Guide</span>
              </div>
              <p class="buddy-text"><strong>Key Areas:</strong> Review scheduling algorithms (FCFS, SJF, Round Robin, Priority). Understand deadlock conditions (Mutual Exclusion, Hold & Wait, No Preemption, Circular Wait) and prevention strategies. Practice with real-world examples and state diagrams. Time management is crucial - allocate 20 mins per section.</p>
            </div>
          </div>

          <!-- Quiz Card 2 -->
          <div class="task-card quiz-card">
            <div class="card-status-bar quiz-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Discrete Mathematics Pop Quiz</h3>
              <span class="card-progress quiz-progress">In Progress</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Quiz Date</p>
                  <p class="timeline-value">March 11, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Attempts Left</p>
                  <p class="timeline-value">1 out of 2</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Graph Theory, Boolean Algebra & Logic</p>
            </div>

            <div class="buddy-box quiz-buddy">
              <div class="buddy-header">
                <span class="buddy-icon">🤖</span>
                <span class="buddy-label">AI Study Guide</span>
              </div>
              <p class="buddy-text"><strong>Study Focus:</strong> Master graph representations (adjacency matrix vs adjacency list). Boolean algebra simplification using laws. Practice truth tables and De Morgan's laws. Understand propositional logic, quantifiers, and predicates. Do practice problems on graph traversal (DFS, BFS).</p>
            </div>
          </div>
        </div>
      </section>

      <!-- SECTION 3: PRESENTATIONS -->
      <section class="task-section presentations-section">
        <div class="section-header-wrapper">
          <div class="section-icon presentation-icon">🎤</div>
          <div class="section-title-group">
            <h2 class="section-title">Presentations</h2>
            <p class="section-desc">Prepare and deliver your presentation projects</p>
          </div>
          <div class="section-badge">2 Active</div>
        </div>

        <div class="task-cards-grid">
          <!-- Presentation Card 1 -->
          <div class="task-card presentation-card">
            <div class="card-status-bar presentation-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Artificial Intelligence Seminar</h3>
              <span class="card-progress">60%</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Presentation Date</p>
                  <p class="timeline-value">March 18, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Slot Time</p>
                  <p class="timeline-value">2:00 PM - 2:30 PM</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Machine Learning Models in Healthcare Applications</p>
            </div>

            <div class="buddy-box presentation-buddy">
              <div class="buddy-header">
                <span class="buddy-icon">🤖</span>
                <span class="buddy-label">AI Buddy Tips</span>
              </div>
              <p class="buddy-text"><strong>Presentation Structure:</strong> Introduction (grab attention) → Problem Statement → Your Solution → Results & Analysis → Conclusion. <strong>Best Practices:</strong> Use visuals & diagrams! Practice delivery 3-4 times. Keep slides to 10-12 max for better engagement. Speak clearly and maintain eye contact. Handle Q&A confidently by repeating the question first.</p>
            </div>
          </div>

          <!-- Presentation Card 2 -->
          <div class="task-card presentation-card">
            <div class="card-status-bar presentation-bar"></div>
            <div class="card-header">
              <h3 class="card-title">Cloud Computing Architecture</h3>
              <span class="card-progress">30%</span>
            </div>
            
            <div class="card-timeline">
              <div class="timeline-item">
                <span class="timeline-icon">📅</span>
                <div>
                  <p class="timeline-label">Presentation Date</p>
                  <p class="timeline-value">March 25, 2026</p>
                </div>
              </div>
              <div class="timeline-divider"></div>
              <div class="timeline-item">
                <span class="timeline-icon">⏰</span>
                <div>
                  <p class="timeline-label">Slot Time</p>
                  <p class="timeline-value">3:00 PM - 3:30 PM</p>
                </div>
              </div>
            </div>

            <div class="card-topic">
              <p class="topic-label">Topic</p>
              <p class="topic-value">Microservices: Design Patterns & Scalability</p>
            </div>

            <div class="buddy-box presentation-buddy">
              <div class="buddy-header">
                <span class="buddy-icon">🤖</span>
                <span class="buddy-label">AI Buddy Tips</span>
              </div>
              <p class="buddy-text"><strong>Technical Content:</strong> Use live demos or video recordings for maximum impact. Explain API communication between services clearly. Include deployment considerations and auto-scaling strategies. <strong>Presentation Tip:</strong> Use architecture diagrams to visualize microservices. Discuss pros/cons compared to monolithic architecture. Prepare for questions about fault tolerance and consistency.</p>
            </div>
          </div>
        </div>
      </section>

    </div>

  </main>
</div>

@include('includes.footer')

</body>
</html>
