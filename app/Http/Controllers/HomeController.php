<?php

namespace App\Http\Controllers;

use App\Support\DemoContent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman beranda HIMATIF.
     */
    public function index(Request $request): View
    {
        $demo = DemoContent::enabled($request);

        return view('pages.home', [
            'beritas' => $demo ? DemoContent::berita()->take(3) : collect(),
            'materis' => $demo ? DemoContent::materi()->take(3) : collect(),
            'kegiatans' => $demo ? DemoContent::kegiatan() : collect(),
        ]);
    }
}
