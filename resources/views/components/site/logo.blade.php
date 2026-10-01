{{-- Logo + nama HIMATIF. tone: light (di atas latar merah) | brand (di atas latar terang) --}}
@props(['tone' => 'light', 'size' => 'md'])

<a href="{{ route('home') }}" {{ $attributes->class('group inline-flex items-center gap-3') }}>
    <img src="{{ asset('images/brand/logo.png') }}" alt="Logo HIMATIF" width="256" height="256"
         @class(['object-contain transition-transform duration-200 group-hover:scale-105', 'size-11' => $size === 'md', 'size-12' => $size === 'lg'])>
    <span @class([
        'font-extrabold tracking-wide',
        'text-xl' => $size === 'md',
        'text-2xl' => $size === 'lg',
        'text-white' => $tone === 'light',
        'text-brand-800' => $tone === 'brand',
    ])>{{ config('himatif.name') }}</span>
</a>
