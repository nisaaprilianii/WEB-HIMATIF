<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Perkuliahan - HIMATIF | Himpunan Mahasiswa Teknik Informatika</title>

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
          darkMode: false, 
          activeSemester: 'semua',
          searchQuery: '',
          viewMode: 'grid'
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

                <!-- Materi (Active Indicator) -->
                <a href="{{ route('materi.index') }}" class="text-white font-semibold relative py-1">
                    Materi
                    <span class="absolute bottom-0 left-0 w-full h-[2.5px] bg-red-500 rounded-full shadow-[0_0_8px_rgba(239,68,68,0.8)]"></span>
                </a>
                <a href="{{ route('aspirasi.index') }}" class="text-white/80 hover:text-white font-medium transition-colors">Aspirasi</a>
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
            <a href="{{ route('materi.index') }}" class="block px-3 py-2 rounded-md font-semibold text-white bg-white/10">Materi</a>
            <a href="{{ route('aspirasi.index') }}" class="block px-3 py-2 rounded-md font-medium text-white/90 hover:bg-white/10">Aspirasi</a>
            <a href="{{ route('login') }}" class="block text-center bg-white text-gray-900 font-semibold px-6 py-2.5 rounded-full shadow hover:bg-gray-100 transition mt-2">
                Masuk
            </a>
        </div>

        <!-- Hero Content Header -->
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center pt-8 pb-16 sm:pt-12 sm:pb-24">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight drop-shadow-md">
                Materi
            </h1>
            <p class="text-white/85 text-xs sm:text-sm md:text-base mt-3 max-w-2xl mx-auto font-normal leading-relaxed">
                Akses berbagai materi perkuliahan Teknik Informatika yang telah dikumpulkan oleh HIMATIF
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
                <span class="text-white font-semibold">Materi</span>
            </div>
        </div>
    </header>

    <!-- ========================================== -->
    <!-- MAIN CONTENT AREA (Sidebar + Content Grid) -->
    <!-- ========================================== -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- ====================================== -->
            <!-- LEFT SIDEBAR: PILIH SEMESTER           -->
            <!-- ====================================== -->
            <aside class="lg:col-span-3 w-full">
                <div class="bg-white rounded-2xl border border-stone-200/90 shadow-sm overflow-hidden sticky top-6">
                    <!-- Sidebar Header -->
                    <div class="bg-[#70111a] text-white p-4 flex items-center gap-3">
                        <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                        </svg>
                        <h2 class="font-bold text-base tracking-wide">
                            Pilih Semester
                        </h2>
                    </div>

                    <!-- Semester Selection List -->
                    <div class="p-3.5 space-y-1.5">
                        <!-- Semua Semester -->
                        <button 
                            @click="activeSemester = 'semua'"
                            :class="activeSemester === 'semua' ? 'bg-[#fceeed] text-[#70111a] font-bold' : 'text-stone-700 hover:bg-stone-50 font-medium'"
                            class="w-full flex items-center justify-between p-3 rounded-xl text-xs sm:text-sm transition-all cursor-pointer group"
                            type="button"
                        >
                            <span class="flex items-center gap-2.5">
                                <svg class="w-4 h-4" :class="activeSemester === 'semua' ? 'text-[#70111a]' : 'text-stone-400 group-hover:text-stone-600'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                                </svg>
                                <span>Semua Semester</span>
                            </span>
                            <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>

                        <!-- Semester 1 to 8 -->
                        @foreach ($semesters as $sem)
                            <button 
                                @click="activeSemester = '{{ $sem }}'"
                                :class="activeSemester == '{{ $sem }}' ? 'bg-[#fceeed] text-[#70111a] font-bold' : 'text-stone-700 hover:bg-stone-50 font-medium'"
                                class="w-full flex items-center justify-between p-3 rounded-xl text-xs sm:text-sm transition-all cursor-pointer group"
                                type="button"
                            >
                                <span class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4" :class="activeSemester == '{{ $sem }}' ? 'text-[#70111a]' : 'text-stone-400 group-hover:text-stone-600'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                    </svg>
                                    <span>Semester {{ $sem }}</span>
                                </span>
                                <svg x-show="activeSemester == '{{ $sem }}'" class="w-4 h-4 stroke-current stroke-2 text-[#70111a]" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        @endforeach
                    </div>
                </div>
            </aside>

            <!-- ====================================== -->
            <!-- RIGHT CONTENT: MATERI LISTING          -->
            <!-- ====================================== -->
            <section class="lg:col-span-9 w-full space-y-6">

                <!-- Search & Dropdown Filters Bar -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 bg-white p-3.5 rounded-2xl border border-stone-200/90 shadow-sm">
                    <!-- Search Input -->
                    <div class="sm:col-span-2 relative flex items-center">
                        <svg class="w-4 h-4 absolute left-3.5 text-stone-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input 
                            type="text" 
                            x-model="searchQuery" 
                            placeholder="Cari materi, mata kuliah, atau dosen..."
                            class="w-full pl-9 pr-4 py-2 text-xs sm:text-sm rounded-xl border border-stone-200 bg-stone-50 focus:bg-white focus:outline-none focus:border-[#70111a] focus:ring-1 focus:ring-[#70111a] transition-all"
                        >
                    </div>

                    <!-- Dropdown Semua Semester -->
                    <div class="relative">
                        <select 
                            x-model="activeSemester"
                            class="w-full py-2 px-3 pr-8 text-xs sm:text-sm rounded-xl border border-stone-200 bg-white text-stone-700 appearance-none focus:outline-none focus:border-[#70111a] cursor-pointer"
                        >
                            <option value="semua">Semua Semester</option>
                            @foreach ($semesters as $sem)
                                <option value="{{ $sem }}">Semester {{ $sem }}</option>
                            @endforeach
                        </select>
                        <svg class="w-4 h-4 text-stone-400 absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>

                    <!-- Dropdown Semua Tahun -->
                    <div class="relative">
                        <select class="w-full py-2 px-3 pr-8 text-xs sm:text-sm rounded-xl border border-stone-200 bg-white text-stone-700 appearance-none focus:outline-none focus:border-[#70111a] cursor-pointer">
                            <option value="">Semua Tahun</option>
                            <option value="2026">2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                        </select>
                        <svg class="w-4 h-4 text-stone-400 absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Subheader Bar: Total & Sort & View Mode -->
                <div class="flex items-center justify-between gap-4 text-xs sm:text-sm text-stone-600 px-1">
                    <div>
                        @if ($materis->isNotEmpty())
                            <span>Menampilkan <strong class="text-stone-900">{{ $materis->count() }}</strong> materi</span>
                        @else
                            <span>Menampilkan <strong class="text-stone-900">0</strong> materi</span>
                        @endif
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1.5">
                            <span class="text-stone-500">Urutkan:</span>
                            <select class="bg-white border border-stone-200 rounded-lg py-1 px-2.5 text-xs text-stone-800 focus:outline-none focus:border-[#70111a] cursor-pointer">
                                <option>Terbaru</option>
                                <option>Terpopuler</option>
                                <option>Nama A-Z</option>
                            </select>
                        </div>

                        <!-- Grid / List Toggle Buttons -->
                        <div class="hidden sm:flex items-center gap-1 bg-white border border-stone-200 rounded-lg p-0.5">
                            <button 
                                @click="viewMode = 'grid'" 
                                :class="viewMode === 'grid' ? 'bg-[#70111a] text-white' : 'text-stone-500 hover:text-stone-800'"
                                class="p-1 rounded-md transition-colors cursor-pointer"
                                aria-label="Tampilan Grid"
                            >
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4 4h4v4H4zm6 0h4v4h-4zm6 0h4v4h-4zM4 10h4v4H4zm6 0h4v4h-4zm6 0h4v4h-4zM4 16h4v4H4zm6 0h4v4h-4zm6 0h4v4h-4z"/>
                                </svg>
                            </button>
                            <button 
                                @click="viewMode = 'list'" 
                                :class="viewMode === 'list' ? 'bg-[#70111a] text-white' : 'text-stone-500 hover:text-stone-800'"
                                class="p-1 rounded-md transition-colors cursor-pointer"
                                aria-label="Tampilan List"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ============================================== -->
                <!-- CONTENT CONDITIONAL: EMPTY vs CARDS GRID       -->
                <!-- ============================================== -->
                @if ($materis->isEmpty())
                    <!-- Empty State Display saat isi materi dikosongkan -->
                    <div class="bg-white rounded-2xl border border-stone-200/90 shadow-sm p-10 sm:p-14 text-center max-w-xl mx-auto my-6">
                        <div class="w-20 h-20 rounded-full bg-[#fceeed] text-[#70111a] flex items-center justify-center mx-auto mb-4 shadow-sm">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-stone-900 mb-2">
                            Belum Ada Materi Tersedia
                        </h3>
                        <p class="text-stone-600 text-xs sm:text-sm leading-relaxed mb-6">
                            Materi perkuliahan untuk semester ini belum diunggah. Data materi, modul, dan presentasi perkuliahan akan segera ditambahkan melalui dashboard admin.
                        </p>
                        <button 
                            @click="activeSemester = 'semua'"
                            class="inline-flex items-center gap-2 bg-[#70111a] hover:bg-[#580e15] text-white font-semibold text-xs sm:text-sm px-6 py-2.5 rounded-full transition-all shadow-sm cursor-pointer"
                        >
                            <span>Lihat Semua Semester</span>
                        </button>
                    </div>
                @else
                    <!-- Materi Cards Grid (2 Kolom matching desain) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($materis as $materi)
                            <article class="bg-white rounded-2xl border border-stone-200/90 shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden flex flex-col group">
                                <!-- Banner / Header Graphic Card with PDF / PPT badge -->
                                <div class="h-40 w-full relative overflow-hidden flex items-center justify-center bg-gradient-to-br {{ $materi['type'] === 'pdf' ? 'from-red-50 to-rose-100' : 'from-amber-50 to-orange-100' }}">
                                    <!-- Subtle wave texture -->
                                    <div class="absolute inset-0 opacity-40 bg-cover bg-center" style="background-image: url('{{ asset('images/bg-section-1.png') }}');"></div>
                                    
                                    <!-- File Type Icon Badge -->
                                    <div class="relative z-10 w-20 h-24 rounded-2xl flex flex-col items-center justify-center shadow-lg {{ $materi['type'] === 'pdf' ? 'bg-[#c51c1c] text-white' : 'bg-[#e67300] text-white' }} group-hover:scale-105 transition-transform duration-300">
                                        <!-- Document Fold Top Right -->
                                        <div class="absolute top-0 right-0 w-5 h-5 bg-white/20 rounded-bl-lg"></div>
                                        <span class="font-black text-xl tracking-wider uppercase">
                                            {{ $materi['type'] }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="p-5 sm:p-6 flex flex-col flex-1">
                                    <h3 class="text-base sm:text-lg font-bold text-stone-900 group-hover:text-[#70111a] transition-colors mb-1.5 leading-snug">
                                        {{ $materi['title'] }}
                                    </h3>
                                    
                                    <p class="text-xs font-semibold text-stone-700 mb-0.5">
                                        {{ $materi['prodi'] }}
                                    </p>
                                    <p class="text-xs text-stone-500 mb-2.5">
                                        {{ $materi['dosen'] }}
                                    </p>

                                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed mb-5 line-clamp-2 flex-1">
                                        {{ $materi['description'] }}
                                    </p>

                                    <!-- Card Action Footer -->
                                    <div class="pt-3 border-t border-stone-100 flex items-center justify-between gap-3 mt-auto">
                                        <!-- Date -->
                                        <span class="flex items-center gap-1.5 text-xs text-stone-500 font-medium">
                                            <svg class="w-3.5 h-3.5 text-stone-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg>
                                            <span>{{ $materi['date'] }}</span>
                                        </span>

                                        <!-- Buttons -->
                                        <div class="flex items-center gap-2">
                                            <!-- Download Button -->
                                            <a href="#" class="inline-flex items-center gap-1.5 bg-[#70111a] hover:bg-[#580e15] text-white text-xs font-semibold px-3.5 py-1.5 rounded-lg shadow-sm transition-colors cursor-pointer">
                                                <svg class="w-3.5 h-3.5 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"></path>
                                                </svg>
                                                <span>Download</span>
                                            </a>

                                            <!-- Lihat Button -->
                                            <a href="#" class="inline-flex items-center gap-1.5 border border-[#70111a] text-[#70111a] hover:bg-[#70111a]/5 text-xs font-semibold px-3 py-1.5 rounded-lg transition-colors cursor-pointer">
                                                <svg class="w-3.5 h-3.5 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <span>Lihat</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination Bar -->
                    <div class="flex items-center justify-center gap-2 sm:gap-2.5 pt-6 pb-4">
                        <button class="w-10 h-10 rounded-full border border-stone-300 text-stone-600 hover:bg-stone-100 flex items-center justify-center transition-colors cursor-pointer" aria-label="Halaman Sebelumnya">
                            <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <button class="w-10 h-10 rounded-full bg-[#70111a] text-white font-bold flex items-center justify-center text-xs sm:text-sm shadow-sm cursor-pointer">
                            1
                        </button>
                        <button class="w-10 h-10 rounded-full text-stone-700 hover:bg-stone-100 font-semibold flex items-center justify-center text-xs sm:text-sm transition-colors cursor-pointer">
                            2
                        </button>
                        <button class="w-10 h-10 rounded-full text-stone-700 hover:bg-stone-100 font-semibold flex items-center justify-center text-xs sm:text-sm transition-colors cursor-pointer">
                            3
                        </button>
                        <button class="w-10 h-10 rounded-full text-stone-700 hover:bg-stone-100 font-semibold flex items-center justify-center text-xs sm:text-sm transition-colors cursor-pointer">
                            4
                        </button>
                        <button class="w-10 h-10 rounded-full text-stone-700 hover:bg-stone-100 font-semibold flex items-center justify-center text-xs sm:text-sm transition-colors cursor-pointer">
                            5
                        </button>
                        <button class="w-10 h-10 rounded-full border border-stone-300 text-stone-600 hover:bg-stone-100 flex items-center justify-center transition-colors cursor-pointer" aria-label="Halaman Berikutnya">
                            <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                @endif

            </section>
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
                        <a href="{{ route('materi.index') }}" class="text-white font-semibold transition">Materi</a>
                        <a href="{{ route('berita.index') }}" class="text-white/75 hover:text-white transition">Berita</a>
                        <a href="{{ route('aspirasi.index') }}" class="text-white/75 hover:text-white transition">Aspirasi</a>
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
