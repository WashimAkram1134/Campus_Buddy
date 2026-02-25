<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Join the Buddy!</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        .hidden { display: none; }
    </style>
</head>
<body>
<header class="page-header">
    <a class="brand" href="{{ url('/') }}" aria-label="Campus Buddy home">
        <span class="brand__icon" aria-hidden="true">
            <svg viewBox="0 0 64 64" focusable="false">
                <path d="M32 10L6 22l26 12 26-12-26-12z" fill="currentColor"/>
                <path d="M14 30v10c0 6 8 12 18 12s18-6 18-12V30l-18 8-18-8z" fill="currentColor" opacity="0.9"/>
                <path d="M54 25v16" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                <circle cx="54" cy="45" r="4" fill="currentColor"/>
            </svg>
        </span>
        <span class="brand__text">
            <span class="brand__name">Campus Buddy</span>
        </span>
    </a>
</header>

<main class="page">
    <section class="card" aria-labelledby="signup-title">
        <h1 id="signup-title" class="title">Join Buddy!</h1>

        <form method="POST" action="{{ url('/signup') }}" class="form" novalidate>
            @csrf
            
            <div class="field">
                <label for="name" class="label">Full Name</label>
                <input id="name" name="name" type="text" class="input @error('name') input--error @enderror" value="{{ old('name') }}" placeholder="Your Name" required>
                @error('name') <p class="error" role="alert">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="email" class="label">Email Address</label>
                <input id="email" name="email" type="email" class="input @error('email') input--error @enderror" value="{{ old('email') }}" placeholder="email@example.com" required>
                @error('email') <p class="error" role="alert">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="student_id" class="label">Varsity ID</label>
                <input id="student_id" name="student_id" type="text" class="input @error('student_id') input--error @enderror" value="{{ old('student_id') }}" placeholder="ID Number" required>
                @error('student_id') <p class="error" role="alert">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="role" class="label">I am a...</label>
                <select id="role" name="role" class="input" style="appearance: auto;" onchange="toggleCRFields(this.value)">
                    <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="cr" {{ old('role') == 'cr' ? 'selected' : '' }}>Class Representative (CR)</option>
                </select>
            </div>

            <div id="cr-fields" class="{{ old('role') == 'cr' ? '' : 'hidden' }}">
                <div class="field">
                    <label for="department" class="label">Department</label>
                    <input id="department" name="department" type="text" class="input @error('department') input--error @enderror" value="{{ old('department') }}" placeholder="e.g. CSE">
                    @error('department') <p class="error" role="alert">{{ $message }}</p> @enderror
                </div>
                <div class="field" style="margin-top: 14px;">
                    <label for="batch" class="label">Batch</label>
                    <input id="batch" name="batch" type="text" class="input @error('batch') input--error @enderror" value="{{ old('batch') }}" placeholder="e.g. 2021">
                    @error('batch') <p class="error" role="alert">{{ $message }}</p> @enderror
                </div>
                <div class="field" style="margin-top: 14px;">
                    <label for="semester" class="label">Semester</label>
                    <input id="semester" name="semester" type="text" class="input @error('semester') input--error @enderror" value="{{ old('semester') }}" placeholder="e.g. 5th">
                    @error('semester') <p class="error" role="alert">{{ $message }}</p> @enderror
                </div>
                <div class="field" style="margin-top: 14px;">
                    <label for="section" class="label">Section</label>
                    <input id="section" name="section" type="text" class="input @error('section') input--error @enderror" value="{{ old('section') }}" placeholder="e.g. A">
                    @error('section') <p class="error" role="alert">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="field">
                <label for="password" class="label">Password</label>
                <input id="password" name="password" type="password" class="input @error('password') input--error @enderror" placeholder="••••••••" required>
                @error('password') <p class="error" role="alert">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="password_confirmation" class="label">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="input" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn--primary">Create Account</button>
        </form>

        <p class="signup">
            Already have an account?
            <a class="link link--strong" href="{{ route('login') }}">Sign In</a>
        </p>
    </section>
</main>

<script>
    function toggleCRFields(role) {
        const crFields = document.getElementById('cr-fields');
        if (role === 'cr') {
            crFields.classList.remove('hidden');
        } else {
            crFields.classList.add('hidden');
        }
    }
</script>
</body>
</html>
