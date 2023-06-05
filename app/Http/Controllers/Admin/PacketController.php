<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Packet;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PacketController extends Controller
{
    public function index(Request $request)
    {
        $titleApp = 'Paket Foto';

        if ($request->ajax()) {
            $packets = Packet::all();

            return Datatables::of($packets)->addIndexColumn()
                ->addColumn('number', function ($row) {
                    static $number = 1;
                    return $number++;
                })->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-sm btn-info" href="' . "packets/" . $row->id . '"><i class="fas fa-edit"></i> View</a>';
                return $btn;
            })->rawColumns(['number', 'action'])->make(true);
        }

        return view('admin/packet', compact('titleApp'));

    }

    public function create()
    {
        $titleApp = 'Paket Foto';
        return view('admin/create-packet', compact('titleApp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'packet_name' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $image = $request->file('image');
        $image->storeAs('packets', $image->hashName());

        Packet::create([
            'image' => $image->hashName(),
            'packet_name' => $request->packet_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect('admin/packets')->with("success", "Paket foto berhasil ditambah!");

    }

    public function show($id)
    {
        $titleApp = 'Paket Foto';
        $packet = Packet::where('id', $id)->get()->first();

        if (!$packet) {
            return abort(404);
        }
        return view('admin/detail-packet', compact('packet', 'titleApp'));
    }

    public function edit($id)
    {
        $titleApp = 'Paket Foto';
        $packet = Packet::where('id', $id)->get()->first();

        if (!$packet) {
            return abort(404);
        }

        return view('admin/edit-packet', compact('packet', 'titleApp'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'packet_name' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $packet = Packet::find($id);

        if (!$packet) {
            return abort(404);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('packets', $image->hashName());
            Storage::delete('packets/' . basename($packet->image));

            $packet->update([
                'image' => $image->hashName(),
                'packet_name' => $request->packet_name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

        } else {
            $packet->update([
                'packet_name' => $request->packet_name,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        }

        return redirect('admin/packets')->with("success", "Paket foto berhasil diubah!");
    }

    public function destroy($id)
    {
        $packet = Packet::find($id);

        if (!$packet) {
            return abort(404);
        }

        Storage::delete('packets/' . basename($packet->image));

        $packet->delete();

        return redirect('admin/packets')->with("success", "Paket foto berhasil dihapus!");

    }
}
