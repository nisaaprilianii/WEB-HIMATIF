{{--
    Tombol standar. Jadi <a> bila diberi href, selain itu <button>.
    variant: primary | accent | outline | light | ghost   size: sm | md | lg
--}}
@props([
    'href' => null,
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconRight' => null,
    'type' => 'button',
])

@php
    $variants = [
        'primary' => 'bg-brand-800 text-white shadow-sm hover:bg-brand-900',
        'accent' => 'bg-brand-500 text-white shadow-lg shadow-brand-950/30 hover:bg-brand-600',
        'outline' => 'border border-brand-800 bg-white text-brand-800 hover:bg-brand-50',
        'light' => 'bg-white text-stone-900 shadow-sm hover:bg-stone-100',
        'ghost' => 'border border-white/40 bg-white/5 text-white hover:bg-white/15',
    ];

    $sizes = [
        'sm' => 'gap-1.5 px-3.5 py-1.5 text-xs',
        'md' => 'gap-2 px-5 py-2.5 text-sm',
        'lg' => 'gap-2 px-7 py-3 text-sm sm:text-base',
    ];

    $classes = 'inline-flex items-center justify-center rounded-xl font-semibold transition-colors duration-200 '
        .'focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500 disabled:opacity-60 '
        .$variants[$variant].' '.$sizes[$size];

    $iconSize = $size === 'sm' ? 'size-3.5' : 'size-4';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }}>
        @if ($icon) <x-ui.icon :name="$icon" :class="$iconSize" /> @endif
        <span>{{ $slot }}</span>
        @if ($iconRight) <x-ui.icon :name="$iconRight" :class="$iconSize" /> @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->class($classes) }}>
        @if ($icon) <x-ui.icon :name="$icon" :class="$iconSize" /> @endif
        <span>{{ $slot }}</span>
        @if ($iconRight) <x-ui.icon :name="$iconRight" :class="$iconSize" /> @endif
    </button>
@endif
