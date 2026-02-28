<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF & Notes - Campus Buddy</title>
  <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/notes.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

@include('includes.menu')

<div class="layout">
  <main class="main">
    
    <!-- ================= HERO SECTION ================= -->
    <section class="notes-hero">
      <div class="hero-content">
        <h1>PDF & <span>Notes</span></h1>
        <p>Your centralized repository for class materials and lecture notes.</p>
        
        <div class="search-container">
          <div class="search-box">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            <input type="text" placeholder="Search by subject, topic or professor...">
          </div>
        </div>
      </div>
    </section>

    <!-- ================= SPLIT SECTION ================= -->
    <div class="notes-container">
      
      <!-- LEFT: CLASS MATERIALS (PDFs) -->
      <div class="resources-section pdf-section">
        <div class="section-header">
          <div class="header-title">
            <div class="icon-box pdf">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
            </div>
            <h2>Class Materials</h2>
          </div>
          <span class="count">12 Files</span>
        </div>

        <div class="resources-grid">
          <!-- Card 1 -->
          <div class="resource-card animate-up" style="animation-delay: 0.1s">
            <div class="card-top">
              <span class="file-tag pdf">PDF</span>
              <button class="download-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
              </button>
            </div>
            <div class="card-info">
              <h3>Data Structures - L3</h3>
              <p>Arrays & Linked Lists overview. Detailed complexity analysis...</p>
            </div>
            <div class="card-footer">
              <span class="date">Oct 12, 2023</span>
              <span class="size">2.4 MB</span>
            </div>
          </div>
          
          <!-- Card 2 -->
          <div class="resource-card animate-up" style="animation-delay: 0.2s">
            <div class="card-top">
              <span class="file-tag pdf">PDF</span>
              <button class="download-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
              </button>
            </div>
            <div class="card-info">
              <h3>Database Systems - Mid</h3>
              <p>Mid-term preparation. Normalization & SQL Queries...</p>
            </div>
            <div class="card-footer">
              <span class="date">Oct 15, 2023</span>
              <span class="size">1.8 MB</span>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="resource-card animate-up" style="animation-delay: 0.3s">
            <div class="card-top">
              <span class="file-tag pdf">PDF</span>
              <button class="download-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
              </button>
            </div>
            <div class="card-info">
              <h3>Algorithm Analysis - L5</h3>
              <p>Dynamic Programming and Greed Approaches...</p>
            </div>
            <div class="card-footer">
              <span class="date">Oct 18, 2023</span>
              <span class="size">3.2 MB</span>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT: HAND NOTES -->
      <div class="resources-section notes-section">
        <div class="section-header">
          <div class="header-title">
            <div class="icon-box note">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </div>
            <h2>Hand Notes</h2>
          </div>
          <span class="count">8 Files</span>
        </div>

        <div class="resources-grid">
          <!-- Card 4 -->
          <div class="resource-card animate-up" style="animation-delay: 0.4s">
            <div class="card-top">
              <span class="file-tag note">NOTE</span>
              <button class="download-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
              </button>
            </div>
            <div class="card-info">
              <h3>AI Lecture Summary</h3>
              <p>Quick summary of neural network backpropagation steps...</p>
            </div>
            <div class="card-footer">
              <span class="date">Oct 20, 2023</span>
              <span class="size">0.5 MB</span>
            </div>
          </div>
          
          <!-- Card 5 -->
          <div class="resource-card animate-up" style="animation-delay: 0.5s">
            <div class="card-top">
              <span class="file-tag note">NOTE</span>
              <button class="download-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
              </button>
            </div>
            <div class="card-info">
              <h3>Web Dev Shortcuts</h3>
              <p>Essential React hooks tips and common pitfalls...</p>
            </div>
            <div class="card-footer">
              <span class="date">Oct 22, 2023</span>
              <span class="size">0.4 MB</span>
            </div>
          </div>

          <!-- Card 6 -->
          <div class="resource-card animate-up" style="animation-delay: 0.6s">
            <div class="card-top">
              <span class="file-tag note">NOTE</span>
              <button class="download-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
              </button>
            </div>
            <div class="card-info">
              <h3>OS Lab Commands</h3>
              <p>Helpful Linux commands for process management lab...</p>
            </div>
            <div class="card-footer">
              <span class="date">Oct 25, 2023</span>
              <span class="size">0.3 MB</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
</div>

@include('includes.footer')

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Add scroll animations or search filtering logic here if needed
  });
</script>

</body>
</html>
