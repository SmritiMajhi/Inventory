<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('staff.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('staff.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:settings,key',
            'value' => 'required|string',
        ]);

        Setting::create($request->all());

        return redirect()->route('staff.settings.index')->with('success', 'Setting added.');
    }

    public function show(Setting $setting)
    {
        return view('staff.settings.show', compact('setting'));
    }

    public function edit(Setting $setting)
    {
        return view('staff.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'key' => 'required|string|unique:settings,key,' . $setting->id,
            'value' => 'required|string',
        ]);

        $setting->update($request->all());

        return redirect()->route('staff.settings.index')->with('success', 'Setting updated.');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('staff.settings.index')->with('success', 'Setting deleted.');
    }
}
