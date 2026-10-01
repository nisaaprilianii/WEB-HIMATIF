{{-- Tampilan saat data kosong. Slot default untuk tombol aksi (opsional). --}}
@props(['icon' => 'document', 'title', 'message' => null, 'compact' => false])

<div {{ $attributes->class([
    'mx-auto rounded-2xl border border-dashed border-stone-300 bg-white text-center',
    'max-w-xl p-10 sm:p-14' => ! $compact,
    'p-8' => $compact,
]) }}>
    <div @class([
        'mx-auto mb-4 flex items-center justify-center rounded-full bg-brand-100 text-brand-800',
        'size-16' => ! $compact,
        'size-12' => $compact,
    ])>
        <x-ui.icon :name="$icon" :class="$compact ? 'size-6' : 'size-8'" />
    </div>
    <h3 @class(['font-bold text-stone-900', 'text-xl' => ! $compact, 'text-base' => $compact])>{{ $title }}</h3>
    @if ($message)
        <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-stone-600">{{ $message }}</p>
    @endif
    @if ($slot->isNotEmpty())
        <div class="mt-6">{{ $slot }}</div>
    @endif
</div>
