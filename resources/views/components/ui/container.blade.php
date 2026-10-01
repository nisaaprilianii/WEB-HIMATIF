{{-- Pembungkus lebar konten yang sama di seluruh halaman. width: max-w-7xl (default) | max-w-5xl | ... --}}
@props(['width' => 'max-w-7xl'])

<div {{ $attributes->class(['mx-auto w-full px-4 sm:px-6 lg:px-8', $width]) }}>
    {{ $slot }}
</div>
