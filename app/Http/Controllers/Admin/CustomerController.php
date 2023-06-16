<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\OrderMethod;
use App\Models\Packet;
use App\Models\Studio;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function viewChangePassword()
    {

        $titleApp = 'Ganti Password';
        $brand = Brand::where('id', 1)->get()->first();
        $orderMethod = OrderMethod::where('id', 1)->get()->first();
        $user = auth()->user();
        $packets = Packet::all();
        $studios = Studio::all();

        $user = Auth::user();

        $user = User::where('id', $user->id)->where('role_id', 2)->get()->first();

        if (!$user) {
            return abort(404);
        }

        return view('change-password', compact('titleApp', 'brand', 'orderMethod', 'user', 'packets', 'studios'));

    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Password lama tidak cocok!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with("success", "Password berhasil diganti!");
    }
}
