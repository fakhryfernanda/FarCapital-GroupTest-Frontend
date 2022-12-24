<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function login() //login 
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request) //authentication login
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('loginError', 'Email atau password salah');
    }

    public function logout() //logout session
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

    public function store(Request $request) // function menambah admin
    {
        $admin = User::query()->where('email', $request->email)->first();
        if ($admin) {
            return redirect(route('admin.all'))->withErrors(['message' => 'Email Sudah Digunakan!']);
        }

        $payload = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(10),
        ];

        User::query()->create($payload);
        return redirect(route('admin.all'))->with('success', 'Admin Berhasil Ditambah!');
    }

    public function showall()  // function show all admin
    {
        $admins = User::query()->get();

        return view('admin.kelolaadmin', ['admins' => $admins]);
    }
}
