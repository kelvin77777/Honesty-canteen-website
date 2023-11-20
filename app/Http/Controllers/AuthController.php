<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginForm() {
        return view('pages.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return view('pages.admin'); // Mengarahkan ke view "admin.blade.php"
        }
        return redirect('/login')->with('error', 'Login gagal. Periksa kembali username dan password Anda.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    
}
