<?php

namespace App\Http\Controllers;

use App\Support\DemoContent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    /**
     * Tampilkan halaman Sejarah & Struktur Organisasi HIMATIF.
     */
    public function index(Request $request): View
    {
        $periodes = config('himatif.periodes');
        $periode = in_array($request->query('periode'), $periodes, true)
            ? $request->query('periode')
            : end($periodes);

        // TODO: ganti dengan query per periode setelah dashboard admin tersedia.
        $demo = DemoContent::enabled($request);
        $pengurusInti = $demo ? DemoContent::pengurusInti() : [];
        $anggota = $demo ? DemoContent::anggotaDepartemen() : [];

        // Gabungkan struktur tetap (config) dengan data anggota (bisa kosong).
        $departemens = collect(config('himatif.departemen'))
            ->map(fn (array $dept, string $id) => $dept + ['id' => $id, 'anggota' => $anggota[$id] ?? null]);

        return view('pages.sejarah.index', [
            'periodes' => $periodes,
            'periode' => $periode,
            'sejarah' => $demo ? DemoContent::sejarah($periode) : null,
            'visiMisi' => $demo ? DemoContent::visiMisi() : null,
            'pengurusInti' => collect(config('himatif.jabatan_inti'))
                ->map(fn (string $jabatan) => ['role' => $jabatan] + ($pengurusInti[$jabatan] ?? ['name' => null, 'photo' => null])),
            'departemens' => $departemens,
            'prokers' => $demo ? DemoContent::programKerja() : collect(),
        ]);
    }
}
