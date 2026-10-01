{{-- Select. $options: [value => label]. --}}
@props(['name', 'label' => null, 'options' => [], 'placeholder' => null, 'required' => false])

<x-form.field :name="$name" :label="$label" :required="$required">
    <div class="relative">
        <select id="{{ $name }}" name="{{ $name }}" @required($required) @if ($errors->has($name)) aria-invalid="true" @endif
                {{ $attributes->class(['form-control', 'appearance-none pr-10']) }}>
            @if ($placeholder)
                <option value="" disabled @selected(old($name) === null)>{{ $placeholder }}</option>
            @endif
            @foreach ($options as $value => $text)
                <option value="{{ $value }}" @selected((string) old($name) === (string) $value)>{{ $text }}</option>
            @endforeach
        </select>
        <x-ui.icon name="chevron-down" class="pointer-events-none absolute top-1/2 right-3.5 size-4 -translate-y-1/2 text-stone-500" />
    </div>
</x-form.field>
