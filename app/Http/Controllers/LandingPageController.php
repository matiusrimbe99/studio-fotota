<?php

namespace App\Http\Controllers;

use App\Models\Brand;

class LandingPageController extends Controller
{
    public function index()
    {
        $brand = Brand::where('id', 1)->get()->first();
        return view('landing-page', compact('brand'));
    }
}
