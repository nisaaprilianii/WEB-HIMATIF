<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    /**
     * Tampilkan halaman Sejarah & Struktur Organisasi HIMATIF.
     */
    public function index(Request $request): View
    {
        $periodes = [
            '2020 - 2021',
            '2021 - 2022',
            '2022 - 2023',
            '2023 - 2024',
            '2024 - 2025',
            '2025 - 2026',
        ];

        $activePeriod = $request->query('periode', '2025 - 2026');

        // Isi sejarah dan struktur organisasi dikosongkan terlebih dahulu sesuai instruksi.
        // Nanti di sesi lain akan diinput manual melalui dashboard admin.
        $sejarah = null;
        $visiMisi = null;
        $topMan = collect();
        $departemens = collect();
        $prokers = collect();

        // Opsi demo (?demo=1) untuk melihat pratinjau layout & kartu sesuai mockup design/halaman-sejarah.png
        if ($request->boolean('demo')) {
            $sejarah = [
                'periode' => 'Periode 2025 - 2026',
                'deskripsi' => 'Periode 2025 - 2026 menjadi langkah baru HIMATIF dalam melanjutkan semangat kolaborasi, inovasi, dan kontribusi untuk mahasiswa Teknik Informatika.',
            ];

            $visiMisi = [
                'visi' => 'Mewujudkan HIMATIF yang aktif dan bersinergi dalam pengembangan potensi mahasiswa Teknik Informatika yang unggul di bidang ICT serta membangun suasana yang harmonis dengan seluruh elemen dan mengoptimalkan budaya organisasi yang produktif.',
                'misi' => [
                    'Mendorong keaktifan dan partisipasi mahasiswa Teknik Informatika melalui program kerja yang edukatif, inovatif, dan relevan dengan perkembangan ICT.',
                    'Membangun suasana organisasi yang harmonis, inklusif, dan komunikatif dengan menjunjung tinggi rasa kebersamaan dan saling menghargai.',
                    'Mengembangkan potensi dan kompetensi mahasiswa melalui pelatihan, seminar, dan kegiatan pengembangan keterampilan dengan mengutamakan aspek kebutuhan mahasiswa.',
                    'Mengoptimalkan budaya organisasi yang produktif, disiplin, dan profesional sebagai landasan dalam menjalankan setiap kegiatan HIMATIF.',
                ],
            ];

            $topMan = collect([
                [
                    'name' => 'M. Syahdanu Al-Ghifary',
                    'role' => 'Ketua Himpunan',
                    'image' => 'images/Logo_resized.png',
                ],
                [
                    'name' => 'Haris Nurpazri',
                    'role' => 'Wakil Ketua Himpunan',
                    'image' => 'images/Logo_resized.png',
                ],
                [
                    'name' => 'Aziza Firdaus',
                    'role' => 'Sekretaris Umum',
                    'image' => 'images/Logo_resized.png',
                ],
                [
                    'name' => 'Natalia Margaretha',
                    'role' => 'Bendahara Umum',
                    'image' => 'images/Logo_resized.png',
                ],
            ]);

            $departemens = collect([
                [
                    'id' => 'posdm',
                    'code' => 'POSDM',
                    'name' => 'Pengembangan Organisasi dan Sumber Daya Mahasiswa',
                    'image' => 'images/event-shareit.png',
                    'kadep' => [
                        'name' => 'Ardelia Luthfiani',
                        'role' => 'Kepala Departemen',
                        'image' => 'images/Logo_resized.png',
                    ],
                    'sekdep' => [
                        'name' => 'Ratna Muslimah Ahmad',
                        'role' => 'Sekretaris Departemen',
                        'image' => 'images/Logo_resized.png',
                    ],
                    'divisi' => [
                        [
                            'name' => 'Divisi Kaderisasi',
                            'kadiv' => [
                                'name' => 'Revalina Putri Artamevia',
                                'role' => 'Kepala Divisi',
                                'image' => 'images/Logo_resized.png',
                            ],
                            'staff' => [
                                ['name' => 'Aliya Kusuma Dewi', 'role' => 'Staff', 'image' => 'images/Logo_resized.png'],
                                ['name' => 'Reza Ikhtisam', 'role' => 'Staff', 'image' => 'images/Logo_resized.png'],
                                ['name' => 'Valentino Lambinsar Marpaung', 'role' => 'Staff', 'image' => 'images/Logo_resized.png'],
                            ],
                        ],
                        [
                            'name' => 'Divisi PPO',
                            'kadiv' => [
                                'name' => 'Nazwa Akmalul Firdaus',
                                'role' => 'Kepala Divisi',
                                'image' => 'images/Logo_resized.png',
                            ],
                            'staff' => [
                                ['name' => 'Max Devon Hartawan Sumadiwiria', 'role' => 'Staff', 'image' => 'images/Logo_resized.png'],
                                ['name' => 'Rahma Azzahra', 'role' => 'Staff', 'image' => 'images/Logo_resized.png'],
                                ['name' => 'Taufik Nurjaman', 'role' => 'Staff', 'image' => 'images/Logo_resized.png'],
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 'kominfo',
                    'code' => 'KOMINFO',
                    'name' => 'Komunikasi dan Informasi',
                    'image' => 'images/event-himtec.png',
                ],
                [
                    'id' => 'pi',
                    'code' => 'PI',
                    'name' => 'Penalaran Intelektual',
                    'image' => 'images/news-itholic.png',
                ],
                [
                    'id' => 'kwu',
                    'code' => 'KWU',
                    'name' => 'Kewirausahaan',
                    'image' => 'images/event-shareit.png',
                ],
            ]);

            $prokers = collect([
                [
                    'title' => 'PEKMAT 2026',
                    'date' => '11 & 18 Oktober 2026',
                    'category' => 'HIMATIF',
                    'image' => 'images/news-pekmat.png',
                    'description' => 'Bersiap untuk rangkaian kegiatan PEKMAT HIMATIF. Informasi lengkap akan segera diinformasikan.',
                ],
                [
                    'title' => 'HIMTEC 2026: Hackathon Vol.2',
                    'date' => '07 - 08 November 2026',
                    'category' => 'KOMINFO',
                    'image' => 'images/news-himtec.png',
                    'description' => 'Saatnya berinovasi dan membangun solusi digital melalui Hackathon Vol. 2 dengan tema BuildApp With AI.',
                ],
                [
                    'title' => 'IT HOLIC: Smart Innovation, Global Impact',
                    'date' => '29 November 2026',
                    'category' => 'PI',
                    'image' => 'images/news-itholic.png',
                    'description' => 'Wadah untuk memperluas wawasan teknologi, berbagi inspirasi, dan menghadirkan inovasi.',
                ],
            ]);
        }

        return view('sejarah.index', compact(
            'periodes',
            'activePeriod',
            'sejarah',
            'visiMisi',
            'topMan',
            'departemens',
            'prokers'
        ));
    }
}
