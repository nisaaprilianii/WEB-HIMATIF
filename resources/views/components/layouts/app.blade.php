{{--
    Layout halaman publik.
    <x-layouts.app title="Berita">
        <x-slot:hero> <x-site.page-hero title="..." /> </x-slot:hero>
        ...konten...
    </x-layouts.app>
--}}
@props(['title' => null, 'description' => null])

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <x-site.head :title="$title" :description="$description" />
</head>
<body class="min-h-screen bg-canvas font-sans text-stone-800 antialiased selection:bg-brand-800 selection:text-white">
    <header class="relative overflow-hidden bg-brand-900 bg-cover bg-bottom bg-no-repeat text-white"
            style="background-image: url('{{ asset('images/backgrounds/header.webp') }}')">
        <x-site.navbar />
        {{ $hero ?? '' }}
    </header>

    <main {{ $attributes }}>
        {{ $slot }}
    </main>

    <x-site.footer />
</body>
</html>
