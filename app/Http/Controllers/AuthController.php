<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login HIMATIF.
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Tampilkan halaman registrasi akun HIMATIF.
     */
    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }
}
