<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'email'        => 'nullable|email',
            'phone'        => 'nullable',
            'address'      => 'nullable',
            'logo'         => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $setting = Setting::first() ?? new Setting();

        // Logo Upload
        if ($request->hasFile('logo')) {
            $fileName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('uploads/settings'), $fileName);
            $setting->logo = $fileName;
        }

        $setting->company_name = $request->company_name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        $setting->save();

        return back()->with('success', 'Settings Updated Successfully!');
    }
}
