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
    
    <!-- ================= HERO BANNER ================= -->
    <section class="hero-banner">
      <img src="{{ asset('images/notes/notes_hero.png') }}" alt="PDF & Notes" class="hero-bg">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <span class="hero-tag">RESOURCES & MATERIALS</span>
        <h1>Access your <span>PDF & Notes</span> <em>anytime, anywhere.</em></h1>
        <p class="hero-desc">
          Your centralized repository for class materials, lecture slides, and student-contributed notes.
          Stay organized and prepare for your exams with ease.
        </p>
        
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

        <div class="resources-grid collapsed" id="pdfGrid">
          <!-- Card 1 -->
          <div class="resource-card pdf-card animate-up" style="animation-delay: 0.1s">
            <div class="pdf-visual">
              <div class="pdf-corner"></div>
              <div class="pdf-logo">PDF</div>
              <div class="pdf-icon-symbol">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
              </div>
            </div>
            <div class="card-info">
              <h3>Data Structures - L3</h3>
              <p>Arrays & Linked Lists overview.</p>
              <div class="card-meta-row">
                <span class="size-badge">2.4 MB</span>
                <div class="card-actions-mini">
                  <button class="mini-view-btn pdf">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  </button>
                  <button class="mini-dl-btn pdf">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Card 2 -->
          <div class="resource-card pdf-card animate-up" style="animation-delay: 0.2s">
            <div class="pdf-visual">
              <div class="pdf-corner"></div>
              <div class="pdf-logo">PDF</div>
              <div class="pdf-icon-symbol">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
              </div>
            </div>
            <div class="card-info">
              <h3>Database Systems - Mid</h3>
              <p>Normalization & SQL Queries...</p>
              <div class="card-meta-row">
                <span class="size-badge">1.8 MB</span>
                <div class="card-actions-mini">
                  <button class="mini-view-btn pdf">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  </button>
                  <button class="mini-dl-btn pdf">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="resource-card pdf-card animate-up" style="animation-delay: 0.3s">
            <div class="pdf-visual">
              <div class="pdf-corner"></div>
              <div class="pdf-logo">PDF</div>
              <div class="pdf-icon-symbol">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
              </div>
            </div>
            <div class="card-info">
              <h3>Algorithm Analysis - L5</h3>
              <p>Dynamic Programming and Greed Approaches...</p>
              <div class="card-meta-row">
                <span class="size-badge">3.2 MB</span>
                <div class="card-actions-mini">
                  <button class="mini-view-btn pdf">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  </button>
                  <button class="mini-dl-btn pdf">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 3.1 (Extra) -->
          <div class="resource-card pdf-card animate-up" style="animation-delay: 0.35s">
            <div class="pdf-visual">
              <div class="pdf-corner"></div>
              <div class="pdf-logo">PDF</div>
              <div class="pdf-icon-symbol">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
              </div>
            </div>
            <div class="card-info">
              <h3>Discrete Math - L7</h3>
              <p>Probability and Set Theory Notes...</p>
              <div class="card-meta-row">
                <span class="size-badge">2.1 MB</span>
                <div class="card-actions-mini">
                  <button class="mini-view-btn pdf">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  </button>
                  <button class="mini-dl-btn pdf">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="view-more-container">
          <button class="view-more-btn" onclick="toggleGrid('pdfGrid', this)">
            <span>View More</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
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

        <div class="resources-grid collapsed" id="notesGrid">
          <!-- Card 4 -->
          <div class="resource-card notebook-card animate-up" style="animation-delay: 0.4s">
            <div class="notebook-visual">
              <div class="notebook-rings">
                <span></span><span></span><span></span><span></span><span></span>
              </div>
              <div class="notebook-body">
                <div class="notebook-text">Notes</div>
              </div>
            </div>
            <div class="card-info">
              <h3>AI Lecture Summary</h3>
              <p>Neural network backpropagation steps...</p>
              <div class="card-meta-row">
                <span class="size-badge note">0.5 MB</span>
                <div class="card-actions-mini">
                  <button class="mini-view-btn note">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  </button>
                  <button class="mini-dl-btn note">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Card 5 -->
          <div class="resource-card notebook-card animate-up" style="animation-delay: 0.5s">
            <div class="notebook-visual">
              <div class="notebook-rings">
                <span></span><span></span><span></span><span></span><span></span>
              </div>
              <div class="notebook-body">
                <div class="notebook-text">Notes</div>
              </div>
            </div>
            <div class="card-info">
              <h3>Web Dev Shortcuts</h3>
              <p>Essential React hooks tips...</p>
              <div class="card-meta-row">
                <span class="size-badge note">0.4 MB</span>
                <div class="card-actions-mini">
                  <button class="mini-view-btn note">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  </button>
                  <button class="mini-dl-btn note">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 6 -->
          <div class="resource-card notebook-card animate-up" style="animation-delay: 0.6s">
            <div class="notebook-visual">
              <div class="notebook-rings">
                <span></span><span></span><span></span><span></span><span></span>
              </div>
              <div class="notebook-body">
                <div class="notebook-text">Notes</div>
              </div>
            </div>
            <div class="card-info">
              <h3>OS Lab Commands</h3>
              <p>Helpful Linux commands for process management lab...</p>
              <div class="card-meta-row">
                <span class="size-badge note">0.3 MB</span>
                <div class="card-actions-mini">
                  <button class="mini-view-btn note">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  </button>
                  <button class="mini-dl-btn note">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 6.1 (Extra) -->
          <div class="resource-card notebook-card animate-up" style="animation-delay: 0.7s">
            <div class="notebook-visual">
              <div class="notebook-rings">
                <span></span><span></span><span></span><span></span><span></span>
              </div>
              <div class="notebook-body">
                <div class="notebook-text">Notes</div>
              </div>
            </div>
            <div class="card-info">
              <h3>Software Architecture</h3>
              <p>Microservices vs Monolith patterns notes...</p>
              <div class="card-meta-row">
                <span class="size-badge note">0.6 MB</span>
                <div class="card-actions-mini">
                  <button class="mini-view-btn note">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  </button>
                  <button class="mini-dl-btn note">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="view-more-container">
          <button class="view-more-btn" onclick="toggleGrid('notesGrid', this)">
            <span>View More</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
        </div>
      </div>
    </div>

  </main>
</div>

@include('includes.footer')

<script>
  function toggleGrid(gridId, btn) {
    const grid = document.getElementById(gridId);
    const span = btn.querySelector('span');
    const svg = btn.querySelector('svg');
    
    grid.classList.toggle('collapsed');
    
    if (grid.classList.contains('collapsed')) {
      span.textContent = 'View More';
      svg.style.transform = 'rotate(0deg)';
    } else {
      span.textContent = 'Show Less';
      svg.style.transform = 'rotate(180deg)';
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    // Initial animations already handled by .animate-up class in CSS
  });
</script>

</body>
</html>
