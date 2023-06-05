<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use DataTables;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $titleApp = 'Pelanggan';

        if ($request->ajax()) {
            $customers = Customer::all();

            return Datatables::of($customers)->addIndexColumn()
                ->addColumn('number', function ($row) {
                    static $number = 1;
                    return $number++;
                })->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-sm btn-info" href="' . "customers/" . $row->id . '"><i class="fas fa-edit"></i> View</a>';
                return $btn;
            })->rawColumns(['number', 'action'])->make(true);
        }

        return view('admin/customer', compact('titleApp'));
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
