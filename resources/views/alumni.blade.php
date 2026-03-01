<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Network | Campus Buddy</title>
    <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alumni.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

@include('includes.menu')

<div class="layout">
    <main class="main">
        <!-- ================= HERO SECTION ================= -->
        <section class="hero-banner">
            <div class="hero-content-wrapper">
                <div class="hero-left">
                    <span class="hero-tag">Start your bright career</span>
                    <h1>Now learning from anywhere, and build your <span>bright career.</span></h1>
                    <p>Connect with a global network of professionals who started exactly where you are. Get mentorship, job alerts, and industry insights from Campus Buddy alumni.</p>
                    <a href="#alumni-network" class="hero-btn">Explore Network</a>
                </div>
                <div class="hero-right">
                    <div class="hero-img-container">
                        <img src="{{ asset('images/alumni/alumni_hero.png') }}" alt="Alumni Hero" class="hero-img">
                        <div class="hero-stats-badge">
                            <span class="count">1,235</span>
                            <span class="label">Alumni</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= ALUMNI NETWORK SECTION ================= -->
        <section id="alumni-network" class="alumni-header-section">
            <div class="section-title-row">
                <div class="section-title">
                    <h2>Alumni <span>Network</span> of Campus Buddy</h2>
                </div>
                <div class="search-box">
                    <input type="text" placeholder="Search alumni, companies, or skills...">
                    <button class="search-btn"><i class="fas fa-search"></i></button>
                </div>
            </div>

            <div class="category-filters">
                <a href="#" class="filter-tag active">All Categories</a>
                <a href="#" class="filter-tag">Software Engineering</a>
                <a href="#" class="filter-tag">Data Science</a>
                <a href="#" class="filter-tag">Marketing</a>
                <a href="#" class="filter-tag">Finance</a>
                <a href="#" class="filter-tag">UI/UX Design</a>
            </div>
        </section>

        <!-- ================= ALUMNI GRID ================= -->
        <div class="alumni-grid">
            <!-- Alumni Card 1 -->
            <div class="alumni-card">
                <div class="card-top">
                    <img src="{{ asset('images/alumni/alumni_tech_bg.png') }}" alt="Tech" class="field-img">
                    <div class="premium-badge">PREMIUM</div>
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/profile_1.png') }}" alt="Profile" class="profile-img">
                    </div>
                    <div class="card-category">Science</div>
                </div>
                <div class="card-body">
                    <h3>Senior Software Engineer at Google</h3>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of CSE</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Class of 2018</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>4.9</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Jason Williams</div>
                </div>
            </div>

            <!-- Alumni Card 2 -->
            <div class="alumni-card">
                <div class="card-top">
                    <img src="{{ asset('images/alumni/alumni_tech_bg.png') }}" alt="Tech" class="field-img">
                    <div class="premium-badge">PREMIUM</div>
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/profile_2.png') }}" alt="Profile" class="profile-img">
                    </div>
                    <div class="card-category">Science</div>
                </div>
                <div class="card-body">
                    <h3>UX Design Lead at Adobe</h3>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of SWE</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Class of 2019</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>4.8</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Pamela Foster</div>
                </div>
            </div>

            <!-- Alumni Card 3 -->
            <div class="alumni-card">
                <div class="card-top">
                    <img src="{{ asset('images/alumni/alumni_tech_bg.png') }}" alt="Tech" class="field-img">
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/profile_1.png') }}" alt="Profile" class="profile-img">
                    </div>
                    <div class="card-category">Business</div>
                </div>
                <div class="card-body">
                    <h3>Financial Analyst at Goldman Sachs</h3>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of BBA</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Class of 2020</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>4.2</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Rose Simmons</div>
                </div>
            </div>
        </div>

        <div class="btn-view-more">
            <button class="more-btn">Discover More Alumni</button>
        </div>

        <!-- ================= JOIN CTA SECTION ================= -->
        <section class="join-mentor-section">
            <div class="cta-box">
                <div class="cta-content">
                    <h4>Become An Alumni Mentor</h4>
                    <h2>You can join with <span>Campus Buddy</span> as a mentor?</h2>
                    <a href="#" class="hero-btn">Register Today</a>
                </div>
                <!-- Optional: Mascot or decoration can go here -->
            </div>
        </section>

    </main>
</div>

@include('includes.footer')

</body>
</html>
