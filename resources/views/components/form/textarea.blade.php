@props(['name', 'label' => null, 'required' => false, 'rows' => 6])

<x-form.field :name="$name" :label="$label" :required="$required">
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" @required($required) @if ($errors->has($name)) aria-invalid="true" @endif
              {{ $attributes->class(['form-control', 'resize-y']) }}>{{ old($name) }}</textarea>
</x-form.field>
