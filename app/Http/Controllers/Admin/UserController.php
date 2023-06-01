<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $titleApp = 'Pengguna';
        $users = User::where('role_id', 2)->get();
        return view('admin/user', compact('users', 'titleApp'));
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
            'nomor_hp' => 'required',
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

        return redirect('admin/users');

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

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'nomor_hp' => 'required',
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

        return redirect('admin/users');

    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->where('role_id', 2);

        if (!$user->get()->first()) {
            return abort(404);
        }

        $user->get()->first()->customer->delete();
        $user->delete();

        return redirect('admin/users');
    }
}
