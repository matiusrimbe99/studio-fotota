<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $title = 'About Page';
        $about = About::where('id', 1)->get()->first();
        return view('admin/about', compact('about', 'title'));
    }

    public function formEditabout($id)
    {
        $title = 'About Page';
        $about = About::where('id', $id)->get()->first();

        if (!$about) {
            return abort(404);
        }

        return view('admin/edit-about', compact('about', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'lead_about' => 'required|string',
            'about_us' => 'required|string',
        ]);

        $about = About::find($id);

        if (!$about) {
            return abort(404);
        }

        $about->update([
            'lead_about' => $request->lead_about,
            'about_us' => $request->about_us,
        ]);

        return redirect('admin/abouts')->with("success", "Tentang Kami berhasil diperbarui!");
    }

    public function formEditImageAbout($id)
    {
        $title = 'About Page';
        $about = About::where('id', $id)->get()->first();

        if (!$about) {
            return abort(404);
        }

        return view('admin/edit-foto-about', compact('about', 'title'));
    }

    public function updateImageAbout(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $about = About::find($id);

        if (!$about) {
            return abort(404);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('abouts', $image->hashName());
            Storage::delete('abouts/' . basename($about->image));

            $about->update([
                'image' => $image->hashName(),
            ]);

        }

        return redirect('admin/abouts')->with("status", "Gambar berhasil diperbarui!");
    }
}
