<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CR Dashboard - Campus Buddy</title>
  <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/cr-dashboard.css') }}">
</head>

<body>

  @include('includes.menu')

  <div class="layout">
    <main class="main">

      <section class="cr-hero">
        <img src="{{ asset('images/community/dashboardBG.jpg') }}" alt="Campus" class="cr-hero-bg">
        <div class="cr-hero-overlay"></div>

        <a href="{{ route('dashboard') }}" class="back-btn-top-right">← Back to Dashboard</a>

        <div class="cr-hero-content">
          <span class="cr-hero-tag">CLASS REPRESENTATIVE PORTAL</span>
          <h1>Welcome to the CR Dashboard, <br><span>{{ Auth::user()->name ?? 'CR' }}!</span></h1>
          <p class="cr-hero-subtitle">Manage class schedules, announcements, and resources effectively.</p>
        </div>
      </section>

      <!-- ================= CR QUICK ACTIONS ================= -->
      <section class="cr-cards" id="crCards">
        <div class="cards-header">
          <h2>⚡ Quick Actions</h2>
        </div>

        <div class="cards-row">
          <div class="card">
            <h3>📢 Announcements</h3>
            <div class="card-box">Post new class announcement</div>
            <button>Create Post</button>
          </div>

          <div class="card">
            <h3>📅 Schedule</h3>
            <div class="card-box">Update class routine</div>
            <button>Manage Schedule</button>
          </div>

          <div class="card">
            <h3>📚 Resources</h3>
            <div class="card-box">Upload notes and PDFs</div>
            <button>Upload File</button>
          </div>

          <div class="card">
            <h3>👥 Class Roster</h3>
            <div class="card-box">View student details</div>
            <button>View Students</button>
          </div>
        </div>
      </section>

    </main>
  </div>

  @include('includes.footer')

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // ================= SCROLL ANIMATIONS =================
      const animateObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
            const children = entry.target.querySelectorAll('.card');
            children.forEach(child => {
              child.classList.add('animate-in');
            });
            animateObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.15 });

      const crCards = document.querySelector('.cr-cards');
      if (crCards) animateObserver.observe(crCards);
    });
  </script>

</body>

</html>