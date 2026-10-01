{{-- Paginasi bulat sesuai desain. Tidak tampil bila hanya 1 halaman. --}}
@props(['paginator'])

@if ($paginator->hasPages())
    @php
        $base = 'flex size-10 items-center justify-center rounded-full text-sm font-semibold transition-colors';
    @endphp
    <nav aria-label="Navigasi halaman" class="mt-12 flex items-center justify-center gap-2">
        @if ($paginator->onFirstPage())
            <span class="{{ $base }} border border-stone-200 text-stone-300"><x-ui.icon name="arrow-left" class="size-4" /></span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="{{ $base }} border border-stone-300 text-stone-600 hover:bg-stone-100" aria-label="Halaman sebelumnya"><x-ui.icon name="arrow-left" class="size-4" /></a>
        @endif

        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page === $paginator->currentPage())
                <span class="{{ $base }} bg-brand-800 text-white shadow-sm" aria-current="page">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="{{ $base }} text-stone-700 hover:bg-stone-100">{{ $page }}</a>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="{{ $base }} border border-stone-300 text-stone-600 hover:bg-stone-100" aria-label="Halaman berikutnya"><x-ui.icon name="arrow-right" class="size-4" /></a>
        @else
            <span class="{{ $base }} border border-stone-200 text-stone-300"><x-ui.icon name="arrow-right" class="size-4" /></span>
        @endif
    </nav>
@endif
