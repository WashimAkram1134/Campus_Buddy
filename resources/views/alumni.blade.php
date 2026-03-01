<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Network | Campus Buddy</title>
    <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
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
                        <img src="{{ asset('images/alumni/alumni_hero_group.jpg') }}" alt="Alumni Group" class="hero-img">
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

            <div class="filter-container">
                <button class="scroll-btn prev" id="scrollPrev"><i class="fas fa-chevron-left"></i></button>
                <div class="category-filters" id="categoryFilters">
                    <a href="#" class="filter-tag active" data-filter="all">All Categories</a>
                    <a href="#" class="filter-tag" data-filter="journalism">Journalism</a>
                    <a href="#" class="filter-tag" data-filter="bba">BBA</a>
                    <a href="#" class="filter-tag" data-filter="pharmacy">Pharmacy</a>
                    <a href="#" class="filter-tag" data-filter="nfe">NFE</a>
                    <a href="#" class="filter-tag" data-filter="textile">Textile</a>
                    <a href="#" class="filter-tag" data-filter="bcs-govt">BCS/Govt</a>
                    <a href="#" class="filter-tag" data-filter="software-engineering">Software Engineering</a>
                    <a href="#" class="filter-tag" data-filter="data-science">Data Science</a>
                    <a href="#" class="filter-tag" data-filter="marketing">Marketing</a>
                    <a href="#" class="filter-tag" data-filter="finance">Finance</a>
                    <a href="#" class="filter-tag" data-filter="uiux-design">UI/UX Design</a>
                    <a href="#" class="filter-tag" data-filter="cyber-security">Cyber Security</a>
                    <a href="#" class="filter-tag" data-filter="digital-marketing">Digital Marketing</a>
                    <a href="#" class="filter-tag" data-filter="cloud-architecture">Cloud Architecture</a>
                    <a href="#" class="filter-tag" data-filter="ecommerce">E-Commerce</a>
                    <a href="#" class="filter-tag" data-filter="ai-engineering">AI Engineering</a>
                    <a href="#" class="filter-tag" data-filter="management">Management</a>
                </div>
                <button class="scroll-btn next" id="scrollNext"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

        <!-- ================= ALUMNI GRID ================= -->
        <div class="alumni-grid">
            <!-- Alumni Card: Journalism (New) -->
            <div class="alumni-card featured-card" data-category="journalism">
                <div class="card-top">
                    <img src="{{ asset('images/alumni/alumni_journalism.png') }}" alt="ATN News" class="field-img journalism-bg">
                    <div class="premium-badge">PREMIUM</div>
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/alumni_journalism.png') }}" alt="Md. Imdadullah Siddiquee" class="profile-img journalism-profile">
                    </div>
                    <div class="card-category">Journalism</div>
                </div>
                <div class="card-body">
                    <h3>Chief Reporter at ATN Bangla</h3>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of Journalism</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Class of 2015</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>5.0</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Md. Imdadullah Siddiquee</div>
                </div>
            </div>

            <!-- Alumni Card: CSE / Upay (New) -->
            <div class="alumni-card featured-card" data-category="software-engineering data-science">
                <div class="card-top">
                    <div class="field-img-container" style="background: #ffffff; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;">
                        <img src="{{ asset('images/alumni/upay_logo.png') }}" alt="Upay Logo" style="width: 70%; object-fit: contain;">
                    </div>
                    <div class="premium-badge" style="background: #00AAFF;">SOFTWARE ENGINEER</div>
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/alumni_cse_harun.png') }}" alt="Md. Harun-Ur-Rashid" class="profile-img" style="object-position: center 10%;">
                    </div>
                    <div class="card-category">Engineering</div>
                </div>
                <div class="card-body">
                    <h3>Software Engineer at Upay</h3>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of Computer Science and Engineering</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-code"></i>
                            <span>FinTech Specialist</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>5.0</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Md. Harun-Ur-Rashid</div>
                </div>
            </div>

            <!-- Alumni Card: Research Excellence / SWE (New) -->
            <div class="alumni-card featured-card" data-category="software-engineering">
                <div class="card-top">
                    <!-- DIU Building Background -->
                    <div class="field-img-container" style="background: #00AAFF; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <img src="{{ asset('images/alumni/diu_building.png') }}" alt="DIU Building" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.8;">
                    </div>
                    <div class="premium-badge" style="background: #FFD700; color: #1a1e29;">TOP 2% SCIENTIST</div>
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/alumni_swe_javed.png') }}" alt="Mr. F. M. Javed Mehedi Shamrat" class="profile-img" style="object-position: center 10%;">
                    </div>
                    <div class="card-category">Research</div>
                </div>
                <div class="card-body">
                    <h3>Visiting Researcher at DIU & Research Assistant at USQ, Australia</h3>
                    <p style="font-size: 11px; color: #00AAFF; font-weight: 700; margin-top: -5px; margin-bottom: 10px;">World's Top 2% Scientist (Stanford List 2024-25)</p>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of Software Engineering</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-microscope"></i>
                            <span>Global Scientific Recognition</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>5.0</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">F. M. Javed Mehedi Shamrat</div>
                </div>
            </div>

            <!-- Alumni Card: NFE 2 (New) -->
            <div class="alumni-card featured-card" data-category="nfe">
                <div class="card-top">
                    <div class="field-img-container" style="background: #ffffff; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;">
                        <img src="{{ asset('images/alumni/nestle_logo_blue.png') }}" alt="Nestle Logo" style="width: 80%; object-fit: contain;">
                    </div>
                    <div class="premium-badge">NESTLE</div>
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/alumni_nfe_2.png') }}" alt="Tofa Firdaosi Mim" class="profile-img" style="object-position: center 10%;">
                    </div>
                    <div class="card-category">Nutrition</div>
                </div>
                <div class="card-body">
                    <h3>Area Nutrition Officer at Nestle Bangladesh PLC</h3>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of Nutrition and Food Engineering</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-user-tag"></i>
                            <span>Tofa Firdaosi Mim</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>5.0</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">DIU Proud Alumna</div>
                </div>
            </div>

            <!-- Alumni Card: NFE 1 -->
            <div class="alumni-card featured-card" data-category="nfe">
                <div class="card-top">
                    <div class="field-img-container" style="background: #ffffff; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;">
                        <img src="{{ asset('images/alumni/nestle_logo.png') }}" alt="Nestle Logo" style="width: 80%; object-fit: contain;">
                    </div>
                    <div class="premium-badge" style="background: #00AAFF;">CORPORATE</div>
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/alumni_nfe_1.png') }}" alt="Sayma Sultana Sworna" class="profile-img" style="object-position: center 15%;">
                    </div>
                    <div class="card-category">Nutrition</div>
                </div>
                <div class="card-body">
                    <h3>Area Nutrition Officer at Nestle Bangladesh PLC</h3>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of Nutrition and Food Engineering</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-user-tag"></i>
                            <span>Sayma Sultana Sworna</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>5.0</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">DIU Proud Alumna</div>
                </div>
            </div>

            <!-- Alumni Card: BCS / Textile (New) -->
            <div class="alumni-card featured-card" data-category="textile bcs-govt">
                <div class="card-top">
                    <!-- Government Seal Background -->
                    <div class="field-img-container" style="background: #006a4e; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <img src="{{ asset('images/alumni/gov_seal_bd.png') }}" alt="BD Gov Seal" style="width: 45%; object-fit: contain; filter: drop-shadow(0 0 10px rgba(0,0,0,0.3));">
                    </div>
                    <div class="premium-badge" style="background: #bd2130;">TOP SUCCESS</div>
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/alumni_textile_1.png') }}" alt="Md. Faysal Hasan" class="profile-img" style="object-position: center 10%;">
                    </div>
                    <div class="card-category">Government</div>
                </div>
                <div class="card-body">
                    <h3>Assistant Commissioner of Taxes (BCS)</h3>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of Textile Engineering</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-award"></i>
                            <span>Recommended: 45th BCS</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>5.0</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Md. Faysal Hasan</div>
                </div>
            </div>

            <!-- Alumni Card: BBA (New) -->
            <div class="alumni-card featured-card" data-category="bba">
                <div class="card-top">
                    <!-- Using the logo image as part of the background logic -->
                    <div class="field-img-container" style="background: #f8f9fa; height: 180px; display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('images/alumni/imcd_logo.png') }}" alt="IMCD" style="width: 70%; object-fit: contain;">
                    </div>
                    <div class="premium-badge">PREMIUM</div>
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/alumni_bba_1.png') }}" alt="Alumni BBA" class="profile-img" style="object-position: center 10%;">
                    </div>
                    <div class="card-category">Business</div>
                </div>
                <div class="card-body">
                    <h3>Commercial Manager at IMCD Group</h3>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of BBA</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Class of 2016</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>5.0</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Alumni Graduate</div>
                </div>
            </div>

            <!-- Alumni Card: BBA 2 (New) -->
            <div class="alumni-card featured-card" data-category="bba">
                <div class="card-top">
                    <div class="field-img-container" style="background: #0077B5; height: 180px; display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('images/alumni/ace_logo.png') }}" alt="ACE Advisory" style="width: 50%; object-fit: contain;">
                    </div>
                    <div class="premium-badge">PREMIUM</div>
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/alumni_bba_joy.png') }}" alt="Mr. Joy Saha ACA" class="profile-img journalism-profile">
                    </div>
                    <div class="card-category">Business</div>
                </div>
                <div class="card-body">
                    <h3>Head of Tax Advisory & VAT at ACE Advisory</h3>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of Business Administration</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Joy Saha ACA</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>5.0</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Mr. Joy Saha ACA</div>
                </div>
            </div>

            <!-- Alumni Card: Pharmacy (New) -->
            <div class="alumni-card" data-category="pharmacy">
                <div class="card-top">
                    <div class="field-img-container" style="background: #1a3a5a; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <img src="{{ asset('images/alumni/alumni_pharmacy_1.png') }}" alt="Pharmacy Background" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.6; filter: blur(2px);">
                        <div style="position: absolute; color: white; font-weight: 800; font-size: 20px; text-shadow: 0 2px 5px rgba(0,0,0,0.5);">Isabah Plastic</div>
                    </div>
                    <div class="profile-img-wrap">
                        <img src="{{ asset('images/alumni/alumni_pharmacy_1.png') }}" alt="Md. Tanjimul Ahasan" class="profile-img" style="object-position: center 25%;">
                    </div>
                    <div class="card-category">Pharmacy</div>
                </div>
                <div class="card-body">
                    <h3>Senior Executive (Business Development) at Isabah Plastic Industries Ltd.</h3>
                    <div class="alumni-details">
                        <div class="detail-item">
                            <i class="fas fa-university"></i>
                            <span>Dept. of Pharmacy</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-user-graduate"></i>
                            <span>Md. Tanjimul Ahasan</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="rating">
                        <span>4.0</span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">DIU Alumnus</div>
                </div>
            </div>

            <!-- Alumni Card 1 -->
            <div class="alumni-card" data-category="software-engineering">
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
            <div class="alumni-card" data-category="uiux-design">
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
            <div class="alumni-card" data-category="finance">
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

        <div class="load-more-container">
            <button id="loadMoreBtn" class="see-more-btn">See More <i class="fas fa-chevron-down"></i></button>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filters = document.getElementById('categoryFilters');
    const scrollPrev = document.getElementById('scrollPrev');
    const scrollNext = document.getElementById('scrollNext');

    if (filters && scrollPrev && scrollNext) {
        scrollNext.addEventListener('click', () => {
            filters.scrollBy({ left: 300, behavior: 'smooth' });
        });

        scrollPrev.addEventListener('click', () => {
            filters.scrollBy({ left: -300, behavior: 'smooth' });
        });

        // Hide buttons if not scrollable
        const updateButtons = () => {
            scrollPrev.style.opacity = filters.scrollLeft > 0 ? '1' : '0.3';
            scrollNext.style.opacity = filters.scrollLeft < (filters.scrollWidth - filters.clientWidth) ? '1' : '0.3';
        };

        filters.addEventListener('scroll', updateButtons);
        window.addEventListener('resize', updateButtons);
        updateButtons();
    }

    // ================= DYNAMIC FILTERING & LOAD MORE =================
    const filterTags = document.querySelectorAll('.filter-tag');
    const alumniCards = document.querySelectorAll('.alumni-card');
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    let itemsToShow = 6;

    function updateCardVisibility() {
        const activeFilter = document.querySelector('.filter-tag.active').getAttribute('data-filter');
        let visibleCount = 0;
        let totalFiltered = 0;

        alumniCards.forEach((card) => {
            const cardCategory = card.getAttribute('data-category');
            const matchesFilter = activeFilter === 'all' || cardCategory === activeFilter;

            if (matchesFilter) {
                totalFiltered++;
                if (visibleCount < itemsToShow) {
                    card.style.display = 'flex';
                    // Trigger reflow for animation
                    card.style.opacity = '1';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                    card.style.opacity = '0';
                }
            } else {
                card.style.display = 'none';
                card.style.opacity = '0';
            }
        });

        // Hide/Show Load More button
        if (loadMoreBtn) {
            if (visibleCount >= totalFiltered) {
                loadMoreBtn.parentElement.style.display = 'none';
            } else {
                loadMoreBtn.parentElement.style.display = 'block';
            }
        }
    }

    // Handle Filter Clicks
    filterTags.forEach(tag => {
        tag.addEventListener('click', function(e) {
            e.preventDefault();
            filterTags.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            itemsToShow = 6; // Reset to 6 on every filter change
            updateCardVisibility();
        });
    });

    // Handle Load More Click
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            itemsToShow += 6;
            updateCardVisibility();
        });
    }

    // Initial check on load
    updateCardVisibility();
});
</script>

</body>
</html>
