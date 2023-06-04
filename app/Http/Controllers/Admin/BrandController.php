<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'description' => 'required|string|max:255',
            'about' => 'required|string|max:255',
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

    public function updateImageBrand(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $brand = Brand::find($id);

        if (!$brand) {
            return abort(404);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('brands', $image->hashName());
            Storage::delete('brands/' . basename($brand->image));

            $brand->update([
                'image' => $image->hashName(),
            ]);

        }

        return redirect('admin/brands');
    }
}
