{{--
    Kartu materi perkuliahan.
    $item: title, type (pdf|ppt), semester, prodi, dosen, description, date, size
--}}
@props(['item'])

@php($isPdf = $item['type'] === 'pdf')

<article {{ $attributes->class('group flex flex-col overflow-hidden rounded-2xl border border-stone-200 bg-white shadow-sm transition-shadow duration-300 hover:shadow-lg') }}>
    <div @class([
        'relative flex h-36 items-center justify-center overflow-hidden bg-gradient-to-br',
        'from-brand-50 to-brand-200' => $isPdf,
        'from-amber-50 to-orange-200' => ! $isPdf,
    ])>
        <div @class([
            'relative flex h-20 w-16 items-center justify-center rounded-xl text-white shadow-lg transition-transform duration-300 group-hover:scale-105',
            'bg-brand-600' => $isPdf,
            'bg-orange-500' => ! $isPdf,
        ])>
            <span class="absolute top-0 right-0 size-4 rounded-bl-lg bg-white/30"></span>
            <span class="text-lg font-black tracking-wider uppercase">{{ $item['type'] }}</span>
        </div>
        <x-ui.badge variant="soft" class="absolute top-3 left-3 bg-white/80">Semester {{ $item['semester'] }}</x-ui.badge>
    </div>

    <div class="flex flex-1 flex-col p-5 sm:p-6">
        <h3 class="mb-1 text-lg leading-snug font-bold text-stone-900 transition-colors group-hover:text-brand-800">{{ $item['title'] }}</h3>
        <p class="text-sm font-medium text-stone-700">{{ $item['prodi'] }}</p>
        <p class="mb-3 text-sm text-stone-500">Dosen: {{ $item['dosen'] }}</p>
        <p class="mb-5 line-clamp-2 flex-1 text-sm leading-relaxed text-stone-600">{{ $item['description'] }}</p>

        <div class="mt-auto flex flex-wrap items-center justify-between gap-3 border-t border-stone-100 pt-4">
            <span class="flex items-center gap-1.5 text-xs font-medium text-stone-500">
                <x-ui.icon name="clock" class="size-4 text-stone-400" />
                {{ $item['date'] }} · {{ $item['size'] }}
            </span>
            <div class="flex items-center gap-2">
                <x-ui.button href="#" size="sm" icon="download">Download</x-ui.button>
                <x-ui.button href="#" size="sm" variant="outline" icon="eye">Lihat</x-ui.button>
            </div>
        </div>
    </div>
</article>
