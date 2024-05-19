<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Cek apakah pengguna adalah admin
        if (!Admin::where('email', $user->email)->exists()) {
            abort(403, 'Unauthorized action.');
        }

        return view('Studysmart.admin.dashboard');
    }
}