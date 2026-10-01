{{-- Isi <head> bersama untuk semua layout. --}}
@props(['title' => null, 'description' => null])

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $title ? $title.' — '.config('himatif.name') : config('himatif.name').' — '.config('himatif.full_name').' '.config('himatif.campus') }}</title>
<meta name="description" content="{{ $description ?? config('himatif.description') }}">
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
@fonts
@vite(['resources/css/app.css', 'resources/js/app.js'])
