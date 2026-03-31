@extends('layouts.app')

@section('title', 'Alumni Network | Campus Buddy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/alumni.css') }}">
@endpush

@section('content')
    <!-- ================= HERO SECTION ================= -->
    <section class="hero-banner reveal active">
        <img src="{{ asset('images/alumni/Alumni_BG.png') }}" alt="Alumni Background" class="hero-bg">
        {{-- Decorative dots matching dashboard --}}
        <div class="hero-deco hero-deco-1"></div>
        <div class="hero-deco hero-deco-2"></div>
        <div class="hero-deco hero-deco-3"></div>
        <div class="hero-deco hero-deco-4"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content-wrapper hero-text animate-up">
            <div class="hero-left">
                <span class="hero-date">{{ now()->format('F j, Y') }}</span>
                <span class="hero-tag animate-item up stagger-1">START YOUR BRIGHT CAREER</span>
                <h1 class="animate-item up stagger-2">Now learning from anywhere, and build your <span>bright
                        career.</span></h1>
                <p class="hero-desc animate-item up stagger-3">Connect with a global network of professionals who started
                    exactly where you are. Get mentorship, job alerts, and industry insights from Campus Buddy
                    alumni.</p>
                <a href="https://alumni.daffodilvarsity.edu.bd/" target="_blank" rel="noopener noreferrer" class="hero-btn animate-item up stagger-4 pulse">Explore Network</a>
            </div>
            <div class="hero-right">
                <div class="hero-collage">
                    <div class="collage-item collage-item-1">
                        <img src="{{ asset('images/alumni/alumni_hero-section_image1.jpg') }}" alt="Alumni in New York">
                        <span class="collage-label">New York</span>
                    </div>
                    <div class="collage-item collage-item-2">
                        <img src="{{ asset('images/alumni/alumni_hero-section_image2.png') }}" alt="Graduation Day">
                        <span class="collage-label">Convocation</span>
                    </div>
                    <div class="collage-item collage-item-3">
                        <img src="{{ asset('images/alumni/alumni_hero-section_image3.png') }}" alt="Alumni in Sydney">
                        <span class="collage-label">Sydney</span>
                    </div>
                    <div class="collage-item collage-item-4">
                        <img src="{{ asset('images/alumni/alumni_hero-section_image4.png') }}" alt="Alumni in Germany">
                        <span class="collage-label">Germany</span>
                    </div>
                    <div class="collage-center-badge floating">
                        <span class="count">1,235</span>
                        <span class="label">Alumni</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Status Messages --}}
    <div class="container message-container" style="margin-top: -20px; position: relative; z-index: 10;">
        @if($pendingRegistration)
            <div class="registration-status-banner pending animate-up" style="background: white; border-radius: 16px; padding: 20px 30px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-left: 6px solid #FAC35A; margin-bottom: 30px;">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div style="background: #FFF9EB; color: #FAC35A; width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <h4 style="margin: 0; color: #1a1e29; font-weight: 800;">Registration Pending Approval</h4>
                        <p style="margin: 5px 0 0; color: #64748b; font-size: 14px;">Your application as an alumni mentor is currently being reviewed by our administration. Once approved, your profile will be live in the network.</p>
                    </div>
                </div>
                <div style="font-size: 11px; font-weight: 800; color: #FAC35A; text-transform: uppercase; background: #FFF9EB; padding: 5px 12px; border-radius: 50px;">Under Review</div>
            </div>
        @endif

        @if($justApproved)
            <div id="approvalToast" class="registration-status-banner approved animate-up" style="background: white; border-radius: 16px; padding: 20px 30px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-left: 6px solid #10b981; margin-bottom: 30px; animation: slideInUp 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div style="background: #ECFDF5; color: #10b981; width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <h4 style="margin: 0; color: #1a1e29; font-weight: 800;">Congratulations, {{ auth()->user()->name }}!</h4>
                        <p style="margin: 5px 0 0; color: #64748b; font-size: 14px;">Your alumni registration has been approved. You are now officially a part of our premier mentor network.</p>
                    </div>
                </div>
                <div style="font-size: 11px; font-weight: 800; color: #10b981; text-transform: uppercase; background: #ECFDF5; padding: 5px 12px; border-radius: 50px;">Approved</div>
            </div>
        @endif
    </div>

    <!-- ================= ALUMNI NETWORK SECTION ================= -->
    <section id="alumni-network" class="alumni-header-section reveal">
        <div class="section-title-row">
            <div class="section-title animate-item left stagger-1">
                <h2>Alumni <span>Network</span> of Campus Buddy</h2>
            </div>
            <div class="search-box animate-item right stagger-1">
                <input type="text" placeholder="Search alumni, companies, or skills...">
                <button class="search-btn"><i class="fas fa-search"></i></button>
            </div>
        </div>

        <div class="filter-container animate-item up stagger-2">
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
    <div class="alumni-grid reveal">
        @foreach($approvedAlumni as $alumni)
        <div class="alumni-card featured-card reveal animate-item up" data-category="{{ $alumni->category }}">
            <div class="card-top" style="overflow: hidden;">
                @if($alumni->company_logo)
                    <img src="{{ asset('storage/' . $alumni->company_logo) }}" alt="{{ $alumni->company }}" class="field-img" style="width: 100%; height: 100%; object-fit: cover;">
                @elseif($alumni->card_bg_image)
                    <img src="{{ asset('storage/' . $alumni->card_bg_image) }}" alt="{{ $alumni->company }}" class="field-img">
                @else
                    <img src="{{ asset('images/alumni/alumni_tech_bg.png') }}" alt="{{ $alumni->company }}" class="field-img">
                @endif
                <div class="premium-badge">ALUMNI</div>
                <div class="profile-img-wrap">
                    @if($alumni->profile_image)
                        <img src="{{ asset('storage/' . $alumni->profile_image) }}" alt="{{ $alumni->full_name }}" class="profile-img">
                    @else
                        <img src="{{ asset('images/alumni/profile_placeholder.png') }}" alt="{{ $alumni->full_name }}" class="profile-img">
                    @endif
                </div>
                <div class="card-category">{{ ucfirst(str_replace('-', ' ', $alumni->category)) }}</div>
            </div>
            <div class="card-body">
                <h3>{{ $alumni->current_position }} @ {{ $alumni->company }}</h3>
                <div class="alumni-details">
                    <div class="detail-item">
                        <i class="fas fa-university"></i>
                        <span>{{ $alumni->department }}</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Class of {{ $alumni->graduation_year }}</span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                @if($alumni->linkedin_url)
                    <a href="{{ $alumni->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="connect-btn">Connect</a>
                @else
                    <a href="#" class="connect-btn">Connect</a>
                @endif
                <div class="rating">
                    <span>5.0</span>
                    <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                </div>
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">{{ $alumni->full_name }}</div>
            </div>
        </div>
        @endforeach

        <!-- Alumni Card: Journalism (New) -->
        <div class="alumni-card featured-card reveal animate-item up stagger-1" data-category="journalism">
            <div class="card-top">
                <img src="{{ asset('images/alumni/alumni_journalism.png') }}" alt="ATN News"
                    class="field-img journalism-bg">
                <div class="premium-badge">PREMIUM</div>
                <div class="profile-img-wrap">
                    <img src="{{ asset('images/alumni/alumni_journalism.png') }}" alt="Md. Imdadullah Siddiquee"
                        class="profile-img journalism-profile">
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Md. Imdadullah
                    Siddiquee</div>
            </div>
        </div>

        <!-- Alumni Card: CSE / Upay (New) -->
        <div class="alumni-card featured-card reveal animate-item up stagger-2"
            data-category="software-engineering data-science">
            <div class="card-top">
                <div class="field-img-container"
                    style="background: #ffffff; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;">
                    <img src="{{ asset('images/alumni/upay_logo.png') }}" alt="Upay Logo"
                        style="width: 70%; object-fit: contain;">
                </div>
                <div class="premium-badge">PREMIUM</div>
                <div class="profile-img-wrap">
                    <img src="{{ asset('images/alumni/alumni_cse_harun.png') }}" alt="Md. Harun-Ur-Rashid"
                        class="profile-img" style="object-position: center 10%;">
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Md.
                    Harun-Ur-Rashid</div>
            </div>
        </div>

        <!-- Alumni Card: Research Excellence / SWE (New) -->
        <div class="alumni-card featured-card reveal animate-item up stagger-3" data-category="software-engineering">
            <div class="card-top">
                <!-- DIU Building Background -->
                <div class="field-img-container"
                    style="background: #00AAFF; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    <img src="{{ asset('images/alumni/diu_building.png') }}" alt="DIU Building"
                        style="width: 100%; height: 100%; object-fit: cover; opacity: 0.8;">
                </div>
                <div class="premium-badge" style="background: #FFD700; color: #1a1e29;">PREMIUM</div>
                <div class="profile-img-wrap">
                    <img src="{{ asset('images/alumni/alumni_swe_javed.png') }}" alt="Mr. F. M. Javed Mehedi Shamrat"
                        class="profile-img" style="object-position: center 10%;">
                </div>
                <div class="card-category">Research</div>
            </div>
            <div class="card-body">
                <h3>Visiting Researcher at DIU & Research Assistant at USQ, Australia</h3>
                <p style="font-size: 11px; color: #00AAFF; font-weight: 700; margin-top: -5px; margin-bottom: 10px;">
                    World's Top 2% Scientist (Stanford List 2024-25)</p>
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">F. M. Javed
                    Mehedi Shamrat</div>
            </div>
        </div>

        <!-- Alumni Card: NFE 2 (New) -->
        <div class="alumni-card featured-card reveal animate-item up stagger-4" data-category="nfe">
            <div class="card-top">
                <div class="field-img-container"
                    style="background: #ffffff; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;">
                    <img src="{{ asset('images/alumni/nestle_logo_blue.png') }}" alt="Nestle Logo"
                        style="width: 80%; object-fit: contain;">
                </div>
                <div class="premium-badge">PREMIUM</div>
                <div class="profile-img-wrap">
                    <img src="{{ asset('images/alumni/alumni_nfe_2.png') }}" alt="Tofa Firdaosi Mim" class="profile-img"
                        style="object-position: center 10%;">
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">DIU Proud
                    Alumna</div>
            </div>
        </div>

        <!-- Alumni Card: NFE 1 -->
        <div class="alumni-card featured-card reveal animate-item up stagger-5" data-category="nfe">
            <div class="card-top">
                <div class="field-img-container"
                    style="background: #ffffff; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;">
                    <img src="{{ asset('images/alumni/nestle_logo.png') }}" alt="Nestle Logo"
                        style="width: 80%; object-fit: contain;">
                </div>
                <div class="premium-badge">PREMIUM</div>
                <div class="profile-img-wrap">
                    <img src="{{ asset('images/alumni/alumni_nfe_1.png') }}" alt="Sayma Sultana Sworna"
                        class="profile-img" style="object-position: center 15%;">
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">DIU Proud
                    Alumna</div>
            </div>
        </div>

        <!-- Alumni Card: BCS / Textile (New) -->
        <div class="alumni-card featured-card reveal animate-item up stagger-6" data-category="textile bcs-govt">
            <div class="card-top">
                <!-- Government Seal Background -->
                <div class="field-img-container"
                    style="background: #006a4e; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    <img src="{{ asset('images/alumni/gov_seal_bd.png') }}" alt="BD Gov Seal"
                        style="width: 45%; object-fit: contain; filter: drop-shadow(0 0 10px rgba(0,0,0,0.3));">
                </div>
                <div class="premium-badge" style="background: #bd2130;">PREMIUM</div>
                <div class="profile-img-wrap">
                    <img src="{{ asset('images/alumni/alumni_textile_1.png') }}" alt="Md. Faysal Hasan" class="profile-img"
                        style="object-position: center 10%;">
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Md. Faysal
                    Hasan</div>
            </div>
        </div>

        <!-- Alumni Card: BBA (New) -->
        <div class="alumni-card featured-card" data-category="bba">
            <div class="card-top">
                <!-- Using the logo image as part of the background logic -->
                <div class="field-img-container"
                    style="background: #f8f9fa; height: 180px; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('images/alumni/imcd_logo.png') }}" alt="IMCD"
                        style="width: 70%; object-fit: contain;">
                </div>
                <div class="premium-badge">PREMIUM</div>
                <div class="profile-img-wrap">
                    <img src="{{ asset('images/alumni/alumni_bba_1.png') }}" alt="Alumni BBA" class="profile-img"
                        style="object-position: center 10%;">
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Alumni Graduate
                </div>
            </div>
        </div>

        <!-- Alumni Card: BBA 2 (New) -->
        <div class="alumni-card featured-card" data-category="bba">
            <div class="card-top">
                <div class="field-img-container"
                    style="background: #0077B5; height: 180px; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('images/alumni/ace_logo.png') }}" alt="ACE Advisory"
                        style="width: 50%; object-fit: contain;">
                </div>
                <div class="premium-badge">PREMIUM</div>
                <div class="profile-img-wrap">
                    <img src="{{ asset('images/alumni/alumni_bba_joy.png') }}" alt="Mr. Joy Saha ACA"
                        class="profile-img journalism-profile">
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Mr. Joy Saha
                    ACA</div>
            </div>
        </div>

        <!-- Alumni Card: Pharmacy 2 (New) -->
        <div class="alumni-card featured-card reveal animate-item up" data-category="pharmacy">
            <div class="card-top">
                <!-- Renata PLC Background -->
                <div class="field-img-container"
                    style="background: #ffffff; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;">
                    <img src="{{ asset('images/alumni/renata_logo.png') }}" alt="Renata PLC"
                        style="width: 100%; height: 100%; object-fit: cover; opacity: 0.9;">
                </div>
                <div class="premium-badge">PREMIUM</div>
                <div class="profile-img-wrap">
                    <img src="{{ asset('images/alumni/alumni_pharmacy_2.png') }}" alt="Md. Mozahidul Islam"
                        class="profile-img" style="object-position: center 10%;">
                </div>
                <div class="card-category">Pharmacy</div>
            </div>
            <div class="card-body">
                <h3>Officer - Product Development (Analytical) at Renata PLC</h3>
                <div class="alumni-details">
                    <div class="detail-item">
                        <i class="fas fa-university"></i>
                        <span>Dept. of Pharmacy</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-flask"></i>
                        <span>Product Development</span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Md. Mozahidul
                    Islam</div>
            </div>
        </div>

        <!-- Alumni Card: Pharmacy 1 -->
        <div class="alumni-card reveal animate-item up" data-category="pharmacy">
            <div class="card-top">
                <div class="field-img-container"
                    style="background: #1a3a5a; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    <img src="{{ asset('images/alumni/alumni_pharmacy_1.png') }}" alt="Pharmacy Background"
                        style="width: 100%; height: 100%; object-fit: cover; opacity: 0.6; filter: blur(2px);">
                    <div
                        style="position: absolute; color: white; font-weight: 800; font-size: 20px; text-shadow: 0 2px 5px rgba(0,0,0,0.5);">
                        Isabah Plastic</div>
                </div>
                <div class="premium-badge badge-title">EXECUTIVE</div>
                <div class="profile-img-wrap">
                    <img src="{{ asset('images/alumni/alumni_pharmacy_1.png') }}" alt="Md. Tanjimul Ahasan"
                        class="profile-img" style="object-position: center 25%;">
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">DIU Alumnus
                </div>
            </div>
        </div>

        <!-- Alumni Card 1 -->
        <div class="alumni-card reveal animate-item up" data-category="software-engineering">
            <div class="card-top">
                <img src="{{ asset('images/alumni/alumni_tech_bg.png') }}" alt="Tech" class="field-img">
                <div class="premium-badge badge-title">SOFTWARE ENGINEER</div>
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Jason Williams
                </div>
            </div>
        </div>

        <!-- Alumni Card 2 -->
        <div class="alumni-card reveal animate-item up" data-category="uiux-design">
            <div class="card-top">
                <img src="{{ asset('images/alumni/alumni_tech_bg.png') }}" alt="Tech" class="field-img">
                <div class="premium-badge badge-title">UX DESIGN LEAD</div>
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Pamela Foster
                </div>
            </div>
        </div>

        <!-- Alumni Card 3 -->
        <div class="alumni-card reveal animate-item up" data-category="finance">
            <div class="card-top">
                <img src="{{ asset('images/alumni/alumni_tech_bg.png') }}" alt="Tech" class="field-img">
                <div class="premium-badge badge-title">FINANCIAL ANALYST</div>
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
                <a href="#" class="connect-btn">Connect</a>
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
                <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">Rose Simmons
                </div>
            </div>
        </div>
    </div>

    <div class="load-more-container">
        <button id="loadMoreBtn" class="see-more-btn">See More <i class="fas fa-chevron-down"></i></button>
    </div>

    <!-- ================= JOIN CTA SECTION ================= -->
    <section class="join-mentor-section reveal">
        <div class="cta-box new-cta-design">
            <!-- Decorative top right yellow dashes -->
            <div class="cta-decor top-right animate-item scale stagger-2">
                <svg width="60" height="45" viewBox="0 0 60 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 15L15 12M22 9L29 7M36 5L43 4M5 26L12 23M19 20L26 18M33 16L40 15M3 37L10 34M16 31L23 29"
                        stroke="#FAC35A" stroke-width="3.5" stroke-linecap="round" />
                </svg>
            </div>
            <!-- Decorative bottom left yellow dashes -->
            <div class="cta-decor bottom-left animate-item scale stagger-2">
                <svg width="50" height="40" viewBox="0 0 50 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 8L12 11M18 13L25 15M31 17L38 18M3 19L10 22M16 24L23 26M29 27L36 29M2 30L9 33M14 35L21 37"
                        stroke="#FAC35A" stroke-width="3.5" stroke-linecap="round" />
                </svg>
            </div>

            <div class="cta-content">
                <h4 class="animate-item left stagger-1">Become An Alumni Mentor</h4>
                <h2 class="animate-item left stagger-2">
                    You can join with Campus Buddy <br>
                    as a <span class="highlight-text">mentor?<svg class="curved-underline" viewBox="0 0 160 15"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 13C40 4 100 2 158 8" stroke="#00AAFF" stroke-width="3.5"
                                stroke-linecap="round" />
                        </svg></span>
                </h2>
            </div>

            <div class="cta-arrow animate-item right stagger-3">
                <svg width="120" height="60" viewBox="0 0 120 60" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 58C35 55 65 35 115 15M102 12L118 13L110 26" stroke="#00AAFF" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            <div class="cta-action animate-item right stagger-4">
                <a href="#" id="registerTodayBtn" class="cta-btn new-cta-btn pulse-primary">Register Today</a>
            </div>
        </div>
    </section>

    <!-- ================= ALUMNI REGISTRATION MODAL ================= -->
    <div id="registrationModal" class="alumni-modal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.6); backdrop-filter: blur(5px); z-index: 9999; align-items: center; justify-content: center;">
        <div class="modal-content" style="background: #fff; width: 90%; max-width: 600px; max-height: 85vh; border-radius: 20px; overflow-y: auto; padding: 30px; box-shadow: 0 15px 40px rgba(0,0,0,0.2); position: relative; animation: modalPop 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
            <span id="closeModal" style="position: absolute; top: 15px; right: 20px; font-size: 24px; font-weight: bold; cursor: pointer; color: #777;">&times;</span>
            <h2 style="font-size: 24px; font-weight: 800; color: #1a1e29; margin-bottom: 20px; text-align: center;">Alumni <span>Registration</span></h2>
            
            <form action="{{ route('alumni.register') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if($errors->any())
                    <div style="background: #fee2e2; color: #dc2626; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 13px;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Full Name *</label>
                        <input type="text" name="full_name" value="{{ auth()->user()->name }}" required style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; outline: none;">
                    </div>
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Email *</label>
                        <input type="email" name="email" value="{{ auth()->user()->email }}" required style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Student ID *</label>
                        <input type="text" name="student_id" value="{{ auth()->user()->student_id }}" required style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Phone</label>
                        <input type="text" name="phone" value="{{ auth()->user()->phone ?? '' }}" style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Department *</label>
                        <input type="text" name="department" value="{{ auth()->user()->department }}" required placeholder="e.g. CSE" style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Batch *</label>
                        <input type="text" name="batch" value="{{ auth()->user()->batch }}" required placeholder="e.g. 52" style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Graduation Year *</label>
                        <input type="text" name="graduation_year" required placeholder="e.g. 2020" style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Linkedin URL</label>
                        <input type="url" name="linkedin_url" placeholder="https://" style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Select Category *</label>
                    <select name="category" required style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
                        <option value="software-engineering">Software Engineering</option>
                        <option value="data-science">Data Science</option>
                        <option value="marketing">Marketing</option>
                        <option value="finance">Finance</option>
                        <option value="journalism">Journalism</option>
                        <option value="bba">BBA</option>
                    </select>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Current Position *</label>
                        <input type="text" name="current_position" required placeholder="e.g. Software Engineer" style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Company *</label>
                        <input type="text" name="company" required placeholder="e.g. Google" style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 25px;">
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Profile Image</label>
                        <input type="file" name="profile_image" style="width:100%; font-size: 12px;">
                    </div>
                    <div>
                        <label style="display:block; font-size: 13px; font-weight: 600; color: #444; margin-bottom: 5px;">Company Logo</label>
                        <input type="file" name="company_logo" style="width:100%; font-size: 12px;">
                    </div>
                </div>

                <button type="submit" style="background: #00AAFF; color: #fff; width: 100%; padding: 12px; border: none; border-radius: 10px; font-weight: bold; cursor: pointer; font-size: 15px; box-shadow: 0 4px 15px rgba(0, 170, 255, 0.3);">Submit for Approval</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div style="position: fixed; bottom: 30px; right: 30px; background: #10b981; color: #fff; padding: 15px 25px; border-radius: 10px; box-shadow: 0 10px 30px rgba(16,185,129,0.3); z-index: 10000; animation: slideIn 0.3s ease;">
            {{ session('success') }}
        </div>
    @endif

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalBtn = document.getElementById('registerTodayBtn');
            const modal = document.getElementById('registrationModal');
            const closeModalSpan = document.getElementById('closeModal');
            const approvalToast = document.getElementById('approvalToast');

            // AUTO-OPEN MODAL IF THERE ARE ERRORS
            @if($errors->any())
                if (modal) modal.style.display = 'flex';
            @endif

            // HIDE APPROVAL TOAST AFTER 3 SECONDS
            if (approvalToast) {
                setTimeout(() => {
                    approvalToast.style.transition = 'all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                    approvalToast.style.opacity = '0';
                    approvalToast.style.transform = 'translateY(-20px)';
                    setTimeout(() => approvalToast.style.display = 'none', 800);
                }, 3000);
            }

            // Disable registration button if pending
            @if($pendingRegistration || (auth()->user() && auth()->user()->role === 'alumni'))
                if (openModalBtn) {
                    openModalBtn.style.opacity = '0.7';
                    openModalBtn.style.cursor = 'not-allowed';
                    openModalBtn.innerText = 'Application {{ $pendingRegistration ? "Pending" : "Approved" }}';
                    openModalBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                    });
                }
            @endif

            if (openModalBtn && modal) {
                openModalBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    modal.style.display = 'flex';
                });

                closeModalSpan.addEventListener('click', function() {
                    modal.style.display = 'none';
                });

                window.addEventListener('click', function(event) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                });
            }
        });
    </script>
    <style>
        @keyframes modalPop {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        @keyframes slideIn {
            from { transform: translateX(50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
    @endpush

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                            visibleCount++;
                        } else {
                            card.style.display = 'none';
                        }
                    } else {
                        card.style.display = 'none';
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
                tag.addEventListener('click', function (e) {
                    e.preventDefault();
                    filterTags.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    itemsToShow = 6; // Reset items to show on filter change
                    updateCardVisibility();
                });
            });

            // Handle Load More
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', function () {
                    itemsToShow += 6;
                    updateCardVisibility();
                });
            }

            // Initial call
            updateCardVisibility();

            // ================= REVEAL ON SCROLL =================
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