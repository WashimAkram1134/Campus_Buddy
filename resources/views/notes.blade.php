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
        <div class="hero-overlay-dark"></div>

        <div class="hero-content-wrapper">
          <div class="hero-deco hero-deco-1"></div>
          <div class="hero-deco hero-deco-2"></div>
          <div class="hero-deco hero-deco-3"></div>
          <div class="hero-deco hero-deco-4"></div>

          <div class="hero-content">
            <span class="hero-date">{{ now()->format('F j, Y') }}</span>
            <span class="hero-tag">RESOURCES & MATERIALS</span>
            <h1>Access your <span>PDF & Notes</span> <em>anytime, anywhere.</em></h1>
            <p class="hero-desc">
              Your centralized repository for class materials, lecture slides, and student-contributed notes.
              Stay organized and prepare for your exams with ease.
            </p>

            <div class="search-container">
              <div class="search-box">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <circle cx="11" cy="11" r="8" />
                  <path d="m21 21-4.3-4.3" />
                </svg>
                <input type="text" placeholder="Search by subject, topic or professor...">
              </div>
            </div>
          </div>
        </div>
      </section>

      @if(session('success'))
      <div
        style="margin: 20px 40px; padding: 15px 25px; background: #e6fffa; border-left: 5px solid #38b2ac; border-radius: 10px; color: #2c7a7b; font-weight: 600; box-shadow: 0 4px 15px rgba(0,0,0,0.05); animation: slideDown 0.5s ease; z-index: 100; position: relative;">
        ✅ {{ session('success') }}
      </div>
      @endif

      @if(session('error'))
      <div
        style="margin: 20px 40px; padding: 15px 25px; background: #fff5f5; border-left: 5px solid #f56565; border-radius: 10px; color: #c53030; font-weight: 600; box-shadow: 0 4px 15px rgba(0,0,0,0.05); animation: slideDown 0.5s ease; z-index: 100; position: relative;">
        ❌ {{ session('error') }}
      </div>
      @endif

      @if($errors->any())
      <div
        style="margin: 20px 40px; padding: 15px 25px; background: #fff5f5; border-left: 5px solid #f56565; border-radius: 10px; color: #c53030; font-weight: 600; box-shadow: 0 4px 15px rgba(0,0,0,0.05); animation: slideDown 0.5s ease; z-index: 100; position: relative;">
        ❌ Please correct the following errors:
        <ul style="margin-top: 10px; margin-left: 20px;">
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <!-- ================= SPLIT SECTION ================= -->
      <div class="notes-container">

        <!-- LEFT: CLASS MATERIALS (PDFs) -->
        <div class="resources-section pdf-section">
          <div class="section-header">
            <div class="header-title">
              <div class="icon-box pdf">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                  <polyline points="14 2 14 8 20 8" />
                </svg>
              </div>
              <h2>Class Materials</h2>
            </div>
            <span class="count">{{ $classMaterials->count() }} Files</span>
          </div>
          <div class="resources-grid collapsed" id="pdfGrid">
            @foreach($classMaterials as $index => $material)
            <div class="resource-card pdf-card animate-up" style="animation-delay: {{ 0.1 * ($index + 1) }}s">
              <div class="pdf-visual">
                <div class="pdf-corner"></div>
                <div class="pdf-logo">{{ strtoupper($material->file_extension) }}</div>
                <div class="pdf-icon-symbol">
                  @if($material->file_extension == 'pdf')
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                  </svg>
                  @else
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                    <line x1="12" y1="8" x2="12" y2="16" />
                    <line x1="8" y1="12" x2="16" y2="12" />
                  </svg>
                  @endif
                </div>
              </div>
              <div class="card-info">
                <h3>{{ $material->title }}</h3>
                <p>{{ $material->course_code }}</p>
                <div class="card-meta-row">
                  <span class="size-badge">{{ strtoupper($material->file_extension) }}</span>
                  <div class="card-actions-mini">
                    <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank" class="mini-view-btn pdf"
                      style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                        <circle cx="12" cy="12" r="3" />
                      </svg>
                    </a>
                    <a href="{{ asset('storage/' . $material->file_path) }}" download class="mini-dl-btn pdf"
                      style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                        <polyline points="7 10 12 15 17 10" />
                        <line x1="12" y1="15" x2="12" y2="3" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            @if($classMaterials->isEmpty())
            <div class="card-box"
              style="grid-column: 1/-1; text-align: center; padding: 40px; background: rgba(255,255,255,0.5); border-radius: 15px; border: 2px dashed #cbd5e0; width: 100%;">
              <p style="color: #718096; font-weight: 500;">No class materials uploaded yet for your section.</p>
            </div>
            @endif
          </div>
          <div class="view-more-container">
            <button class="view-more-btn" onclick="toggleGrid('pdfGrid', this)">
              <span>View More</span>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="6 9 12 15 18 9" />
              </svg>
            </button>
          </div>
        </div>

        <!-- RIGHT: HAND NOTES -->
        <div class="resources-section notes-section">
          <div class="section-header">
            <div class="header-title">
              <div class="icon-box note">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                </svg>
              </div>
              <h2>Hand Notes</h2>
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
              <button onclick="openModal('noteUploadModal')"
                style="background: #00AAFF; color: white; border: none; padding: 6px 12px; border-radius: 8px; font-weight: 700; cursor: pointer; font-size: 13px; transition: all 0.3s ease;">
                + Upload Note
              </button>
              <span class="count">{{ $handNotes->count() }} Files</span>
            </div>
          </div>

          <div class="resources-grid collapsed" id="notesGrid">
            @foreach($handNotes as $index => $material)
            <div class="resource-card notebook-card animate-up" style="animation-delay: {{ 0.1 * ($index + 1) }}s">
              <div class="notebook-visual">
                <div class="notebook-rings">
                  <span></span><span></span><span></span><span></span><span></span>
                </div>
                <div class="notebook-body">
                  <div class="notebook-text">{{ strtoupper($material->file_extension) }}</div>
                </div>
              </div>
              <div class="card-info">
                <h3>{{ $material->title }}</h3>
                <p>{{ $material->course_code }}</p>
                <div class="card-meta-row">
                  <span class="size-badge note">{{ strtoupper($material->file_extension) }}</span>
                  <div class="card-actions-mini">
                    <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank" class="mini-view-btn note"
                      style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                        <circle cx="12" cy="12" r="3" />
                      </svg>
                    </a>
                    <a href="{{ asset('storage/' . $material->file_path) }}" download class="mini-dl-btn note"
                      style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                        <polyline points="7 10 12 15 17 10" />
                        <line x1="12" y1="15" x2="12" y2="3" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            @if($handNotes->isEmpty())
            <div class="card-box"
              style="grid-column: 1/-1; text-align: center; padding: 40px; background: rgba(255,255,255,0.5); border-radius: 15px; border: 2px dashed #cbd5e0; width: 100%;">
              <p style="color: #718096; font-weight: 500;">No hand notes uploaded yet.</p>
            </div>
            @endif
          </div>
          <div class="view-more-container">
            <button class="view-more-btn" onclick="toggleGrid('notesGrid', this)">
              <span>View More</span>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="6 9 12 15 18 9" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- ================= PERSONALIZED ROUTINE BANNER ================= -->
      <section class="personalized-banner">
        <div class="banner-content">
          <h2 class="banner-title">Summarize PDF or Notes</h2>
          <a href="#" class="banner-chat-btn">Chat with Buddy</a>
          <img src="{{ asset('images/menuicons/Buddy.png') }}" alt="Buddy" class="banner-mascot">
        </div>
      </section>

    </main>
  </div>

  <!-- ================= HAND NOTE UPLOAD MODAL ================= -->
  <div id="noteUploadModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Upload Hand Note</h2>
        <span class="close" onclick="closeModal('noteUploadModal')">&times;</span>
      </div>
      <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="hand_note">
        <div class="form-group">
          <label for="note_course_code">Course Code</label>
          <input type="text" name="course_code" id="note_course_code" placeholder="e.g. CSE 421" required>
        </div>
        <div class="form-group">
          <label for="note_title">Note Title</label>
          <input type="text" name="title" id="note_title" placeholder="e.g. Chapter 3 Summary" required>
        </div>
        <div class="form-group">
          <label for="note_file">Upload File (PDF, PPTX, DOCS - Max 64MB)</label>
          <input type="file" name="file" id="note_file" accept=".pdf,.pptx,.docx,.doc" required
            style="padding: 10px; border: 2px dashed #00AAFF; background: #f0faff; width: 100%;">
        </div>
        <button type="submit" class="submit-btn"
          style="margin-top: 15px; width: 100%; background: #00AAFF; color: white; border: none; padding: 12px; border-radius: 10px; font-weight: 700; cursor: pointer;">Upload
          Note</button>
      </form>
    </div>
  </div>

  @include('includes.footer')

  <script>
    function openModal(id) {
      document.getElementById(id).style.display = 'flex';
    }

    function closeModal(id) {
      document.getElementById(id).style.display = 'none';
    }

    window.onclick = function (event) {
      if (event.target.className === 'modal') {
        event.target.style.display = 'none';
      }
    }

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

    document.addEventListener('DOMContentLoaded', function () {
      // Initial animations already handled by .animate-up class in CSS
    });
  </script>
</body>

</html>