<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class StudioController extends Controller
{
    public function index()
    {

        return view('admin/studio');
    }
}
