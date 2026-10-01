@php
    $steps = [
        1 => ['Data Mahasiswa', 'Isi data diri Anda sesuai dengan identitas yang benar.'],
        2 => ['Data Akun', 'Buat akun dengan email dan password yang akan Anda gunakan untuk login.'],
        3 => ['Verifikasi Keanggotaan', 'Sertifikat PEKMAT wajib dilampirkan untuk melakukan pendaftaran akun HIMATIF.'],
    ];
@endphp

<x-layouts.auth title="Daftar Akun" backdrop="register">
    <x-ui.container width="max-w-4xl" class="pt-6 sm:pt-8">
        <a href="{{ route('login') }}" class="group inline-flex items-center gap-2 text-sm font-bold text-brand-800 hover:text-brand-600">
            <x-ui.icon name="arrow-left" class="size-4 transition-transform group-hover:-translate-x-1" />
            Kembali ke Halaman Login
        </a>
    </x-ui.container>

    <x-ui.container width="max-w-4xl" class="py-6 md:py-8">
        <div class="mb-8 rounded-2xl border border-stone-200 bg-white p-6 shadow-xl shadow-stone-200/40 sm:p-10">
            <div class="mb-7">
                <h1 class="mb-2 text-3xl font-extrabold tracking-tight text-brand-800 md:text-4xl">Daftar Akun</h1>
                <p class="max-w-xl text-sm leading-relaxed text-stone-700 md:text-base">
                    Lengkapi data diri Anda dan buat akun untuk mengakses berbagai fitur website HIMATIF.
                </p>
            </div>

            <x-ui.alert />

            <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                @foreach ($steps as $number => [$title, $text])
                    <section aria-labelledby="step-{{ $number }}" class="space-y-4">
                        <div class="flex items-center gap-3.5 rounded-xl border border-brand-200 bg-brand-100 px-4 py-2.5">
                            <span class="flex size-7 shrink-0 items-center justify-center rounded-full bg-brand-800 text-xs font-bold text-white">{{ $number }}</span>
                            <div>
                                <h2 id="step-{{ $number }}" class="text-sm font-bold text-brand-800">{{ $title }}</h2>
                                <p class="mt-0.5 text-xs text-stone-600">{{ $text }}</p>
                            </div>
                        </div>

                        @if ($number === 1)
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <x-form.input name="nama_lengkap" label="Nama Lengkap" placeholder="Masukkan nama lengkap" autocomplete="name" required />
                                <x-form.input name="nim" label="NIM" placeholder="Masukkan NIM" inputmode="numeric" required />
                                <x-form.select name="angkatan" label="Angkatan" placeholder="Pilih angkatan" :options="array_combine($angkatans, $angkatans)" required />
                                <x-form.input name="kelas" label="Kelas" placeholder="Contoh: TIF RP 24A" required />
                            </div>
                            <x-form.input type="tel" name="whatsapp" label="Nomor WhatsApp" placeholder="Contoh: 081234567890" autocomplete="tel" required />
                        @elseif ($number === 2)
                            <x-form.input type="email" name="email" label="Email" placeholder="Masukkan email aktif" autocomplete="email" required />
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <x-form.password name="password" label="Password" placeholder="Minimal 8 karakter" autocomplete="new-password" required />
                                <x-form.password name="password_confirmation" label="Konfirmasi Password" placeholder="Masukkan kembali password" autocomplete="new-password" required />
                            </div>
                        @else
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2" x-data="{ fileName: '', fileSize: '' }">
                                <label for="file_sertifikat"
                                       class="flex min-h-44 cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-brand-700 bg-white p-6 text-center transition-colors hover:bg-brand-50">
                                    <x-ui.icon name="upload" class="mb-2 size-7 text-brand-800" />
                                    <span class="text-sm font-bold text-stone-900">Upload Sertifikat PEKMAT</span>
                                    <span x-show="!fileName" class="mt-0.5 mb-3.5 text-xs text-stone-500">PDF, JPG, atau PNG. Maks 5 MB.</span>
                                    <span x-show="fileName" x-cloak class="mt-1 mb-3 rounded-md border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                        <span x-text="fileName"></span> · <span x-text="fileSize"></span>
                                    </span>
                                    <span class="rounded-lg bg-brand-300 px-6 py-1.5 text-xs font-semibold text-brand-950" x-text="fileName ? 'Ganti File' : 'Pilih File'">Pilih File</span>
                                    <input type="file" id="file_sertifikat" name="file_sertifikat" accept=".pdf,.jpg,.jpeg,.png" class="sr-only" required
                                           x-on:change="const f = $event.target.files[0]; fileName = f ? f.name : ''; fileSize = f ? (f.size / 1048576).toFixed(2) + ' MB' : ''">
                                </label>

                                <div class="flex flex-col justify-center rounded-2xl border border-brand-200 bg-brand-50 p-5">
                                    <p class="mb-2.5 flex items-center gap-2 text-xs font-bold tracking-wider text-brand-800 uppercase">
                                        <x-ui.icon name="document" class="size-4" /> Sertifikat PEKMAT
                                    </p>
                                    <ul class="list-disc space-y-1.5 pl-5 text-xs leading-snug text-stone-700 marker:text-brand-800">
                                        <li>Pastikan sertifikat yang diunggah jelas dan masih terbaca.</li>
                                        <li>Format file: PDF, JPG, atau PNG.</li>
                                        <li>Ukuran maksimal: 5 MB.</li>
                                    </ul>
                                </div>
                            </div>
                            @error('file_sertifikat') <p class="text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                        @endif
                    </section>
                @endforeach

                <label class="flex cursor-pointer items-start gap-2.5 text-xs leading-snug text-stone-800">
                    <input type="checkbox" name="agreement" value="1" class="mt-0.5 size-4 shrink-0 rounded border-stone-300 accent-brand-800" @checked(old('agreement')) required>
                    Saya menyatakan bahwa data yang saya masukkan benar dan sertifikat PEKMAT yang saya lampirkan merupakan milik saya.
                </label>

                <x-ui.button type="submit" size="lg" icon-right="arrow-right" class="w-full">Daftar Akun</x-ui.button>

                <p class="text-center text-sm font-semibold text-stone-700">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="ml-1 font-bold text-brand-800 hover:underline">Masuk di sini</a>
                </p>
            </form>
        </div>
    </x-ui.container>
</x-layouts.auth>
