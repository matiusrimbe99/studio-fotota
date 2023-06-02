<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Packet;
use App\Models\Studio;

class LandingPageController extends Controller
{
    public function index()
    {
        $brand = Brand::where('id', 1)->get()->first();
        $packets = Packet::all();
        $studios = Studio::all();
        $galleries = Gallery::all();
        return view('landing-page', compact('brand', 'packets', 'studios', 'galleries'));
    }
}
