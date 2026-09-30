<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita & Informasi - HIMATIF | Himpunan Mahasiswa Teknik Informatika</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Logo_resized.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Alpine.js for lightweight UI interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-[#faf8f8] text-gray-800 antialiased selection:bg-[#70111a] selection:text-white" x-data="{ mobileMenuOpen: false, darkMode: false, activeCategory: 'Semua', searchQuery: '' }">

    <!-- ========================================== -->
    <!-- HEADER & HERO BANNER                       -->
    <!-- ========================================== -->
    <header class="relative bg-[#5a0609] text-white overflow-hidden bg-cover bg-bottom" style="background-image: url('{{ asset('images/bg-header.png') }}'); background-repeat: no-repeat;">
        
        <!-- Navigation Bar -->
        <nav class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/Logo_resized.png') }}" alt="Logo HIMATIF" class="h-11 w-11 object-contain transition-transform group-hover:scale-105 duration-200">
                <span class="text-xl font-extrabold tracking-wider text-white">HIMATIF</span>
            </a>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center space-x-8 text-sm">
                <a href="{{ url('/') }}" class="text-white/80 hover:text-white font-medium transition-colors">
                    Beranda
                </a>
                
                <!-- Berita (Active Page Indicator) -->
                <a href="{{ route('berita.index') }}" class="text-white font-semibold relative py-1">
                    Berita
                    <span class="absolute bottom-0 left-0 w-full h-[2.5px] bg-red-500 rounded-full shadow-[0_0_8px_rgba(239,68,68,0.8)]"></span>
                </a>
                
                <!-- Dropdown: Tentang Kami -->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open" class="flex items-center gap-1.5 text-white/80 hover:text-white font-medium transition-colors focus:outline-none">
                        Tentang Kami
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute left-0 mt-3 w-48 rounded-xl bg-white shadow-xl py-2 z-50 text-gray-800 border border-gray-100">
                        <a href="{{ url('/#tentang') }}" class="block px-4 py-2 hover:bg-red-50 hover:text-red-700 transition">Profil Organisasi</a>
                        <a href="{{ url('/#divisi') }}" class="block px-4 py-2 hover:bg-red-50 hover:text-red-700 transition">Departemen & Divisi</a>
                        <a href="{{ url('/#proker') }}" class="block px-4 py-2 hover:bg-red-50 hover:text-red-700 transition">Program Kerja</a>
                    </div>
                </div>

                <a href="{{ url('/#materi') }}" class="text-white/80 hover:text-white font-medium transition-colors">Materi</a>
                <a href="{{ url('/#aspirasi') }}" class="text-white/80 hover:text-white font-medium transition-colors">Aspirasi</a>
            </div>

            <!-- Right Actions (Theme Switcher & Login) -->
            <div class="hidden md:flex items-center space-x-5">
                <!-- Theme Toggle Button -->
                <button @click="darkMode = !darkMode" type="button" aria-label="Toggle Mode" class="p-2 rounded-full text-white/85 hover:text-white hover:bg-white/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>

                <!-- Tombol Masuk -->
                <a href="{{ route('login') }}" class="bg-white text-gray-900 font-semibold px-6 py-2 rounded-full shadow-md hover:bg-gray-100 hover:shadow-lg transition-all transform hover:-translate-y-0.5 text-sm">
                    Masuk
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="md:hidden flex items-center space-x-3">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-white p-2 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden px-4 pt-2 pb-6 space-y-3 bg-[#420406]/95 backdrop-blur-md border-t border-white/10"
             x-cloak>
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md font-medium text-white/90 hover:bg-white/10">Beranda</a>
            <a href="{{ route('berita.index') }}" class="block px-3 py-2 rounded-md font-semibold text-white bg-white/10">Berita</a>
            <a href="{{ url('/#tentang') }}" class="block px-3 py-2 rounded-md font-medium text-white/90 hover:bg-white/10">Tentang Kami</a>
            <a href="{{ url('/#materi') }}" class="block px-3 py-2 rounded-md font-medium text-white/90 hover:bg-white/10">Materi</a>
            <a href="{{ url('/#aspirasi') }}" class="block px-3 py-2 rounded-md font-medium text-white/90 hover:bg-white/10">Aspirasi</a>
            <a href="{{ route('login') }}" class="block text-center bg-white text-gray-900 font-semibold px-6 py-2.5 rounded-full shadow hover:bg-gray-100 transition mt-2">
                Masuk
            </a>
        </div>

        <!-- Hero Content Header -->
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center pt-8 pb-16 sm:pt-12 sm:pb-24">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight drop-shadow-md">
                Berita & Informasi
            </h1>
            <p class="text-white/85 text-xs sm:text-sm md:text-base mt-3 max-w-xl mx-auto font-normal leading-relaxed">
                Ikuti informasi terbaru, kegiatan, dan berbagai kabar seputar HIMATIF.
            </p>
            
            <!-- Breadcrumbs -->
            <div class="flex items-center justify-center gap-2 mt-4 text-xs sm:text-sm text-white/90 font-medium">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 hover:text-white transition-colors">
                    <svg class="w-4 h-4 fill-current opacity-90" viewBox="0 0 24 24">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg>
                    <span>Beranda</span>
                </a>
                <span class="text-white/60 font-bold">&gt;</span>
                <span class="text-white font-semibold">Berita</span>
            </div>
        </div>
    </header>

    <!-- ========================================== -->
    <!-- MAIN CONTENT AREA                          -->
    <!-- ========================================== -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

        <!-- Filter & Search Bar Row -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-10">
            <!-- Category Pills -->
            <div class="flex items-center gap-2 sm:gap-3 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scrollbar-none">
                <button 
                    @click="activeCategory = 'Semua'"
                    :class="activeCategory === 'Semua' ? 'bg-[#70111a] text-white shadow-sm' : 'bg-white text-stone-700 border border-stone-300 hover:bg-stone-50'"
                    class="px-5 py-2 rounded-full font-semibold text-xs sm:text-sm whitespace-nowrap transition-colors cursor-pointer"
                    type="button"
                >
                    Semua
                </button>
                <button 
                    @click="activeCategory = 'Kegiatan'"
                    :class="activeCategory === 'Kegiatan' ? 'bg-[#70111a] text-white shadow-sm' : 'bg-white text-stone-700 border border-stone-300 hover:bg-stone-50'"
                    class="px-5 py-2 rounded-full font-semibold text-xs sm:text-sm whitespace-nowrap transition-colors cursor-pointer"
                    type="button"
                >
                    Kegiatan
                </button>
                <button 
                    @click="activeCategory = 'Pengumuman'"
                    :class="activeCategory === 'Pengumuman' ? 'bg-[#70111a] text-white shadow-sm' : 'bg-white text-stone-700 border border-stone-300 hover:bg-stone-50'"
                    class="px-5 py-2 rounded-full font-semibold text-xs sm:text-sm whitespace-nowrap transition-colors cursor-pointer"
                    type="button"
                >
                    Pengumuman
                </button>
                <button 
                    @click="activeCategory = 'Akademik'"
                    :class="activeCategory === 'Akademik' ? 'bg-[#70111a] text-white shadow-sm' : 'bg-white text-stone-700 border border-stone-300 hover:bg-stone-50'"
                    class="px-5 py-2 rounded-full font-semibold text-xs sm:text-sm whitespace-nowrap transition-colors cursor-pointer"
                    type="button"
                >
                    Akademik
                </button>
                <button 
                    @click="activeCategory = 'HIMATIF'"
                    :class="activeCategory === 'HIMATIF' ? 'bg-[#70111a] text-white shadow-sm' : 'bg-white text-stone-700 border border-stone-300 hover:bg-stone-50'"
                    class="px-5 py-2 rounded-full font-semibold text-xs sm:text-sm whitespace-nowrap transition-colors cursor-pointer"
                    type="button"
                >
                    HIMATIF
                </button>
            </div>

            <!-- Search Bar -->
            <div class="w-full md:w-auto relative flex items-center">
                <input 
                    type="text" 
                    x-model="searchQuery"
                    placeholder="Cari berita ..." 
                    class="w-full sm:w-[280px] md:w-[320px] rounded-full border border-stone-300 bg-white py-2 pl-4 pr-12 text-xs sm:text-sm text-stone-800 placeholder-stone-400 focus:outline-none focus:border-[#70111a] focus:ring-1 focus:ring-[#70111a] transition-all shadow-sm"
                >
                <button 
                    type="button" 
                    aria-label="Cari Berita"
                    class="absolute right-1 w-8 h-8 rounded-full bg-[#70111a] hover:bg-[#580e15] text-white flex items-center justify-center transition-colors cursor-pointer"
                >
                    <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Section Title: Berita Terbaru -->
        <div class="mb-8">
            <div class="flex items-center gap-2 mb-1.5">
                <!-- Double vertical accent bars matching design -->
                <div class="flex items-center gap-1">
                    <span class="w-1.5 h-6 bg-[#8B0000] rounded-full"></span>
                    <span class="w-1.5 h-6 bg-[#8B0000]/60 rounded-full"></span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight">
                    Berita Terbaru
                </h2>
            </div>
            <p class="text-stone-500 text-xs sm:text-sm">
                Informasi terbaru seputar HIMATIF Universitas Teknologi Bandung
            </p>
        </div>

        <!-- ============================================== -->
        <!-- NEWS CONTENT CONDITIONAL (EMPTY vs POPULATED) -->
        <!-- ============================================== -->
        @if ($beritas->isEmpty())
            <!-- Empty State Display (Saat isi berita dikosongkan) -->
            <div class="bg-white rounded-2xl border border-stone-200/90 shadow-sm p-10 sm:p-16 text-center max-w-2xl mx-auto my-8">
                <!-- Icon -->
                <div class="w-20 h-20 rounded-full bg-[#fceeed] text-[#70111a] flex items-center justify-center mx-auto mb-5 shadow-sm">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold text-stone-900 mb-2">
                    Belum Ada Berita Tersedia
                </h3>
                <p class="text-stone-600 text-xs sm:text-sm max-w-md mx-auto leading-relaxed mb-6">
                    Saat ini belum ada berita atau informasi yang dipublikasikan. Berita dan agenda terbaru akan segera diunggah melalui dashboard admin.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-2 bg-[#70111a] hover:bg-[#580e15] text-white font-semibold text-xs sm:text-sm px-6 py-2.5 rounded-full transition-all shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Kembali ke Beranda</span>
                    </a>
                </div>
            </div>
        @else
            <!-- News Cards Grid (Tampil jika terdapat data berita / opsi ?demo=1) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7 mb-12">
                @foreach ($beritas as $item)
                    <article class="bg-white rounded-2xl border border-stone-200/90 shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden flex flex-col group">
                        <!-- Thumbnail Image -->
                        <div class="aspect-[16/10] overflow-hidden bg-stone-100 relative">
                            <img 
                                src="{{ asset($item['image']) }}" 
                                alt="{{ $item['title'] }}" 
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            >
                        </div>

                        <!-- Card Body -->
                        <div class="p-5 sm:p-6 flex flex-col flex-1">
                            <!-- Date Badge -->
                            <div class="flex items-center gap-2 text-xs font-semibold text-stone-600 mb-2.5">
                                <svg class="w-4 h-4 text-[#8B0000] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ $item['date'] }}</span>
                            </div>

                            <!-- News Title -->
                            <h3 class="text-base sm:text-lg font-bold text-stone-900 group-hover:text-[#70111a] transition-colors line-clamp-2 mb-2 leading-snug">
                                <a href="#">
                                    {{ $item['title'] }}
                                </a>
                            </h3>

                            <!-- Excerpt -->
                            <p class="text-xs sm:text-sm text-stone-600 leading-relaxed line-clamp-3 mb-5 flex-1">
                                {{ $item['excerpt'] }}
                            </p>

                            <!-- Read More Link -->
                            <div class="pt-2 border-t border-stone-100 mt-auto">
                                <a href="#" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#8B0000] hover:text-[#580e15] hover:gap-2.5 transition-all duration-200">
                                    <span>Baca Selengkapnya</span>
                                    <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination Bar Matching Design -->
            <div class="flex items-center justify-center gap-2 sm:gap-2.5 pt-4 pb-8">
                <!-- Prev Button -->
                <button class="w-10 h-10 rounded-full border border-stone-300 text-stone-600 hover:bg-stone-100 flex items-center justify-center transition-colors cursor-pointer" aria-label="Halaman Sebelumnya">
                    <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <!-- Page 1 (Active) -->
                <button class="w-10 h-10 rounded-full bg-[#70111a] text-white font-bold flex items-center justify-center text-xs sm:text-sm shadow-sm cursor-pointer">
                    1
                </button>

                <!-- Page 2 -->
                <button class="w-10 h-10 rounded-full text-stone-700 hover:bg-stone-100 font-semibold flex items-center justify-center text-xs sm:text-sm transition-colors cursor-pointer">
                    2
                </button>

                <!-- Page 3 -->
                <button class="w-10 h-10 rounded-full text-stone-700 hover:bg-stone-100 font-semibold flex items-center justify-center text-xs sm:text-sm transition-colors cursor-pointer">
                    3
                </button>

                <!-- Page 4 -->
                <button class="w-10 h-10 rounded-full text-stone-700 hover:bg-stone-100 font-semibold flex items-center justify-center text-xs sm:text-sm transition-colors cursor-pointer">
                    4
                </button>

                <!-- Page 5 -->
                <button class="w-10 h-10 rounded-full text-stone-700 hover:bg-stone-100 font-semibold flex items-center justify-center text-xs sm:text-sm transition-colors cursor-pointer">
                    5
                </button>

                <!-- Next Button -->
                <button class="w-10 h-10 rounded-full border border-stone-300 text-stone-600 hover:bg-stone-100 flex items-center justify-center transition-colors cursor-pointer" aria-label="Halaman Berikutnya">
                    <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        @endif

    </main>

    <!-- ========================================== -->
    <!-- FOOTER SECTION                             -->
    <!-- ========================================== -->
    <footer class="bg-[#5a0609] text-white bg-cover bg-bottom pt-14 pb-8 border-t border-red-900/40" style="background-image: url('{{ asset('images/bg-footer.png') }}'); background-repeat: no-repeat;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pb-10 border-b border-white/10">
                
                <!-- Col 1: Brand Info (5 cols) -->
                <div class="md:col-span-5 space-y-4">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                        <img src="{{ asset('images/Logo_resized.png') }}" alt="Logo HIMATIF" class="h-12 w-12 object-contain">
                        <span class="text-2xl font-extrabold tracking-wider text-white">HIMATIF</span>
                    </a>
                    <div class="text-white/80 text-sm leading-relaxed space-y-1">
                        <p class="font-medium text-white">Himpunan Mahasiswa Teknik Informatika</p>
                        <p>Universitas Teknologi Bandung</p>
                        <p class="text-xs text-white/60 pt-1">Kreatif, Inovatif, Mandiri</p>
                    </div>
                </div>

                <!-- Col 2: Navigation Links (4 cols) -->
                <div class="md:col-span-4">
                    <h3 class="font-bold text-white text-base mb-4 tracking-wide">Menu</h3>
                    <div class="grid grid-cols-2 gap-y-2.5 text-sm">
                        <a href="{{ url('/') }}" class="text-white/75 hover:text-white transition">Beranda</a>
                        <a href="{{ url('/#materi') }}" class="text-white/75 hover:text-white transition">Materi</a>
                        <a href="{{ route('berita.index') }}" class="text-white font-semibold transition">Berita</a>
                        <a href="{{ url('/#aspirasi') }}" class="text-white/75 hover:text-white transition">Aspirasi</a>
                        <a href="{{ url('/#tentang') }}" class="text-white/75 hover:text-white transition">Tentang Kami</a>
                        <a href="{{ url('/#kontak') }}" class="text-white/75 hover:text-white transition">Kontak</a>
                    </div>
                </div>

                <!-- Col 3: Social Media (3 cols) -->
                <div class="md:col-span-3 flex md:justify-end">
                    <div class="bg-black/25 backdrop-blur-sm rounded-2xl p-5 border border-white/10 w-full sm:w-auto min-w-[210px]">
                        <h3 class="font-semibold text-white text-sm mb-3.5">Ikuti Kami</h3>
                        <div class="flex items-center gap-3">
                            <!-- Instagram -->
                            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-white/10 hover:bg-red-600 flex items-center justify-center text-white transition-all transform hover:scale-105" title="Instagram HIMATIF">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                            <!-- YouTube -->
                            <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-white/10 hover:bg-red-600 flex items-center justify-center text-white transition-all transform hover:scale-105" title="YouTube HIMATIF">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Bar -->
            <div class="pt-6 flex flex-col md:flex-row items-center justify-between text-xs text-white/70 gap-4 text-center md:text-left">
                <p>&copy; 2026 Himatif Universitas Teknologi Bandung.</p>
                <p class="flex items-center justify-center gap-1.5">
                    <svg class="w-4 h-4 text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Kb. Lega, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40235</span>
                </p>
            </div>
        </div>
    </footer>

</body>
</html>
