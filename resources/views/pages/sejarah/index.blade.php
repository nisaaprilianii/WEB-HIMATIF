<x-layouts.app title="Sejarah & Struktur Organisasi" class="space-y-16 py-10 sm:space-y-20 sm:py-14">
    <x-slot:hero>
        <x-site.page-hero title="Sejarah HIMATIF" breadcrumb="Sejarah"
                          subtitle="Mengenal perjalanan, kepengurusan, dan perkembangan HIMATIF dari masa ke masa." />
    </x-slot:hero>

    {{-- 1. Perjalanan per periode --}}
    <x-ui.container>
        <section id="perjalanan" class="scroll-mt-6">
            <x-ui.section-heading title="Perjalanan HIMATIF" subtitle="Telusuri perjalanan HIMATIF dari setiap periode kepengurusan." />

            <div class="-mx-4 mb-6 flex gap-2.5 overflow-x-auto px-4 pb-1 sm:mx-0 sm:px-0">
                @foreach ($periodes as $item)
                    <x-ui.pill :href="request()->fullUrlWithQuery(['periode' => $item]).'#perjalanan'" :active="$item === $periode">{{ $item }}</x-ui.pill>
                @endforeach
            </div>

            <div class="relative flex min-h-48 flex-col justify-between gap-6 overflow-hidden rounded-2xl border border-stone-200 bg-white bg-cover bg-right bg-no-repeat p-6 shadow-sm sm:p-10 md:flex-row md:items-center"
                 style="background-image: url('{{ asset('images/backgrounds/periode-banner.webp') }}')">
                <div class="max-w-xl border-l-4 border-brand-800 pl-5">
                    <p class="text-xl font-black tracking-wide text-brand-700 uppercase">{{ config('himatif.name') }}</p>
                    <h3 class="mt-0.5 mb-3 text-2xl font-extrabold tracking-tight text-stone-900 sm:text-3xl">Periode {{ $periode }}</h3>
                    @if ($sejarah)
                        <p class="text-sm leading-relaxed text-stone-700">{{ $sejarah['deskripsi'] }}</p>
                    @else
                        <p class="text-sm leading-relaxed text-stone-500 italic">
                            Kilas balik kepengurusan periode ini belum ditambahkan. Data akan tampil setelah diisi melalui dashboard admin.
                        </p>
                    @endif
                </div>
                <div class="hidden pr-4 text-right text-white drop-shadow-sm md:block">
                    <p class="text-xl font-extrabold tracking-wider">{{ config('himatif.name') }}</p>
                    <p class="text-sm font-semibold text-white/90">{{ $periode }}</p>
                </div>
            </div>
        </section>
    </x-ui.container>

    {{-- 2. Visi & Misi --}}
    <x-ui.container>
        <section id="visi-misi" class="scroll-mt-6">
            <x-ui.section-heading title="Visi & Misi" />

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 sm:gap-8">
                <div class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm sm:p-8">
                    <h3 class="mb-4 text-2xl font-bold tracking-tight text-brand-700">Visi</h3>
                    @if ($visiMisi)
                        <p class="text-sm leading-relaxed text-stone-700 sm:text-base">{{ $visiMisi['visi'] }}</p>
                    @else
                        <p class="text-sm text-stone-500 italic">Visi kepengurusan belum diisi.</p>
                    @endif
                </div>

                <div class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm sm:p-8">
                    <h3 class="mb-4 text-2xl font-bold tracking-tight text-brand-700">Misi</h3>
                    @if ($visiMisi)
                        <ol class="space-y-4 text-sm text-stone-700 sm:text-base">
                            @foreach ($visiMisi['misi'] as $misi)
                                <li class="flex items-start gap-3.5">
                                    <span class="flex size-7 shrink-0 items-center justify-center rounded-full bg-brand-100 text-xs font-bold text-brand-800">{{ $loop->iteration }}</span>
                                    <span class="leading-relaxed">{{ $misi }}</span>
                                </li>
                            @endforeach
                        </ol>
                    @else
                        <p class="text-sm text-stone-500 italic">Misi kepengurusan belum diisi.</p>
                    @endif
                </div>
            </div>
        </section>
    </x-ui.container>

    {{-- 3. Struktur organisasi: pengurus inti + departemen --}}
    <x-ui.container>
        <section id="struktur" class="scroll-mt-6 space-y-16">
            <div>
                <x-ui.section-heading title="Top Man" subtitle="Badan Pengurus Harian inti HIMATIF." />
                <div class="grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
                    @foreach ($pengurusInti as $person)
                        <x-card.pengurus :person="$person" />
                    @endforeach
                </div>
            </div>

            <div x-data="{ dept: @js($departemens->keys()->first()) }">
                <x-ui.section-heading title="Struktur Departemen" subtitle="Pilih departemen untuk melihat susunan pengurusnya." />

                <div class="mb-8 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
                    @foreach ($departemens as $id => $item)
                        <button type="button" x-on:click="dept = @js($id)"
                                x-bind:class="{ 'border-brand-800 ring-2 ring-brand-800': dept === @js($id), 'border-stone-200': dept !== @js($id) }"
                                x-bind:aria-pressed="dept === @js($id)"
                                @class(['group flex flex-col items-center rounded-2xl border bg-white p-5 text-center shadow-sm transition-shadow hover:shadow-md', $loop->first ? 'border-brand-800 ring-2 ring-brand-800' : 'border-stone-200'])>
                            <span class="mb-3 flex size-16 items-center justify-center rounded-full border border-stone-200 bg-stone-50">
                                <img src="{{ asset('images/brand/logo.png') }}" alt="" class="size-11 object-contain">
                            </span>
                            <span class="mb-1 text-base font-extrabold text-stone-900 group-hover:text-brand-800">{{ $item['code'] }}</span>
                            <span class="mb-4 line-clamp-2 text-xs text-stone-500">{{ $item['name'] }}</span>
                            <span class="mt-auto inline-flex items-center gap-1.5 text-xs font-bold text-brand-700">
                                Lihat Struktur <x-ui.icon name="arrow-right" class="size-3.5" />
                            </span>
                        </button>
                    @endforeach
                </div>

                @foreach ($departemens as $id => $item)
                    <div x-show="dept === @js($id)" @if (! $loop->first) x-cloak @endif
                         class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm sm:p-8">
                        <div class="mb-6 flex items-center gap-3.5 border-b border-stone-100 pb-5">
                            <span class="flex size-11 items-center justify-center rounded-full bg-brand-100 text-brand-800">
                                <x-ui.icon name="users" class="size-5" />
                            </span>
                            <div>
                                <h3 class="text-lg font-bold text-stone-900">Departemen {{ $item['code'] }}</h3>
                                <p class="text-sm text-stone-500">{{ $item['name'] }}</p>
                            </div>
                        </div>

                        @if ($anggota = $item['anggota'])
                            <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2">
                                @foreach ([$anggota['kadep'], $anggota['sekdep']] as $person)
                                    <div class="flex items-center gap-4 rounded-xl border border-stone-100 bg-stone-50 p-4">
                                        <span class="flex size-14 shrink-0 items-center justify-center rounded-lg bg-stone-200 text-stone-400">
                                            <x-ui.icon name="user" class="size-7" />
                                        </span>
                                        <div>
                                            <p class="text-sm font-bold text-stone-900">{{ $person['name'] }}</p>
                                            <x-ui.badge class="mt-1">{{ $person['role'] }}</x-ui.badge>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                                @foreach ($anggota['divisi'] as $divisi)
                                    <div class="rounded-xl border border-stone-100 bg-canvas p-5">
                                        <h4 class="mb-5 text-sm font-bold text-brand-800">{{ $divisi['name'] }}</h4>
                                        <div class="grid grid-cols-2 gap-x-4 gap-y-6 sm:grid-cols-4">
                                            <x-card.pengurus size="sm" :person="$divisi['kadiv']" />
                                            @foreach ($divisi['staff'] as $staff)
                                                <x-card.pengurus size="sm" :person="$staff" />
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <x-ui.empty-state compact icon="users" class="border-none" title="Struktur belum diisi"
                                              :message="'Susunan Kepala Departemen, Kepala Divisi, dan Staff '.$item['code'].' akan tampil setelah ditambahkan melalui dashboard admin.'" />
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    </x-ui.container>

    {{-- 4. Program kerja (filter di sisi klien, tanpa reload) --}}
    <x-ui.container>
        <section id="program-kerja" class="scroll-mt-6"
                 x-data="{
                     dept: 'Semua',
                     type: 'Semua',
                     match(category, type) {
                         return (this.dept === 'Semua' || this.dept === category) && (this.type === 'Semua' || this.type === type);
                     },
                 }">
            <x-ui.section-heading title="Program Kerja & Agenda" subtitle="Program kerja dan agenda kegiatan setiap departemen.">
                <x-slot:action><x-ui.link-arrow :href="route('berita.index')">Lihat Semua</x-ui.link-arrow></x-slot:action>
            </x-ui.section-heading>

            <div class="mb-8 flex flex-wrap items-center gap-2 sm:gap-3">
                @foreach (array_merge(['Semua'], $departemens->pluck('code')->all()) as $code)
                    <x-ui.pill :active="$loop->first" alpine-active="dept === '{{ $code }}'" x-on:click="dept = '{{ $code }}'">{{ $code }}</x-ui.pill>
                @endforeach
                <span class="mx-1 hidden h-6 w-px bg-stone-300 sm:block"></span>
                @foreach (['Semua', 'Program Kerja', 'Agenda'] as $label)
                    <x-ui.pill :active="$loop->first" alpine-active="type === '{{ $label }}'" x-on:click="type = '{{ $label }}'">{{ $label === 'Semua' ? 'Semua Jenis' : $label }}</x-ui.pill>
                @endforeach
            </div>

            @if ($prokers->isNotEmpty())
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($prokers as $proker)
                        <x-card.berita :item="$proker" link-label="Lihat Dokumentasi"
                                       x-show="match({{ Js::from($proker['category']) }}, {{ Js::from($proker['type']) }})" />
                    @endforeach
                </div>
                <p x-show="! {{ Js::from($prokers->map(fn ($p) => [$p['category'], $p['type']])) }}.some(([c, t]) => match(c, t))" x-cloak
                   class="rounded-2xl border border-dashed border-stone-300 bg-white p-8 text-center text-sm text-stone-500">
                    Tidak ada program kerja untuk filter ini.
                </p>
            @else
                <x-ui.empty-state icon="calendar" title="Belum Ada Program Kerja Terdaftar"
                                  message="Daftar program kerja dan agenda kepengurusan ini akan tampil setelah diinput melalui dashboard admin." />
            @endif
        </section>
    </x-ui.container>
</x-layouts.app>
