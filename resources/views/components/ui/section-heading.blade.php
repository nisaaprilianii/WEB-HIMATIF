{{--
    Judul section yang dipakai di SEMUA halaman.
    <x-ui.section-heading title="Berita Terbaru" subtitle="..." eyebrow="Informasi Terkini">
        <x-slot:action> <a ...>Lihat semua</a> </x-slot:action>
    </x-ui.section-heading>
--}}
@props(['title', 'subtitle' => null, 'eyebrow' => null, 'id' => null])

<div {{ $attributes->class('mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between') }}>
    <div class="border-l-4 border-brand-700 pl-4">
        @if ($eyebrow)
            <p class="mb-1 text-xs font-bold tracking-[0.2em] text-brand-500 uppercase">{{ $eyebrow }}</p>
        @endif
        <h2 @if ($id) id="{{ $id }}" @endif class="text-2xl font-extrabold tracking-tight text-stone-900 sm:text-3xl">
            {{ $title }}
        </h2>
        @if ($subtitle)
            <p class="mt-1 text-sm text-stone-600">{{ $subtitle }}</p>
        @endif
    </div>

    @isset($action)
        <div class="shrink-0">{{ $action }}</div>
    @endisset
</div>
