<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Packet;

class LandingPageController extends Controller
{
    public function index()
    {
        $brand = Brand::where('id', 1)->get()->first();
        $packets = Packet::all();
        return view('landing-page', compact('brand', 'packets'));
    }
}
