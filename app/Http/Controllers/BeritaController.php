<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Tampilkan halaman Berita & Informasi HIMATIF.
     */
    public function index(Request $request): View
    {
        // Konten berita dikosongkan terlebih dahulu sesuai instruksi.
        // Nanti di sesi lain akan diinput manual melalui dashboard admin.
        $beritas = collect();

        // Opsi demo (?demo=1) untuk melihat pratinjau slicing kartu berita dari desain
        if ($request->boolean('demo')) {
            $beritas = collect([
                [
                    'id' => 1,
                    'title' => 'HIMTEC 2026: Hackathon Vol.2',
                    'date' => '07 - 08 November 2026',
                    'category' => 'Kegiatan',
                    'image' => 'images/news-himtec.png',
                    'excerpt' => 'Saatnya berinovasi dan membangun solusi digital melalui Hackathon Vol. 2 dengan tema BuildApp With AI.',
                ],
                [
                    'id' => 2,
                    'title' => 'IT HOLIC: Smart Innovation, Global Impact',
                    'date' => '29 November 2026',
                    'category' => 'Kegiatan',
                    'image' => 'images/news-itholic.png',
                    'excerpt' => 'Wadah untuk memperluas wawasan teknologi, berbagi inspirasi, dan menghadirkan inovasi dengan dampak yang lebih luas.',
                ],
                [
                    'id' => 3,
                    'title' => 'Pembukaan Pendaftaran Peserta HIMTEC 2026',
                    'date' => '05 Oktober 2026',
                    'category' => 'Pengumuman',
                    'image' => 'images/event-himtec.png',
                    'excerpt' => 'Pendaftaran peserta HIMTEC 2026 resmi dibuka! Jangan lewatkan kesempatan untuk mendapatkan pengalaman yang luar biasa.',
                ],
                [
                    'id' => 4,
                    'title' => 'Pembagian Modul Praktikum Semester Ganjil 2026/2027',
                    'date' => '28 September 2026',
                    'category' => 'Akademik',
                    'image' => 'images/event-shareit.png',
                    'excerpt' => 'Modul praktikum untuk beberapa mata kuliah telah tersedia dan dapat diakses melalui menu Materi.',
                ],
                [
                    'id' => 5,
                    'title' => 'Dokumentasi Kegiatan PEKMAT 2026',
                    'date' => '26 Oktober 2026',
                    'category' => 'HIMATIF',
                    'image' => 'images/news-pekmat.png',
                    'excerpt' => 'Berikut merupakan dokumentasi dari rangkaian kegiatan PEKMAT 2026 yang telah sukses dilaksanakan.',
                ],
                [
                    'id' => 6,
                    'title' => 'Open Rekrutmen BPH HIMATIF Periode 2026 - 2027',
                    'date' => '01 Januari 2027',
                    'category' => 'HIMATIF',
                    'image' => 'images/event-itholic.png',
                    'excerpt' => 'HIMATIF membuka kesempatan bagi mahasiswa Teknik Informatika untuk bergabung menjadi bagian dari keluarga besar HIMATIF.',
                ],
            ]);
        }

        return view('berita.index', compact('beritas'));
    }
}
