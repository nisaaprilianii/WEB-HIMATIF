{{-- Pembungkus label + input + pesan error. Dipakai oleh komponen form lain. --}}
@props(['name', 'label' => null, 'required' => false, 'hint' => null])

<div {{ $attributes->class('space-y-1.5') }}>
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-stone-900">
            {{ $label }} @if ($required) <span class="text-brand-500">*</span> @endif
        </label>
    @endif
    {{ $slot }}
    @if ($hint)
        <p class="text-xs text-stone-500">{{ $hint }}</p>
    @endif
    @error($name)
        <p class="text-xs font-medium text-red-600">{{ $message }}</p>
    @enderror
</div>
