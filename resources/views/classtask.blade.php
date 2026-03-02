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
          <p class="hero-subtitle">Stay organized with assignments, quizzes, and presentations all in one place</p>
          
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

    <!-- ================= MAIN CONTENT ================= -->
    <div class="classtask-container">
      
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
                <span class="buddy-label">Buddy Tips</span>
              </div>
              <p class="buddy-text">Break the assignment into smaller tasks. Start with understanding tree structures, then practice different traversal methods (DFS, BFS). Use recursion wisely!</p>
              <button class="buddy-action">Need Help?</button>
            </div>

            <div class="card-footer">
              <button class="btn-view-more">View Details</button>
              <button class="btn-submit">Submit Work</button>
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
                <span class="buddy-label">Buddy Tips</span>
              </div>
              <p class="buddy-text">Focus on normalization forms (1NF, 2NF, 3NF). Design your ER diagram first. Check your primary and foreign keys are correctly set up!</p>
              <button class="buddy-action">Need Help?</button>
            </div>

            <div class="card-footer">
              <button class="btn-view-more">View Details</button>
              <button class="btn-submit">Submit Work</button>
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
                <span class="buddy-label">Buddy Tips</span>
              </div>
              <p class="buddy-text">Remember the mobile-first approach! Use CSS Grid for layouts and flexbox for component alignment. Test on different screen sizes before submission.</p>
              <button class="buddy-action">Need Help?</button>
            </div>

            <div class="card-footer">
              <button class="btn-view-more">View Details</button>
              <button class="btn-submit">Submit Work</button>
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
                <span class="buddy-label">Buddy Tips</span>
              </div>
              <p class="buddy-text">Review scheduling algorithms (FCFS, SJF, Round Robin). Understand deadlock conditions and prevention strategies. Practice with real-world examples!</p>
              <button class="buddy-action">Study Guide</button>
            </div>

            <div class="card-footer">
              <button class="btn-view-more">View Questions</button>
              <button class="btn-submit">Start Quiz</button>
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
                <span class="buddy-label">Buddy Tips</span>
              </div>
              <p class="buddy-text">Master graph representations (adjacency matrix vs list). Boolean algebra simplification is key! Practice truth tables and De Morgan's laws.</p>
              <button class="buddy-action">Study Guide</button>
            </div>

            <div class="card-footer">
              <button class="btn-view-more">View Questions</button>
              <button class="btn-submit">Continue Quiz</button>
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
                <span class="buddy-label">Buddy Tips</span>
              </div>
              <p class="buddy-text">Structure: Introduction → Problem → Solution → Results. Use visuals! Practice your delivery 3-4 times. Keep it to 10 slides max for better engagement.</p>
              <button class="buddy-action">Get Resources</button>
            </div>

            <div class="card-footer">
              <button class="btn-view-more">View Rubric</button>
              <button class="btn-submit">Upload Slides</button>
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
                <span class="buddy-label">Buddy Tips</span>
              </div>
              <p class="buddy-text">Use live demos or video recordings for impact. Explain API communication between services. Include deployment considerations and scaling strategies.</p>
              <button class="buddy-action">Get Resources</button>
            </div>

            <div class="card-footer">
              <button class="btn-view-more">View Rubric</button>
              <button class="btn-submit">Upload Slides</button>
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
