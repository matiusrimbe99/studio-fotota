<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $titleApp = 'Pengguna';

        if ($request->ajax()) {
            $users = User::where('role_id', 2)->get();
            return Datatables::of($users)->addIndexColumn()
                ->addColumn('number', function ($row) {
                    static $number = 1;
                    return $number++;
                })->addColumn('name', function ($row) {
                return $row->customer->name;
            })->addColumn('nomor_hp', function ($row) {
                return $row->customer->nomor_hp;
            })->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-sm btn-info" href="' . "users/" . $row->id . '"><i class="fas fa-edit"></i> View</a>';
                return $btn;
            })->rawColumns(['number', 'name', 'nomor_hp', 'action'])->make(true);
        }

        return view('admin/user', compact('titleApp'));
    }

    public function create()
    {
        $titleApp = 'Pengguna';
        return view('admin/create-user', compact('titleApp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'gender' => 'required',
            'nomor_hp' => 'required|numeric',
        ]);

        $nomor_hp = $request['nomor_hp'];
        if ($request['nomor_hp'][0] == "0") {
            $nomor_hp = substr($nomor_hp, 1);
        }
        if ($nomor_hp[0] == "8") {
            $nomor_hp = "62" . $nomor_hp;
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->username . '@' . $request->nomor_hp),
            'role_id' => 2,
        ]);

        $user->customer()->create([
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'nomor_hp' => $nomor_hp,
            'image' => 'default.jpg',
        ]);

        return redirect('admin/users')->with("success", "Pengguna berhasil ditambah!");

    }

    public function show($id)
    {
        $titleApp = 'Pengguna';
        $user = User::where('id', $id)->where('role_id', 2)->get()->first();

        if (!$user) {
            return abort(404);
        }

        return view('admin/detail-user', compact('user', 'titleApp'));
    }

    public function edit($id)
    {
        $titleApp = 'Pengguna';
        $user = User::where('id', $id)->where('role_id', 2)->get()->first();

        if (!$user) {
            return abort(404);
        }

        return view('admin/edit-user', compact('user', 'titleApp'));
    }

    public function editProfileAdmin()
    {
        $user = Auth::user();
        $titleApp = 'Edit Profil';
        $user = User::where('id', $user->id)->where('role_id', 1)->get()->first();

        if (!$user) {
            return abort(404);
        }

        return view('admin/edit-profile', compact('user', 'titleApp'));

    }

    public function changePasswordAdmin()
    {
        $user = Auth::user();
        $titleApp = 'Ganti Password';
        $user = User::where('id', $user->id)->where('role_id', 1)->get()->first();

        if (!$user) {
            return abort(404);
        }

        return view('admin/change-password', compact('user', 'titleApp'));

    }

    public function updatePasswordAdmin(Request $request)
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

    public function updateProfileAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'nomor_hp' => 'required|numeric',
        ]);

        $nomor_hp = $request['nomor_hp'];
        if ($request['nomor_hp'][0] == "0") {
            $nomor_hp = substr($nomor_hp, 1);
        }
        if ($nomor_hp[0] == "8") {
            $nomor_hp = "62" . $nomor_hp;
        }

        $userId = Auth::id();
        $user = User::where('id', $userId)->where('role_id', 1);

        if (!$user->get()->first()) {
            return abort(404);
        }

        $user->get()->first()->admin->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'nomor_hp' => $nomor_hp,
        ]);

        return back()->with("success", "Profil Admin berhasil diperbarui!");

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'nomor_hp' => 'required|numeric',
        ]);

        $nomor_hp = $request['nomor_hp'];
        if ($request['nomor_hp'][0] == "0") {
            $nomor_hp = substr($nomor_hp, 1);
        }
        if ($nomor_hp[0] == "8") {
            $nomor_hp = "62" . $nomor_hp;
        }

        $user = User::where('id', $id)->where('role_id', 2);

        if (!$user->get()->first()) {
            return abort(404);
        }

        $user->get()->first()->customer->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'nomor_hp' => $nomor_hp,
        ]);

        return redirect('admin/users')->with("success", "Pengguna berhasil diubah!");

    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->where('role_id', 2);

        if (!$user->get()->first()) {
            return abort(404);
        }

        $user->get()->first()->customer->delete();
        $user->delete();

        return redirect('admin/users')->with("success", "Pengguna berhasil dihapus!");
    }
}
