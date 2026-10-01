{{--
    Layout halaman login/daftar (tanpa navbar & footer).
    backdrop: 'login' (gambar penuh) | 'register' (gelombang di bawah)
--}}
@props(['title' => null, 'backdrop' => 'login'])

<!DOCTYPE html>
<html lang="id">
<head>
    <x-site.head :title="$title" />
</head>
<body @class([
        'relative min-h-screen overflow-x-hidden bg-canvas font-sans text-stone-800 antialiased selection:bg-brand-800 selection:text-white',
        'bg-cover bg-center bg-no-repeat' => $backdrop === 'login',
    ])
    @if ($backdrop === 'login') style="background-image: url('{{ asset('images/backgrounds/login.webp') }}')" @endif>

    @if ($backdrop === 'register')
        <div aria-hidden="true" class="pointer-events-none fixed inset-x-0 bottom-0 z-0 h-60 select-none sm:h-72 lg:h-90">
            <img src="{{ asset('images/backgrounds/register.webp') }}" alt="" class="size-full object-cover object-bottom">
        </div>
    @endif

    <div {{ $attributes->class('relative z-10') }}>
        {{ $slot }}
    </div>
</body>
</html>
