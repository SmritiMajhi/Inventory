<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    // Show settings
    public function edit()
    {
        $setting = Setting::first();
        return view('staff.settings.edit', compact('setting'));
    }

    // Update settings
    public function update(Request $request)
{
    $request->validate([
        'company_name' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:500',
    ]);

    $setting = Setting::first();

    if (!$setting) {
        $setting = new Setting();
    }

    $setting->company_name = $request->company_name;
    $setting->email = $request->email;
    $setting->phone = $request->phone;
    $setting->address = $request->address;

    // ✅ Replace this block with the corrected code for public storage
    if ($request->hasFile('logo')) {
    // Delete old logo if exists
    if ($setting->logo && Storage::exists('public/' . $setting->logo)) {
        Storage::delete('public/' . $setting->logo);
    }

    // Store file in storage/app/public/settings
    $path = $request->file('logo')->store('public/settings');

    // Save path without 'public/' for asset helper
    $setting->logo = str_replace('public/', '', $path);
}

    $setting->save();

    return redirect()->back()->with('success', 'Settings updated successfully!');
}


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Use the same session keys set by AuthController:
            // Session::put('user_id') and Session::put('user_role')
            if (!Session::has('user_id') || Session::get('user_role') !== 'staff') {
                return redirect()->route('login')->with('error', 'Please login first!');
            }
            return $next($request);
        });
    }

}
