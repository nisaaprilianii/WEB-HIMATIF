<x-layouts.app title="Materi Perkuliahan" class="py-10 sm:py-14">
    <x-slot:hero>
        <x-site.page-hero title="Materi"
                          subtitle="Akses berbagai materi perkuliahan Teknik Informatika yang telah dikumpulkan oleh HIMATIF." />
    </x-slot:hero>

    <x-ui.container class="grid grid-cols-1 items-start gap-8 lg:grid-cols-12">
        {{-- Sidebar semester (desktop). Di mobile diganti select pada form filter. --}}
        <aside class="hidden lg:col-span-3 lg:block">
            <div class="sticky top-6 overflow-hidden rounded-2xl border border-stone-200 bg-white shadow-sm">
                <h2 class="flex items-center gap-3 bg-brand-800 p-4 text-base font-bold text-white">
                    <x-ui.icon name="academic-cap" class="size-6" /> Pilih Semester
                </h2>
                <nav class="space-y-1 p-3" aria-label="Filter semester">
                    @foreach ([null => 'Semua Semester'] + array_combine($semesters, array_map(fn ($s) => "Semester {$s}", $semesters)) as $value => $label)
                        @php($active = (string) $semester === (string) $value)
                        <a href="{{ request()->fullUrlWithQuery(['semester' => $value ?: null, 'page' => null]) }}"
                           @if ($active) aria-current="true" @endif
                           @class([
                               'group flex items-center justify-between rounded-xl px-3 py-2.5 text-sm transition-colors',
                               'bg-brand-100 font-bold text-brand-800' => $active,
                               'font-medium text-stone-700 hover:bg-stone-50' => ! $active,
                           ])>
                            <span class="flex items-center gap-2.5">
                                <x-ui.icon :name="$value ? 'academic-cap' : 'squares'" class="size-4 {{ $active ? 'text-brand-800' : 'text-stone-400' }}" />
                                {{ $label }}
                            </span>
                            @if ($active) <x-ui.icon name="chevron-right" class="size-4" /> @endif
                        </a>
                    @endforeach
                </nav>
            </div>
        </aside>

        <section class="space-y-6 lg:col-span-9">
            {{-- Filter bar --}}
            <form method="GET" action="{{ route('materi.index') }}" role="search"
                  class="grid grid-cols-1 gap-3 rounded-2xl border border-stone-200 bg-white p-3.5 shadow-sm sm:grid-cols-[1fr_auto_auto]">
                <x-ui.keep-query :except="['q', 'semester', 'urut']" />
                <div class="relative">
                    <x-ui.icon name="search" class="pointer-events-none absolute top-1/2 left-3.5 size-4 -translate-y-1/2 text-stone-400" />
                    <label for="q" class="sr-only">Cari materi</label>
                    <input type="search" id="q" name="q" value="{{ $search }}" placeholder="Cari materi, mata kuliah, atau dosen..." class="form-control pl-10">
                </div>

                <label for="semester" class="sr-only">Semester</label>
                <select id="semester" name="semester" onchange="this.form.submit()" class="form-control lg:hidden">
                    <option value="">Semua Semester</option>
                    @foreach ($semesters as $item)
                        <option value="{{ $item }}" @selected($semester === $item)>Semester {{ $item }}</option>
                    @endforeach
                </select>

                <label for="urut" class="sr-only">Urutkan</label>
                <select id="urut" name="urut" onchange="this.form.submit()" class="form-control">
                    <option value="terbaru" @selected($sort === 'terbaru')>Terbaru</option>
                    <option value="nama" @selected($sort === 'nama')>Nama A–Z</option>
                </select>
            </form>

            <p class="px-1 text-sm text-stone-600">
                Menampilkan <strong class="text-stone-900">{{ $materis->total() }}</strong> materi
                @if ($semester) untuk <strong class="text-stone-900">Semester {{ $semester }}</strong> @endif
            </p>

            @if ($materis->isNotEmpty())
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    @foreach ($materis as $materi)
                        <x-card.materi :item="$materi" />
                    @endforeach
                </div>

                <x-ui.pagination :paginator="$materis" />
            @elseif ($semester || $search)
                <x-ui.empty-state icon="search" title="Materi tidak ditemukan" message="Belum ada materi yang cocok dengan semester atau kata kunci tersebut.">
                    <x-ui.button :href="route('materi.index', request()->only('demo'))" variant="outline">Lihat Semua Semester</x-ui.button>
                </x-ui.empty-state>
            @else
                <x-ui.empty-state icon="book-open" title="Belum Ada Materi Tersedia"
                                  message="Materi, modul, dan presentasi perkuliahan akan segera ditambahkan melalui dashboard admin." />
            @endif
        </section>
    </x-ui.container>
</x-layouts.app>
