{{-- Hero untuk halaman dalam: judul, subjudul, breadcrumb. --}}
@props(['title', 'subtitle' => null, 'breadcrumb' => null])

<div class="relative z-10 mx-auto max-w-3xl px-4 pt-8 pb-20 text-center sm:px-6 sm:pt-12 sm:pb-28">
    <h1 class="text-3xl font-extrabold tracking-tight text-white drop-shadow-md sm:text-4xl md:text-5xl">{{ $title }}</h1>
    @if ($subtitle)
        <p class="mx-auto mt-3 max-w-xl text-sm leading-relaxed text-white/85 md:text-base">{{ $subtitle }}</p>
    @endif
    <nav aria-label="Breadcrumb" class="mt-4 flex items-center justify-center gap-2 text-sm font-medium text-white/80">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 transition-colors hover:text-white">
            <x-ui.icon name="home" class="size-4" />
            <span>Beranda</span>
        </a>
        <x-ui.icon name="chevron-right" class="size-3.5 text-white/50" />
        <span class="font-semibold text-white" aria-current="page">{{ $breadcrumb ?? $title }}</span>
    </nav>
</div>
