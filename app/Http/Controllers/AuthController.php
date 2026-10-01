<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login HIMATIF.
     */
    public function showLoginForm(): View
    {
        return view('pages.auth.login');
    }

    /**
     * Proses login menggunakan tabel users bawaan Laravel.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Email atau password yang Anda masukkan salah.']);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    /**
     * Keluar dari akun.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    /**
     * Tampilkan halaman registrasi akun HIMATIF.
     */
    public function showRegistrationForm(): View
    {
        return view('pages.auth.register', [
            'angkatans' => range((int) date('Y'), (int) date('Y') - 5),
        ]);
    }

    /**
     * Validasi form registrasi.
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:50'],
            'angkatan' => ['required', 'integer', 'between:2000,'.date('Y')],
            'kelas' => ['required', 'string', 'max:100'],
            'whatsapp' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'file_sertifikat' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'agreement' => ['accepted'],
        ]);

        // TODO: tabel users belum punya kolom nim/angkatan/kelas/whatsapp/sertifikat.
        // Tambahkan migration + simpan file sertifikat, lalu buat user di sini.

        return redirect()
            ->route('login')
            ->with('status', 'Pendaftaran berhasil dikirim. Akun akan aktif setelah sertifikat PEKMAT diverifikasi pengurus.');
    }
}
