<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $titleApp = 'Kontak & Rekening';
        $contact = Contact::where('id', 1)->get()->first();

        if (!$contact) {
            return abort(404);
        }

        return view('admin/contact', compact('contact', 'titleApp'));
    }

    public function edit()
    {
        $titleApp = 'Kontak & Rekening';
        $contact = Contact::where('id', 1)->get()->first();

        if (!$contact) {
            return abort(404);
        }

        return view('admin/edit-contact', compact('contact', 'titleApp'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'whatsapp' => 'required|numeric',
            'facebook' => 'required|string',
            'instagram' => 'required|string',
            'account_number' => 'required|numeric',
            'name_on_account' => 'required|string',
            'bank_name' => 'required|string',
            'method_order' => 'required|string|max:255',
        ]);

        $whatsapp = $request['whatsapp'];
        if ($request['whatsapp'][0] == "0") {
            $whatsapp = substr($whatsapp, 1);
        }
        if ($whatsapp[0] == "8") {
            $whatsapp = "62" . $whatsapp;
        }

        $contact = Contact::find(1);

        if (!$contact) {
            return abort(404);
        }

        $contact->update([
            'whatsapp' => $whatsapp,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'account_number' => $request->account_number,
            'name_on_account' => $request->name_on_account,
            'bank_name' => $request->bank_name,
            'method_order' => $request->method_order,
        ]);

        return redirect('admin/contacts')->with("success", "Kontak dan rekening berhasil diperbarui!");
    }
}
