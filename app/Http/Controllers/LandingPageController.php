<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\OrderMethod;
use App\Models\Packet;
use App\Models\Studio;

class LandingPageController extends Controller
{
    public function index()
    {
        $brand = Brand::where('id', 1)->get()->first();
        $contact = Contact::where('id', 1)->get()->first();
        $about = About::where('id', 1)->get()->first();
        $orderMethod = OrderMethod::where('id', 1)->get()->first();

        $packets = Packet::all();
        $studios = Studio::all();
        $galleries = Gallery::all();
        return view('landing-page', compact('brand', 'contact', 'about', 'orderMethod', 'packets', 'studios', 'galleries'));
    }
}
