{{-- Tautan teks dengan panah (Lihat Semua, Baca Selengkapnya, dst). --}}
@props(['href'])

<a href="{{ $href }}" {{ $attributes->class('group inline-flex items-center gap-1.5 text-sm font-bold text-brand-700 transition-colors hover:text-brand-900') }}>
    <span>{{ $slot }}</span>
    <x-ui.icon name="arrow-right" class="size-4 transition-transform group-hover:translate-x-0.5" />
</a>
