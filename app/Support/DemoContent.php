<?php

namespace App\Support;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Data contoh untuk pratinjau slicing UI.
 *
 * Semua data dummy dikumpulkan di sini supaya controller tetap bersih.
 * Saat database & dashboard admin sudah ada, cukup ganti pemanggilan
 * kelas ini di controller dengan query Eloquent — view tidak perlu diubah
 * selama struktur key-nya sama.
 */
class DemoContent
{
    /**
     * Apakah data contoh harus ditampilkan untuk request ini.
     */
    public static function enabled(Request $request): bool
    {
        return $request->boolean('demo') || config('himatif.demo');
    }

    /**
     * @return Collection<int, array{id:int, title:string, category:string, date:string, image:string, excerpt:string}>
     */
    public static function berita(): Collection
    {
        return collect([
            [
                'id' => 1,
                'title' => 'HIMTEC 2026: Hackathon Vol.2',
                'category' => 'Kegiatan',
                'date' => '07 - 08 November 2026',
                'image' => 'images/content/news-himtec.webp',
                'excerpt' => 'Saatnya berinovasi dan membangun solusi digital melalui Hackathon Vol. 2 dengan tema BuildApp With AI.',
            ],
            [
                'id' => 2,
                'title' => 'IT HOLIC: Smart Innovation, Global Impact',
                'category' => 'Kegiatan',
                'date' => '29 November 2026',
                'image' => 'images/content/news-itholic.webp',
                'excerpt' => 'Wadah untuk memperluas wawasan teknologi, berbagi inspirasi, dan menghadirkan inovasi dengan dampak yang lebih luas.',
            ],
            [
                'id' => 3,
                'title' => 'Pembukaan Pendaftaran Peserta HIMTEC 2026',
                'category' => 'Pengumuman',
                'date' => '05 Oktober 2026',
                'image' => 'images/content/event-himtec.webp',
                'excerpt' => 'Pendaftaran peserta HIMTEC 2026 resmi dibuka! Jangan lewatkan kesempatan untuk mendapatkan pengalaman yang luar biasa.',
            ],
            [
                'id' => 4,
                'title' => 'Pembagian Modul Praktikum Semester Ganjil 2026/2027',
                'category' => 'Akademik',
                'date' => '28 September 2026',
                'image' => 'images/content/event-shareit.webp',
                'excerpt' => 'Modul praktikum untuk beberapa mata kuliah telah tersedia dan dapat diakses melalui menu Materi.',
            ],
            [
                'id' => 5,
                'title' => 'Dokumentasi Kegiatan PEKMAT 2026',
                'category' => 'HIMATIF',
                'date' => '26 Oktober 2026',
                'image' => 'images/content/news-pekmat.webp',
                'excerpt' => 'Berikut merupakan dokumentasi dari rangkaian kegiatan PEKMAT 2026 yang telah sukses dilaksanakan.',
            ],
            [
                'id' => 6,
                'title' => 'Open Rekrutmen BPH HIMATIF Periode 2026 - 2027',
                'category' => 'HIMATIF',
                'date' => '01 Januari 2027',
                'image' => 'images/content/event-itholic.webp',
                'excerpt' => 'HIMATIF membuka kesempatan bagi mahasiswa Teknik Informatika untuk bergabung menjadi bagian dari keluarga besar HIMATIF.',
            ],
        ]);
    }

    /**
     * @return Collection<int, array{title:string, date:string, location:string, image:string}>
     */
    public static function kegiatan(): Collection
    {
        return collect([
            [
                'title' => 'SHARE IT 2026',
                'date' => '24 Oktober 2026',
                'location' => 'Universitas Teknologi Bandung',
                'image' => 'images/content/event-shareit.webp',
            ],
            [
                'title' => 'HIMTEC 2026',
                'date' => '07 - 08 November 2026',
                'location' => 'Universitas Teknologi Bandung',
                'image' => 'images/content/event-himtec.webp',
            ],
            [
                'title' => 'IT HOLIC 2026',
                'date' => '29 November 2026',
                'location' => 'Bandung Creative Hub',
                'image' => 'images/content/event-itholic.webp',
            ],
        ]);
    }

    /**
     * @return Collection<int, array{id:int, title:string, type:string, semester:int, prodi:string, dosen:string, description:string, date:string, size:string}>
     */
    public static function materi(): Collection
    {
        $items = [
            [1, 'Pengantar Teknologi Informasi', 'pdf', 1, 'Bapak ...', '12 Jan 2024', '4 MB', 'Pengenalan dasar teknologi informasi, konsep sistem, dan perkembangan ICT.'],
            [2, 'Algoritma dan Pemrograman', 'ppt', 1, 'Ibu ...', '15 Jan 2024', '9 MB', 'Konsep algoritma, flowchart, pseudocode, dan dasar pemrograman terstruktur.'],
            [3, 'Matematika Diskrit', 'pdf', 2, 'Bapak ...', '05 Feb 2024', '6 MB', 'Logika proposisi, himpunan, relasi, fungsi, dan teori graf dasar.'],
            [4, 'Struktur Data', 'pdf', 3, 'Ibu ...', '02 Sep 2024', '12 MB', 'Array, linked list, stack, queue, tree, dan graph beserta implementasinya.'],
            [5, 'Jaringan Komputer', 'ppt', 3, 'Bapak ...', '09 Sep 2024', '8 MB', 'Model OSI dan TCP/IP, pengalamatan IP, routing, dan perangkat jaringan.'],
            [6, 'Pemrograman Web', 'pdf', 4, 'Bapak ...', '10 Feb 2025', '15 MB', 'HTML, CSS, JavaScript, dan dasar pengembangan aplikasi web dengan framework.'],
        ];

        return collect($items)->map(fn (array $m) => [
            'id' => $m[0],
            'title' => $m[1],
            'type' => $m[2],
            'semester' => $m[3],
            'prodi' => 'Teknik Informatika',
            'dosen' => $m[4],
            'date' => $m[5],
            'size' => $m[6],
            'description' => $m[7],
        ]);
    }

