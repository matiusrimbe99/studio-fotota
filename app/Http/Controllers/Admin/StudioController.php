<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Studio;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudioController extends Controller
{
    public function index(Request $request)
    {
        $titleApp = 'Paket Studio';

        if ($request->ajax()) {
            $studios = Studio::all();

            return Datatables::of($studios)->addIndexColumn()
                ->addColumn('number', function ($row) {
                    static $number = 1;
                    return $number++;
                })->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-sm btn-info" href="' . "studios/" . $row->id . '"><i class="fas fa-edit"></i> View</a>';
                return $btn;
            })->rawColumns(['number', 'action'])->make(true);
        }

        return view('admin/studio', compact('titleApp'));

    }

    public function create()
    {
        $titleApp = 'Paket Studio';
        return view('admin/create-studio', compact('titleApp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'studio_name' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $image = $request->file('image');
        $image->storeAs('studios', $image->hashName());

        Studio::create([
            'image' => $image->hashName(),
            'studio_name' => $request->studio_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect('admin/studios')->with("success", "Paket studio berhasil ditambah!");

    }

    public function show($id)
    {
        $titleApp = 'Paket Studio';
        $studio = Studio::where('id', $id)->get()->first();

        if (!$studio) {
            return abort(404);
        }
        return view('admin/detail-studio', compact('studio', 'titleApp'));
    }

    public function edit($id)
    {
        $titleApp = 'Paket Studio';
        $studio = Studio::where('id', $id)->get()->first();

        if (!$studio) {
            return abort(404);
        }

        return view('admin/edit-studio', compact('studio', 'titleApp'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'studio_name' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $studio = Studio::find($id);

        if (!$studio) {
            return abort(404);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('studios', $image->hashName());
            Storage::delete('studios/' . basename($studio->image));

            $studio->update([
                'image' => $image->hashName(),
                'studio_name' => $request->studio_name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

        } else {
            $studio->update([
                'studio_name' => $request->studio_name,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        }

        return redirect('admin/studios')->with("success", "Paket studio berhasil diubah!");
    }

    public function destroy($id)
    {
        $studio = Studio::find($id);

        if (!$studio) {
            return abort(404);
        }

        Storage::delete('studios/' . basename($studio->image));

        $studio->delete();

        return redirect('admin/studios')->with("success", "Paket studio berhasil dihapus!");

    }
}
