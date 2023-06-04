<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $titleApp = 'Galeri Foto';
        $galleries = Gallery::all();
        return view('admin/gallery', compact('galleries', 'titleApp'));
    }

    public function create()
    {
        $titleApp = 'Galeri Foto';
        return view('admin/create-gallery', compact('titleApp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'description' => 'required|string|max:255',
        ]);

        $image = $request->file('image');
        $image->storeAs('galleries', $image->hashName());

        Gallery::create([
            'image' => $image->hashName(),
            'description' => $request->description,
        ]);

        return redirect('admin/galleries');

    }

    public function delete()
    {
        $titleApp = 'Galeri Foto';
        $galleries = Gallery::all();
        return view('admin/delete-gallery', compact('galleries', 'titleApp'));
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return abort(404);
        }

        Storage::delete('galleries/' . basename($gallery->image));

        $gallery->delete();

        return redirect('admin/galleries');

    }

    public function destroyAll()
    {
        $galleries = Gallery::all();

        if ($galleries->isEmpty()) {
            return abort(404);
        }

        foreach ($galleries as $gallery) {
            Storage::delete('galleries/' . basename($gallery->image));
            $gallery->delete();
        }

        return redirect('admin/galleries');

    }
}
