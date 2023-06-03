<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function formRegister()
    {
        return view('auth/register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'nomor_hp' => 'required',
            'address' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|confirmed|min:6',
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
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ]);

        $user->customer()->create([
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'nomor_hp' => $nomor_hp,
            'image' => 'default.jpg',
        ]);

        return view('auth/login');
    }

    public function login()
    {
        if (Auth::check() && Auth::user()->role_id == 1) {
            return redirect('admin/dashboard')->with('error_message', 'Anda sudah login!');
        }
        if (Auth::check() && Auth::user()->role_id == 2) {
            return redirect('/')->with('error_message', 'Anda sudah login!');
        }

        return view('auth/login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return redirect('auth/login')->with('error_message', 'Akun tidak tersedia!');
        }

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            if ($user->role_id == 1) {
                return redirect('admin/dashboard');
            }
            return redirect('/');
        }

        return redirect('auth/login')->with('error_message', 'Username atau password Anda salah!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
