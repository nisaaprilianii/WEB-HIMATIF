<x-layouts.app title="Berita & Informasi" class="py-10 sm:py-14">
    <x-slot:hero>
        <x-site.page-hero title="Berita & Informasi" breadcrumb="Berita"
                          subtitle="Ikuti informasi terbaru, kegiatan, dan berbagai kabar seputar HIMATIF." />
    </x-slot:hero>

    <x-ui.container>
        {{-- Filter kategori + pencarian (server-side, via query string) --}}
        <div class="mb-12 flex flex-col items-stretch justify-between gap-4 md:flex-row md:items-center">
            <div class="-mx-4 flex gap-2 overflow-x-auto px-4 pb-1 sm:gap-3 md:mx-0 md:px-0 md:pb-0">
                <x-ui.pill :href="request()->fullUrlWithQuery(['kategori' => null, 'page' => null])" :active="! $kategori">Semua</x-ui.pill>
                @foreach ($kategoris as $item)
                    <x-ui.pill :href="request()->fullUrlWithQuery(['kategori' => $item, 'page' => null])" :active="$kategori === $item">{{ $item }}</x-ui.pill>
                @endforeach
            </div>

            <form method="GET" action="{{ route('berita.index') }}" role="search" class="relative w-full md:w-80">
                <x-ui.keep-query :except="['q']" />
                <label for="q" class="sr-only">Cari berita</label>
                <input type="search" id="q" name="q" value="{{ $search }}" placeholder="Cari berita ..." class="form-control rounded-full pr-12">
                <button type="submit" aria-label="Cari" class="absolute inset-y-1 right-1 flex aspect-square items-center justify-center rounded-full bg-brand-800 text-white transition-colors hover:bg-brand-900">
                    <x-ui.icon name="search" class="size-4" />
                </button>
            </form>
        </div>

        <x-ui.section-heading title="Berita Terbaru" subtitle="Informasi terbaru seputar HIMATIF {{ config('himatif.campus') }}." />

        @if ($beritas->isNotEmpty())
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($beritas as $berita)
                    <x-card.berita :item="$berita" />
                @endforeach
            </div>

            <x-ui.pagination :paginator="$beritas" />
        @elseif ($kategori || $search)
            <x-ui.empty-state icon="search" title="Berita tidak ditemukan" message="Tidak ada berita yang cocok dengan filter atau kata kunci Anda.">
                <x-ui.button :href="route('berita.index', request()->only('demo'))" variant="outline">Reset Filter</x-ui.button>
            </x-ui.empty-state>
        @else
            <x-ui.empty-state icon="newspaper" title="Belum Ada Berita Tersedia"
                              message="Saat ini belum ada berita atau informasi yang dipublikasikan. Berita dan agenda terbaru akan segera diunggah melalui dashboard admin.">
                <x-ui.button :href="route('home')" icon="arrow-left">Kembali ke Beranda</x-ui.button>
            </x-ui.empty-state>
        @endif
    </x-ui.container>
</x-layouts.app>
