<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Campus Buddy Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

@include('includes.menu')

<div class="layout">
  <main class="main">

    <!-- ================= HERO SECTION ================= -->
    <section class="dash-hero">
      <img src="{{ asset('images/community/dashboardBG.jpg') }}" alt="Campus" class="dash-hero-bg">
      <div class="dash-hero-overlay"></div>

      <!-- Campus Buddy Headline -->
      <div class="campus-headline">
        <h1 class="campus-title">
          <span class="title-campus">Campus</span>
          <span class="title-buddy">Buddy</span>
        </h1>
        <p class="campus-subtitle">Your AI-Powered Academic Companion</p>
      </div>

      <div class="hero-split">
        <!-- LEFT: Welcome text + cards -->
        <div class="hero-left">
          <span class="hero-tag">YOUR PERSONALIZED LEARNING HUB</span>
          <h1>Start your day with <br><span>campusBuddy,</span> {{ Auth::user()->name ?? 'User' }}!</h1>
          @if(Auth::user()->role === 'cr')
            <a href="#" class="cr-btn">CR Panel</a>
          @endif

          <!-- Cards inside hero -->
          <div class="hero-cards">
            <div class="hero-card">
              <h4>📅 Today's Study Plan</h4>
              <p><b>9:00 AM</b> — Data Structure, Room 713</p>
              <button>AI Schedule Tips</button>
            </div>
            <div class="hero-card">
              <h4>📝 Upcoming Tasks</h4>
              <p><b>Machine Learning</b> — Quiz-1, 11:00 AM</p>
              <button>AI Reminder</button>
            </div>
            <div class="hero-card">
              <h4>❓ Question Bank</h4>
              <p><b>OOP - Fall25</b> — Mid-term</p>
              <button>More Questions</button>
            </div>
          </div>
        </div>

        <!-- RIGHT: Buddy mascot (slides in from right) -->
        <div class="hero-right" id="buddyContainer">
          <img src="{{ asset('images/menuicons/Buddy.png') }}" alt="Campus Buddy" class="buddy-float" id="buddyImg">
          <a href="#" class="chat-buddy-btn">💬 Chat with Buddy</a>
        </div>
      </div>
    </section>

    <!-- ================= CARDS BELOW HERO ================= -->
    <section class="dash-cards" id="dashCards">
      <div class="cards-header">
        <h2>🎯 More Features</h2>
        <button class="expand-btn" id="expandBtn">Collapse ▲</button>
      </div>

      <div class="cards-row" id="expandableCards">
        <div class="card">
          <h3>📝 Notes</h3>
          <div class="card-box">
            <b>AI</b><br>Lecture 1
          </div>
          <button>View Notes</button>
        </div>

        <div class="card">
          <h3>📰 Campus News</h3>
          <div class="card-box">AI Hackathon this week</div>
          <button>Read More</button>
        </div>

        <div class="card">
          <h3>👥 Community</h3>
          <div class="card-box">Meet Seniors & Alumni</div>
          <a href="{{ route('community') }}"><button>Explore</button></a>
        </div>

        <div class="card">
          <h3>🏆 AI Hackathon</h3>
          <div class="card-box">AI Hackathon this week</div>
          <button>Read More</button>
        </div>
      </div>
    </section>

    <!-- EVENT IMAGES SLIDER -->
    @include('includes.eventslider')

  </main>
</div>

@include('includes.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ================= IMAGE VIEWER =================
    const imageViewer = document.getElementById('imageViewer');
    const viewerImg = imageViewer.querySelector('img');
    const closeBtn = imageViewer.querySelector('.close-btn');
    const prevBtn = imageViewer.querySelector('.nav-prev');
    const nextBtn = imageViewer.querySelector('.nav-next');
    const slides = document.querySelectorAll('.slide img');
    let currentImageIndex = 0;
    let imageSources = [];

    slides.forEach((slide, index) => {
        imageSources.push(slide.src);
        slide.addEventListener('click', function(e) {
            e.preventDefault();
            currentImageIndex = index;
            showImage(this.src);
        });
    });

    function showImage(src) {
        viewerImg.src = src;
        imageViewer.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeViewer() {
        imageViewer.classList.remove('active');
        document.body.style.overflow = '';
    }

    function navigateImage(direction) {
        if (imageSources.length === 0) return;
        if (direction === 'next') {
            currentImageIndex = (currentImageIndex + 1) % imageSources.length;
        } else {
            currentImageIndex = (currentImageIndex - 1 + imageSources.length) % imageSources.length;
        }
        viewerImg.src = imageSources[currentImageIndex];
    }

    closeBtn.addEventListener('click', closeViewer);
    prevBtn.addEventListener('click', function(e) { e.stopPropagation(); navigateImage('prev'); });
    nextBtn.addEventListener('click', function(e) { e.stopPropagation(); navigateImage('next'); });
    imageViewer.addEventListener('click', function(e) { if (e.target === imageViewer) closeViewer(); });

    document.addEventListener('keydown', function(e) {
        if (!imageViewer.classList.contains('active')) return;
        switch(e.key) {
            case 'Escape': closeViewer(); break;
            case 'ArrowLeft': navigateImage('prev'); break;
            case 'ArrowRight': navigateImage('next'); break;
        }
    });

    let touchStartX = 0, touchEndX = 0;
    imageViewer.addEventListener('touchstart', function(e) { touchStartX = e.changedTouches[0].screenX; });
    imageViewer.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        const diff = touchStartX - touchEndX;
        if (Math.abs(diff) > 50) {
            navigateImage(diff > 0 ? 'next' : 'prev');
        }
    });

    // ================= BUDDY SLIDE-IN ANIMATION =================
    const buddyContainer = document.getElementById('buddyContainer');
    const speechBubble = document.getElementById('speechBubble');

    if (buddyContainer) {
        // Slide buddy in from right after 1.5s
        setTimeout(() => {
            buddyContainer.classList.add('slide-in');

            // Show speech bubble after buddy slides in
            setTimeout(() => {
                if (speechBubble) speechBubble.classList.add('show');

                // Hide speech bubble after 4s
                setTimeout(() => {
                    if (speechBubble) speechBubble.classList.remove('show');
                }, 4000);
            }, 1000);
        }, 1500);
    }

    // ================= COLLAPSE / EXPAND =================
    const expandBtn = document.getElementById('expandBtn');
    const expandableCards = document.getElementById('expandableCards');
    let isCollapsed = false;

    if (expandBtn && expandableCards) {
        expandBtn.addEventListener('click', function() {
            isCollapsed = !isCollapsed;
            expandableCards.classList.toggle('collapsed', isCollapsed);
            expandBtn.textContent = isCollapsed ? 'Expand ▼' : 'Collapse ▲';
        });
    }
    // ================= SCROLL ANIMATIONS =================
    const animateObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Animate the section itself
                entry.target.classList.add('animate-in');

                // Animate children (cards or slides)
                const children = entry.target.querySelectorAll('.card, .slide');
                children.forEach(child => {
                    child.classList.add('animate-in');
                });

                animateObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    // Observe sections
    const dashCards = document.querySelector('.dash-cards');
    const eventSection = document.querySelector('.event-slider-section');
    if (dashCards) animateObserver.observe(dashCards);
    if (eventSection) animateObserver.observe(eventSection);
});
</script>

</body>
</html>
