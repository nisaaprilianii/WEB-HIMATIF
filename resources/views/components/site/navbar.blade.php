{{-- Navbar utama. Menu diambil dari config/himatif.php → 'nav'. --}}
@php
    $menus = config('himatif.nav');
    $href = fn (array $item) => route($item['route']).(isset($item['anchor']) ? '#'.$item['anchor'] : '');
@endphp

<nav x-data="{ open: false }" class="relative z-30">
    <x-ui.container class="flex items-center justify-between py-5">
        <x-site.logo />

        {{-- Desktop --}}
        <ul class="hidden items-center gap-8 text-sm md:flex">
            @foreach ($menus as $item)
                @php($isActive = request()->routeIs($item['active']))
                <li @if (isset($item['children'])) class="relative" x-data="{ dropdown: false }" x-on:click.outside="dropdown = false" x-on:keydown.escape="dropdown = false" @endif>
                    @isset($item['children'])
                        <button type="button" x-on:click="dropdown = !dropdown" x-bind:aria-expanded="dropdown"
                                @class(['relative flex items-center gap-1.5 py-1 transition-colors', 'font-semibold text-white' => $isActive, 'font-medium text-white/80 hover:text-white' => ! $isActive])>
                            {{ $item['label'] }}
                            <x-ui.icon name="chevron-down" class="size-4 transition-transform" x-bind:class="dropdown && 'rotate-180'" />
                            @if ($isActive) <span class="absolute inset-x-0 -bottom-1 h-0.5 rounded-full bg-white"></span> @endif
                        </button>
                        <div x-show="dropdown" x-cloak x-transition.opacity.duration.150ms
                             class="absolute left-0 mt-3 w-56 rounded-xl border border-stone-100 bg-white py-2 text-stone-800 shadow-xl">
                            @foreach ($item['children'] as $child)
                                <a href="{{ $href($child) }}" class="block px-4 py-2 transition-colors hover:bg-brand-50 hover:text-brand-800">{{ $child['label'] }}</a>
                            @endforeach
                        </div>
                    @else
                        <a href="{{ $href($item) }}" @if ($isActive) aria-current="page" @endif
                           @class(['relative py-1 transition-colors', 'font-semibold text-white' => $isActive, 'font-medium text-white/80 hover:text-white' => ! $isActive])>
                            {{ $item['label'] }}
                            @if ($isActive) <span class="absolute inset-x-0 -bottom-1 h-0.5 rounded-full bg-white"></span> @endif
                        </a>
                    @endisset
                </li>
            @endforeach
        </ul>

        <div class="hidden items-center gap-3 md:flex">
            @auth
                <span class="text-sm font-medium text-white/90">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-ui.button type="submit" variant="light" size="sm" icon="logout">Keluar</x-ui.button>
                </form>
            @else
                <x-ui.button :href="route('login')" variant="light" size="sm" class="px-6 py-2 text-sm">Masuk</x-ui.button>
            @endauth
        </div>

        {{-- Tombol menu mobile --}}
        <button type="button" x-on:click="open = !open" class="p-2 text-white md:hidden" x-bind:aria-expanded="open" aria-label="Buka menu">
            <x-ui.icon name="menu" class="size-6" x-show="!open" />
            <x-ui.icon name="x" class="size-6" x-show="open" x-cloak />
        </button>
    </x-ui.container>

    {{-- Drawer mobile --}}
    <div x-show="open" x-cloak x-transition class="space-y-1 border-t border-white/10 bg-brand-950/95 px-4 pt-3 pb-6 backdrop-blur md:hidden">
        @foreach ($menus as $item)
            @php($isActive = request()->routeIs($item['active']))
            @foreach ($item['children'] ?? [$item] as $link)
                <a href="{{ $href($link) }}"
                   @class(['block rounded-lg px-3 py-2', 'bg-white/10 font-semibold text-white' => $isActive && $loop->first, 'font-medium text-white/85 hover:bg-white/10' => ! ($isActive && $loop->first)])>
                    {{ isset($item['children']) ? $item['label'].' · '.$link['label'] : $link['label'] }}
                </a>
            @endforeach
        @endforeach
        <div class="pt-3">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-ui.button type="submit" variant="light" class="w-full">Keluar</x-ui.button>
                </form>
            @else
                <x-ui.button :href="route('login')" variant="light" class="w-full">Masuk</x-ui.button>
            @endauth
        </div>
    </div>
</nav>
