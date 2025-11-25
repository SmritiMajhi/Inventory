<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
            'role' => 'required|in:admin,staff',
        ]);

        $role = $request->role;

        // Check role
        if ($role === 'admin') {
            $user = User::where('email', $request->email)->first();
        } else {
            $user = Staff::where('email', $request->email)->first();
        }

        if ($user && Hash::check($request->password, $user->password)) {
            // Save user in session
            Session::put('user_id', $user->id);
            Session::put('user_role', $role);
            Session::put('user_name', $user->name);

            // Redirect to dashboard
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('staff.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Show register form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle register (staff only)
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            // users are stored in users table via Staff model
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create a user record with role 'staff'
        Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'staff',
        ]);

        return redirect()->route('login')->with('success', 'Staff account created successfully!');
    }

    // Logout
    public function logout(Request $request)
    {
        Session::flush(); // clear all session data
        return redirect('/')->with('status', 'You have been logged out successfully.');
    }
}
