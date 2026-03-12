@extends('layouts.app')

@section('title', 'Campus Community | Campus Buddy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/community.css') }}">
@endpush

@section('content')
    <!-- ================= HERO BANNER ================= -->
    <section class="hero-banner">
        <img src="{{ asset('images/community/campus_community_hero.jpg') }}" alt="Community" class="hero-bg">
        <div class="hero-overlay-dark"></div>

        <div class="hero-content-wrapper hero-text animate-up">
            <div class="hero-deco hero-deco-1"></div>
            <div class="hero-deco hero-deco-2"></div>
            <div class="hero-deco hero-deco-3"></div>
            <div class="hero-deco hero-deco-4"></div>

            <div class="hero-content">
                <span class="hero-date">{{ now()->format('F j, Y') }}</span>
                <span class="hero-tag">CONNECT & COLLABORATE</span>
                <h1>Welcome to your <span>Campus Community.</span></h1>
                <p class="hero-desc">
                    Connect with fellow students, join study groups, and keep up with campus life.
                    Because university is better when we're together.
                </p>

                <div class="hero-stats">
                    <div class="h-stat-item">
                        <span class="h-stat-num">2.4k+</span>
                        <span class="h-stat-label">Members</span>
                    </div>
                    <div class="h-stat-divider"></div>
                    <div class="h-stat-item">
                        <span class="h-stat-num">15</span>
                        <span class="h-stat-label">Districts</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= COMMUNITY NAV ================= -->
    <div class="community-nav-container">
        <div class="community-nav">
            <a href="#study-groups" class="nav-item active">Study Groups</a>
            <a href="#district-associations" class="nav-item">District Associations</a>
            <a href="#campus-events" class="nav-item">Campus Events</a>
            <a href="#mentorship" class="nav-item">Mentorship</a>
        </div>
    </div>

    <!-- ================= MAIN CONTENT ================= -->
    <div class="community-content">

        <!-- STUDY GROUPS -->
        <section id="study-groups" class="comm-section reveal">
            <div class="section-header">
                <h2>Study <span>Groups</span></h2>
                <button class="create-group-btn">+ Create Group</button>
            </div>

            <div class="comm-grid">
                <div class="comm-card group-card">
                    <div class="group-icon math">Σ</div>
                    <div class="group-info">
                        <h3>Advanced Algorithms</h3>
                        <p>Weekly practice for competitive programming.</p>
                        <div class="group-meta">
                            <span class="members">24 Members</span>
                            <span class="activity">Active 2h ago</span>
                        </div>
                    </div>
                    <button class="join-comm-btn">Join Group</button>
                </div>

                <div class="comm-card group-card">
                    <div class="group-icon research">🔬</div>
                    <div class="group-info">
                        <h3>AI Research Hub</h3>
                        <p>Discussing latest papers on LLMs and Vision.</p>
                        <div class="group-meta">
                            <span class="members">15 Members</span>
                            <span class="activity">Active 10m ago</span>
                        </div>
                    </div>
                    <button class="join-comm-btn">Join Group</button>
                </div>

                <div class="comm-card group-card">
                    <div class="group-icon web">🌐</div>
                    <div class="group-info">
                        <h3>Web Dev Warriors</h3>
                        <p>Full-stack projects and UI/UX discussions.</p>
                        <div class="group-meta">
                            <span class="members">42 Members</span>
                            <span class="activity">Active 5h ago</span>
                        </div>
                    </div>
                    <button class="join-comm-btn">Join Group</button>
                </div>
            </div>
        </section>

        <!-- DISTRICT ASSOCIATIONS -->
        <section id="district-associations" class="comm-section reveal">
            <div class="section-header">
                <h2>District <span>Associations</span></h2>
                <div class="search-filter">
                    <input type="text" placeholder="Find your home district...">
                    <i class="fas fa-search"></i>
                </div>
            </div>

            <div class="comm-grid district-grid">
                <div class="comm-card district-card">
                    <img src="{{ asset('images/community/dhaka.jpg') }}" alt="Dhaka" class="dist-bg">
                    <div class="dist-overlay"></div>
                    <div class="dist-content">
                        <h3>Dhaka Students</h3>
                        <p>120+ members from the capital.</p>
                        <button class="explore-btn">Explore</button>
                    </div>
                </div>

                <div class="comm-card district-card">
                    <img src="{{ asset('images/community/chattogram.jpg') }}" alt="Chattogram" class="dist-bg">
                    <div class="dist-overlay"></div>
                    <div class="dist-content">
                        <h3>Chattogram United</h3>
                        <p>85 members. Weekly cultural meets.</p>
                        <button class="explore-btn">Explore</button>
                    </div>
                </div>

                <div class="comm-card district-card">
                    <img src="{{ asset('images/community/sylhet.jpg') }}" alt="Sylhet" class="dist-bg">
                    <div class="dist-overlay"></div>
                    <div class="dist-content">
                        <h3>Sylhet Tea-Union</h3>
                        <p>50 members. Exploring green horizons.</p>
                        <button class="explore-btn">Explore</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- CAMPUS HERO BANNER -->
        <div class="campus-wide-banner reveal">
            <div class="banner-text">
                <h3>Campus Fest 2026 is Coming!</h3>
                <p>Register your group for the annual cultural showcase and tech exhibition.</p>
                <a href="#" class="register-fest-btn">Get Tickets Early</a>
            </div>
            <img src="{{ asset('images/community/fest_mascot.png') }}" alt="Fest" class="fest-mascot">
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ================= NAV ACTIVE STATE =================
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.addEventListener('click', () => {
                    navItems.forEach(n => n.classList.remove('active'));
                    item.classList.add('active');
                });
            });

            // ================= REVEAL ANIMATIONS =================
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
        });
    </script>
@endpush