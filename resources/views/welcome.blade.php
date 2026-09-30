<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMATIF - Himpunan Mahasiswa Teknik Informatika Universitas Teknologi Bandung</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Alpine.js for lightweight UI interactivity (menu, modal, toggles) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased selection:bg-red-500 selection:text-white" x-data="{ mobileMenuOpen: false, darkMode: false }">

    <!-- ========================================== -->
    <!-- HEADER & HERO SECTION                      -->
    <!-- ========================================== -->
    <header class="relative bg-[#5a0609] text-white overflow-hidden bg-cover bg-bottom" style="background-image: url('{{ asset('images/bg-header.png') }}'); background-repeat: no-repeat;">
        
        <!-- Navigation Bar -->
        <nav class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="#" class="flex items-center gap-3 group">
                <img src="{{ asset('images/Logo_resized.png') }}" alt="Logo HIMATIF" class="h-11 w-11 object-contain transition-transform group-hover:scale-105 duration-200">
                <span class="text-xl font-extrabold tracking-wider text-white">HIMATIF</span>
            </a>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center space-x-8 text-sm">
                <a href="#beranda" class="text-white font-semibold relative py-1">
                    Beranda
                    <span class="absolute bottom-0 left-0 w-full h-[2.5px] bg-red-500 rounded-full shadow-[0_0_8px_rgba(239,68,68,0.8)]"></span>
                </a>
                <a href="#berita" class="text-white/80 hover:text-white font-medium transition-colors">Berita</a>
                
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
                         class="absolute left-0 mt-3 w-48 bg-white rounded-xl shadow-xl py-2 text-gray-800 text-sm z-50 border border-gray-100" 
                         style="display: none;">
                        <a href="#tentang" class="block px-4 py-2 hover:bg-red-50 hover:text-red-600 transition">Profil & Sejarah</a>
                        <a href="#visi-misi" class="block px-4 py-2 hover:bg-red-50 hover:text-red-600 transition">Visi & Misi</a>
                        <a href="#struktur" class="block px-4 py-2 hover:bg-red-50 hover:text-red-600 transition">Struktur Organisasi</a>
                    </div>
                </div>

                <a href="#materi" class="text-white/80 hover:text-white font-medium transition-colors">Materi</a>
                <a href="#aspirasi" class="text-white/80 hover:text-white font-medium transition-colors">Aspirasi</a>
            </div>

            <!-- Right Actions (Theme Switcher & Login) -->
            <div class="hidden md:flex items-center space-x-5">
                <!-- Theme Toggle Button -->
                <button @click="darkMode = !darkMode" type="button" aria-label="Toggle Mode" class="p-2 rounded-full text-white/85 hover:text-white hover:bg-white/10 transition">
                    <!-- Sun Icon -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>

                <!-- Tombol Masuk -->
                <a href="#masuk" class="bg-white text-gray-900 font-semibold px-6 py-2 rounded-full shadow-md hover:bg-gray-100 hover:shadow-lg transition-all transform hover:-translate-y-0.5 text-sm">
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
             class="md:hidden bg-[#450305]/95 backdrop-blur-md px-6 py-5 border-t border-white/10 space-y-4 relative z-30" 
             style="display: none;">
            <a href="#beranda" class="block text-white font-semibold py-2">Beranda</a>
            <a href="#berita" class="block text-white/80 hover:text-white py-2">Berita</a>
            <a href="#tentang" class="block text-white/80 hover:text-white py-2">Tentang Kami</a>
            <a href="#materi" class="block text-white/80 hover:text-white py-2">Materi</a>
            <a href="#aspirasi" class="block text-white/80 hover:text-white py-2">Aspirasi</a>
            <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                <span class="text-sm text-white/70">Mode Tampilan</span>
                <button @click="darkMode = !darkMode" class="p-2 rounded-full bg-white/10 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>
            </div>
            <a href="#masuk" class="block text-center bg-white text-gray-900 font-semibold px-6 py-2.5 rounded-full shadow hover:bg-gray-100 transition mt-2">
                Masuk
            </a>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center pt-14 pb-28 sm:pt-20 sm:pb-36">
            <!-- Small Pre-header -->
            <p class="text-xs sm:text-sm font-semibold tracking-[0.35em] text-white/80 uppercase mb-4">
                H I M A T I F
            </p>

            <!-- Main Headline -->
            <h1 class="text-3xl sm:text-5xl lg:text-[3.25rem] font-extrabold text-white tracking-tight leading-[1.15]">
                Himpunan Mahasiswa<br>
                Teknik Informatika
            </h1>
            <p class="text-2xl sm:text-4xl lg:text-[2.6rem] font-bold text-white/95 mt-2 tracking-tight">
                Universitas Teknologi Bandung
            </p>

            <!-- Description -->
            <p class="max-w-2xl mx-auto text-white/85 text-sm sm:text-base font-normal mt-6 leading-relaxed">
                Wadah bagi mahasiswa Teknik Informatika untuk belajar, berkolaborasi, berkarya, dan berkembang bersama menuju dampak yang lebih luas.
            </p>

            <!-- Action Buttons -->
            <div class="mt-9 flex flex-col sm:flex-row items-center justify-center gap-4">
                <!-- Kenal HIMATIF -->
                <a href="#tentang" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#d32f2f] hover:bg-[#b71c1c] text-white font-semibold px-7 py-3 rounded-full shadow-lg shadow-red-900/30 transition-all transform hover:-translate-y-0.5 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                    <span>Kenal HIMATIF</span>
                </a>

                <!-- Lihat Kegiatan -->
                <a href="#kegiatan" class="w-full sm:w-auto inline-flex items-center justify-center bg-[#420406]/80 hover:bg-[#420406] border border-red-800/40 text-white font-medium px-7 py-3 rounded-full shadow transition-all transform hover:-translate-y-0.5 text-sm">
                    <span>Lihat Kegiatan</span>
                </a>
            </div>
        </div>

    </header>

    <!-- ========================================== -->
    <!-- FLOATING FEATURE / QUICK ACCESS CARD       -->
    <!-- ========================================== -->
    <section class="relative z-20 max-w-6xl mx-auto px-4 sm:px-6 -mt-10 sm:-mt-14">
        <div class="bg-white rounded-2xl shadow-[0_15px_35px_rgba(0,0,0,0.06)] border border-gray-100 p-4 sm:p-6 lg:p-7">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 divide-y sm:divide-y-0 sm:divide-x divide-gray-100">
                
                <!-- Item 1: Tentang HIMATIF -->
                <a href="#tentang" class="flex items-center gap-4 p-3 lg:p-4 hover:bg-gray-50/80 rounded-xl transition group">
                    <div class="w-12 h-12 rounded-xl bg-red-50 text-[#d32f2f] flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <!-- Users Icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-[#d32f2f] transition-colors">Tentang HIMATIF</h4>
                        <p class="text-xs text-gray-500 mt-0.5">Profil, visi misi, dan sejarah</p>
                    </div>
                </a>

                <!-- Item 2: Materi Pembelajaran -->
                <a href="#materi" class="flex items-center gap-4 p-3 lg:p-4 hover:bg-gray-50/80 rounded-xl transition group">
                    <div class="w-12 h-12 rounded-xl bg-red-50 text-[#d32f2f] flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <!-- Document/Book Icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-[#d32f2f] transition-colors">Materi Pembelajaran</h4>
                        <p class="text-xs text-gray-500 mt-0.5">Kumpulan materi perkuliahan</p>
                    </div>
                </a>

                <!-- Item 3: Kegiatan -->
                <a href="#kegiatan" class="flex items-center gap-4 p-3 lg:p-4 hover:bg-gray-50/80 rounded-xl transition group">
                    <div class="w-12 h-12 rounded-xl bg-red-50 text-[#d32f2f] flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <!-- Calendar Icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-[#d32f2f] transition-colors">Kegiatan</h4>
                        <p class="text-xs text-gray-500 mt-0.5">Informasi kegiatan HIMATIF</p>
                    </div>
                </a>

                <!-- Item 4: Aspirasi Mahasiswa -->
                <a href="#aspirasi" class="flex items-center gap-4 p-3 lg:p-4 hover:bg-gray-50/80 rounded-xl transition group">
                    <div class="w-12 h-12 rounded-xl bg-red-50 text-[#d32f2f] flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <!-- Chat Message Icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm group-hover:text-[#d32f2f] transition-colors">Aspirasi Mahasiswa</h4>
                        <p class="text-xs text-gray-500 mt-0.5">Sampaikan ide dan masukan</p>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- SECTION 1: BERITA & INFORMASI              -->
    <!-- ========================================== -->
    <section id="berita" class="relative py-20 bg-cover bg-left-top" style="background-image: url('{{ asset('images/bg-section-1.png') }}'); background-repeat: no-repeat;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-1 bg-[#d32f2f] rounded-full"></span>
                        <span class="text-xs font-bold text-[#d32f2f] tracking-widest uppercase">Informasi Terkini</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 tracking-tight">Berita & Informasi</h2>
                    <p class="text-sm sm:text-base text-gray-600 mt-1">Update kegiatan, agenda, dan informasi terbaru HIMATIF</p>
                </div>
                <a href="#semua-berita" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#d32f2f] hover:text-[#b71c1c] transition group">
                    <span>Lihat Semua Berita</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7 mt-10">
                
                <!-- News Card 1: PEKMAT -->
                <article class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="relative overflow-hidden aspect-[16/9] bg-gray-900">
                        <img src="{{ asset('images/news-pekmat.png') }}" alt="PEKMAT Segera Hadir" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="inline-block bg-[#d32f2f] text-white text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3">
                                Coming Soon
                            </span>
                            <h3 class="font-bold text-lg text-gray-900 group-hover:text-[#d32f2f] transition-colors line-clamp-1">
                                PEKMAT Segera Hadir!
                            </h3>
                            <p class="text-sm text-gray-600 mt-2 leading-relaxed line-clamp-3">
                                Bersiap untuk rangkaian kegiatan PEKMAT HIMATIF. Informasi lengkap dan jadwal kegiatan akan segera hadir.
                            </p>
                        </div>
                    </div>
                </article>

                <!-- News Card 2: HIMTEC -->
                <article class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="relative overflow-hidden aspect-[16/9] bg-gray-900">
                        <img src="{{ asset('images/news-himtec.png') }}" alt="HIMTEC 2026: Hackathon Vol.2" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="inline-block bg-[#d32f2f] text-white text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3">
                                Event
                            </span>
                            <h3 class="font-bold text-lg text-gray-900 group-hover:text-[#d32f2f] transition-colors line-clamp-1">
                                HIMTEC 2026: Hackathon Vol.2
                            </h3>
                            <p class="text-sm text-gray-600 mt-2 leading-relaxed line-clamp-3">
                                Saatnya berinovasi dan membangun solusi digital melalui Hackathon Vol. 2 dengan tema BuildApp With AI.
                            </p>
                        </div>
                    </div>
                </article>

                <!-- News Card 3: IT HOLIC -->
                <article class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="relative overflow-hidden aspect-[16/9] bg-gray-900">
                        <img src="{{ asset('images/news-itholic.png') }}" alt="IT HOLIC 2026: Smart Innovation" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="inline-block bg-[#d32f2f] text-white text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3">
                                Event
                            </span>
                            <h3 class="font-bold text-lg text-gray-900 group-hover:text-[#d32f2f] transition-colors line-clamp-1">
                                IT HOLIC 2026: Smart Innovation, Global Impact
                            </h3>
                            <p class="text-sm text-gray-600 mt-2 leading-relaxed line-clamp-3">
                                Wadah untuk memperluas wawasan teknologi, berbagi inspirasi, dan menghadirkan inovasi dengan dampak yang lebih luas.
                            </p>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- SECTION 2: KUMPULAN MATERI                 -->
    <!-- ========================================== -->
    <section id="materi" class="relative py-20 bg-cover bg-left-top" style="background-image: url('{{ asset('images/bg-section-2.png') }}'); background-repeat: no-repeat;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-1 bg-[#d32f2f] rounded-full"></span>
                        <span class="text-xs font-bold text-[#d32f2f] tracking-widest uppercase">Materi Pembelajaran</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 tracking-tight">Kumpulan Materi</h2>
                    <p class="text-sm sm:text-base text-gray-600 mt-1">Akses materi perkuliahan yang telah dikumpulkan oleh HIMATIF.</p>
                </div>
                <a href="#semua-materi" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#d32f2f] hover:text-[#b71c1c] transition group">
                    <span>Lihat Semua Materi</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>

            <!-- Material Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                
                <!-- Card 1: Struktur Data -->
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <!-- File Type Icon -->
                        <div class="w-12 h-12 rounded-xl bg-red-100 text-[#d32f2f] flex items-center justify-center flex-shrink-0">
                            <!-- Document PDF Icon -->
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9.5 8.5h-2v1.5h2c.55 0 1-.45 1-1s-.45-.5-1-.5zm5 0h-1.5V13h1.5c.55 0 1-.45 1-1s-.45-.5-1-.5zm-7-2.5h3.5c1.38 0 2.5 1.12 2.5 2.5 0 .84-.42 1.57-1.05 2.03.63.46 1.05 1.19 1.05 2.03 0 1.38-1.12 2.5-2.5 2.5H7.5V9zm8 0H19v7.06h-1.5V14.5H16v1.56h-1.5V9h1zm-5.5 4.56h-2v1.5h2c.55 0 1-.45 1-1s-.45-.5-1-.5z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-base">Struktur Data</h3>
                            <div class="flex flex-wrap items-center gap-2 mt-2">
                                <span class="bg-red-50 text-[#d32f2f] text-xs font-semibold px-2.5 py-0.5 rounded">Semester 3</span>
                                <span class="bg-gray-100 text-gray-600 text-xs px-2.5 py-0.5 rounded">Dosen: Ibu...</span>
                            </div>
                        </div>
                    </div>

                    <!-- Divider & Footer -->
                    <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-6">
                        <div class="flex items-center gap-4 text-xs text-gray-500 font-medium">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                PDF
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1.5 3 3.5 3h9c2 0 3.5-1 3.5-3V7c0-2-1.5-3-3.5-3h-9C5.5 4 4 5 4 7z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6"></path>
                                </svg>
                                12 MB
                            </span>
                        </div>
                        <button class="w-8 h-8 rounded-full border border-red-200 text-[#d32f2f] hover:bg-red-50 hover:border-[#d32f2f] flex items-center justify-center transition" title="Unduh Materi">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Card 2: Jaringan Komputer -->
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-red-100 text-[#d32f2f] flex items-center justify-center flex-shrink-0">
                            <!-- PPTX Icon -->
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-6 6h2.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5H13v3h-2V9h2zm-4 0h3c.83 0 1.5.67 1.5 1.5S12.83 12 12 12H9v3H7V9h2zm4 2h1.5v-1H13v1zm-4 0h1v-1H9v1z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-base">Jaringan Komputer</h3>
                            <div class="flex flex-wrap items-center gap-2 mt-2">
                                <span class="bg-red-50 text-[#d32f2f] text-xs font-semibold px-2.5 py-0.5 rounded">Semester 3</span>
                                <span class="bg-gray-100 text-gray-600 text-xs px-2.5 py-0.5 rounded">Dosen: Bapak...</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-6">
                        <div class="flex items-center gap-4 text-xs text-gray-500 font-medium">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                PPTX
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1.5 3 3.5 3h9c2 0 3.5-1 3.5-3V7c0-2-1.5-3-3.5-3h-9C5.5 4 4 5 4 7z"></path>
                                </svg>
                                8 MB
                            </span>
                        </div>
                        <button class="w-8 h-8 rounded-full border border-red-200 text-[#d32f2f] hover:bg-red-50 hover:border-[#d32f2f] flex items-center justify-center transition" title="Unduh Materi">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Card 3: Pemrograman Web -->
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-red-100 text-[#d32f2f] flex items-center justify-center flex-shrink-0">
                            <!-- Document PDF Icon -->
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9.5 8.5h-2v1.5h2c.55 0 1-.45 1-1s-.45-.5-1-.5zm5 0h-1.5V13h1.5c.55 0 1-.45 1-1s-.45-.5-1-.5zm-7-2.5h3.5c1.38 0 2.5 1.12 2.5 2.5 0 .84-.42 1.57-1.05 2.03.63.46 1.05 1.19 1.05 2.03 0 1.38-1.12 2.5-2.5 2.5H7.5V9zm8 0H19v7.06h-1.5V14.5H16v1.56h-1.5V9h1zm-5.5 4.56h-2v1.5h2c.55 0 1-.45 1-1s-.45-.5-1-.5z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-base">Pemrograman Web</h3>
                            <div class="flex flex-wrap items-center gap-2 mt-2">
                                <span class="bg-red-50 text-[#d32f2f] text-xs font-semibold px-2.5 py-0.5 rounded">Semester 4</span>
                                <span class="bg-gray-100 text-gray-600 text-xs px-2.5 py-0.5 rounded">Dosen: Bapak...</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-6">
                        <div class="flex items-center gap-4 text-xs text-gray-500 font-medium">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                PDF
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1.5 3 3.5 3h9c2 0 3.5-1 3.5-3V7c0-2-1.5-3-3.5-3h-9C5.5 4 4 5 4 7z"></path>
                                </svg>
                                15 MB
                            </span>
                        </div>
                        <button class="w-8 h-8 rounded-full border border-red-200 text-[#d32f2f] hover:bg-red-50 hover:border-[#d32f2f] flex items-center justify-center transition" title="Unduh Materi">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- SECTION 3: KEGIATAN MENDATANG               -->
    <!-- ========================================== -->
    <section id="kegiatan" class="relative py-20 bg-cover bg-left-top" style="background-image: url('{{ asset('images/bg-section-3.png') }}'); background-repeat: no-repeat;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-1 bg-[#d32f2f] rounded-full"></span>
                        <span class="text-xs font-bold text-[#d32f2f] tracking-widest uppercase">Kegiatan HIMATIF</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-2 tracking-tight">Kegiatan Mendatang</h2>
                    <p class="text-sm sm:text-base text-gray-600 mt-1">Update kegiatan, agenda, dan informasi terbaru HIMATIF</p>
                </div>
                <a href="#semua-kegiatan" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#d32f2f] hover:text-[#b71c1c] transition group">
                    <span>Lihat Semua Kegiatan</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>

            <!-- Event Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7 mt-10">
                
                <!-- Event Card 1: SHARE IT 2026 -->
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="relative overflow-hidden aspect-[16/8] bg-gray-900">
                        <img src="{{ asset('images/event-shareit.png') }}" alt="SHARE IT 2026" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <!-- Date -->
                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                <svg class="w-4 h-4 text-[#d32f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>24 Oktober 2026</span>
                            </div>
                            <!-- Location -->
                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                <svg class="w-4 h-4 text-[#d32f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>Universitas Teknologi Bandung</span>
                            </div>
                        </div>

                        <!-- Card Action Title & Arrow -->
                        <div class="flex items-center justify-between border-t border-gray-100 pt-5 mt-5">
                            <h3 class="font-bold text-gray-900 text-base group-hover:text-[#d32f2f] transition-colors">
                                SHARE IT 2026
                            </h3>
                            <span class="w-8 h-8 rounded-full border border-gray-200 text-gray-500 group-hover:border-[#d32f2f] group-hover:bg-[#d32f2f] group-hover:text-white flex items-center justify-center transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Event Card 2: HIMTEC 2026 -->
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="relative overflow-hidden aspect-[16/8] bg-gray-900">
                        <img src="{{ asset('images/event-himtec.png') }}" alt="HIMTEC 2026" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <!-- Date -->
                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                <svg class="w-4 h-4 text-[#d32f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>07-08 November 2026</span>
                            </div>
                            <!-- Location -->
                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                <svg class="w-4 h-4 text-[#d32f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>Universitas Teknologi Bandung</span>
                            </div>
                        </div>

                        <!-- Card Action Title & Arrow -->
                        <div class="flex items-center justify-between border-t border-gray-100 pt-5 mt-5">
                            <h3 class="font-bold text-gray-900 text-base group-hover:text-[#d32f2f] transition-colors">
                                HIMTEC 2026
                            </h3>
                            <span class="w-8 h-8 rounded-full border border-gray-200 text-gray-500 group-hover:border-[#d32f2f] group-hover:bg-[#d32f2f] group-hover:text-white flex items-center justify-center transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Event Card 3: IT HOLIC 2026 -->
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="relative overflow-hidden aspect-[16/8] bg-gray-900">
                        <img src="{{ asset('images/event-itholic.png') }}" alt="IT HOLIC 2026" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <!-- Date -->
                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                <svg class="w-4 h-4 text-[#d32f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>29 November 2026</span>
                            </div>
                            <!-- Location -->
                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                <svg class="w-4 h-4 text-[#d32f2f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>Bandung Creative Hub</span>
                            </div>
                        </div>

                        <!-- Card Action Title & Arrow -->
                        <div class="flex items-center justify-between border-t border-gray-100 pt-5 mt-5">
                            <h3 class="font-bold text-gray-900 text-base group-hover:text-[#d32f2f] transition-colors">
                                IT HOLIC 2026:
                            </h3>
                            <span class="w-8 h-8 rounded-full border border-gray-200 text-gray-500 group-hover:border-[#d32f2f] group-hover:bg-[#d32f2f] group-hover:text-white flex items-center justify-center transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- FOOTER SECTION                             -->
    <!-- ========================================== -->
    <footer class="relative bg-[#5a0609] text-white pt-16 pb-8 bg-cover bg-bottom" style="background-image: url('{{ asset('images/bg-footer.png') }}'); background-repeat: no-repeat;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-12 pb-12 border-b border-white/10">
                
                <!-- Col 1: Brand & Info (5 cols) -->
                <div class="md:col-span-5 space-y-4">
                    <a href="#" class="inline-flex items-center gap-3">
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
                        <a href="#beranda" class="text-white/75 hover:text-white transition">Beranda</a>
                        <a href="#materi" class="text-white/75 hover:text-white transition">Materi</a>
                        <a href="#berita" class="text-white/75 hover:text-white transition">Berita</a>
                        <a href="#aspirasi" class="text-white/75 hover:text-white transition">Aspirasi</a>
                        <a href="#tentang" class="text-white/75 hover:text-white transition">Tentang Kami</a>
                        <a href="#kontak" class="text-white/75 hover:text-white transition">Kontak</a>
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
                    <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
