<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Tampilkan halaman Materi Perkuliahan HIMATIF.
     */
    public function index(Request $request): View
    {
        $semesters = [1, 2, 3, 4, 5, 6, 7, 8];
        $selectedSemester = $request->query('semester', 'semua');

        // Isi materi dikosongkan terlebih dahulu sesuai instruksi.
        // Nanti di sesi lain akan diinput manual melalui dashboard admin.
        $materis = collect();

        // Opsi demo (?demo=1) untuk melihat pratinjau kartu materi sesuai desain mockup
        if ($request->boolean('demo')) {
            $materis = collect([
                [
                    'id' => 1,
                    'type' => 'pdf',
                    'title' => 'Pengantar Teknologi Informasi',
                    'prodi' => 'Teknik Informatika',
                    'dosen' => 'Dosen: Bapak.....',
                    'description' => 'Materi Pengenalan dasar teknologi informasi, konsep sistem. dan perkembangan ICT.',
                    'date' => '12 Jan 2024',
                    'semester' => 1,
                ],
                [
                    'id' => 2,
                    'type' => 'ppt',
                    'title' => 'Pengantar Teknologi Informasi',
                    'prodi' => 'Teknik Informatika',
                    'dosen' => 'Dosen: Bapak.....',
                    'description' => 'Materi Pengenalan dasar teknologi informasi, konsep sistem. dan perkembangan ICT.',
                    'date' => '12 Jan 2024',
                    'semester' => 1,
                ],
                [
                    'id' => 3,
                    'type' => 'ppt',
                    'title' => 'Pengantar Teknologi Informasi',
                    'prodi' => 'Teknik Informatika',
                    'dosen' => 'Dosen: Bapak.....',
                    'description' => 'Materi Pengenalan dasar teknologi informasi, konsep sistem. dan perkembangan ICT.',
                    'date' => '12 Jan 2024',
                    'semester' => 2,
                ],
                [
                    'id' => 4,
                    'type' => 'pdf',
                    'title' => 'Pengantar Teknologi Informasi',
                    'prodi' => 'Teknik Informatika',
                    'dosen' => 'Dosen: Bapak.....',
                    'description' => 'Materi Pengenalan dasar teknologi informasi, konsep sistem. dan perkembangan ICT.',
                    'date' => '12 Jan 2024',
                    'semester' => 2,
                ],
                [
                    'id' => 5,
                    'type' => 'pdf',
                    'title' => 'Pengantar Teknologi Informasi',
                    'prodi' => 'Teknik Informatika',
                    'dosen' => 'Dosen: Bapak.....',
                    'description' => 'Materi Pengenalan dasar teknologi informasi, konsep sistem. dan perkembangan ICT.',
                    'date' => '12 Jan 2024',
                    'semester' => 3,
                ],
                [
                    'id' => 6,
                    'type' => 'ppt',
                    'title' => 'Pengantar Teknologi Informasi',
                    'prodi' => 'Teknik Informatika',
                    'dosen' => 'Dosen: Bapak.....',
                    'description' => 'Materi Pengenalan dasar teknologi informasi, konsep sistem. dan perkembangan ICT.',
                    'date' => '12 Jan 2024',
                    'semester' => 3,
                ],
            ]);
        }

        return view('materi.index', compact('semesters', 'selectedSemester', 'materis'));
    }
}
