<?php

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // pastikan view login sudah ada
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Cek apakah email ada di tabel admin
        if (!Admin::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email tidak ditemukan di daftar admin.']);
        }

        // Melakukan autentikasi
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Redirect jika sukses login
            return redirect()->intended(route('dashboard'));
        }

        // Jika autentikasi gagal
        return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}

