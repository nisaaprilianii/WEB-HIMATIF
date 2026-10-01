<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah & Struktur Organisasi - HIMATIF | Himpunan Mahasiswa Teknik Informatika</title>

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
          selectedPeriod: '{{ $activePeriod }}',
          selectedDept: 'posdm',
          prokerFilter: 'Semua',
          prokerType: 'Semua'
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
                
                <!-- Dropdown: Tentang Kami (Active Page Indicator) -->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open" class="flex items-center gap-1.5 text-white font-semibold relative py-1 focus:outline-none">
                        Tentang Kami
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        <span class="absolute bottom-0 left-0 w-full h-[2.5px] bg-red-500 rounded-full shadow-[0_0_8px_rgba(239,68,68,0.8)]"></span>
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
                        <a href="{{ route('sejarah.index') }}" class="block px-4 py-2 bg-red-50 text-red-700 font-semibold transition">Sejarah & Struktur</a>
                        <a href="{{ url('/#divisi') }}" class="block px-4 py-2 hover:bg-red-50 hover:text-red-700 transition">Departemen & Divisi</a>
                        <a href="{{ url('/#proker') }}" class="block px-4 py-2 hover:bg-red-50 hover:text-red-700 transition">Program Kerja</a>
                    </div>
                </div>

                <a href="{{ route('materi.index') }}" class="text-white/80 hover:text-white font-medium transition-colors">Materi</a>
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
            <a href="{{ route('sejarah.index') }}" class="block px-3 py-2 rounded-md font-semibold text-white bg-white/10">Sejarah & Struktur</a>
            <a href="{{ route('materi.index') }}" class="block px-3 py-2 rounded-md font-medium text-white/90 hover:bg-white/10">Materi</a>
            <a href="{{ route('aspirasi.index') }}" class="block px-3 py-2 rounded-md font-medium text-white/90 hover:bg-white/10">Aspirasi</a>
            <a href="{{ route('login') }}" class="block text-center bg-white text-gray-900 font-semibold px-6 py-2.5 rounded-full shadow hover:bg-gray-100 transition mt-2">
                Masuk
            </a>
        </div>

        <!-- Hero Content Header -->
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center pt-8 pb-16 sm:pt-12 sm:pb-24">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight drop-shadow-md">
                Sejarah HIMATIF
            </h1>
            <p class="text-white/85 text-xs sm:text-sm md:text-base mt-3 max-w-xl mx-auto font-normal leading-relaxed">
                Mengenal perjalanan, kepengurusan, dan perkembangan HIMATIF dari masa ke masa.
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
                <span class="text-white font-semibold">Sejarah</span>
            </div>
        </div>
    </header>

    <!-- ========================================== -->
    <!-- MAIN CONTENT AREA                          -->
    <!-- ========================================== -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 space-y-14 sm:space-y-16">

        <!-- ==================================================== -->
        <!-- SECTION 1: PERJALANAN HIMATIF                        -->
        <!-- ==================================================== -->
        <section aria-labelledby="section-perjalanan">
            <div class="mb-6">
                <div class="flex items-center gap-2 mb-1.5">
                    <div class="flex items-center gap-1">
                        <span class="w-1.5 h-6 bg-[#8B0000] rounded-full"></span>
                        <span class="w-1.5 h-6 bg-[#8B0000]/60 rounded-full"></span>
                    </div>
                    <h2 id="section-perjalanan" class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight">
                        Perjalanan HIMATIF
                    </h2>
                </div>
                <p class="text-stone-500 text-xs sm:text-sm">
                    Telusuri perjalanan HIMATIF dari setiap periode kepengurusan
                </p>
            </div>

            <!-- Periode Pills -->
            <div class="flex items-center gap-2.5 sm:gap-3 overflow-x-auto pb-2 scrollbar-none mb-6">
                @foreach ($periodes as $periode)
                    <button 
                        @click="selectedPeriod = '{{ $periode }}'"
                        :class="selectedPeriod === '{{ $periode }}' ? 'bg-[#70111a] text-white shadow-sm' : 'bg-white text-stone-700 border border-stone-300 hover:bg-stone-50'"
                        class="px-5 py-2 rounded-full font-semibold text-xs sm:text-sm whitespace-nowrap transition-colors cursor-pointer"
                        type="button"
                    >
                        {{ $periode }}
                    </button>
                @endforeach
            </div>

            <!-- Periode Banner Card Template -->
            <div class="relative bg-white rounded-2xl border border-stone-200/90 shadow-sm overflow-hidden p-6 sm:p-10 md:p-12 min-h-[190px] flex flex-col md:flex-row items-start md:items-center justify-between gap-6 bg-cover bg-right"
                 style="background-image: url('{{ asset('images/bg-section-2-sejarah.png') }}'); background-repeat: no-repeat;">
                
                <div class="max-w-xl z-10">
                    <span class="text-lg sm:text-xl font-black text-[#8B0000] tracking-wide block uppercase">
                        HIMATIF
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight mt-0.5 mb-3" x-text="'Periode ' + selectedPeriod">
                        Periode {{ $activePeriod }}
                    </h3>

                    @if ($sejarah)
                        <p class="text-stone-700 text-xs sm:text-sm leading-relaxed">
                            {{ $sejarah['deskripsi'] }}
                        </p>
                    @else
                        <!-- Template Placeholder saat data kosong -->
                        <div class="bg-[#faf8f8]/80 border border-dashed border-stone-300 rounded-xl p-4 text-stone-600 text-xs sm:text-sm">
                            <p class="font-medium text-stone-800 mb-1">
                                Template Sejarah Periode <span x-text="selectedPeriod"></span>
                            </p>
                            <p class="text-stone-500">
                                Informasi sejarah, visi misi kepengurusan, dan kilas balik untuk periode ini akan diinput secara dinamis melalui dashboard admin.
                            </p>
                        </div>
                    @endif
                </div>

                <div class="hidden md:flex flex-col items-end justify-center pr-4 z-10 text-right select-none">
                    <span class="text-white font-extrabold text-xl tracking-wider drop-shadow-sm">HIMATIF</span>
                    <span class="text-white/90 text-sm font-semibold tracking-wide drop-shadow-sm" x-text="selectedPeriod">{{ $activePeriod }}</span>
                </div>
            </div>
        </section>

        <!-- ==================================================== -->
        <!-- SECTION 2: VISI & MISI                               -->
        <!-- ==================================================== -->
        <section aria-labelledby="section-visimisi">
            <div class="flex items-center gap-2 mb-6">
                <div class="flex items-center gap-1">
                    <span class="w-1.5 h-6 bg-[#8B0000] rounded-full"></span>
                    <span class="w-1.5 h-6 bg-[#8B0000]/60 rounded-full"></span>
                </div>
                <h2 id="section-visimisi" class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight">
                    Visi & Misi
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                <!-- Visi Card -->
                <div class="bg-white rounded-2xl border border-stone-200/90 shadow-sm p-6 sm:p-8 flex flex-col justify-between relative overflow-hidden">
                    <div>
                        <h3 class="text-2xl font-bold text-[#8B0000] mb-4 tracking-tight">
                            Visi
                        </h3>
                        @if ($visiMisi)
                            <p class="text-stone-700 text-xs sm:text-sm leading-relaxed">
                                {{ $visiMisi['visi'] }}
                            </p>
                        @else
                            <div class="bg-[#faf8f8] border border-dashed border-stone-300 rounded-xl p-5 text-center my-auto">
                                <p class="text-stone-500 text-xs sm:text-sm italic">
                                    Visi kepengurusan belum diinput. Data akan tampil setelah diisi melalui dashboard admin.
                                </p>
                            </div>
                        @endif
                    </div>
                    <!-- Decorative corner accent -->
                    <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between text-xs text-stone-400">
                        <span>HIMATIF Visi</span>
                        <span class="w-8 h-1 bg-[#8B0000]/30 rounded-full"></span>
                    </div>
                </div>

                <!-- Misi Card -->
                <div class="bg-white rounded-2xl border border-stone-200/90 shadow-sm p-6 sm:p-8 flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-[#8B0000] mb-4 tracking-tight">
                            Misi
                        </h3>
                        @if ($visiMisi)
                            <ol class="space-y-4 text-xs sm:text-sm text-stone-700">
                                @foreach ($visiMisi['misi'] as $idx => $misiItem)
                                    <li class="flex items-start gap-3.5">
                                        <span class="w-7 h-7 rounded-full bg-[#fceeed] text-[#70111a] font-bold text-xs flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                                            {{ $idx + 1 }}
                                        </span>
                                        <span class="leading-relaxed">{{ $misiItem }}</span>
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <div class="bg-[#faf8f8] border border-dashed border-stone-300 rounded-xl p-5 text-center my-auto">
                                <p class="text-stone-500 text-xs sm:text-sm italic">
                                    Misi kepengurusan belum diinput. Data akan tampil setelah diisi melalui dashboard admin.
                                </p>
                            </div>
                        @endif
                    </div>
                    <!-- Decorative footer -->
                    <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between text-xs text-stone-400">
                        <span>HIMATIF Misi</span>
                        <span class="w-8 h-1 bg-[#8B0000]/30 rounded-full"></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==================================================== -->
        <!-- SECTION 3: TOP MAN (BPH INTI)                        -->
        <!-- ==================================================== -->
        <section aria-labelledby="section-topman">
            <div class="flex items-center gap-2 mb-6">
                <div class="flex items-center gap-1">
                    <span class="w-1.5 h-6 bg-[#8B0000] rounded-full"></span>
                    <span class="w-1.5 h-6 bg-[#8B0000]/60 rounded-full"></span>
                </div>
                <h2 id="section-topman" class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight">
                    Top Man
                </h2>
            </div>

            @if ($topMan->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($topMan as $person)
                        <div class="bg-white rounded-2xl border border-stone-200/90 shadow-sm overflow-hidden p-4 flex flex-col items-center text-center group hover:shadow-md transition-all">
                            <div class="w-full aspect-[4/3] rounded-xl overflow-hidden bg-stone-100 mb-3.5 relative">
                                <img src="{{ asset($person['image']) }}" alt="{{ $person['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <h3 class="font-bold text-stone-900 text-sm sm:text-base mb-2">
                                {{ $person['name'] }}
                            </h3>
                            <span class="mt-auto px-3.5 py-1.5 rounded-lg bg-[#e5cfd1] text-[#4f0c12] text-xs font-semibold">
                                {{ $person['role'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Template Kosong / Struktur BPH Inti siap diisi -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @php
                        $defaultRoles = ['Ketua Himpunan', 'Wakil Ketua Himpunan', 'Sekretaris Umum', 'Bendahara Umum'];
                    @endphp
                    @foreach ($defaultRoles as $role)
                        <div class="bg-white rounded-2xl border border-stone-200/90 shadow-sm overflow-hidden p-4 flex flex-col items-center text-center">
                            <div class="w-full aspect-[4/3] rounded-xl bg-stone-100 flex flex-col items-center justify-center text-stone-400 mb-3.5 border border-dashed border-stone-300">
                                <svg class="w-10 h-10 mb-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                </svg>
                                <span class="text-[11px] font-medium">Foto Pengurus</span>
                            </div>
                            <h3 class="font-bold text-stone-600 text-sm mb-2 italic">
                                Belum Ditentukan
                            </h3>
                            <span class="mt-auto px-3.5 py-1.5 rounded-lg bg-[#e5cfd1] text-[#4f0c12] text-xs font-semibold">
                                {{ $role }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

        <!-- ==================================================== -->
        <!-- SECTION 4: STRUKTUR DEPARTEMEN                       -->
        <!-- ==================================================== -->
        <section aria-labelledby="section-departemen">
            <div class="flex items-center gap-2 mb-6">
                <div class="flex items-center gap-1">
                    <span class="w-1.5 h-6 bg-[#8B0000] rounded-full"></span>
                    <span class="w-1.5 h-6 bg-[#8B0000]/60 rounded-full"></span>
                </div>
                <h2 id="section-departemen" class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight">
                    Struktur Departemen
                </h2>
            </div>

            <!-- Department Cards Selector -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                @php
                    $deptsList = [
                        ['code' => 'POSDM', 'name' => 'Pengembangan Organisasi dan Sumber Daya Mahasiswa', 'id' => 'posdm'],
                        ['code' => 'KOMINFO', 'name' => 'Komunikasi dan Informasi', 'id' => 'kominfo'],
                        ['code' => 'PI', 'name' => 'Penalaran Intelektual', 'id' => 'pi'],
                        ['code' => 'KWU', 'name' => 'Kewirausahaan', 'id' => 'kwu'],
                    ];
                @endphp

                @foreach ($deptsList as $deptItem)
                    <div 
                        @click="selectedDept = '{{ $deptItem['id'] }}'"
                        :class="selectedDept === '{{ $deptItem['id'] }}' ? 'ring-2 ring-[#70111a] border-[#70111a]' : 'border-stone-200/90'"
                        class="bg-white rounded-2xl border shadow-sm p-5 text-center flex flex-col items-center justify-between cursor-pointer hover:shadow-md transition-all group"
                    >
                        <!-- Circular Avatar / Department Emblem -->
                        <div class="w-16 h-16 rounded-full bg-stone-100 flex items-center justify-center overflow-hidden mb-3 border border-stone-200">
                            <img src="{{ asset('images/Logo_resized.png') }}" alt="{{ $deptItem['code'] }}" class="w-11 h-11 object-contain">
                        </div>
                        <h3 class="font-extrabold text-base text-stone-900 mb-1 group-hover:text-[#70111a] transition-colors">
                            {{ $deptItem['code'] }}
                        </h3>
                        <p class="text-xs text-stone-500 mb-4 line-clamp-2">
                            {{ $deptItem['name'] }}
                        </p>
                        <button class="mt-auto inline-flex items-center gap-1.5 text-xs font-bold text-[#8B0000] group-hover:gap-2 transition-all">
                            <span>Lihat Struktur</span>
                            <svg class="w-3.5 h-3.5 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>

            <!-- Detail Struktur Template Box -->
            <div class="bg-white rounded-2xl border border-stone-200/90 shadow-sm p-6 sm:p-8">
                @if ($departemens->isNotEmpty())
                    <!-- Mode Demo / Data Terisi -->
                    @php $activeDeptData = $departemens->firstWhere('id', 'posdm'); @endphp
                    @if ($activeDeptData)
                        <div class="flex items-center justify-between border-b border-stone-100 pb-5 mb-6">
                            <div class="flex items-center gap-3.5">
                                <div class="w-10 h-10 rounded-full bg-[#fceeed] text-[#70111a] flex items-center justify-center font-bold">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-stone-900 text-base sm:text-lg">
                                        Departemen {{ $activeDeptData['code'] }}
                                    </h3>
                                    <p class="text-xs text-stone-500">
                                        {{ $activeDeptData['name'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Leadership row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
                            <div class="flex items-center gap-4 p-4 rounded-xl border border-stone-100 bg-stone-50/50">
                                <img src="{{ asset($activeDeptData['kadep']['image']) }}" class="w-14 h-14 rounded-lg object-cover">
                                <div>
                                    <h4 class="font-bold text-stone-900 text-sm">{{ $activeDeptData['kadep']['name'] }}</h4>
                                    <span class="inline-block mt-1 px-3 py-0.5 rounded-md bg-[#e5cfd1] text-[#4f0c12] text-[11px] font-semibold">
                                        {{ $activeDeptData['kadep']['role'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 p-4 rounded-xl border border-stone-100 bg-stone-50/50">
                                <img src="{{ asset($activeDeptData['sekdep']['image']) }}" class="w-14 h-14 rounded-lg object-cover">
                                <div>
                                    <h4 class="font-bold text-stone-900 text-sm">{{ $activeDeptData['sekdep']['name'] }}</h4>
                                    <span class="inline-block mt-1 px-3 py-0.5 rounded-md bg-[#e5cfd1] text-[#4f0c12] text-[11px] font-semibold">
                                        {{ $activeDeptData['sekdep']['role'] }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Division rows -->
                        @if (isset($activeDeptData['divisi']))
                            <div class="space-y-6">
                                @foreach ($activeDeptData['divisi'] as $div)
                                    <div class="border border-stone-100 rounded-xl p-5 bg-[#faf8f8]/60">
                                        <h4 class="font-bold text-[#70111a] text-sm mb-4">{{ $div['name'] }}</h4>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                            <!-- Kadiv -->
                                            <div class="bg-white p-3 rounded-lg border border-stone-200/80 text-center">
                                                <h5 class="font-semibold text-xs text-stone-900">{{ $div['kadiv']['name'] }}</h5>
                                                <span class="text-[10px] text-red-700 font-bold block mt-0.5">{{ $div['kadiv']['role'] }}</span>
                                            </div>
                                            <!-- Staffs -->
                                            @foreach ($div['staff'] as $stf)
                                                <div class="bg-white p-3 rounded-lg border border-stone-200/80 text-center">
                                                    <h5 class="font-semibold text-xs text-stone-900">{{ $stf['name'] }}</h5>
                                                    <span class="text-[10px] text-stone-500 block mt-0.5">{{ $stf['role'] }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endif
                @else
                    <!-- Template Kosong yang Rapi untuk Pengisian Admin Nanti -->
                    <div class="text-center py-10 px-4">
                        <div class="w-16 h-16 rounded-full bg-[#fceeed] text-[#70111a] flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-stone-900 mb-1.5">
                            Template Struktur Departemen & Divisi
                        </h3>
                        <p class="text-stone-500 text-xs sm:text-sm max-w-md mx-auto leading-relaxed mb-4">
                            Struktur anggota, Kepala Departemen, Kepala Divisi, dan Staff saat ini masih kosong. Data akan terintegrasi setelah ditambahkan melalui dashboard admin.
                        </p>
                        <span class="inline-block px-4 py-1.5 rounded-full bg-stone-100 text-stone-600 text-xs font-semibold">
                            Status: Siap Diintegrasikan dengan Database
                        </span>
                    </div>
                @endif
            </div>
        </section>

        <!-- ==================================================== -->
        <!-- SECTION 5: PROGRAM KERJA & AGENDA                    -->
        <!-- ==================================================== -->
        <section aria-labelledby="section-proker">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div class="flex items-center gap-2">
                    <div class="flex items-center gap-1">
                        <span class="w-1.5 h-6 bg-[#8B0000] rounded-full"></span>
                        <span class="w-1.5 h-6 bg-[#8B0000]/60 rounded-full"></span>
                    </div>
                    <h2 id="section-proker" class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight">
                        Program Kerja & Agenda
                    </h2>
                </div>
                <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-1 text-xs sm:text-sm font-bold text-[#8B0000] hover:text-[#580e15] hover:gap-1.5 transition-all">
                    <span>Lihat Semua</span>
                    <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>

            <!-- Filters -->
            <div class="flex flex-wrap items-center gap-2 sm:gap-3 mb-8">
                <div class="flex items-center gap-2 overflow-x-auto pb-1">
                    @foreach (['Semua', 'POSDM', 'KOMINFO', 'PI', 'KWU'] as $cat)
                        <button 
                            @click="prokerFilter = '{{ $cat }}'"
                            :class="prokerFilter === '{{ $cat }}' ? 'bg-[#70111a] text-white shadow-sm' : 'bg-white text-stone-700 border border-stone-300 hover:bg-stone-50'"
                            class="px-4 py-1.5 rounded-full font-semibold text-xs sm:text-sm whitespace-nowrap transition-colors cursor-pointer"
                            type="button"
                        >
                            {{ $cat }}
                        </button>
                    @endforeach
                </div>

                <div class="hidden sm:block h-6 w-px bg-stone-300 mx-1"></div>

                <div class="flex items-center gap-2">
                    @foreach (['Program Kerja', 'Agenda'] as $type)
                        <button 
                            @click="prokerType = '{{ $type }}'"
                            :class="prokerType === '{{ $type }}' ? 'bg-[#70111a] text-white shadow-sm' : 'bg-white text-stone-700 border border-stone-300 hover:bg-stone-50'"
                            class="px-4 py-1.5 rounded-full font-semibold text-xs sm:text-sm whitespace-nowrap transition-colors cursor-pointer"
                            type="button"
                        >
                            {{ $type }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Proker Cards Grid -->
            @if ($prokers->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-7">
                    @foreach ($prokers as $item)
                        <article class="bg-white rounded-2xl border border-stone-200/90 shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden flex flex-col group">
                            <div class="aspect-[16/10] overflow-hidden bg-stone-100 relative">
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <div class="p-5 sm:p-6 flex flex-col flex-1">
                                <div class="flex items-center gap-2 text-xs font-semibold text-stone-600 mb-2.5">
                                    <svg class="w-4 h-4 text-[#8B0000] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>{{ $item['date'] }}</span>
                                </div>
                                <h3 class="text-base sm:text-lg font-bold text-stone-900 group-hover:text-[#70111a] transition-colors line-clamp-2 mb-2 leading-snug">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-xs sm:text-sm text-stone-600 leading-relaxed line-clamp-3 mb-5 flex-1">
                                    {{ $item['description'] }}
                                </p>
                                <div class="pt-2 border-t border-stone-100 mt-auto">
                                    <a href="#" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#8B0000] hover:text-[#580e15] hover:gap-2.5 transition-all">
                                        <span>Lihat Dokumentasi</span>
                                        <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <!-- Template State saat Proker belum diisi -->
                <div class="bg-white rounded-2xl border border-stone-200/90 shadow-sm p-10 text-center max-w-xl mx-auto">
                    <div class="w-14 h-14 rounded-full bg-[#fceeed] text-[#70111a] flex items-center justify-center mx-auto mb-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-stone-900 text-base mb-1">
                        Belum Ada Program Kerja Terdaftar
                    </h3>
                    <p class="text-stone-500 text-xs sm:text-sm leading-relaxed">
                        Daftar program kerja dan agenda kegiatan kepengurusan ini akan tampil setelah diinput melalui dashboard admin.
                    </p>
                </div>
            @endif
        </section>

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
                        <a href="{{ route('aspirasi.index') }}" class="text-white/75 hover:text-white transition">Aspirasi</a>
                        <a href="{{ route('sejarah.index') }}" class="text-white font-semibold transition">Tentang Kami</a>
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
