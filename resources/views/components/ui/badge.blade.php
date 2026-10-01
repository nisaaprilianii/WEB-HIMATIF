{{-- Label kecil. variant: solid (merah) | soft (merah muda) | neutral --}}
@props(['variant' => 'soft'])

<span {{ $attributes->class([
    'inline-flex items-center rounded-md px-2.5 py-0.5 text-[11px] font-bold tracking-wide',
    'bg-brand-500 text-white uppercase' => $variant === 'solid',
    'bg-brand-100 text-brand-800' => $variant === 'soft',
    'bg-stone-100 text-stone-600' => $variant === 'neutral',
]) }}>{{ $slot }}</span>
