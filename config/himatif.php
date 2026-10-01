<?php

/*
|--------------------------------------------------------------------------
| Konfigurasi Situs HIMATIF
|--------------------------------------------------------------------------
|
| Semua teks/identitas yang dipakai berulang di banyak halaman (navbar,
| footer, meta) dikumpulkan di sini supaya cukup diubah di satu tempat.
|
*/

return [

    'name' => 'HIMATIF',
    'full_name' => 'Himpunan Mahasiswa Teknik Informatika',
    'campus' => 'Universitas Teknologi Bandung',
    'tagline' => 'Kreatif, Inovatif, Mandiri',
    'description' => 'Wadah bagi mahasiswa Teknik Informatika untuk belajar, berkolaborasi, berkarya, dan berkembang bersama menuju dampak yang lebih luas.',
    'address' => 'Kb. Lega, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40235',

    /*
    | Data contoh (dummy) untuk pratinjau slicing. Aktifkan lewat .env
    | (HIMATIF_DEMO=true) atau tambahkan ?demo=1 pada URL.
    */
    'demo' => (bool) env('HIMATIF_DEMO', false),

    /*
    | Struktur organisasi yang sifatnya tetap (bukan data dummy).
    */
    'periodes' => ['2020 - 2021', '2021 - 2022', '2022 - 2023', '2023 - 2024', '2024 - 2025', '2025 - 2026'],

    'jabatan_inti' => ['Ketua Himpunan', 'Wakil Ketua Himpunan', 'Sekretaris Umum', 'Bendahara Umum'],

    'departemen' => [
        'posdm' => ['code' => 'POSDM', 'name' => 'Pengembangan Organisasi dan Sumber Daya Mahasiswa'],
        'kominfo' => ['code' => 'KOMINFO', 'name' => 'Komunikasi dan Informasi'],
        'pi' => ['code' => 'PI', 'name' => 'Penalaran Intelektual'],
        'kwu' => ['code' => 'KWU', 'name' => 'Kewirausahaan'],
    ],

    'kategori_berita' => ['Kegiatan', 'Pengumuman', 'Akademik', 'HIMATIF'],

    'jenis_aspirasi' => [
        'Akademik' => 'Akademik & Perkuliahan',
        'Fasilitas Kampus' => 'Sarana & Fasilitas Kampus',
        'Kegiatan Kemahasiswaan' => 'Kegiatan & Program Kerja HIMATIF',
        'Tata Kelola Organisasi' => 'Tata Kelola & Organisasi',
        'Lainnya' => 'Lainnya',
    ],

    'socials' => [
        ['name' => 'Instagram', 'icon' => 'instagram', 'url' => env('HIMATIF_INSTAGRAM_URL', 'https://instagram.com')],
        ['name' => 'YouTube', 'icon' => 'youtube', 'url' => env('HIMATIF_YOUTUBE_URL', 'https://youtube.com')],
    ],

    /*
    | Menu navigasi utama. `active` adalah pola nama route (Route::is)
    | yang menandai menu sedang aktif.
    */
    'nav' => [
        ['label' => 'Beranda', 'route' => 'home', 'active' => 'home'],
        ['label' => 'Berita', 'route' => 'berita.index', 'active' => 'berita.*'],
        [
            'label' => 'Tentang Kami',
            'active' => 'sejarah.*',
            'children' => [
                ['label' => 'Sejarah & Periode', 'route' => 'sejarah.index', 'anchor' => 'perjalanan'],
                ['label' => 'Visi & Misi', 'route' => 'sejarah.index', 'anchor' => 'visi-misi'],
                ['label' => 'Struktur Organisasi', 'route' => 'sejarah.index', 'anchor' => 'struktur'],
                ['label' => 'Program Kerja', 'route' => 'sejarah.index', 'anchor' => 'program-kerja'],
            ],
        ],
        ['label' => 'Materi', 'route' => 'materi.index', 'active' => 'materi.*'],
        ['label' => 'Aspirasi', 'route' => 'aspirasi.index', 'active' => 'aspirasi.*'],
    ],

];
