<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AspirasiController extends Controller
{
    /**
     * Tampilkan halaman Aspirasi HIMATIF.
     */
    public function index(): View
    {
        return view('pages.aspirasi.index', [
            'jenisAspirasi' => config('himatif.jenis_aspirasi'),
        ]);
    }

    /**
     * Simpan aspirasi mahasiswa.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:50'],
            'kelas' => ['required', 'string', 'max:100'],
            'jenis_aspirasi' => ['required', Rule::in(array_keys(config('himatif.jenis_aspirasi')))],
            'judul_aspirasi' => ['required', 'string', 'max:255'],
            'isi_aspirasi' => ['required', 'string', 'max:5000'],
        ]);

        // TODO: simpan $validated ke tabel aspirasi (belum ada model/migration).
        // Saat ini data BELUM tersimpan ke mana pun.

        return redirect()
            ->route('aspirasi.index')
            ->with('status', 'Terima kasih! Aspirasi Anda telah berhasil dikirim dan akan segera kami tinjau.');
    }
}
