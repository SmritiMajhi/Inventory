<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    /**
     * Show staff dashboard by delegating to DashboardController
     */
    public function dashboard()
    {
        return app(DashboardController::class)->index();
    }

    public function logout()
{
    session()->flush();
    return redirect()->route('staff.login');
}

}
