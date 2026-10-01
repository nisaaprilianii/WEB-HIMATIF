<?php

namespace App\Http\Controllers;

use App\Support\CollectionPaginator;
use App\Support\DemoContent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Tampilkan halaman Berita & Informasi HIMATIF.
     */
    public function index(Request $request): View
    {
        $kategori = $request->query('kategori');
        $search = trim((string) $request->query('q'));

        // TODO: ganti dengan query model Berita setelah dashboard admin tersedia.
        $beritas = DemoContent::enabled($request) ? DemoContent::berita() : collect();

        $beritas = $beritas
            ->when($kategori, fn ($items) => $items->where('category', $kategori))
            ->when($search !== '', fn ($items) => $items->filter(
                fn ($item) => Str::contains($item['title'].' '.$item['excerpt'], $search, ignoreCase: true)
            ));

        return view('pages.berita.index', [
            'beritas' => CollectionPaginator::make($beritas->values(), $request),
            'kategoris' => config('himatif.kategori_berita'),
            'kategori' => $kategori,
            'search' => $search,
        ]);
    }
}
