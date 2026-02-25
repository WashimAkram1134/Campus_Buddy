<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class SignupController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.signup');
    }

    /**
     * Handle a registration request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'student_id' => ['required', 'string', 'max:20', 'unique:'.User::class],
            'role' => ['required', 'string', 'in:student,cr'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // Conditional validation for CR
            'department' => ['required_if:role,cr', 'nullable', 'string', 'max:255'],
            'batch' => ['required_if:role,cr', 'nullable', 'string', 'max:20'],
            'semester' => ['required_if:role,cr', 'nullable', 'string', 'max:20'],
            'section' => ['required_if:role,cr', 'nullable', 'string', 'max:10'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'student_id' => $request->student_id,
            'role' => $request->role,
            'department' => $request->role === 'cr' ? $request->department : null,
            'batch' => $request->role === 'cr' ? $request->batch : null,
            'semester' => $request->role === 'cr' ? $request->semester : null,
            'section' => $request->role === 'cr' ? $request->section : null,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
