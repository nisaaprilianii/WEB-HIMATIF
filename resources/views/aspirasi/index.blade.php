<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspirasi Mahasiswa - HIMATIF | Himpunan Mahasiswa Teknik Informatika</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Logo_resized.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
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
<body class="bg-[#faf8f8] text-gray-800 antialiased selection:bg-[#70111a] selection:text-white" 
      x-data="{ 
          mobileMenuOpen: false, 
          darkMode: false 
      }">

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
                <a href="{{ route('berita.index') }}" class="text-white/80 hover:text-white font-medium transition-colors">
                    Berita
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
                         class="absolute left-0 mt-3 w-52 rounded-xl bg-white shadow-xl py-2 z-50 text-gray-800 border border-gray-100">
                        <a href="{{ route('sejarah.index') }}" class="block px-4 py-2 hover:bg-red-50 hover:text-red-700 transition">Sejarah & Struktur</a>
                        <a href="{{ route('sejarah.index') }}#departemen" class="block px-4 py-2 hover:bg-red-50 hover:text-red-700 transition">Departemen & Divisi</a>
                        <a href="{{ route('sejarah.index') }}#proker" class="block px-4 py-2 hover:bg-red-50 hover:text-red-700 transition">Program Kerja</a>
                    </div>
                </div>

                <a href="{{ route('materi.index') }}" class="text-white/80 hover:text-white font-medium transition-colors">
                    Materi
                </a>

                <!-- Aspirasi (Active Indicator) -->
                <a href="{{ route('aspirasi.index') }}" class="text-white font-semibold relative py-1">
                    Aspirasi
                    <span class="absolute bottom-0 left-0 w-full h-[2.5px] bg-red-500 rounded-full shadow-[0_0_8px_rgba(239,68,68,0.8)]"></span>
                </a>
            </div>

            <!-- Right Actions (Theme Switcher & Login) -->
            <div class="hidden md:flex items-center space-x-5">
                <button @click="darkMode = !darkMode" type="button" aria-label="Toggle Mode" class="p-2 rounded-full text-white/85 hover:text-white hover:bg-white/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>

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
            <a href="{{ route('berita.index') }}" class="block px-3 py-2 rounded-md font-medium text-white/90 hover:bg-white/10">Berita</a>
            <a href="{{ route('sejarah.index') }}" class="block px-3 py-2 rounded-md font-medium text-white/90 hover:bg-white/10">Tentang Kami</a>
            <a href="{{ route('materi.index') }}" class="block px-3 py-2 rounded-md font-medium text-white/90 hover:bg-white/10">Materi</a>
            <a href="{{ route('aspirasi.index') }}" class="block px-3 py-2 rounded-md font-semibold text-white bg-white/10">Aspirasi</a>
            <a href="{{ route('login') }}" class="block text-center bg-white text-gray-900 font-semibold px-6 py-2.5 rounded-full shadow hover:bg-gray-100 transition mt-2">
                Masuk
            </a>
        </div>

        <!-- Hero Content Header -->
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center pt-8 pb-16 sm:pt-12 sm:pb-24">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight drop-shadow-md">
                Aspirasi
            </h1>
            <p class="text-white/85 text-xs sm:text-sm md:text-base mt-3 max-w-xl mx-auto font-normal leading-relaxed">
                Suaramu menjadi bagian dari perkembangan HIMATIF
            </p>

            <!-- Breadcrumbs -->
            <div class="flex items-center justify-center gap-2 text-xs sm:text-sm text-white/75 mt-4">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 hover:text-white transition">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                    <span>Beranda</span>
                </a>
                <span class="text-white/40">&gt;</span>
                <span class="text-white font-medium">Aspirasi</span>
            </div>
        </div>
    </header>

    <!-- ========================================== -->
    <!-- MAIN CONTENT SECTION                       -->
    <!-- ========================================== -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12 space-y-8">
        
        <!-- Flash Notification: Success -->
        @if(session('status'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl p-4 flex items-start gap-3 shadow-sm animate-fade-in" role="alert">
                <svg class="w-5 h-5 text-emerald-600 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div class="text-sm font-medium">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <!-- Flash Notification: Validation Errors -->
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 rounded-xl p-4 flex items-start gap-3 shadow-sm" role="alert">
                <svg class="w-5 h-5 text-red-600 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <div class="text-sm">
                    <p class="font-semibold mb-1">Mohon lengkapi formulir dengan benar:</p>
                    <ul class="list-disc list-inside space-y-0.5 text-xs text-red-700">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- ========================================== -->
        <!-- 3 HIGHLIGHT FEATURE CARDS                  -->
        <!-- ========================================== -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            
            <!-- Card 1: Sampaikan Suaramu -->
            <div class="bg-[#fceeed] rounded-2xl p-5 sm:p-6 flex items-center gap-4 border border-[#f7d8da]/70 transition-all hover:shadow-md">
                <div class="w-13 h-13 rounded-full bg-[#70111a] flex items-center justify-center shrink-0 shadow-sm text-white">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H5.17L4 17.17V4h16v12z"/>
                        <path d="M7 9h10v2H7zm0-3h10v2H7z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-[#70111a] text-base leading-snug">Sampaikan Suaramu</h3>
                    <p class="text-xs sm:text-sm text-gray-700 mt-1 leading-snug">Berikan kritik, saran, keluhan atau ide untuk HIMATIF</p>
                </div>
            </div>

            <!-- Card 2: Identitas Terjaga -->
            <div class="bg-[#fceeed] rounded-2xl p-5 sm:p-6 flex items-center gap-4 border border-[#f7d8da]/70 transition-all hover:shadow-md">
                <div class="w-13 h-13 rounded-full bg-[#70111a] flex items-center justify-center shrink-0 shadow-sm text-white">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-[#70111a] text-base leading-snug">Identitas Terjaga</h3>
                    <p class="text-xs sm:text-sm text-gray-700 mt-1 leading-snug">Setiap aspirasi dijaga kerahasiaannya.</p>
                </div>
            </div>

            <!-- Card 3: Ditindaklanjuti -->
            <div class="bg-[#fceeed] rounded-2xl p-5 sm:p-6 flex items-center gap-4 border border-[#f7d8da]/70 transition-all hover:shadow-md">
                <div class="w-13 h-13 rounded-full bg-[#70111a] flex items-center justify-center shrink-0 shadow-sm text-white">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-[#70111a] text-base leading-snug">Ditindaklanjuti</h3>
                    <p class="text-xs sm:text-sm text-gray-700 mt-1 leading-snug">Aspirasi kamu akan ditinjau.</p>
                </div>
            </div>

        </div>

        <!-- ========================================== -->
        <!-- MAIN ASPIRASI FORM CARD                    -->
        <!-- ========================================== -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-md p-6 sm:p-8 md:p-10">
            <!-- Header Title -->
            <div class="mb-7">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#70111a] tracking-tight">
                    Sampaikan Aspirasi
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 mt-1.5 leading-relaxed">
                    Berikan masukan, kritik, keluhan, atau usulan untuk kemajuan HIMATIF.<br class="hidden sm:inline">
                    Lengkapi form berikut dengan informasi yang benar.
                </p>
            </div>

            <!-- Form -->
            <form action="{{ route('aspirasi.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Row 1: Nama & NIM -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-800 mb-1.5">
                            Nama <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="nama" 
                               id="nama" 
                               value="{{ old('nama') }}" 
                               placeholder="Masukkan nama anda" 
                               required 
                               class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#70111a]/20 focus:border-[#70111a] transition">
                    </div>

                    <div>
                        <label for="nim" class="block text-sm font-semibold text-gray-800 mb-1.5">
                            NIM <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="nim" 
                               id="nim" 
                               value="{{ old('nim') }}" 
                               placeholder="Masukkan nim anda" 
                               required 
                               class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#70111a]/20 focus:border-[#70111a] transition">
                    </div>
                </div>

                <!-- Row 2: Kelas & Jenis Aspirasi -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="kelas" class="block text-sm font-semibold text-gray-800 mb-1.5">
                            Kelas <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="kelas" 
                               id="kelas" 
                               value="{{ old('kelas') }}" 
                               placeholder="Pilih kelas" 
                               required 
                               class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#70111a]/20 focus:border-[#70111a] transition">
                    </div>

                    <div>
                        <label for="jenis_aspirasi" class="block text-sm font-semibold text-gray-800 mb-1.5">
                            Jenis Aspirasi <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="jenis_aspirasi" 
                                    id="jenis_aspirasi" 
                                    required 
                                    class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm text-gray-800 bg-white focus:outline-none focus:ring-2 focus:ring-[#70111a]/20 focus:border-[#70111a] transition appearance-none cursor-pointer pr-10">
                                <option value="" disabled {{ old('jenis_aspirasi') ? '' : 'selected' }}>Pilih jenis aspirasi</option>
                                <option value="Akademik" {{ old('jenis_aspirasi') === 'Akademik' ? 'selected' : '' }}>Akademik & Perkuliahan</option>
                                <option value="Fasilitas Kampus" {{ old('jenis_aspirasi') === 'Fasilitas Kampus' ? 'selected' : '' }}>Sarana & Fasilitas Kampus</option>
                                <option value="Kegiatan Kemahasiswaan" {{ old('jenis_aspirasi') === 'Kegiatan Kemahasiswaan' ? 'selected' : '' }}>Kegiatan & Program Kerja HIMATIF</option>
                                <option value="Tata Kelola Organisasi" {{ old('jenis_aspirasi') === 'Tata Kelola Organisasi' ? 'selected' : '' }}>Tata Kelola & Organisasi</option>
                                <option value="Lainnya" {{ old('jenis_aspirasi') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 3: Judul Aspirasi -->
                <div>
                    <label for="judul_aspirasi" class="block text-sm font-semibold text-gray-800 mb-1.5">
                        Judul Aspirasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="judul_aspirasi" 
                           id="judul_aspirasi" 
                           value="{{ old('judul_aspirasi') }}" 
                           placeholder="Masukkan judul aspirasi" 
                           required 
                           class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#70111a]/20 focus:border-[#70111a] transition">
                </div>

                <!-- Row 4: Isi Aspirasi with Toolbar -->
                <div>
                    <label for="isi_aspirasi" class="block text-sm font-semibold text-gray-800 mb-1.5">
                        Isi Aspirasi <span class="text-red-500">*</span>
                    </label>
                    
                    <div class="rounded-lg border border-gray-200 overflow-hidden focus-within:ring-2 focus-within:ring-[#70111a]/20 focus-within:border-[#70111a] transition bg-white">
                        <!-- Mini Action Toolbar -->
                        <div class="border-b border-gray-200 px-4 py-2 bg-gray-50/70 flex items-center gap-4 text-gray-500">
                            <!-- Image Icon -->
                            <button type="button" title="Sisipkan Gambar" class="hover:text-[#70111a] transition focus:outline-none">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </button>
                            <!-- Video Icon -->
                            <button type="button" title="Sisipkan Video" class="hover:text-[#70111a] transition focus:outline-none">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            </button>
                            <!-- Code Icon -->
                            <button type="button" title="Kode / Teks Terformat" class="hover:text-[#70111a] transition focus:outline-none font-mono text-xs font-bold">
                                &lt;/&gt;
                            </button>
                            <!-- Help Icon -->
                            <button type="button" title="Panduan Pengisian" class="hover:text-[#70111a] transition focus:outline-none">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Textarea -->
                        <textarea name="isi_aspirasi" 
                                  id="isi_aspirasi" 
                                  rows="6" 
                                  placeholder="Tuliskan aspirasi kamu di sini..." 
                                  required 
                                  class="w-full p-4 text-sm text-gray-800 placeholder-gray-400 focus:outline-none resize-y border-none">{{ old('isi_aspirasi') }}</textarea>
                    </div>
                </div>

                <!-- Row 5: Submit Button -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full bg-[#70111a] hover:bg-[#5a0609] active:scale-[0.99] text-white font-semibold py-3.5 px-6 rounded-lg transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2.5 text-sm sm:text-base cursor-pointer">
                        <svg class="w-4 h-4 transform rotate-45 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        <span>Kirim Aspirasi</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- ========================================== -->
        <!-- BOTTOM QUOTE CARD                          -->
        <!-- ========================================== -->
        <div class="relative rounded-2xl overflow-hidden shadow-sm bg-cover bg-right bg-no-repeat p-6 sm:p-8 md:p-10 border border-[#f5d6d8]" 
             style="background-image: url('{{ asset('images/bg-section-bawah-aspirasi.png') }}'); background-color: #fceeed;">
            <div class="relative z-10 flex items-start sm:items-center gap-5 sm:gap-7 max-w-2xl">
                <!-- Big Quote Symbol -->
                <div class="text-[#70111a] text-5xl sm:text-6xl font-serif font-bold leading-none pr-5 sm:pr-7 border-r-2 border-red-300/80 shrink-0 select-none">
                    “
                </div>
                <!-- Quote Text -->
                <div class="space-y-1.5">
                    <h4 class="text-base sm:text-lg md:text-xl font-bold text-[#70111a] leading-snug">
                        Setiap suara memiliki arti, karena perubahan berawal dari kepedulian.
                    </h4>
                    <p class="text-xs sm:text-sm text-gray-700 leading-relaxed font-normal">
                        Aspirasi yang kamu sampaikan sangat berarti bagi kami untuk membangun HIMATIF yang lebih baik.
                    </p>
                </div>
            </div>
        </div>

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
                        <a href="{{ route('materi.index') }}" class="text-white/75 hover:text-white transition">Materi</a>
                        <a href="{{ route('berita.index') }}" class="text-white/75 hover:text-white transition">Berita</a>
                        <a href="{{ route('aspirasi.index') }}" class="text-white font-semibold transition">Aspirasi</a>
                        <a href="{{ route('sejarah.index') }}" class="text-white/75 hover:text-white transition">Tentang Kami</a>
                        <a href="{{ url('/#kontak') }}" class="text-white/75 hover:text-white transition">Kontak</a>
                    </div>
                </div>

                <!-- Col 3: Social Media (3 cols) -->
                <div class="md:col-span-3 flex md:justify-end">
                    <div class="bg-black/25 backdrop-blur-sm rounded-2xl p-5 border border-white/10 w-full sm:w-auto min-w-[210px]">
                        <h3 class="font-semibold text-white text-sm mb-3.5">Ikuti Kami</h3>
                        <div class="flex items-center gap-3">
                            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-white/10 hover:bg-red-600 flex items-center justify-center text-white transition-all transform hover:scale-105" title="Instagram HIMATIF">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
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
