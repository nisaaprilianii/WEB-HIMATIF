<?php

namespace App\Http\Controllers;

use App\Support\CollectionPaginator;
use App\Support\DemoContent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MateriController extends Controller
{
    /**
     * Tampilkan halaman Materi Perkuliahan HIMATIF.
     */
    public function index(Request $request): View
    {
        $semester = $request->integer('semester') ?: null;
        $search = trim((string) $request->query('q'));
        $sort = $request->query('urut', 'terbaru');

        // TODO: ganti dengan query model Materi setelah dashboard admin tersedia.
        $materis = DemoContent::enabled($request) ? DemoContent::materi() : collect();

        $materis = $materis
            ->when($semester, fn ($items) => $items->where('semester', $semester))
            ->when($search !== '', fn ($items) => $items->filter(
                fn ($item) => Str::contains($item['title'].' '.$item['dosen'].' '.$item['description'], $search, ignoreCase: true)
            ))
            ->pipe(fn ($items) => $sort === 'nama' ? $items->sortBy('title') : $items->sortByDesc('id'));

        return view('pages.materi.index', [
            'materis' => CollectionPaginator::make($materis->values(), $request),
            'semesters' => range(1, 8),
            'semester' => $semester,
            'search' => $search,
            'sort' => $sort,
        ]);
    }
}
