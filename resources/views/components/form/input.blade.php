@props(['name', 'label' => null, 'type' => 'text', 'required' => false, 'hint' => null])

<x-form.field :name="$name" :label="$label" :required="$required" :hint="$hint">
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
           @if ($type !== 'password' && $type !== 'file') value="{{ old($name) }}" @endif
           @required($required) @if ($errors->has($name)) aria-invalid="true" @endif
           {{ $attributes->class('form-control') }}>
</x-form.field>
