<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show welcome page
    public function welcome()
    {
        return view('welcome');
    }

    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

   

    // Handle login
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required|in:admin,staff', // Make sure role is validated
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Check role from authenticated user
        if (Auth::user()->role !== $request->role) {
            Auth::logout(); // logout if role does not match
            return back()->withErrors(['email' => 'Invalid credentials for this role.']);
        }

        // Redirect based on role
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('staff.dashboard');
        }
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}


    // Show register form (only for cashier)
    public function showRegister()
    {
        return view('auth.register'); // Register form will force role = cashier
    }

    // Handle register (only cashier)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Force role as cashier
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'staff',
        ]);

        return redirect()->route('login')->with('success', 'Staff account created successfully! You can now log in.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
