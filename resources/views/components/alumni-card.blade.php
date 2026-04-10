@props([
    'alumni' => null, // Optional AlumniRegistration model
    'category' => '',
    'stagger' => null,
    'topBg' => null,
    'topImg' => null,
    'topImgClass' => 'field-img',
    'topImgStyle' => null,
    'badge' => 'ALUMNI',
    'badgeStyle' => null,
    'profileImg' => null,
    'profileImgClass' => 'profile-img',
    'profileImgStyle' => null,
    'cardCategory' => '',
    'title' => '',
    'subtitle' => null, // Optional sub-text like awards
    'details' => [], 
    'connectUrl' => '#',
    'rating' => '5.0',
    'name' => ''
])

@php
if ($alumni) {
    $category = $category ?: $alumni->category;
    $cardCategory = $cardCategory ?: ucfirst(str_replace('-', ' ', $alumni->category));
    $name = $name ?: $alumni->full_name;
    $title = $title ?: ($alumni->current_position . ' @ ' . $alumni->company);
    $connectUrl = $connectUrl !== '#' ? $connectUrl : ($alumni->linkedin_url ?? '#');
    
    if (!$topImg) {
        if ($alumni->company_logo) {
            $topImg = asset('storage/' . $alumni->company_logo);
            $topImgStyle = $topImgStyle ?: 'width: 100%; height: 100%; object-fit: cover;';
        } elseif ($alumni->card_bg_image) {
            $topImg = asset('storage/' . $alumni->card_bg_image);
        } else {
            $topImg = asset('images/alumni/alumni_tech_bg.png');
        }
    }
    
    if (!$profileImg) {
        $profileImg = $alumni->profile_image ? asset('storage/' . $alumni->profile_image) : asset('images/alumni/profile_placeholder.png');
    }
    
    if (empty($details)) {
        $details = [
            ['icon' => 'fas fa-university', 'text' => $alumni->department],
            ['icon' => 'fas fa-graduation-cap', 'text' => 'Class of ' . $alumni->graduation_year]
        ];
    }
}
@endphp

<div class="alumni-card featured-card reveal animate-item up {{ $stagger ? $stagger : '' }}" data-category="{{ $category }}">
    <div class="card-top">
        @if($topBg)
            <div class="field-img-container" style="{{ $topBg }}">
                <img src="{{ $topImg }}" alt="Logo" class="{{ $topImgClass }}" style="{{ $topImgStyle }}">
            </div>
        @else
            <img src="{{ $topImg }}" alt="Background" class="{{ $topImgClass }}" style="{{ $topImgStyle }}">
        @endif
        
        <div class="premium-badge" style="{{ $badgeStyle }}">{{ $badge }}</div>
        
        <div class="profile-img-wrap">
            <img src="{{ $profileImg }}" alt="{{ $name }}" class="{{ $profileImgClass }}" style="{{ $profileImgStyle }}">
        </div>
        
        <div class="card-category">{{ $cardCategory }}</div>
    </div>
    
    <div class="card-body">
        <h3>{{ $title }}</h3>
        @if($subtitle)
            <p style="font-size: 11px; color: #00AAFF; font-weight: 700; margin-top: -5px; margin-bottom: 10px;">{{ $subtitle }}</p>
        @endif
        <div class="alumni-details">
            @foreach($details as $detail)
                <div class="detail-item">
                    <i class="{{ $detail['icon'] }}"></i>
                    <span>{{ $detail['text'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="card-footer">
        <a href="{{ $connectUrl }}" target="_blank" rel="noopener noreferrer" class="connect-btn">Connect</a>
        <div class="rating">
            <span>{{ $rating }}</span>
            <div class="stars">
                @for($i = 0; $i < 5; $i++)
                    <i class="fas fa-star"></i>
                @endfor
            </div>
        </div>
        <div class="alumni-name" style="font-size: 13px; font-weight: 600; color: #666;">
            {{ $name }} <span class="verified-badge"><i class="fas fa-check"></i></span>
        </div>
    </div>
</div>
