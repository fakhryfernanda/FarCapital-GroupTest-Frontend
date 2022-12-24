<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function login()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }

    public function create()
    {
        return view('admin.addadmin');
    }

    public function store(Request $request)
    {
        $admin = User::query()->where('email', $request->email)->first();
        if ($admin) {
            return redirect()->back()->withErrors(['message' => 'Email Sudah Digunakan!']);
        }

        $payload = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(10),
        ];

        User::query()->create($payload);
        return redirect()->back()->with(['message' => 'Admin Berhasil Ditambah!']);
    }
}
