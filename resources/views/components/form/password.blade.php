{{-- Input password dengan tombol tampil/sembunyi. --}}
@props(['name', 'label' => null, 'required' => false])

<x-form.field :name="$name" :label="$label" :required="$required">
    <div class="relative" x-data="{ show: false }">
        <input x-bind:type="show ? 'text' : 'password'" type="password" id="{{ $name }}" name="{{ $name }}"
               @required($required) @if ($errors->has($name)) aria-invalid="true" @endif
               {{ $attributes->class(['form-control', 'pr-11']) }}>
        <button type="button" x-on:click="show = !show" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-stone-400 hover:text-stone-600"
                x-bind:aria-label="show ? 'Sembunyikan password' : 'Tampilkan password'">
            <x-ui.icon name="eye" class="size-5" x-show="!show" />
            <x-ui.icon name="eye-off" class="size-5" x-show="show" x-cloak />
        </button>
    </div>
</x-form.field>
