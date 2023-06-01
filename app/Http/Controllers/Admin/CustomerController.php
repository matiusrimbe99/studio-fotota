<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $titleApp = 'Pelanggan';
        $customers = Customer::all();
        return view('admin/customer', compact('customers', 'titleApp'));
    }

    public function show($id)
    {
        $titleApp = 'Pelanggan';
        $customer = Customer::where('id', $id)->get()->first();

        if (!$customer) {
            return abort(404);
        }

        return view('admin/detail-customer', compact('customer', 'titleApp'));

    }
}
