<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - HIMATIF | Himpunan Mahasiswa Teknik Informatika</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Logo_resized.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
<body class="bg-[#faf8f8] min-h-screen text-stone-800 relative flex flex-col justify-between overflow-x-hidden antialiased selection:bg-[#681119] selection:text-white">

    <!-- Bottom Wave Background Graphic -->
    <div aria-hidden="true" class="fixed bottom-0 left-0 right-0 w-full pointer-events-none z-0 select-none overflow-hidden h-[240px] sm:h-[300px] lg:h-[360px]">
        <img alt="Abstract Red Background Wave" class="w-full h-full object-cover object-bottom" src="{{ asset('images/bg_register.png') }}">
    </div>

    <!-- Navigation Header -->
    <header class="relative z-10 w-full pt-6 sm:pt-8 px-4 sm:px-8 md:px-12 max-w-[1280px] mx-auto">
        <a href="{{ route('login') }}" class="inline-flex items-center text-[#681119] hover:text-[#8b1b24] font-bold text-xs sm:text-sm tracking-wide transition-colors group">
            <svg class="w-4 h-4 mr-2 transition-transform duration-200 group-hover:-translate-x-1 stroke-current" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <span>Kembali ke Halaman Login</span>
        </a>
    </header>

    <!-- Main Content Container -->
    <main class="relative z-10 w-full max-w-[920px] mx-auto px-4 py-6 md:py-8 flex-1">
        <!-- Register Card Container -->
        <div class="bg-white rounded-2xl sm:rounded-[24px] border border-stone-200/90 shadow-xl shadow-stone-200/40 p-6 sm:p-8 md:p-11 mb-8">

            <!-- Card Header: Title & Description -->
            <div class="mb-7">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#70111a] tracking-tight mb-2">
                    Daftar Akun
                </h1>
                <p class="text-stone-700 text-xs sm:text-sm md:text-base max-w-xl leading-relaxed">
                    Lengkapi data diri Anda dan buat akun untuk mengakses berbagai fitur website HIMATIF.
                </p>
            </div>

            @if (session('status'))
                <div class="p-3.5 mb-6 text-xs sm:text-sm text-green-800 bg-green-50 border border-green-200 rounded-xl">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="p-3.5 mb-6 text-xs sm:text-sm text-red-800 bg-red-50 border border-red-200 rounded-xl">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Registration Form -->
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="space-y-6 sm:space-y-7" x-data="{ showPassword: false, showPasswordConfirm: false, fileName: '', fileSize: '' }">
                @csrf

                <!-- ============================================== -->
                <!-- SECTION 1: DATA MAHASISWA                     -->
                <!-- ============================================== -->
                <section aria-labelledby="section-mahasiswa-title" class="space-y-4">
                    <!-- Section Banner Badge -->
                    <div class="bg-[#fceeed] rounded-lg px-4 py-2.5 flex items-center gap-3.5 border border-[#f8dedc]">
                        <div class="w-7 h-7 rounded-full bg-[#681119] text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                            1
                        </div>
                        <div>
                            <h2 class="text-sm font-bold text-[#681119] leading-tight" id="section-mahasiswa-title">
                                Data Mahasiswa
                            </h2>
                            <p class="text-xs text-stone-600 mt-0.5">
                                Isi data diri Anda sesuai dengan identitas yang benar.
                            </p>
                        </div>
                    </div>

                    <!-- Inputs Grid: Nama Lengkap & NIM -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs sm:text-sm font-bold text-stone-900" for="nama_lengkap">
                                Nama Lengkap
                            </label>
                            <input
                                class="w-full rounded-lg border border-stone-300 px-3.5 py-2.5 text-xs sm:text-sm text-stone-900 placeholder-stone-400 bg-white focus:outline-none focus:border-[#75131b] focus:ring-1 focus:ring-[#75131b] transition-all"
                                id="nama_lengkap"
                                name="nama_lengkap"
                                value="{{ old('nama_lengkap') }}"
                                placeholder="Masukkan nama lengkap"
                                type="text"
                                required
                            />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs sm:text-sm font-bold text-stone-900" for="nim">
                                NIM
                            </label>
                            <input
                                class="w-full rounded-lg border border-stone-300 px-3.5 py-2.5 text-xs sm:text-sm text-stone-900 placeholder-stone-400 bg-white focus:outline-none focus:border-[#75131b] focus:ring-1 focus:ring-[#75131b] transition-all"
                                id="nim"
                                name="nim"
                                value="{{ old('nim') }}"
                                placeholder="Masukkan NIM"
                                type="text"
                                required
                            />
                        </div>
                    </div>

                    <!-- Inputs Grid: Angkatan & Kelas -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs sm:text-sm font-bold text-stone-900" for="angkatan">
                                Angkatan
                            </label>
                            <div class="relative">
                                <select
                                    class="w-full rounded-lg border border-stone-300 px-3.5 py-2.5 text-xs sm:text-sm text-stone-700 placeholder-stone-400 bg-white appearance-none cursor-pointer pr-10 focus:outline-none focus:border-[#75131b] focus:ring-1 focus:ring-[#75131b] transition-all"
                                    id="angkatan"
                                    name="angkatan"
                                    required
                                >
                                    <option value="" disabled {{ old('angkatan') ? '' : 'selected' }}>Pilih angkatan</option>
                                    <option value="2026" {{ old('angkatan') == '2026' ? 'selected' : '' }}>2026</option>
                                    <option value="2025" {{ old('angkatan') == '2025' ? 'selected' : '' }}>2025</option>
                                    <option value="2024" {{ old('angkatan') == '2024' ? 'selected' : '' }}>2024</option>
                                    <option value="2023" {{ old('angkatan') == '2023' ? 'selected' : '' }}>2023</option>
                                    <option value="2022" {{ old('angkatan') == '2022' ? 'selected' : '' }}>2022</option>
                                    <option value="2021" {{ old('angkatan') == '2021' ? 'selected' : '' }}>2021</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3.5 text-stone-500">
                                    <svg class="w-4 h-4 stroke-current stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs sm:text-sm font-bold text-stone-900" for="kelas">
                                Kelas
                            </label>
                            <input
                                class="w-full rounded-lg border border-stone-300 px-3.5 py-2.5 text-xs sm:text-sm text-stone-900 placeholder-stone-400 bg-white focus:outline-none focus:border-[#75131b] focus:ring-1 focus:ring-[#75131b] transition-all"
                                id="kelas"
                                name="kelas"
                                value="{{ old('kelas') }}"
                                placeholder="Contoh: TIF RP 24A"
                                type="text"
                                required
                            />
                        </div>
                    </div>

                    <!-- Input: Nomor WhatsApp -->
                    <div class="space-y-1.5">
                        <label class="block text-xs sm:text-sm font-bold text-stone-900" for="whatsapp">
                            Nomor WhatsApp
                        </label>
                        <input
                            class="w-full rounded-lg border border-stone-300 px-3.5 py-2.5 text-xs sm:text-sm text-stone-900 placeholder-stone-400 bg-white focus:outline-none focus:border-[#75131b] focus:ring-1 focus:ring-[#75131b] transition-all"
                            id="whatsapp"
                            name="whatsapp"
                            value="{{ old('whatsapp') }}"
                            placeholder="Masukkan nomor WhatsApp aktif"
                            type="tel"
                            required
                        />
                    </div>
                </section>

                <!-- ============================================== -->
                <!-- SECTION 2: DATA AKUN                          -->
                <!-- ============================================== -->
                <section aria-labelledby="section-akun-title" class="space-y-4">
                    <!-- Section Banner Badge -->
                    <div class="bg-[#fceeed] rounded-lg px-4 py-2.5 flex items-center gap-3.5 border border-[#f8dedc]">
                        <div class="w-7 h-7 rounded-full bg-[#681119] text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                            2
                        </div>
                        <div>
                            <h2 class="text-sm font-bold text-[#681119] leading-tight" id="section-akun-title">
                                Data Akun
                            </h2>
                            <p class="text-xs text-stone-600 mt-0.5">
                                Buat akun dengan email dan password yang akan Anda gunakan untuk login.
                            </p>
                        </div>
                    </div>

                    <!-- Inputs Grid: Email & Password -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs sm:text-sm font-bold text-stone-900" for="email">
                                Email
                            </label>
                            <input
                                class="w-full rounded-lg border border-stone-300 px-3.5 py-2.5 text-xs sm:text-sm text-stone-900 placeholder-stone-400 bg-white focus:outline-none focus:border-[#75131b] focus:ring-1 focus:ring-[#75131b] transition-all"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email aktif"
                                type="email"
                                required
                            />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs sm:text-sm font-bold text-stone-900" for="password">
                                Password
                            </label>
                            <div class="relative">
                                <input
                                    class="w-full rounded-lg border border-stone-300 px-3.5 py-2.5 pr-10 text-xs sm:text-sm text-stone-900 placeholder-stone-400 bg-white focus:outline-none focus:border-[#75131b] focus:ring-1 focus:ring-[#75131b] transition-all"
                                    :type="showPassword ? 'text' : 'password'"
                                    id="password"
                                    name="password"
                                    placeholder="Buat password"
                                    required
                                />
                                <button
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-stone-400 hover:text-stone-600 focus:outline-none cursor-pointer"
                                    aria-label="Tampilkan atau sembunyikan password"
                                >
                                    <svg x-show="showPassword" x-cloak class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                    </svg>
                                    <svg x-show="!showPassword" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Input: Konfirmasi Password -->
                    <div class="space-y-1.5">
                        <label class="block text-xs sm:text-sm font-bold text-stone-900" for="password_confirmation">
                            Konfirmasi Password
                        </label>
                        <div class="relative">
                            <input
                                class="w-full rounded-lg border border-stone-300 px-3.5 py-2.5 pr-10 text-xs sm:text-sm text-stone-900 placeholder-stone-400 bg-white focus:outline-none focus:border-[#75131b] focus:ring-1 focus:ring-[#75131b] transition-all"
                                :type="showPasswordConfirm ? 'text' : 'password'"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Masukkan kembali password"
                                required
                            />
                            <button
                                type="button"
                                @click="showPasswordConfirm = !showPasswordConfirm"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-stone-400 hover:text-stone-600 focus:outline-none cursor-pointer"
                                aria-label="Tampilkan atau sembunyikan konfirmasi password"
                            >
                                <svg x-show="showPasswordConfirm" x-cloak class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                </svg>
                                <svg x-show="!showPasswordConfirm" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </section>

                <!-- ============================================== -->
                <!-- SECTION 3: VERIFIKASI KEANGGOTAAN             -->
                <!-- ============================================== -->
                <section aria-labelledby="section-verifikasi-title" class="space-y-4">
                    <!-- Section Banner Badge -->
                    <div class="bg-[#fceeed] rounded-lg px-4 py-2.5 flex items-center gap-3.5 border border-[#f8dedc]">
                        <div class="w-7 h-7 rounded-full bg-[#681119] text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                            3
                        </div>
                        <div>
                            <h2 class="text-sm font-bold text-[#681119] leading-tight" id="section-verifikasi-title">
                                Verifikasi Keanggotaan
                            </h2>
                            <p class="text-xs text-stone-600 mt-0.5">
                                Sertifikat PEKMAT wajib dilampirkan untuk melakukan pendaftaran akun HIMATIF.
                            </p>
                        </div>
                    </div>

                    <!-- Upload Box and Rules 2-Column Container -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Left: Dashed Upload Box -->
                        <div class="border-2 border-dashed border-[#8b1b24] rounded-2xl p-6 flex flex-col items-center justify-center text-center bg-white min-h-[165px] transition-colors hover:border-[#681119] hover:bg-stone-50/50">
                            <!-- Outline Document Icon -->
                            <svg class="w-7 h-7 text-[#75131b] mb-2" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <h3 class="text-sm font-bold text-stone-900 mb-0.5">
                                Upload Sertifikat PEKMAT
                            </h3>

                            <template x-if="!fileName">
                                <p class="text-[11px] text-stone-500 mb-3.5">
                                    PDF, JPG, atau PNG. Maks 5 MB.
                                </p>
                            </template>

                            <template x-if="fileName">
                                <div class="mb-3 px-3 py-1 bg-green-50 border border-green-200 rounded-md">
                                    <p class="text-xs font-semibold text-green-700 truncate max-w-[200px]" x-text="fileName"></p>
                                    <p class="text-[10px] text-green-600" x-text="fileSize"></p>
                                </div>
                            </template>

                            <!-- Hidden File Input & Trigger Button -->
                            <input
                                accept=".pdf,.jpg,.jpeg,.png"
                                class="hidden"
                                id="file_sertifikat"
                                name="file_sertifikat"
                                type="file"
                                @change="if ($event.target.files.length) { fileName = $event.target.files[0].name; fileSize = ($event.target.files[0].size / 1024 / 1024).toFixed(2) + ' MB'; }"
                                required
                            />
                            <button
                                class="bg-[#e8a3a7] hover:bg-[#e28f94] text-[#4f0c12] text-xs font-semibold px-6 py-1.5 rounded-lg transition-colors cursor-pointer shadow-sm active:scale-95"
                                @click="document.getElementById('file_sertifikat').click()"
                                type="button"
                                x-text="fileName ? 'Ganti File' : 'Pilih File'"
                            >
                                Pilih File
                            </button>
                        </div>

                        <!-- Right: Instructions Box -->
                        <div class="bg-[#fceeed]/70 border border-[#f5d7d5] rounded-2xl p-5 flex flex-col justify-center">
                            <div class="flex items-center gap-2 mb-2.5 text-[#681119]">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <span class="font-bold text-xs uppercase tracking-wider">
                                    Sertifikat PEKMAT
                                </span>
                            </div>
                            <ul class="text-[11.5px] text-stone-700 space-y-1.5 leading-tight">
                                <li class="flex items-start gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#681119] mt-1 shrink-0"></span>
                                    <span>Pastikan sertifikat yang diunggah jelas dan masih terbaca.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#681119] mt-1 shrink-0"></span>
                                    <span>Format file: PDF, JPG, atau PNG</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#681119] mt-1 shrink-0"></span>
                                    <span>Ukuran maksimal: 5 MB.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- ============================================== -->
                <!-- STATEMENT CHECKBOX                             -->
                <!-- ============================================== -->
                <div class="pt-1 flex items-start gap-2.5">
                    <input
                        checked
                        class="w-4 h-4 mt-0.5 text-[#681119] rounded border-stone-300 focus:ring-[#681119] cursor-pointer"
                        id="agreement"
                        name="agreement"
                        type="checkbox"
                        required
                    />
                    <label class="text-xs text-stone-800 leading-snug cursor-pointer select-none" for="agreement">
                        Saya menyatakan bahwa data yang saya masukkan benar dan sertifikat PEKMAT yang saya lampirkan merupakan milik saya.
                    </label>
                </div>

                <!-- ============================================== -->
                <!-- SUBMIT ACTION                                  -->
                <!-- ============================================== -->
                <div class="pt-2">
                    <button
                        class="w-full bg-[#6d131b] hover:bg-[#5b0f16] active:bg-[#4b0b11] text-white font-bold py-3 px-6 rounded-lg text-xs sm:text-sm flex items-center justify-center gap-2 transition-all duration-200 shadow-md shadow-maroon-900/10 cursor-pointer"
                        type="submit"
                    >
                        <span>Daftar Akun</span>
                        <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                            <path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>

                <!-- ============================================== -->
                <!-- LOGIN REDIRECTION FOOTER                       -->
                <!-- ============================================== -->
                <div class="text-center pt-1 pb-1">
                    <p class="text-xs font-semibold text-stone-700">
                        Sudah punya akun ?
                        <a class="text-[#6d131b] hover:underline font-bold ml-1 transition-colors" href="{{ route('login') }}">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
