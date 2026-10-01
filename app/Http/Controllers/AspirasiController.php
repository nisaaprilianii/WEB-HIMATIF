<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    /**
     * Tampilkan halaman Aspirasi HIMATIF.
     */
    public function index(): View
    {
        return view('aspirasi.index');
    }

    /**
     * Simpan aspirasi mahasiswa.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'kelas' => 'required|string|max:100',
            'jenis_aspirasi' => 'required|string|max:100',
            'judul_aspirasi' => 'required|string|max:255',
            'isi_aspirasi' => 'required|string',
        ]);

        return redirect()->route('aspirasi.index')->with('status', 'Terima kasih! Aspirasi Anda telah berhasil dikirim dan akan segera kami tinjau.');
    }
}
