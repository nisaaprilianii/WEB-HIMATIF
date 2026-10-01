<x-layouts.auth title="Masuk" backdrop="login" class="flex min-h-screen flex-col items-center justify-center px-4 py-10">
    <div class="flex flex-col items-center text-center">
        <x-site.logo tone="brand" size="lg" />
        <h1 class="mt-4 text-2xl font-extrabold tracking-tight text-brand-700">Selamat Datang</h1>
        <p class="mt-1.5 max-w-sm text-sm leading-relaxed text-stone-700">
            Masuk ke akun HIMATIF untuk mengakses berbagai fitur dan informasi.
        </p>
    </div>

    <div class="mt-6 w-full max-w-md rounded-2xl border border-stone-100 bg-white p-6 shadow-[0_12px_36px_rgba(0,0,0,0.06)] sm:p-8">
        <x-ui.alert />

        <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
            @csrf

            <x-form.input type="email" name="email" label="Email" placeholder="Masukkan email Anda" autocomplete="username" autofocus required />

            <div>
                <x-form.password name="password" label="Password" placeholder="Masukkan password Anda" autocomplete="current-password" required />
                <div class="mt-2 flex items-center justify-between">
                    <label class="flex items-center gap-2 text-sm text-stone-700">
                        <input type="checkbox" name="remember" class="size-4 rounded border-stone-300 accent-brand-800">
                        Ingat saya
                    </label>
                    {{-- TODO: arahkan ke route reset password bila fitur sudah dibuat. --}}
                    <a href="#" class="text-sm font-semibold text-brand-600 hover:text-brand-800 hover:underline">Lupa Password?</a>
                </div>
            </div>

            <x-ui.button type="submit" size="lg" class="w-full tracking-wider">MASUK</x-ui.button>

            <div class="flex items-center gap-3 py-1 text-sm text-stone-400" aria-hidden="true">
                <span class="h-px grow bg-stone-200"></span> atau <span class="h-px grow bg-stone-200"></span>
            </div>

            <x-ui.button :href="route('register')" variant="outline" size="lg" icon="user-plus" class="w-full tracking-wider">DAFTAR AKUN</x-ui.button>
        </form>
    </div>

    <a href="{{ route('home') }}" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-stone-600 hover:text-brand-800">
        <x-ui.icon name="arrow-left" class="size-4" /> Kembali ke Beranda
    </a>
</x-layouts.auth>
