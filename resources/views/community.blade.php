<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Campus Buddy | Community</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/community.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

  @include('includes.menu')

  <div class="layout">
    <main class="main">

      <!-- ================= HERO BANNER ================= -->
      <section class="hero-banner">
        <img src="{{ asset('images/community/community.jpg') }}" alt="Community" class="hero-bg">
        <div class="hero-overlay-dark"></div>

        <div class="hero-content-wrapper">
          <div class="hero-deco hero-deco-1"></div>
          <div class="hero-deco hero-deco-2"></div>
          <div class="hero-deco hero-deco-3"></div>
          <div class="hero-deco hero-deco-4"></div>

          <div class="hero-content">
            <span class="hero-date">{{ now()->format('F j, Y') }}</span>
            <span class="hero-tag">FOR CAMPUS BUDDIES</span>
            <h1>Discover the best <em>community</em> that fit <em>your needs.</em></h1>
            <p class="hero-desc">
              Connect with seniors, alumni, and fellow students. Share resources, join study groups,
              collaborate on projects, and stay updated with campus activities — all in one place.
            </p>
            <a href="#community-cards" class="hero-btn">VIEW MORE</a>
          </div>
        </div>
      </section>

      <!-- ================= 4 FEATURE CARDS ================= -->
      <section class="community-cards" id="community-cards">
        <div class="cards-grid">

          <div class="comm-card">
            <div class="card-img-wrap">
              <img src="{{ asset('images/community/studygroup.jpg') }}" alt="Study Groups">
            </div>
            <div class="card-badge">
              <span class="badge-icon">📚</span>
            </div>
            <span class="card-tag">STUDY GROUPS</span>
            <h3>Collaborative Learning</h3>
            <p>Join active study sessions with your classmates. Share notes & prepare for exams together.</p>
            <div class="card-stats"><span>👥 234</span><span>📈 12</span></div>
          </div>

          <a href="{{ route('clubs') }}" class="comm-card comm-card-link">
            <div class="card-img-wrap">
              <img src="{{ asset('images/community/event.jpg') }}" alt="Clubs">
            </div>
            <div class="card-badge">
              <span class="badge-icon">🎭</span>
            </div>
            <span class="card-tag">CLUBS</span>
            <h3>Campus Clubs</h3>
            <p>Explore and join various clubs — coding, robotics, art, sports, and more.</p>
            <div class="card-stats"><span>🎯 15 Clubs</span><span>👥 800+</span></div>
          </a>

          <div class="comm-card">
            <div class="card-img-wrap">
              <img src="{{ asset('images/community/workshop.jpg') }}" alt="District Community">
            </div>
            <div class="card-badge">
              <span class="badge-icon">🏘️</span>
            </div>
            <span class="card-tag">DISTRICT COMMUNITY</span>
            <h3>District Association</h3>
            <p>Connect with students from your home district. Build a strong local network on campus.</p>
            <div class="card-stats"><span>🌍 32 Districts</span><span>👥 1.2K</span></div>
          </div>

          <a href="#posts-section" class="comm-card comm-card-link">
            <div class="card-img-wrap">
              <img src="{{ asset('images/community/post.jpg') }}" alt="Posts">
            </div>
            <div class="card-badge">
              <span class="badge-icon">📝</span>
            </div>
            <span class="card-tag">POSTS</span>
            <h3>Community Posts</h3>
            <p>Share updates, ask questions, and engage with the campus community.</p>
            <div class="card-stats"><span>📝 120+</span><span>💬 350</span></div>
          </a>

        </div>
      </section>

      <!-- ================= QUICK ACTIONS ================= -->
      <section class="quick-section">
        <div class="quick-actions">
          <div class="talent">Meet With Talents</div>
          <div class="qbox">District Association</div>
          <a href="{{ route('clubs') }}#sports-club" class="qlink">
            <div class="qbox">Sports Association</div>
          </a>
        </div>
      </section>

      <!-- ================= RECENT POSTS ================= -->
      <div class="recent-posts-heading" id="posts-section">
        <h2>📝 Recent Posts</h2>
        <a href="#">View All Posts</a>
      </div>

      <section class="posts">
        <div class="post">
          <div class="post-top">
            <div class="avatar">🎓</div>
            <div>
              <h4>Adnan Hossain <span>3rd Year SWE</span></h4>
              <p>Shared updated Software Engineering notes for Week 6.</p>
            </div>
          </div>
          <a class="file" href="#">software_eng_notes.pdf</a>
          <div class="meta"><span>👍 78</span><span>💬 25</span></div>
        </div>

        <div class="post">
          <div class="post-top">
            <div class="avatar">👨‍💻</div>
            <div>
              <h4>Mazharul Islam <span>3rd Year CSE</span></h4>
              <p>Creating a study group for Quizzes in Data structures.</p>
            </div>
          </div>
          <a class="join">Join Study Group</a>
          <div class="meta"><span>👍 55</span><span>💬 16</span></div>
        </div>

        <div class="post">
          <div class="post-top">
            <div class="avatar">🤖</div>
            <div>
              <h4>Robotics Club <span>Friday</span></h4>
              <p>Robotics Workshop This week</p>
            </div>
          </div>
          <div class="event-tag">Friday, 5PM – Lab 301</div>
          <div class="meta"><span>👍 27</span><span>💬 12</span></div>
        </div>

        <button class="view-more">View More</button>
      </section>

      <!-- ================= DISTRICT ASSOCIATIONS ================= -->
      <section class="district-section">
        <div class="district-header">
          <h2>🌍 District Associations</h2>
          <a href="#" style="color: #c8a45a; text-decoration: none; font-size: 13px; font-weight: 500;">View All</a>
        </div>

        <div class="district-grid">
          <!-- District 1: Tangail -->
          <div class="district-card">
            <div class="district-logo-wrap">
              <img src="https://i.ibb.co/VWV6c38/tangail-logo.png" alt="Tangail District Association"
                onerror="this.src='{{ asset('images/alumni/profile_1.png') }}'">
            </div>
            <h3>Tangail District Association</h3>
            <span class="district-motto">"Born To Stay Together"</span>

            <div class="district-stats">
              <div class="dist-stat">
                <span>1.2K+</span>
                Members
              </div>
              <div class="dist-stat">
                <span>Active</span>
                Status
              </div>
            </div>

            <div class="district-socials">
              <a href="https://www.facebook.com/profile.php?id=61568474162445" target="_blank" rel="noopener noreferrer"
                class="dist-social-link"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="dist-social-link"><i class="fab fa-twitter"></i></a>
              <a href="#" class="dist-social-link"><i class="fas fa-globe"></i></a>
            </div>
          </div>

          <!-- District 2: Dhaka -->
          <div class="district-card">
            <div class="district-logo-wrap">
              <img src="{{ asset('images/alumni/profile_2.png') }}" alt="Dhaka Students Forum">
            </div>
            <h3>Dhaka Students Forum</h3>
            <span class="district-motto">"United by Capital, Driven by Dreams"</span>

            <div class="district-stats">
              <div class="dist-stat">
                <span>2.5K+</span>
                Members
              </div>
              <div class="dist-stat">
                <span>Active</span>
                Status
              </div>
            </div>

            <div class="district-socials">
              <a href="#" class="dist-social-link"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="dist-social-link"><i class="fab fa-instagram"></i></a>
              <a href="#" class="dist-social-link"><i class="fas fa-link"></i></a>
            </div>
          </div>

          <!-- District 3: Chittagong -->
          <div class="district-card">
            <div class="district-logo-wrap">
              <img src="{{ asset('images/alumni/profile_1.png') }}" alt="Chattogram Association">
            </div>
            <h3>Chattogram Association</h3>
            <span class="district-motto">"Unity in Diversity"</span>

            <div class="district-stats">
              <div class="dist-stat">
                <span>1.8K+</span>
                Members
              </div>
              <div class="dist-stat">
                <span>Active</span>
                Status
              </div>
            </div>

            <div class="district-socials">
              <a href="#" class="dist-social-link"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="dist-social-link"><i class="fab fa-twitter"></i></a>
              <a href="#" class="dist-social-link"><i class="fas fa-envelope"></i></a>
            </div>
          </div>
        </div>
      </section>

      <!-- ================= TRENDING ================= -->
      <section class="trending-section">
        <h3>🔥 Trending Topics</h3>
        <p class="tags">
          #Assignment &nbsp; #TechFest2025 &nbsp; #Campus <br>
          #MachineLearning &nbsp; #CodeTrap2025
        </p>
      </section>

    </main>
  </div>

  @include('includes.footer')

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            // Animate the section itself
            entry.target.classList.add('animate-in');

            // Animate children (cards, posts, quick-action items)
            const children = entry.target.querySelectorAll('.comm-card, .post, .talent, .qbox, .district-card');
            children.forEach(child => {
              child.classList.add('animate-in');
            });

            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.1 });

      // Observe all animated sections
      const sections = document.querySelectorAll(
        '.community-cards, .quick-section, .recent-posts-heading, .posts, .district-section, .trending-section'
      );
      sections.forEach(section => observer.observe(section));
    });
  </script>

</body>

</html>