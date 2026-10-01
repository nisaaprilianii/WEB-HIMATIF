@php
    $shortcuts = [
        ['icon' => 'users', 'title' => 'Tentang HIMATIF', 'text' => 'Profil, visi misi, dan sejarah', 'href' => route('sejarah.index')],
        ['icon' => 'document', 'title' => 'Materi Pembelajaran', 'text' => 'Kumpulan materi perkuliahan', 'href' => route('materi.index')],
        ['icon' => 'calendar', 'title' => 'Kegiatan', 'text' => 'Informasi kegiatan HIMATIF', 'href' => '#kegiatan'],
        ['icon' => 'chat', 'title' => 'Aspirasi Mahasiswa', 'text' => 'Sampaikan ide dan masukan', 'href' => route('aspirasi.index')],
    ];
@endphp

<x-layouts.app>
    <x-slot:hero>
        <div class="relative z-10 mx-auto max-w-4xl px-4 pt-14 pb-28 text-center sm:px-6 sm:pt-20 sm:pb-36">
            <p class="mb-4 text-xs font-semibold tracking-[0.35em] text-white/80 uppercase sm:text-sm">{{ config('himatif.name') }}</p>
            <h1 class="text-3xl leading-[1.15] font-extrabold tracking-tight sm:text-5xl lg:text-[3.25rem]">
                Himpunan Mahasiswa<br>Teknik Informatika
            </h1>
            <p class="mt-2 text-2xl font-medium tracking-tight text-white/95 sm:text-4xl">{{ config('himatif.campus') }}</p>
            <p class="mx-auto mt-6 max-w-2xl text-sm leading-relaxed text-white/85 sm:text-base">{{ config('himatif.description') }}</p>

            <div class="mt-9 flex flex-col items-center justify-center gap-4 sm:flex-row">
                <x-ui.button :href="route('sejarah.index')" variant="accent" size="lg" icon="arrow-right" class="w-full sm:w-auto">Kenal HIMATIF</x-ui.button>
                <x-ui.button href="#kegiatan" variant="ghost" size="lg" class="w-full sm:w-auto">Lihat Kegiatan</x-ui.button>
            </div>
        </div>
    </x-slot:hero>

    {{-- Akses cepat --}}
    <x-ui.container class="relative z-20 -mt-12 sm:-mt-14">
        <nav aria-label="Akses cepat" class="grid grid-cols-1 divide-y divide-stone-100 rounded-2xl border border-stone-100 bg-white p-3 shadow-[0_15px_35px_rgba(0,0,0,0.06)] sm:grid-cols-2 sm:divide-y-0 lg:grid-cols-4 lg:divide-x lg:p-5">
            @foreach ($shortcuts as $shortcut)
                <a href="{{ $shortcut['href'] }}" class="group flex items-center gap-4 rounded-xl p-3 transition-colors hover:bg-stone-50 lg:p-4">
                    <span class="flex size-12 shrink-0 items-center justify-center rounded-xl bg-brand-100 text-brand-500 transition-transform group-hover:scale-110">
                        <x-ui.icon :name="$shortcut['icon']" class="size-6" />
                    </span>
                    <span>
                        <span class="block text-sm font-bold text-stone-900 transition-colors group-hover:text-brand-500">{{ $shortcut['title'] }}</span>
                        <span class="mt-0.5 block text-xs text-stone-500">{{ $shortcut['text'] }}</span>
                    </span>
                </a>
            @endforeach
        </nav>
    </x-ui.container>

    {{-- Berita --}}
    <section id="berita" class="bg-cover bg-top-left bg-no-repeat py-20" style="background-image: url('{{ asset('images/backgrounds/section-berita.webp') }}')">
        <x-ui.container>
            <x-ui.section-heading eyebrow="Informasi Terkini" title="Berita & Informasi" subtitle="Update kegiatan, agenda, dan informasi terbaru HIMATIF.">
                <x-slot:action><x-ui.link-arrow :href="route('berita.index')">Lihat Semua Berita</x-ui.link-arrow></x-slot:action>
            </x-ui.section-heading>

            @if ($beritas->isNotEmpty())
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($beritas as $berita)
                        <x-card.berita :item="$berita" />
                    @endforeach
                </div>
            @else
                <x-ui.empty-state compact icon="newspaper" title="Belum ada berita" message="Berita dan informasi terbaru akan tampil di sini setelah dipublikasikan." />
            @endif
        </x-ui.container>
    </section>

    {{-- Materi --}}
    <section id="materi" class="bg-cover bg-top-left bg-no-repeat py-20" style="background-image: url('{{ asset('images/backgrounds/section-materi.webp') }}')">
        <x-ui.container>
            <x-ui.section-heading eyebrow="Materi Pembelajaran" title="Kumpulan Materi" subtitle="Akses materi perkuliahan yang telah dikumpulkan oleh HIMATIF.">
                <x-slot:action><x-ui.link-arrow :href="route('materi.index')">Lihat Semua Materi</x-ui.link-arrow></x-slot:action>
            </x-ui.section-heading>

            @if ($materis->isNotEmpty())
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($materis as $materi)
                        <x-card.materi :item="$materi" />
                    @endforeach
                </div>
            @else
                <x-ui.empty-state compact icon="book-open" title="Belum ada materi" message="Materi perkuliahan akan tampil di sini setelah diunggah pengurus." />
            @endif
        </x-ui.container>
    </section>

    {{-- Kegiatan --}}
    <section id="kegiatan" class="scroll-mt-6 bg-cover bg-top-left bg-no-repeat py-20" style="background-image: url('{{ asset('images/backgrounds/section-kegiatan.webp') }}')">
        <x-ui.container>
            <x-ui.section-heading eyebrow="Kegiatan HIMATIF" title="Kegiatan Mendatang" subtitle="Agenda kegiatan HIMATIF yang akan segera berlangsung.">
                <x-slot:action><x-ui.link-arrow :href="route('sejarah.index').'#program-kerja'">Lihat Semua Kegiatan</x-ui.link-arrow></x-slot:action>
            </x-ui.section-heading>

            @if ($kegiatans->isNotEmpty())
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($kegiatans as $kegiatan)
                        <x-card.kegiatan :item="$kegiatan" />
                    @endforeach
                </div>
            @else
                <x-ui.empty-state compact icon="calendar" title="Belum ada kegiatan terjadwal" message="Kegiatan mendatang akan diumumkan di sini." />
            @endif
        </x-ui.container>
    </section>
</x-layouts.app>
