<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PacketController extends Controller
{
    public function index()
    {
        // if (!Auth::check()) {
        //     return redirect('admin/login')->with('error_message', 'Anda harus login terlebih dahulu!');
        // }

        return view('admin/packet');
    }
}
