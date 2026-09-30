<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - HIMATIF | Himpunan Mahasiswa Teknik Informatika</title>

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
<body class="min-h-screen bg-[#fcf8f8] bg-cover bg-center lg:bg-bottom bg-no-repeat flex flex-col justify-center items-center py-6 px-4 sm:px-6 lg:px-8 selection:bg-[#731111] selection:text-white"
      style="background-image: url('{{ asset('images/bg_login.png') }}');">

    <!-- Main Container - dioptimalkan proporsional untuk resolusi laptop 1280 x 832 px -->
    <main class="w-full max-w-[1280px] flex flex-col items-center justify-center my-auto">
        <!-- Header / Brand Section -->
        <div class="flex flex-col items-center text-center">
            <!-- Brand Logo + Name -->
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5 group transition-transform duration-200 hover:scale-[1.02]">
                <img src="{{ asset('images/Logo_resized.png') }}" alt="Logo HIMATIF" class="h-11 w-11 sm:h-12 sm:w-12 object-contain drop-shadow-sm">
                <span class="text-2xl sm:text-[28px] font-extrabold tracking-wide text-[#731111]">HIMATIF</span>
            </a>

            <!-- Greeting Heading -->
            <h1 class="text-xl sm:text-2xl font-extrabold text-[#8D0E0E] mt-3 sm:mt-3.5 tracking-tight">
                Selamat Datang
            </h1>

            <!-- Subtitle -->
            <p class="text-xs sm:text-sm text-gray-700 mt-1.5 text-center max-w-sm sm:max-w-md font-normal leading-relaxed">
                Masuk ke akun HIMATIF untuk mengakses<br class="hidden sm:inline"> berbagai fitur dan informasi.
            </p>
        </div>

        <!-- Login Card -->
        <div class="mt-5 sm:mt-6 w-full max-w-[420px] sm:max-w-[460px] bg-white rounded-2xl shadow-[0_12px_36px_rgba(0,0,0,0.06),0_1px_3px_rgba(0,0,0,0.04)] border border-gray-100 p-6 sm:p-8">

            @if (session('status'))
                <div class="p-3 mb-4 text-xs sm:text-sm text-green-800 bg-green-50 border border-green-200 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="p-3 mb-4 text-xs sm:text-sm text-red-800 bg-red-50 border border-red-200 rounded-lg">
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4" x-data="{ showPassword: false }">
                @csrf

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-xs sm:text-sm font-bold text-gray-900 mb-1.5">
                        Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Masukkan email anda"
                        class="w-full px-3.5 py-2.5 sm:py-3 text-xs sm:text-sm text-gray-900 placeholder-gray-400 bg-white border border-gray-300 rounded-xl focus:outline-none focus:border-[#731111] focus:ring-2 focus:ring-[#731111]/20 transition-all duration-150"
                    >
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-xs sm:text-sm font-bold text-gray-900 mb-1.5">
                        Password
                    </label>
                    <div class="relative">
                        <input
                            :type="showPassword ? 'text' : 'password'"
                            id="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Masukkan password anda"
                            class="w-full px-3.5 py-2.5 sm:py-3 pr-11 text-xs sm:text-sm text-gray-900 placeholder-gray-400 bg-white border border-gray-300 rounded-xl focus:outline-none focus:border-[#731111] focus:ring-2 focus:ring-[#731111]/20 transition-all duration-150"
                        >
                        <button
                            type="button"
                            @click="showPassword = !showPassword"
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none cursor-pointer"
                            aria-label="Tampilkan atau sembunyikan password"
                        >
                            <!-- Eye icon (visible password / click to hide) -->
                            <svg x-show="showPassword" x-cloak class="w-4.5 h-4.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                            </svg>

                            <!-- Eye icon (hidden password / click to show) -->
                            <svg x-show="!showPassword" class="w-4.5 h-4.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Lupa Password Link -->
                    <div class="flex justify-end pt-1.5">
                        <a href="#" class="text-xs sm:text-sm font-semibold text-[#B12B2B] hover:text-[#8D0E0E] hover:underline transition-colors">
                            Lupa Password?
                        </a>
                    </div>
                </div>

                <!-- Tombol MASUK -->
                <button
                    type="submit"
                    class="w-full py-2.5 sm:py-3 px-4 bg-[#731111] hover:bg-[#5b0d0d] active:bg-[#480a0a] text-white font-bold rounded-xl shadow-sm hover:shadow-md transition-all duration-200 transform active:scale-[0.99] tracking-wider text-xs sm:text-sm flex items-center justify-center cursor-pointer"
                >
                    MASUK
                </button>

                <!-- Divider atau -->
                <div class="relative flex items-center justify-center my-3.5 sm:my-4">
                    <div class="border-t border-gray-300 grow"></div>
                    <span class="px-3.5 text-xs sm:text-sm text-gray-400 font-medium bg-white select-none">atau</span>
                    <div class="border-t border-gray-300 grow"></div>
                </div>

                <!-- Tombol DAFTAR AKUN -->
                <a
                    href="{{ route('register') }}"
                    class="w-full py-2.5 sm:py-3 px-4 flex items-center justify-center gap-2 border border-[#731111] text-[#731111] bg-white hover:bg-[#731111]/5 active:bg-[#731111]/10 font-bold rounded-xl transition-all duration-200 tracking-wider text-xs sm:text-sm group cursor-pointer"
                >
                    <svg class="w-4.5 h-4.5 text-[#731111] transition-transform duration-200 group-hover:scale-110" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <line x1="19" x2="19" y1="8" y2="14" />
                        <line x1="22" x2="16" y1="11" y2="11" />
                    </svg>
                    <span>DAFTAR AKUN</span>
                </a>
            </form>
        </div>
    </main>

</body>
</html>
