<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $titleApp = 'Dashboard';
        $users = User::where('role_id', 2);
        $countUsers = $users->count();
        return view('admin/dashboard', compact('countUsers', 'titleApp'));
    }
}
