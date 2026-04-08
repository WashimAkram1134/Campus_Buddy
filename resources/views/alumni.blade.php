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
    
    <div class="page-container">
    {{-- Status Messages --}}
    <div class="message-container" style="margin-top: -20px; position: relative; z-index: 10;">
        @if($pendingRegistration)
            <div class="registration-status-banner pending animate-up" style="background: white; border-radius: 16px; padding: 20px 30px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-left: 6px solid #FAC35A; margin: 0 auto 30px; max-width: 1000px;">
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
            <div id="approvalToast" class="registration-status-banner approved animate-up" style="background: white; border-radius: 16px; padding: 20px 30px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-left: 6px solid #10b981; margin: 0 auto 30px; max-width: 1000px; animation: slideInUp 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div style="background: #ECFDF5; color: #10b981; width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <h4 style="margin: 0; color: #1a1e29; font-weight: 800;">Congratulations, {{ auth()->user()->name }}!</h4>
                        <p style="margin: 5px 0 0; color: #64748b; font-size: 14px;">Your alumni registration has been approved. You are now officially a part of our premier mentor network.</p>
                    </div>
                </div>
                <div style="font-size: 11px; font-weight: 800; color: #10b981; text-transform: uppercase; background: #ECFDF5; padding: 5px 12px; border-radius: 50px;">Just Approved</div>
            </div>
        @endif
    </div>

    <!-- ================= ALUMNI NETWORK SECTION ================= -->
    <section id="alumni-network" class="alumni-header-section reveal">
        <div class="section-title-row">
            <div class="section-title animate-item left stagger-1">
                <h2>Alumni <span>Network</span> of Campus Buddy</h2>
            </div>
            <div class="network-stats-row animate-item right stagger-1">
                <div class="stat-bubble">
                    <i class="fas fa-globe-americas"></i>
                    <div class="stat-text">
                        <strong>12+</strong>
                        <span>Countries</span>
                    </div>
                </div>
                <div class="stat-bubble">
                    <i class="fas fa-building"></i>
                    <div class="stat-text">
                        <strong>50+</strong>
                        <span>Companies</span>
                    </div>
                </div>
                <div class="stat-bubble highlight">
                    <i class="fas fa-user-check"></i>
                    <div class="stat-text">
                        <strong>1.2k+</strong>
                        <span>Mentors</span>
                    </div>
                </div>
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
            <x-alumni-card :alumni="$alumni" />
        @endforeach

        <x-alumni-card 
            category="journalism"
            stagger="stagger-1"
            topImg="{{ asset('images/alumni/alumni_journalism.png') }}"
            topImgClass="field-img journalism-bg"
            badge="PREMIUM"
            profileImg="{{ asset('images/alumni/alumni_journalism.png') }}"
            profileImgClass="profile-img journalism-profile"
            cardCategory="Journalism"
            title="Chief Reporter at ATN Bangla"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of Journalism'],
                ['icon' => 'fas fa-graduation-cap', 'text' => 'Class of 2015']
            ]"
            name="Md. Imdadullah Siddiquee"
        />

        <x-alumni-card 
            category="software-engineering data-science"
            stagger="stagger-2"
            topBg="background: #ffffff; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;"
            topImg="{{ asset('images/alumni/upay_logo.png') }}"
            topImgStyle="width: 70%; object-fit: contain;"
            badge="PREMIUM"
            profileImg="{{ asset('images/alumni/alumni_cse_harun.png') }}"
            profileImgStyle="object-position: center 10%;"
            cardCategory="Engineering"
            title="Software Engineer at Upay"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of Computer Science and Engineering'],
                ['icon' => 'fas fa-code', 'text' => 'FinTech Specialist']
            ]"
            name="Md. Harun-Ur-Rashid"
        />

        <x-alumni-card 
            category="software-engineering"
            stagger="stagger-3"
            topBg="background: #00AAFF; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden;"
            topImg="{{ asset('images/alumni/diu_building.png') }}"
            topImgStyle="width: 100%; height: 100%; object-fit: cover; opacity: 0.8;"
            badge="PREMIUM"
            badgeStyle="background: #FFD700; color: #1a1e29;"
            profileImg="{{ asset('images/alumni/alumni_swe_javed.png') }}"
            profileImgStyle="object-position: center 10%;"
            cardCategory="Research"
            title="Visiting Researcher at DIU & Research Assistant at USQ, Australia"
            subtitle="World's Top 2% Scientist (Stanford List 2024-25)"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of Software Engineering'],
                ['icon' => 'fas fa-microscope', 'text' => 'Global Scientific Recognition']
            ]"
            name="F. M. Javed Mehedi Shamrat"
        />

        <x-alumni-card 
            category="nfe"
            stagger="stagger-4"
            topBg="background: #ffffff; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;"
            topImg="{{ asset('images/alumni/nestle_logo_blue.png') }}"
            topImgStyle="width: 80%; object-fit: contain;"
            badge="PREMIUM"
            profileImg="{{ asset('images/alumni/alumni_nfe_2.png') }}"
            profileImgStyle="object-position: center 10%;"
            cardCategory="Nutrition"
            title="Area Nutrition Officer at Nestle Bangladesh PLC"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of Nutrition and Food Engineering'],
                ['icon' => 'fas fa-user-tag', 'text' => 'Tofa Firdaosi Mim']
            ]"
            name="DIU Proud Alumna"
        />

        <x-alumni-card 
            category="nfe"
            stagger="stagger-5"
            topBg="background: #ffffff; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;"
            topImg="{{ asset('images/alumni/nestle_logo.png') }}"
            topImgStyle="width: 80%; object-fit: contain;"
            badge="PREMIUM"
            profileImg="{{ asset('images/alumni/alumni_nfe_1.png') }}"
            profileImgStyle="object-position: center 15%;"
            cardCategory="Nutrition"
            title="Area Nutrition Officer at Nestle Bangladesh PLC"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of Nutrition and Food Engineering'],
                ['icon' => 'fas fa-user-tag', 'text' => 'Sayma Sultana Sworna']
            ]"
            name="DIU Proud Alumna"
        />

        <x-alumni-card 
            category="textile bcs-govt"
            stagger="stagger-6"
            topBg="background: #006a4e; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden;"
            topImg="{{ asset('images/alumni/gov_seal_bd.png') }}"
            topImgStyle="width: 45%; object-fit: contain; filter: drop-shadow(0 0 10px rgba(0,0,0,0.3));"
            badge="PREMIUM"
            badgeStyle="background: #bd2130;"
            profileImg="{{ asset('images/alumni/alumni_textile_1.png') }}"
            profileImgStyle="object-position: center 10%;"
            cardCategory="Government"
            title="Assistant Commissioner of Taxes (BCS)"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of Textile Engineering'],
                ['icon' => 'fas fa-award', 'text' => 'Recommended: 45th BCS']
            ]"
            name="Md. Faysal Hasan"
        />

        <x-alumni-card 
            category="bba"
            topBg="background: #f8f9fa; height: 180px; display: flex; align-items: center; justify-content: center;"
            topImg="{{ asset('images/alumni/imcd_logo.png') }}"
            topImgStyle="width: 70%; object-fit: contain;"
            badge="PREMIUM"
            profileImg="{{ asset('images/alumni/alumni_bba_1.png') }}"
            profileImgStyle="object-position: center 10%;"
            cardCategory="Business"
            title="Commercial Manager at IMCD Group"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of BBA'],
                ['icon' => 'fas fa-graduation-cap', 'text' => 'Class of 2016']
            ]"
            name="Alumni Graduate"
        />

        <x-alumni-card 
            category="bba"
            topBg="background: #0077B5; height: 180px; display: flex; align-items: center; justify-content: center;"
            topImg="{{ asset('images/alumni/ace_logo.png') }}"
            topImgStyle="width: 50%; object-fit: contain;"
            badge="PREMIUM"
            profileImg="{{ asset('images/alumni/alumni_bba_joy.png') }}"
            profileImgClass="profile-img journalism-profile"
            cardCategory="Business"
            title="Head of Tax Advisory & VAT at ACE Advisory"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of Business Administration'],
                ['icon' => 'fas fa-graduation-cap', 'text' => 'Joy Saha ACA']
            ]"
            name="Mr. Joy Saha ACA"
        />

        <x-alumni-card 
            category="pharmacy"
            stagger="reveal animate-item up"
            topBg="background: #ffffff; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 20px;"
            topImg="{{ asset('images/alumni/renata_logo.png') }}"
            topImgStyle="width: 100%; height: 100%; object-fit: cover; opacity: 0.9;"
            badge="PREMIUM"
            profileImg="{{ asset('images/alumni/alumni_pharmacy_2.png') }}"
            profileImgStyle="object-position: center 10%;"
            cardCategory="Pharmacy"
            title="Officer - Product Development (Analytical) at Renata PLC"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of Pharmacy'],
                ['icon' => 'fas fa-flask', 'text' => 'Product Development']
            ]"
            name="Md. Mozahidul Islam"
        />

        <x-alumni-card 
            category="pharmacy"
            stagger="reveal animate-item up"
            topBg="background: #1a3a5a; height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden;"
            topImg="{{ asset('images/alumni/alumni_pharmacy_1.png') }}"
            topImgStyle="width: 100%; height: 100%; object-fit: cover; opacity: 0.6; filter: blur(2px);"
            badge="EXECUTIVE"
            profileImg="{{ asset('images/alumni/alumni_pharmacy_1.png') }}"
            profileImgStyle="object-position: center 25%;"
            cardCategory="Pharmacy"
            title="Senior Executive (Business Development) at Isabah Plastic Industries Ltd."
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of Pharmacy'],
                ['icon' => 'fas fa-user-graduate', 'text' => 'Md. Tanjimul Ahasan']
            ]"
            rating="4.0"
            name="DIU Alumnus"
        />

        <x-alumni-card 
            category="software-engineering"
            topImg="{{ asset('images/alumni/alumni_tech_bg.png') }}"
            badge="SOFTWARE ENGINEER"
            profileImg="{{ asset('images/alumni/profile_1.png') }}"
            cardCategory="Science"
            title="Senior Software Engineer at Google"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of CSE'],
                ['icon' => 'fas fa-graduation-cap', 'text' => 'Class of 2018']
            ]"
            rating="4.9"
            name="Jason Williams"
        />

        <x-alumni-card 
            category="uiux-design"
            topImg="{{ asset('images/alumni/alumni_tech_bg.png') }}"
            badge="UX DESIGN LEAD"
            profileImg="{{ asset('images/alumni/profile_2.png') }}"
            cardCategory="Science"
            title="UX Design Lead at Adobe"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of SWE'],
                ['icon' => 'fas fa-graduation-cap', 'text' => 'Class of 2019']
            ]"
            rating="4.8"
            name="Pamela Foster"
        />

        <x-alumni-card 
            category="finance"
            topImg="{{ asset('images/alumni/alumni_tech_bg.png') }}"
            badge="FINANCIAL ANALYST"
            profileImg="{{ asset('images/alumni/profile_1.png') }}"
            cardCategory="Business"
            title="Financial Analyst at Goldman Sachs"
            :details="[
                ['icon' => 'fas fa-university', 'text' => 'Dept. of BBA'],
                ['icon' => 'fas fa-graduation-cap', 'text' => 'Class of 2020']
            ]"
            rating="4.2"
            name="Rose Simmons"
        />
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

    </div> {{-- End page-container --}}

    @if(session('success'))
        <div style="position: fixed; bottom: 30px; right: 30px; background: #10b981; color: #fff; padding: 15px 25px; border-radius: 10px; box-shadow: 0 10px 30px rgba(16,185,129,0.3); z-index: 10000; animation: slideIn 0.3s ease;">
            {{ session('success') }}
        </div>
    @endif

    @push('scripts')
    <script>
        // Pass Blade data to external JS via data attributes
        document.body.dataset.hasErrors = '{{ $errors->any() ? "true" : "false" }}';
        document.body.dataset.registrationDisabled = '{{ ($pendingRegistration || (auth()->user() && auth()->user()->role === "alumni")) ? "true" : "false" }}';
        document.body.dataset.registrationLabel = 'Application {{ $pendingRegistration ? "Pending" : "Approved" }}';
    </script>
    <script src="{{ asset('js/alumni.js') }}"></script>
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
