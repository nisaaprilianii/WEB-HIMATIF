@php
    $highlights = [
        ['icon' => 'chat', 'title' => 'Sampaikan Suaramu', 'text' => 'Berikan kritik, saran, keluhan, atau ide untuk HIMATIF.'],
        ['icon' => 'shield-check', 'title' => 'Identitas Terjaga', 'text' => 'Setiap aspirasi dijaga kerahasiaannya.'],
        ['icon' => 'check-circle', 'title' => 'Ditindaklanjuti', 'text' => 'Aspirasi kamu akan ditinjau pengurus.'],
    ];
@endphp

<x-layouts.app title="Aspirasi Mahasiswa" class="py-10 sm:py-14">
    <x-slot:hero>
        <x-site.page-hero title="Aspirasi" subtitle="Suaramu menjadi bagian dari perkembangan HIMATIF." />
    </x-slot:hero>

    <x-ui.container width="max-w-5xl" class="space-y-8">
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
            @foreach ($highlights as $highlight)
                <div class="flex items-center gap-4 rounded-2xl border border-brand-200 bg-brand-100 p-5">
                    <span class="flex size-12 shrink-0 items-center justify-center rounded-full bg-brand-800 text-white shadow-sm">
                        <x-ui.icon :name="$highlight['icon']" class="size-6" />
                    </span>
                    <div>
                        <h3 class="font-bold text-brand-800">{{ $highlight['title'] }}</h3>
                        <p class="mt-1 text-sm leading-snug text-stone-700">{{ $highlight['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm sm:p-10">
            <div class="mb-7">
                <h2 class="text-2xl font-extrabold tracking-tight text-brand-800 sm:text-3xl">Sampaikan Aspirasi</h2>
                <p class="mt-1.5 text-sm leading-relaxed text-stone-600">
                    Berikan masukan, kritik, keluhan, atau usulan untuk kemajuan HIMATIF. Lengkapi form berikut dengan informasi yang benar.
                </p>
            </div>

            <x-ui.alert />

            <form action="{{ route('aspirasi.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <x-form.input name="nama" label="Nama" placeholder="Masukkan nama Anda" autocomplete="name" required />
                    <x-form.input name="nim" label="NIM" placeholder="Masukkan NIM Anda" inputmode="numeric" required />
                </div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <x-form.input name="kelas" label="Kelas" placeholder="Contoh: TIF RP 24A" required />
                    <x-form.select name="jenis_aspirasi" label="Jenis Aspirasi" :options="$jenisAspirasi" placeholder="Pilih jenis aspirasi" required />
                </div>

                <x-form.input name="judul_aspirasi" label="Judul Aspirasi" placeholder="Masukkan judul aspirasi" required />

                <x-form.textarea name="isi_aspirasi" label="Isi Aspirasi" placeholder="Tuliskan aspirasi kamu di sini..." maxlength="5000" required />

                <x-ui.button type="submit" size="lg" icon="send" class="w-full">Kirim Aspirasi</x-ui.button>
            </form>
        </div>

        <figure class="relative overflow-hidden rounded-2xl border border-brand-200 bg-brand-100 bg-cover bg-right bg-no-repeat p-6 sm:p-10"
                style="background-image: url('{{ asset('images/backgrounds/aspirasi-quote.webp') }}')">
            <div class="flex max-w-2xl items-start gap-5 sm:items-center sm:gap-7">
                <span aria-hidden="true" class="shrink-0 border-r-2 border-brand-300 pr-5 font-serif text-6xl leading-none font-bold text-brand-800 select-none sm:pr-7">“</span>
                <div class="space-y-1.5">
                    <blockquote class="text-base leading-snug font-bold text-brand-800 sm:text-xl">
                        Setiap suara memiliki arti, karena perubahan berawal dari kepedulian.
                    </blockquote>
                    <figcaption class="text-sm leading-relaxed text-stone-700">
                        Aspirasi yang kamu sampaikan sangat berarti bagi kami untuk membangun HIMATIF yang lebih baik.
                    </figcaption>
                </div>
            </div>
        </figure>
    </x-ui.container>
</x-layouts.app>
