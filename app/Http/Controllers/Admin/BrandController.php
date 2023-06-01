<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $title = 'Landing Page';
        $brand = Brand::where('id', 1)->get()->first();
        return view('admin/brand', compact('brand', 'title'));
    }

    public function formEditBrand($id)
    {
        $title = 'Landing Page';
        $brand = Brand::where('id', $id)->get()->first();

        if (!$brand) {
            return abort(404);
        }

        return view('admin/edit-brand', compact('brand', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name' => 'required|string',
            'description' => 'required|string',
            'about' => 'required|string',
            'address' => 'required|string',
        ]);

        $brand = Brand::find($id);

        if (!$brand) {
            return abort(404);
        }

        $brand->update([
            'brand_name' => $request->brand_name,
            'description' => $request->description,
            'about' => $request->about,
            'address' => $request->address,
        ]);

        return redirect('admin/brands');
    }

    public function formEditImageBrand($id)
    {
        $title = 'Landing Page';
        $brand = Brand::where('id', $id)->get()->first();

        if (!$brand) {
            return abort(404);
        }

        return view('admin/edit-foto-brand', compact('brand', 'title'));
    }
}
