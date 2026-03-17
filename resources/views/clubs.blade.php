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
                    @forelse($clubs as $club)
                    <div class="club-card reveal" data-category="{{ $club->type }}">
                        <div class="club-banner">
                            <img src="{{ Str::startsWith($club->image_path, 'http') ? $club->image_path : asset('storage/' . $club->image_path) }}" 
                                 alt="{{ $club->name }}">
                            <span class="club-category">{{ ucfirst($club->type) }}</span>
                        </div>
                        <div class="club-body">
                            <div class="club-logo">🌟</div>
                            <div class="club-info">
                                <h3>{{ $club->name }}</h3>
                                <p>{{ $club->description }}</p>
                            </div>
                            <div class="club-action" style="margin-top: auto;">
                                <div class="members-avatar">
                                    <div class="more">+{{ rand(50, 500) }}</div>
                                </div>
                                @if($club->website_link)
                                <a href="{{ $club->website_link }}" target="_blank"
                                    class="join-btn primary pulse-primary">Visit Website</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <p style="color:var(--text-muted); padding: 20px;">No clubs uploaded by Admin yet.</p>
                    @endforelse
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