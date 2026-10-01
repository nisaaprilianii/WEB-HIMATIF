{{--
    Meneruskan query string yang sedang aktif sebagai hidden input pada form GET,
    supaya filter lain (mis. ?demo=1) tidak hilang saat form dikirim.
--}}
@props(['except' => []])

@foreach (request()->except(array_merge($except, ['page'])) as $key => $value)
    @if (is_scalar($value))
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endif
@endforeach
