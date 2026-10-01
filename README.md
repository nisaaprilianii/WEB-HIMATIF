# Web HIMATIF

Website Himpunan Mahasiswa Teknik Informatika — Universitas Teknologi Bandung.
Laravel 13 + Blade components + Tailwind CSS v4 + Alpine.js (via Vite).

## Menjalankan

```bash
composer install
npm install            # wajib: alpinejs sekarang dari npm, bukan CDN
cp .env.example .env && php artisan key:generate
php artisan migrate
npm run dev            # atau: npm run build
php artisan serve
```

Pratinjau dengan data contoh: tambahkan `?demo=1` di URL, atau set `HIMATIF_DEMO=true` di `.env`.

## Struktur

```
app/
├── Http/Controllers/        # tipis: ambil data → filter → kirim ke view
└── Support/
    ├── DemoContent.php      # SEMUA data dummy (ganti dgn Eloquent nanti)
    └── CollectionPaginator.php
config/himatif.php           # identitas situs, menu navbar, sosmed, departemen, kategori
resources/
├── css/app.css              # design token (warna brand-*, font) + utility form-control
├── js/app.js                # Alpine.js
└── views/
    ├── components/
    │   ├── layouts/         # app (publik), auth (login/daftar)
    │   ├── site/            # head, navbar, footer, logo, page-hero
    │   ├── ui/              # button, icon, pill, badge, section-heading, empty-state,
    │   │                    # alert, pagination, container, link-arrow, keep-query
    │   ├── card/            # berita, kegiatan, materi, pengurus
    │   └── form/            # field, input, password, select, textarea
    └── pages/               # satu file per halaman
        ├── home.blade.php
        ├── berita/ materi/ sejarah/ aspirasi/
        └── auth/            # login, register
public/images/
├── brand/                   # logo.png (256px), favicon.png
├── backgrounds/             # header, footer, section-*, login, register, ... (.webp)
└── content/                 # gambar berita/kegiatan contoh (.webp)
design/                      # mockup referensi + logo sumber resolusi penuh
```

## Aturan main (biar tidak berantakan lagi)

- **Warna**: pakai token `brand-50 … brand-950` dan `canvas`. Dilarang `bg-[#70111a]` dkk.
  - `brand-800` = warna utama (tombol, state aktif), `brand-900` = hover / latar header-footer,
    `brand-700` = teks aksen & link, `brand-500` = aksen terang (CTA hero, eyebrow).
- **Netral**: pakai `stone-*` saja (bukan campur `gray-*`).
- **Ikon**: `<x-ui.icon name="..." />`. Ikon baru didaftarkan di `components/ui/icon.blade.php`.
- **Halaman baru**: bungkus dengan `<x-layouts.app title="...">` + `<x-site.page-hero>` di slot `hero`.
  Jangan menyalin `<head>`, navbar, atau footer.
- **Judul section**: selalu `<x-ui.section-heading>`.
- **Menu navbar/footer**: ubah di `config/himatif.php`, bukan di Blade.
- **Nama file aset**: kebab-case, huruf kecil.

## Status fitur backend

| Fitur | Status |
|---|---|
| Filter/cari/paginasi Berita & Materi | Berfungsi (query string), data masih dummy |
| Login / Logout | Berfungsi (tabel `users` bawaan) |
| Daftar akun | Hanya validasi — **belum menyimpan** (perlu kolom nim, angkatan, dll. + upload sertifikat) |
| Kirim aspirasi | Hanya validasi — **belum menyimpan** (perlu model & migration `aspirasi`) |
| Download/Lihat materi, Baca Selengkapnya, Lupa Password | Tautan `#` — belum ada halaman tujuan |
