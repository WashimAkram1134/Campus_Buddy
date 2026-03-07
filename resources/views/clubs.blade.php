<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Clubs | Campus Buddy</title>
    <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clubs.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    @include('includes.menu')

    <div class="layout">
        <main class="main">
            <!-- ================= HERO SECTION ================= -->
            <section class="clubs-hero">
                <div class="clubs-hero-bg"></div>
                <div class="clubs-hero-container">
                    <div class="clubs-hero-left">
                        <div class="clubs-hero-tag reveal">
                            <i class="fas fa-users"></i> Campus Community
                        </div>
                        <h1 class="reveal" style="transition-delay: 0.1s;">
                            Find your tribe.<br>Join a <span class="highlight">Campus Club.</span>
                        </h1>
                        <p class="reveal" style="transition-delay: 0.2s;">
                            Discover organizations that match your passions, build your skills, and connect you with
                            lifelong friends. From robotics to debate, there's a space for everyone.
                        </p>
                        <div class="clubs-hero-buttons reveal" style="transition-delay: 0.3s;">
                            <a href="#explore-clubs" class="btn-primary">Explore Clubs</a>
                            <a href="#create-club" class="btn-secondary">Start a Club</a>
                        </div>
                    </div>
                    <div class="clubs-hero-right reveal" style="transition-delay: 0.4s;">
                        <div class="clubs-hero-image-wrap floating">
                            <!-- Reusing the community study group image for the hero -->
                            <img src="{{ asset('images/community/studygroup.jpg') }}" alt="Students at a Club"
                                class="clubs-hero-img">
                        </div>
                        <div class="club-stat-badge floating" style="animation-delay: 1.5s;">
                            <div class="stat-icon"><i class="fas fa-flag"></i></div>
                            <div class="stat-info">
                                <span class="stat-num">45+</span>
                                <span class="stat-text">Active Clubs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
                    <!-- Club 1 -->
                    <div class="club-card reveal" data-category="tech">
                        <div class="club-banner">
                            <!-- Reusing events image -->
                            <img src="{{ asset('images/clubs/cpc.jpeg') }}" alt="Computer Club">
                            <span class="club-category">Technology</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">💻</div>
                            <div class="club-info">
                                <h3>Computer Programming Club</h3>
                                <p>Join us to solve algorithmic challenges, build open-source projects, and prepare for
                                    competitive programming contests.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Lab 402
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Fridays, 4 PM
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_1.png') }}" alt="Member">
                                    <img src="{{ asset('images/alumni/profile_2.png') }}" alt="Member">
                                    <div class="more">+120</div>
                                </div>
                                <a href="https://www.facebook.com/diucpc.official" target="_blank"
                                    class="join-btn primary pulse-primary">Join Club</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 2 -->
                    <div class="club-card reveal" data-category="arts" style="transition-delay: 0.1s;">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/drama.png') }}" alt="Drama Club">
                            <span class="club-category">Arts</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">🎭</div>
                            <div class="club-info">
                                <h3>Campus Drama Society</h3>
                                <p>Express yourself on stage! We regularly host plays, improve sessions, and actings
                                    workshops for all levels.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Main Auditorium
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Mondays, 5 PM
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_2.png') }}" alt="Member">
                                    <div class="more">+45</div>
                                </div>
                                <a href="https://www.facebook.com/groups/201026803255712" target="_blank"
                                    class="join-btn">Join Club</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 3 -->
                    <div class="club-card reveal" data-category="academic" style="transition-delay: 0.2s;">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/debate.png') }}" alt="Debate Club">
                            <span class="club-category">Academic</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">🎤</div>
                            <div class="club-info">
                                <h3>Debate & Model UN</h3>
                                <p>Enhance your public speaking and critical thinking skills. We participate in national
                                    and international tournaments.</p>
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
                                    <div class="more">+80</div>
                                </div>
                                <a href="https://www.facebook.com/DIUDC" target="_blank" class="join-btn">Join Club</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 4 -->
                    <div class="club-card reveal" data-category="sports">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/sports.png') }}" alt="Sports Club">
                            <span class="club-category">Sports</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">⚽</div>
                            <div class="club-info">
                                <h3>University Sports Athletics</h3>
                                <p>From soccer to basketball, join our community of student athletes to stay fit and
                                    compete.</p>
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
                                <a href="https://www.facebook.com/diusports" target="_blank" class="join-btn">Join
                                    Club</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 5 -->
                    <div class="club-card reveal" data-category="tech" style="transition-delay: 0.1s;">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/robotics.jpeg') }}" alt="Robotics">
                            <span class="club-category">Technology</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">🤖</div>
                            <div class="club-info">
                                <h3>Robotics Innovation Lab</h3>
                                <p>Building the future with hardware and software. We design autonomous bots, drones,
                                    and IoT systems.</p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Makerspace
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Saturdays, 10 AM
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_2.png') }}" alt="Member">
                                    <div class="more">+65</div>
                                </div>
                                <a href="https://www.facebook.com/G.Roboticsacademy" target="_blank"
                                    class="join-btn">Join Club</a>
                            </div>
                        </div>
                    </div>

                    <!-- Club 6 -->
                    <div class="club-card reveal" data-category="arts" style="transition-delay: 0.2s;">
                        <div class="club-banner">
                            <img src="{{ asset('images/clubs/photography.png') }}" alt="Photography">
                            <span class="club-category">Arts</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">📷</div>
                            <div class="club-info">
                                <h3>Photography Society</h3>
                                <p>Capture the moments that matter. Join our monthly photo-walks and exhibition events.
                                </p>
                            </div>
                            <div class="club-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i> Library Media Room
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i> Sundays, 4 PM
                                </div>
                            </div>
                            <div class="club-action">
                                <div class="members-avatar">
                                    <img src="{{ asset('images/alumni/profile_1.png') }}" alt="Member">
                                    <div class="more">+150</div>
                                </div>
                                <a href="https://www.facebook.com/groups/245725059429406" target="_blank"
                                    class="join-btn">Join Club</a>
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

    @include('includes.footer')

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
        })   });
    </script>

</body>

</html>