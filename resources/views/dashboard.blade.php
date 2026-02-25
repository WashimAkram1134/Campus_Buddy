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
  <!-- MAIN -->
  <main class="main">

    <div class="header-row">
      <h1>Hello {{ Auth::user()->name ?? 'User' }}!</h1>
      @if(Auth::user()->role === 'cr')
        <a href="#" class="cr-btn">CR Panel</a>
      @endif
    </div>

    <div class="grid">
      <div class="card">
        <h3>Today's Study Plan</h3>
        <div class="card-box">
          <b>9:00 AM</b><br>Data Structure<br>Room 713
        </div>
        <button>AI Schedule Tips</button>
      </div>

      <div class="card">
        <h3>Upcoming Tasks</h3>
        <div class="card-box">
          <b>Machine Learning</b><br>Quiz-1<br>11:00 AM
        </div>
        <button>AI Reminder</button>
      </div>

      <div class="card">
        <h3>Question Bank</h3>
        <div class="card-box">
          <b>OOP - Fall25</b><br>Mid-term
        </div>
        <button>More Questions</button>
      </div>

      <div class="card">
        <h3>Notes</h3>
        <div class="card-box">
          <b>AI</b><br>Lecture-1
        </div>
        <button>View Notes</button>
      </div>

      <div class="card hide-mobile">
        <h3>Campus News</h3>
        <div class="card-box">AI Hackathon this week</div>
        <button>Read More</button>
      </div>

      <div class="card hide-mobile">
        <h3>Community</h3>
        <div class="card-box">Meet Seniors & Alumni</div>
        <button>Explore</button>
      </div>
    </div>

    <!-- EVENT IMAGES SLIDER -->
    @include('includes.eventslider')

  </main>
</div>

<!-- ================= ANIMATED AI BUDDY ================= -->
<div class="ai-buddy-container">
  <div class="ai-buddy" id="aiBuddy">
    <img src="{{ asset('images/menuicons/Buddy.png') }}" alt="AI Buddy" class="buddy-image">
    <div class="speech-bubble" id="speechBubble">
      <p>Hi {{ Auth::user()->name ?? 'there' }} 👋 Ready to study?</p>
    </div>
  </div>
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

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (!imageViewer.classList.contains('active')) return;
        switch(e.key) {
            case 'Escape': closeViewer(); break;
            case 'ArrowLeft': navigateImage('prev'); break;
            case 'ArrowRight': navigateImage('next'); break;
        }
    });

    // Touch gestures
    let touchStartX = 0, touchEndX = 0;
    imageViewer.addEventListener('touchstart', function(e) { touchStartX = e.changedTouches[0].screenX; });
    imageViewer.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        const diff = touchStartX - touchEndX;
        if (Math.abs(diff) > 50) {
            navigateImage(diff > 0 ? 'next' : 'prev');
        }
    });

    // ================= AI BUDDY ANIMATION =================
    const aiBuddy = document.getElementById('aiBuddy');
    const speechBubble = document.getElementById('speechBubble');

    if (aiBuddy && speechBubble) {
        setTimeout(() => {
            aiBuddy.classList.add('slide-in');
            setTimeout(() => {
                speechBubble.classList.add('show');
                setTimeout(() => {
                    aiBuddy.classList.add('waving');
                    setTimeout(() => {
                        aiBuddy.classList.remove('waving');
                        setTimeout(() => { aiBuddy.classList.add('rotating'); }, 500);
                    }, 1800);
                }, 500);
                setTimeout(() => { speechBubble.classList.remove('show'); }, 4000);
            }, 1000);
        }, 500);
    }
});
</script>

</body>
</html>
