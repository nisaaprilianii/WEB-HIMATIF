{{--
    Kartu pengurus. $person: name (boleh null), role, photo (boleh null)
    size: lg (Top Man) | sm (anggota divisi)
--}}
@props(['person', 'size' => 'lg'])

@php($name = $person['name'] ?? null)

@if ($size === 'lg')
    <div {{ $attributes->class('flex flex-col items-center rounded-2xl border border-stone-200 bg-white p-4 text-center shadow-sm') }}>
        <div class="mb-4 flex aspect-[4/3] w-full items-center justify-center overflow-hidden rounded-xl bg-stone-100 text-stone-400">
            @if (! empty($person['photo']))
                <img src="{{ asset($person['photo']) }}" alt="{{ $name }}" class="size-full object-cover" loading="lazy">
            @else
                <x-ui.icon name="user" class="size-12" />
            @endif
        </div>
        <h3 @class(['mb-2 text-sm font-bold sm:text-base', 'text-stone-900' => $name, 'text-stone-400 italic' => ! $name])>
            {{ $name ?? 'Belum ditentukan' }}
        </h3>
        <x-ui.badge class="mt-auto">{{ $person['role'] }}</x-ui.badge>
    </div>
@else
    <div {{ $attributes->class('flex flex-col items-center gap-2 text-center') }}>
        <div class="flex size-16 items-center justify-center overflow-hidden rounded-full border border-stone-200 bg-stone-100 text-stone-400">
            @if (! empty($person['photo']))
                <img src="{{ asset($person['photo']) }}" alt="{{ $name }}" class="size-full object-cover" loading="lazy">
            @else
                <x-ui.icon name="user" class="size-7" />
            @endif
        </div>
        <p class="text-xs leading-tight font-bold text-stone-900">{{ $name }}</p>
        <x-ui.badge>{{ $person['role'] }}</x-ui.badge>
    </div>
@endif
