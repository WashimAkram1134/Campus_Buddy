@extends('layouts.app')

@section('title', 'University Clubs | Campus Buddy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/clubs.css') }}">
@endpush

@section('content')
<!-- ================= HERO SECTION ================= -->
<section class="hero-banner">
    <img src="{{ asset('images/clubs/hero_bg.png') }}" alt="University Clubs" class="hero-bg">
    <div class="hero-overlay-dark"></div>

    <div class="hero-content-wrapper hero-text animate-up">
        <div class="hero-deco hero-deco-1"></div>
        <div class="hero-deco hero-deco-2"></div>
        <div class="hero-deco hero-deco-3"></div>
        <div class="hero-deco hero-deco-4"></div>

        <div class="hero-inner text-left">
            <span class="hero-date">{{ now()->format('F j, Y') }}</span>
            <span class="hero-tag">EXTRACURRICULAR ACTIVITIES</span>
            <h1 class="hero-title">Explore & Join <br><span class="title-accent">University Clubs.</span></h1>
            <p class="hero-subtitle">Connect with students who share your passions and build lasting friendships outside the classroom.</p>

            <div class="hero-stats">
                <div class="stat-box">
                    <span class="stat-value">50+</span>
                    <span class="stat-label">Active Clubs</span>
                </div>
                <div class="stat-box">
                    <span class="stat-value">1.2k+</span>
                    <span class="stat-label">Members</span>
                </div>
                <div class="stat-box">
                    <span class="stat-value">15+</span>
                    <span class="stat-label">Events This Week</span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="clubs-page">
    <div class="dashboard-container mt-10">

            <!-- ================= CLUBS GRID DIRECTORY ================= -->
            <section id="explore-clubs" class="clubs-section">
                <div class="section-header reveal">
                    <div class="section-title">
                        <h2>Explore Organizations</h2>
                        <p>Find and join clubs happening right now on campus.</p>
                    </div>
                    <div class="club-filters">
                        <button class="filter-btn active" data-filter="all">All Clubs</button>
                        <button class="filter-btn" data-filter="tech">Technology</button>
                        <button class="filter-btn" data-filter="arts">Arts & Culture</button>
                        <button class="filter-btn" data-filter="sports">Sports</button>
                        <button class="filter-btn" data-filter="academic">Academic</button>
                    </div>
                </div>

                <div class="clubs-grid">
                    <!-- Club 1: CPC -->
                    <div class="club-card reveal" data-category="tech">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/cpc.jpeg') }}" alt="Computer Club">
                            <span class="club-category">Technology</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">💻</div>
                            <div class="club-info">
                                <h3>Computer Programming Club</h3>
                                <p>DIU CPC is the most primitive and extensive club of our University. We work together to explore every field of Computer Science. Join us to know more.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Lab 402
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Regular Basis
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_1.png') }}" alt="Member">
                                    <img src="{{ asset('images/alumni/profile_2.png') }}" alt="Member">
                                    <div class="more">+500</div>
                                </div>
                                <a href="https://clubs.daffodilvarsity.edu.bd/club/diucpc" target="_blank"
                                    class="join-btn primary pulse-primary">Visit Website</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 2: Robotics -->
                    <div class="club-card reveal" data-category="tech" style="transition-delay: 0.1s;">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/robotics.jpeg') }}" alt="Robotics">
                            <span class="club-category">Technology</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">🤖</div>
                            <div class="club-info">
                                <h3>Robotics Innovation Lab</h3>
                                <p>DIU Robotics Club is a dream to improve skills and inspire generations of young innovative Engineering students with seminars and workshops.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Makerspace
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Regular Basis
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_2.png') }}" alt="Member">
                                    <div class="more">+300</div>
                                </div>
                                <a href="https://clubs.daffodilvarsity.edu.bd/club/diurc" target="_blank"
                                    class="join-btn">Visit Website</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 3: Change Together -->
                    <div class="club-card reveal" data-category="arts" style="transition-delay: 0.2s;">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/change_together.png') }}" alt="Change Together Club">
                            <span class="club-category">Social</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">🌟</div>
                            <div class="club-info">
                                <h3>Change Together Club</h3>
                                <p>Our vision is to create a community baseline that can change this world, mitigate negativity and bring happiness for everyone.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Campus Wide
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Weekly
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_1.png') }}" alt="Member">
                                    <div class="more">+100</div>
                                </div>
                                <a href="https://clubs.daffodilvarsity.edu.bd/club/ctc" target="_blank" class="join-btn">Visit Website</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 4: Photography -->
                    <div class="club-card reveal" data-category="arts">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/photography.png') }}" alt="Photography">
                            <span class="club-category">Arts</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">📷</div>
                            <div class="club-info">
                                <h3>DIU Photographic Society</h3>
                                <p>Founded in 2011 to organize photographers in the University and promote the art of photography through exhibitions.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Library Media Room
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Sundays
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_1.png') }}" alt="Member">
                                    <div class="more">+150</div>
                                </div>
                                <a href="https://clubs.daffodilvarsity.edu.bd/club/diups" target="_blank"
                                    class="join-btn">Visit Website</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 5: Voluntary Service -->
                    <div class="club-card reveal" data-category="arts" style="transition-delay: 0.1s;">
                        <div class="club-banner">
                            <div style="width: 100%; height: 100%; background: #e6fffa; display: flex; align-items: center; justify-content: center; font-size: 40px;">🙌</div>
                            <span class="club-category">Voluntary</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">🧡</div>
                            <div class="club-info">
                                <h3>Voluntary Service Club</h3>
                                <p>A student-led organization where students unselfishly strive to develop skills, promote good deeds or improve people's lives.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Student Lounge
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Fridays
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_2.png') }}" alt="Member">
                                    <div class="more">+200</div>
                                </div>
                                <a href="https://clubs.daffodilvarsity.edu.bd/club/diuvsc" target="_blank"
                                    class="join-btn">Visit Website</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 6: Cultural Club -->
                    <div class="club-card reveal" data-category="arts" style="transition-delay: 0.2s;">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/cultural_club.png') }}" alt="Cultural Club">
                            <span class="club-category">Arts & Culture</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">🎶</div>
                            <div class="club-info">
                                <h3>DIU Cultural Club</h3>
                                <p>Our mission is to promote & enrich our tradition and culture in and beyond the country through music, dance and art.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Main Auditorium
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Weekly
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_1.png') }}" alt="Member">
                                    <div class="more">+250</div>
                                </div>
                                <a href="https://clubs.daffodilvarsity.edu.bd/club/DIUCC" target="_blank"
                                    class="join-btn">Visit Website</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 7: All Stars Daffodil -->
                    <div class="club-card reveal" data-category="arts" style="transition-delay: 0.3s;">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/all_stars.png') }}" alt="All Stars Daffodil">
                            <span class="club-category">Drama</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">🎭</div>
                            <div class="club-info">
                                <h3>All Stars Daffodil</h3>
                                <p>All Stars Daffodil is a drama organization. It is the only theater club at DIU, practicing pure Bengali culture through various plays.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Central Building
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Weekend Basis
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_2.png') }}" alt="Member">
                                    <div class="more">+120</div>
                                </div>
                                <a href="https://clubs.daffodilvarsity.edu.bd/club/asd" target="_blank"
                                    class="join-btn">Visit Website</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 8: Debate -->
                    <div class="club-card reveal" data-category="academic">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/debate.png') }}" alt="Debate Club">
                            <span class="club-category">Academic</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">🎤</div>
                            <div class="club-info">
                                <h3>Debate & Model UN</h3>
                                <p>DIU DC has a reputation for participating in various national and international tournaments. We believe in reasoning.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Room 215
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Wed, 3:30 PM
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_1.png') }}" alt="Member">
                                    <div class="more">+120</div>
                                </div>
                                <a href="https://clubs.daffodilvarsity.edu.bd/club/diudc" target="_blank" class="join-btn">Visit Website</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 9: Sports -->
                    <div class="club-card reveal" data-category="sports" id="sports-club">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/sports.png') }}" alt="Sports Club">
                            <span class="club-category">Sports</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">⚽</div>
                            <div class="club-info">
                                <h3>University Sports Athletics</h3>
                                <p>From soccer to basketball, join our community of student athletes to stay fit and compete representing DIU.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Uni Stadium
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Tu/Th, 6 PM
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_1.png') }}" alt="Member">
                                    <img src="{{ asset('images/alumni/profile_2.png') }}" alt="Member">
                                    <div class="more">+300</div>
                                </div>
                                <a href="https://clubs.daffodilvarsity.edu.bd/club/diusports" target="_blank" class="join-btn">Visit Website</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ================= CREATE A CLUB BANNER ================= -->
            <section id="create-club" class="create-club-banner reveal">
                <div class="cc-container">
                    <div class="cc-decor"></div>
                    <div class="cc-content">
                        <h2>Can't find a club for your interest?</h2>
                        <p>Start a new student organization! Gather at least 10 members, draft a charter, and apply to
                            become an officially recognized campus club.</p>
                    </div>
                    <div class="cc-action">
                        <a href="#" class="btn-primary">Start a New Club</a>
                    </div>
                </div>
            </section>

        </main>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Reveal Animations using Intersection Observer
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal').forEach(el => {
                observer.observe(el);
            });

            // Filtering Logic
            const filterBtns = document.querySelectorAll('.filter-btn');
            const clubCards = document.querySelectorAll('.club-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterBtns.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    btn.classList.add('active');

                    const filterValue = btn.getAttribute('data-filter');

                    clubCards.forEach(card => {
                        if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                            card.style.display = 'flex';
                            // Re-trigger animation
                            setTimeout(() => {
                                card.classList.remove('active');
                                setTimeout(() => card.classList.add('active'), 50);
                            }, 10);
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            })
        });
    </script>
@endpush