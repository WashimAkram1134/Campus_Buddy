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
          <div class="division-info" id="selected-division-text"
            style="color: #666; font-size: 14px; font-weight: 500;">Click on a division to filter</div>
          <a href="#" id="reset-filter"
            style="color: #c8a45a; text-decoration: none; font-size: 13px; font-weight: 500;">View All</a>
        </div>

        <!-- Bangladesh Map Section -->
        <div class="map-container">
          <div class="map-wrapper">
            <svg xml:space="preserve" enable-background="new 0 0 1550.242 2149.604" viewBox="0 0 1550.242 2149.604"
              id="Bangladesh-Division-Map">
              <!-- Division: Rangpur -->
              <g id="Rangpur" class="division">
                <path fill="#01796F"
                  d="M254.128,132.288l6.354-6.257l6.354,1.251l6.354,5.005l-5.083,13.765l7.625,2.503l6.354,7.508l7.625-1.251l-1.271-8.76l-6.354-3.754l7.625-8.76l13.979,1.251l6.354,8.76l5.083,6.257l3.813,6.257l2.542-3.754h11.438l2.542,2.503l7.625-3.754v8.759l1.271,15.017l8.896,6.257l8.896,5.006l2.542,6.257l-1.271,7.508l-2.542,18.771l3.813,12.514l2.542,13.765l10.167,8.76l11.438,7.508l8.896,7.508l-3.813,10.011l-3.813,8.76l-3.813,5.005l-7.625-8.759l-12.709,11.262l1.271,13.769l-10.167-10.011l-6.354,12.513l-20.334-5.005l-13.98,3.754l5.083,12.514l-6.354,7.509l-3.813,6.257l-11.438-1.252l-10.167-8.76h-6.354v-13.765l-10.167-2.503v-30.033l-5.083-6.257l-5.083-8.76l-13.98-3.754l1.271-6.257l-3.813-2.503v-10.01l-1.271-3.754l5.083-6.257l-3.813,6.257l7.625-11.263l7.625-3.754v-21.273l3.813-7.508v-5.006l-1.271-17.519l3.813-7.508l-13.979-15.017v-17.52L254.128,132.288z M115.598,78.479l-2.542-8.759l-2.542-6.257l6.354-8.759l5.083-11.263l5.084-15.017l10.167-15.017l2.542,16.268l1.271,8.76l10.167,10.011l10.167-2.502l2.542,8.76l10.167,2.502l1.271,7.508l10.167,3.754l1.271,5.005l10.167,2.503l6.354-7.508l3.813,10.011l5.083,6.257l7.625,5.005l2.542,5.005l6.354-2.502l3.813,3.754l-3.813,8.76l3.813,3.754l5.083,3.754v2.502l10.167-1.251v5.005l2.542,5.005v6.257l6.354,5.006l-1.271,11.262l5.083,8.76l6.354,8.76l-2.542,8.76v12.514v11.262l-3.813,10.011l2.542,12.514l-6.354,8.76l-8.896,12.514l-10.167-2.503l-13.98-1.251l-5.083-10.011l-6.354-5.005l7.625-13.765l-5.083-10.011l-6.354-7.508l-10.167-3.754l-5.083-5.006l-3.813-7.508l-6.354,2.502z" />
                <text x="350" y="250" font-size="60" fill="white" font-weight="bold"
                  pointer-events="none">Rangpur</text>
              </g>
              <!-- Division: Rajshahi -->
              <g id="Rajshahi" class="division">
                <path fill="#E11837"
                  d="M332.922,910.646v-8.763l5.083-8.76l6.354,6.257l25.417-5.006l12.709-10.013l2.542-10.015l7.625,2.506l11.438-6.261l7.625-22.521l7.625,3.755l1.271-10.012l10.167-10.015l26.688,6.258l8.896,3.757v12.516l3.813,7.509l8.896-5.006l7.626,2.503l-5.084,3.754v10.015l5.084,3.755h11.438l5.084-6.26l5.083,8.762l-7.625,6.259h6.354v7.509l-7.626,3.754l2.542,8.761l11.438,1.255l16.521,13.766l11.438-1.25l16.521,13.765l8.896,12.518l-12.709,2.503v7.511l-5.083,1.25l1.271,11.264l6.354,7.509l10.167-2.503l5.084,15.021h-5.084l-10.167-11.264l3.813,15.02l15.251,2.502l11.438,7.509l-11.438,3.755l-6.354,3.757l-15.251-1.252l-15.25-6.26l-17.793,5.007l-11.438,5.007 L479.07,993.26l-5.084-12.515l-15.25-16.271h-6.354l5.083,12.517l-6.354,7.509l-13.979-2.503l-8.896-12.518l-12.709-13.765l-5.087-2.505H392.65l-7.625-5.006h-13.98l-7.625-1.251l-10.167,8.762v-6.259l-10.167-3.755l-5.083-10.014l2.542-16.269z" />
                <text x="350" y="850" font-size="60" fill="white" font-weight="bold"
                  pointer-events="none">Rajshahi</text>
              </g>
              <!-- Division: Khulna -->
              <g id="Khulna" class="division">
                <path fill="#607d8b"
                  d="M254.126,1170.933l15.25,3.755l7.625-5.005l5.083,6.257l10.167,1.252l1.271-13.767l8.896,1.252l16.521-10.012l-1.271-6.26l-10.167-6.257l5.083-2.502l2.542-17.521l-3.813-6.26l-6.354-3.754l7.625-3.756l15.251,6.258l1.271-6.258l-5.083-6.26l-1.271-3.754h7.625l10.167-17.521l-1.271-20.021l8.896-3.754l3.813-8.762h6.354v-5.006l-6.354-7.512l1.271-5.006l7.625,3.755v6.261l7.625,2.502l1.271,7.511h5.084l5.083-7.511l8.896,3.756l6.354-8.763h11.438l3.813-7.511l15.251,10.669l10.167,1.846l1.271,5.009l17.793,15.019l1.271,7.51l-2.542,3.755h-3.813l-2.542,5.005l3.813,3.759l1.271,5.004l-3.813,1.252v7.508l5.083,2.505l-1.271,2.502h-6.354l-6.354,10.015l1.271,13.768l1.271,13.766l-3.813,6.259l-5.084,5.009l-6.354-1.252l-7.625,15.02l-1.271,8.76l5.083,1.25l-5.083,3.756v6.258l-6.355,6.259l-5.083-5.007l-2.542,3.755l3.813,10.013l-8.896,3.756l-21.604,3.755l-6.354-15.02h-10.167l-5.084-11.265l7.625-5.006l-12.709-5.006l-5.083-3.756l-3.813,3.756l7.625,10.012H334.19l-10.167,5.006l7.625,7.511l7.625,3.754l-10.167,1.252l-16.521-5.006l-3.813,1.252l7.625,5.004l-3.813,8.762l-3.813,6.259l-1.271,6.256h-21.606l-12.708-6.256v8.762l-12.709-1.252l-2.542-6.258l-10.167-1.252l-6.354-3.754v-6.26l-7.625-5.007v-6.256l2.542-5.007l10.167-2.502l-1.271-6.258z" />
                <text x="350" y="1450" font-size="60" fill="white" font-weight="bold"
                  pointer-events="none">Khulna</text>
              </g>
              <!-- Division: Barisal -->
              <g id="Barisal" class="division">
                <path fill="#4caf50"
                  d="M631.581,1601.409l-2.541-18.771l-7.626-10.012l1.271-18.771l10.166-17.521l-2.541-11.266v-17.521l8.896-10.01h5.083l-6.354-6.258l-15.25-23.775l17.791,10.011l11.438,10.015l-1.271-11.265l-5.084-13.767l6.354-8.762l-6.354-17.521v-18.771l-5.084-5.006l-17.791-2.507l-1.271-13.765l20.335-7.51v-21.273l-1.271-5.004l2.546-3.756l1.271-8.76l19.063,2.504l6.354-8.762h1.271l8.896,11.264l-1.271,12.515h6.354l7.625,11.267h7.626l2.542,7.51l19.063,3.754l8.896,2.502l-1.271,6.261l-5.084,1.252v6.257l-8.896,6.258l-2.542,10.01l-13.979,8.762l7.625,7.514v10.01l-12.709,2.504v25.027l20.334,3.754l2.543,2.502l-2.543,6.258l-12.71,12.516l-7.625-6.259l-6.354,3.756l-7.626-3.756l1.271,15.021l-7.625,11.262l1.271,10.012l7.625-3.754l2.542,15.018l-3.813,7.514l-3.813,17.52l-8.896,16.271l-8.896,1.25l-15.251,16.27h-12.708z" />
                <text x="700" y="1450" font-size="60" fill="white" font-weight="bold"
                  pointer-events="none">Barisal</text>
              </g>
              <!-- Division: Chittagong -->
              <g id="Chittagong" class="division">
                <path fill="#e91e63"
                  d="M926.43,1059.563l-15.252-6.258v-3.754l-12.709-10.012l3.813-10.013l11.438-13.769l1.271-17.521l8.896-5.006l3.813,5.006h11.438l3.813-3.755l21.604,2.503v-8.763l7.625-2.502l5.084-21.271l10.166-2.503l-6.354-11.266l11.438-16.27l13.98-6.258l-1.271-5.006l7.627-7.512l-2.543-12.515l-7.625-1.251l-7.625-13.769l10.167-12.513l17.793,2.503l6.354-10.012l21.604-7.509l21.604,6.257l11.438,7.51l13.979-20.021l10.167,2.505v7.508l-16.521,11.264l10.166,6.259v6.26l-12.707-3.756l-1.271,15.019l7.625,5.007l-8.896,2.503l6.354,20.021l6.354,8.76v3.755l-5.084,2.503v10.013v3.756l-13.979,6.257l5.083,12.516l-10.167,2.504l-7.625,15.02l7.625,8.762l1.271,6.257l-6.354,5.007l-2.541,10.014l5.083,10.012l-7.625,10.012l-5.084-3.754h-8.896l-6.354,5.006l1.271,15.021l6.354,2.503l3.813-5.006l3.813,2.503v16.271h-5.083l-8.896-7.51l-2.544,3.754l-10.166-10.012v-10.012h-5.084l-1.271-5.005l-10.167-2.504l6.354-5.009l-13.979-11.265l-20.335-1.251l-8.896,7.509h-15.25l-6.354,1.253l2.542,10.015l-11.438,2.503l-13.979-10.013l-7.626,5.007l1.271,3.755l3.813,3.754z" />
                <text x="1100" y="1150" font-size="60" fill="white" font-weight="bold"
                  pointer-events="none">Chittagong</text>
              </g>
              <!-- Division: Sylhet -->
              <g id="Sylhet" class="division">
                <path fill="#00bcd4"
                  d="M1068.77,737.955v-10.011l17.791-15.021l-7.625-12.515l-16.521-5.007l-8.896-5.006l2.541-11.266l7.625-3.754l3.813-8.762l-5.084-8.761l-3.813-2.506l-8.896,12.519l-5.084-8.762l1.271-10.014l-7.625-11.263l-21.604-2.503l-8.896-11.264l-17.793-2.506v-16.27l-5.084-11.264V580.27l6.354-6.258l-12.709-3.754l2.542-5.006l12.709-1.251l-6.354-7.511l2.541-23.774l2.541-6.257l20.339-3.754h13.979l17.792,3.754l34.313-6.258l31.771,16.27l5.083-6.257l15.251,5.005l16.521,10.016H1159l5.084-5.01l8.896,2.507l19.063-10.016v10.016l6.354,1.251l3.813,7.509l19.063-5.006l7.625,1.251l-2.541,7.509l10.166,8.762l1.271,11.263l-6.354,7.512v3.754l13.979,13.768l-1.271,5.006l-3.813,1.251v3.756l7.625,3.757v10.011l-7.625,15.019v3.756l7.625,10.013l-12.709,2.503l-6.354,7.509l7.625,16.271l-7.625,2.503l7.625,11.265l-11.438,22.521l-19.063-2.503l-1.271,6.258l3.813,3.757l-5.082,3.754l-5.084-6.258h-10.168l-16.521-3.755l-5.084,5.007l5.084,5.006l-8.896,7.508l-17.793-13.767l-1.271-7.509l-10.167-1.253l-11.438,10.015l-11.438,6.257l1.271,10.013l-2.541,6.259l-7.627-5.009l-11.438,10.015l-10.167,2.504z" />
                <text x="1100" y="550" font-size="60" fill="white" font-weight="bold"
                  pointer-events="none">Sylhet</text>
              </g>
              <!-- Division: Mymensingh -->
              <g id="Mymensingh" class="division">
                <path fill="#f57f17"
                  d="M548.973,555.255l17.793-18.771l-1.271-11.267l8.896-10.011l8.896,1.251l7.626-10.013l-1.271-12.518l-6.354-11.263v-21.271l12.709-8.763l-6.354-3.754v-8.76l13.979,10.011l-3.813,20.021l7.625,7.509l-1.271,10.012l8.896,6.257h8.896l6.354-8.759l11.438,2.502l7.625-1.251v18.771l-2.542,2.503l-7.625-5.008l-3.813,17.521l-7.627,7.509l3.813,8.761l10.167-1.253l-1.271,6.261l-5.082,6.257l-1.271,10.014l11.438,8.759l-1.271,7.512l-8.896,5.007l1.271,5.005h-6.354v6.258l6.354,12.516l1.271,7.511l7.627-1.25l6.354,7.508l-2.542,7.511l8.896,3.754l29.229,7.508l2.542,8.764l16.521-13.769l24.146,11.265l-1.271,15.018l-11.438,12.516l-8.896-1.251h-20.334l-11.438,2.503l-19.063,22.522l-6.354-8.759l-2.542-3.756l-8.896-3.756v7.512l-10.169,6.257l-5.081-3.755l-3.813,7.509l3.813,7.51l7.625,5.006l-2.544,5.007l-3.813-1.252l-5.083,11.26h-6.354v8.76l-7.625,2.503v13.769l-6.354,2.504l-10.167-1.251v-11.267l-7.625-6.258l10.167-1.252l3.813-26.277l-10.168-11.264l7.625-1.252l1.271-8.759l-11.438-7.511l-5.084-1.25l-2.541,5.006l-7.627-8.763z" />
                <text x="750" y="550" font-size="60" fill="white" font-weight="bold"
                  pointer-events="none">Mymensingh</text>
              </g>
              <!-- Division: Dhaka -->
              <g id="Dhaka" class="division">
                <path fill="#303F9F"
                  d="M442.22,1013.261v-16.268l-6.354-5.006l7.625-3.754l17.793,1.252l10.167,1.251l6.354,7.508v8.76l2.542,8.76l19.063,11.265l-5.084-13.768l10.167-1.251l2.542,6.257l6.354,3.755l17.793-11.263l6.354,3.754l-1.271,6.259l6.354,7.508v-10.012l27.96-1.252l13.979,2.504l8.896,11.263l1.271,13.766l-11.438-8.76l-8.896-11.263H543.89l-1.271,5.006h25.418l12.709,8.76l16.521,12.515l6.354,5.007l5.084,2.502l-6.354,2.503l-1.271,6.257h-12.709l-1.271,6.257l-8.896-2.503v17.52l10.167,6.258l-2.541,6.258h-8.896l-2.542-6.258l-2.542,6.258l-12.709-1.248l-2.541-15.019l-15.251,13.767h-6.354l-2.542-11.264h-5.084l-2.541,5.006l-12.709-6.258l-2.542,5.006l7.625,5.004l-7.625,3.758l-5.084-1.252v-6.258l-10.167-1.248l-5.083-13.767l-12.709-8.76l-1.271-7.509l-17.792-1.251l-2.542,3.754l-15.251-13.766l-2.541-7.51l-3.813-7.508l8.896-8.76z" />
                <text x="700" y="1050" font-size="60" fill="white" font-weight="bold" pointer-events="none">Dhaka</text>
              </g>
            </svg>
          </div>
        </div>

        @php
        include resource_path('views/data/district_data.php');
        @endphp

        <div class="district-grid" id="district-cards-container">
          @foreach($districtAssociations as $district)
          <div class="district-card" data-division="{{ $district['division'] }}">
            <div class="district-logo-wrap">
              <img src="{{ $district['logo'] }}" alt="{{ $district['name'] }}"
                onerror="this.src='{{ asset('images/alumni/profile_1.png') }}'">
            </div>
            <h3>{{ $district['name'] }}</h3>
            <span class="district-motto">{{ $district['motto'] }}</span>

            <div class="district-stats">
              <div class="dist-stat">
                <span>{{ $district['members'] }}</span>
                Members
              </div>
              <div class="dist-stat">
                <span>{{ $district['status'] }}</span>
                Status
              </div>
            </div>

            <div class="district-socials">
              <a href="{{ $district['fb'] }}" target="_blank" rel="noopener noreferrer" class="dist-social-link"><i
                  class="fab fa-facebook-f"></i></a>
              <a href="#" class="dist-social-link"><i class="fab fa-twitter"></i></a>
              <a href="#" class="dist-social-link"><i class="fas fa-globe"></i></a>
            </div>
          </div>
          @endforeach
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

      // Map Filtering Logic
      const divisions = document.querySelectorAll('.division');
      const cards = document.querySelectorAll('.district-card');
      const resetBtn = document.getElementById('reset-filter');
      const divisionText = document.getElementById('selected-division-text');

      divisions.forEach(div => {
        div.addEventListener('click', function () {
          const selectedDivision = this.id;

          // Update text
          divisionText.innerText = `Filtering by: ${selectedDivision} Division`;
          divisionText.style.color = '#c8a45a';

          // Highlight active division
          divisions.forEach(d => d.style.opacity = '0.4');
          this.style.opacity = '1';
          this.style.stroke = '#fff';
          this.style.strokeWidth = '10';

          // Filter cards
          cards.forEach(card => {
            if (card.dataset.division === selectedDivision) {
              card.style.display = 'block';
              card.classList.add('animate-in');
            } else {
              card.style.display = 'none';
              card.classList.remove('animate-in');
            }
          });
        });
      });

      resetBtn.addEventListener('click', function (e) {
        e.preventDefault();
        divisionText.innerText = 'Click on a division to filter';
        divisionText.style.color = '#666';

        divisions.forEach(d => {
          d.style.opacity = '1';
          d.style.stroke = 'none';
        });

        cards.forEach(card => {
          card.style.display = 'block';
          card.classList.add('animate-in');
        });
      });
    });
  </script>

</body>

</html>