    /**
     * @return array{deskripsi:string}
     */
    public static function sejarah(string $periode): array
    {
        return [
            'deskripsi' => "Periode {$periode} menjadi langkah baru HIMATIF dalam melanjutkan semangat kolaborasi, inovasi, dan kontribusi untuk mahasiswa Teknik Informatika.",
        ];
    }

    /**
     * @return array{visi:string, misi:list<string>}
     */
    public static function visiMisi(): array
    {
        return [
            'visi' => 'Mewujudkan HIMATIF yang aktif dan bersinergi dalam pengembangan potensi mahasiswa Teknik Informatika yang unggul di bidang ICT serta membangun suasana yang harmonis dengan seluruh elemen dan mengoptimalkan budaya organisasi yang produktif.',
            'misi' => [
                'Mendorong keaktifan dan partisipasi mahasiswa Teknik Informatika melalui program kerja yang edukatif, inovatif, dan relevan dengan perkembangan ICT.',
                'Membangun suasana organisasi yang harmonis, inklusif, dan komunikatif dengan menjunjung tinggi rasa kebersamaan dan saling menghargai.',
                'Mengembangkan potensi dan kompetensi mahasiswa melalui pelatihan, seminar, dan kegiatan pengembangan keterampilan dengan mengutamakan aspek kebutuhan mahasiswa.',
                'Mengoptimalkan budaya organisasi yang produktif, disiplin, dan profesional sebagai landasan dalam menjalankan setiap kegiatan HIMATIF.',
            ],
        ];
    }

    /**
     * Pengurus inti, key = jabatan (sesuai config('himatif.jabatan_inti')).
     *
     * @return array<string, array{name:string, photo:?string}>
     */
    public static function pengurusInti(): array
    {
        return [
            'Ketua Himpunan' => ['name' => 'M. Syahdanu Al-Ghifary', 'photo' => null],
            'Wakil Ketua Himpunan' => ['name' => 'Haris Nurpazri', 'photo' => null],
            'Sekretaris Umum' => ['name' => 'Aziza Firdaus', 'photo' => null],
            'Bendahara Umum' => ['name' => 'Natalia Margaretha', 'photo' => null],
        ];
    }

    /**
     * Anggota per departemen, key = id departemen (sesuai config('himatif.departemen')).
     *
     * @return array<string, array{kadep:array, sekdep:array, divisi:list<array>}>
     */
    public static function anggotaDepartemen(): array
    {
        $p = fn (string $name, string $role) => ['name' => $name, 'role' => $role, 'photo' => null];

        return [
            'posdm' => [
                'kadep' => $p('Ardelia Luthfiani', 'Kepala Departemen'),
                'sekdep' => $p('Ratna Muslimah Ahmad', 'Sekretaris Departemen'),
                'divisi' => [
                    [
                        'name' => 'Divisi Kaderisasi',
                        'kadiv' => $p('Revalina Putri Artamevia', 'Kepala Divisi'),
                        'staff' => [
                            $p('Aliya Kusuma Dewi', 'Staff'),
                            $p('Reza Ikhtisam', 'Staff'),
                            $p('Valentino Lambinsar Marpaung', 'Staff'),
                        ],
                    ],
                    [
                        'name' => 'Divisi PPO',
                        'kadiv' => $p('Nazwa Akmalul Firdaus', 'Kepala Divisi'),
                        'staff' => [
                            $p('Max Devon Hartawan Sumadiwiria', 'Staff'),
                            $p('Rahma Azzahra', 'Staff'),
                            $p('Taufik Nurjaman', 'Staff'),
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return Collection<int, array{title:string, date:string, category:string, type:string, image:string, excerpt:string}>
     */
    public static function programKerja(): Collection
    {
        return collect([
            [
                'title' => 'PEKMAT 2026',
                'date' => '11 & 18 Oktober 2026',
                'category' => 'POSDM',
                'type' => 'Program Kerja',
                'image' => 'images/content/news-pekmat.webp',
                'excerpt' => 'Bersiap untuk rangkaian kegiatan PEKMAT HIMATIF. Informasi lengkap akan segera diinformasikan.',
            ],
            [
                'title' => 'HIMTEC 2026: Hackathon Vol.2',
                'date' => '07 - 08 November 2026',
                'category' => 'KOMINFO',
                'type' => 'Program Kerja',
                'image' => 'images/content/news-himtec.webp',
                'excerpt' => 'Saatnya berinovasi dan membangun solusi digital melalui Hackathon Vol. 2 dengan tema BuildApp With AI.',
            ],
            [
                'title' => 'IT HOLIC: Smart Innovation, Global Impact',
                'date' => '29 November 2026',
                'category' => 'PI',
                'type' => 'Agenda',
                'image' => 'images/content/news-itholic.webp',
                'excerpt' => 'Wadah untuk memperluas wawasan teknologi, berbagi inspirasi, dan menghadirkan inovasi.',
            ],
        ]);
    }
}
