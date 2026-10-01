{{--
    Tombol filter berbentuk pill.
    - Filter server (link):  <x-ui.pill :href="..." :active="true">Semua</x-ui.pill>
    - Filter Alpine (tanpa reload): <x-ui.pill alpine-active="dept === 'PI'" x-on:click="dept = 'PI'">PI</x-ui.pill>
--}}
@props(['href' => null, 'active' => false, 'alpineActive' => null])

@php
    $base = 'inline-flex shrink-0 items-center rounded-full border px-5 py-2 text-xs font-semibold whitespace-nowrap transition-colors sm:text-sm';
    $idle = 'border-stone-300 bg-white text-stone-700 hover:border-brand-800 hover:text-brand-800';
    $on = 'border-brand-800 bg-brand-800 text-white shadow-sm';
@endphp

@if ($href)
    <a href="{{ $href }}" @if ($active) aria-current="true" @endif {{ $attributes->class([$base, $active ? $on : $idle]) }}>{{ $slot }}</a>
@else
    {{-- State awal dirender server (`active`), lalu Alpine menukar kelasnya. --}}
    <button type="button" {{ $attributes->class([$base, $active ? $on : $idle]) }}
            @if ($alpineActive) x-bind:class="{ @js($on): {{ $alpineActive }}, @js($idle): !({{ $alpineActive }}) }" @endif>{{ $slot }}</button>
@endif
