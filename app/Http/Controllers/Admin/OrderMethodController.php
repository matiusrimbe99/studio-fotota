<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderMethod;
use Illuminate\Http\Request;

class OrderMethodController extends Controller
{
    public function index()
    {
        $titleApp = 'Cara Pesan';
        $orderMethod = OrderMethod::where('id', 1)->get()->first();

        if (!$orderMethod) {
            return abort(404);
        }

        return view('admin/order-method', compact('orderMethod', 'titleApp'));
    }

    public function edit()
    {
        $titleApp = 'Cara Pesan';
        $orderMethod = OrderMethod::where('id', 1)->get()->first();

        if (!$orderMethod) {
            return abort(404);
        }

        return view('admin/edit-order-method', compact('orderMethod', 'titleApp'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first' => 'required|string|max:255',
            'second' => 'required|string|max:255',
            'third' => 'required|string|max:255',
            'fourth' => 'required|string|max:255',
        ]);

        $orderMethod = OrderMethod::find(1);

        if (!$orderMethod) {
            return abort(404);
        }

        $orderMethod->update([
            'first' => $request->first,
            'second' => $request->second,
            'third' => $request->third,
            'fourth' => $request->fourth,
        ]);

        return redirect('admin/order-methods')->with("success", "Cara pesan berhasil diperbarui!");
    }
}
