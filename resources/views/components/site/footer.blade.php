@php($menus = collect(config('himatif.nav')))

<footer class="bg-brand-900 bg-cover bg-bottom bg-no-repeat pt-16 pb-8 text-white"
        style="background-image: url('{{ asset('images/backgrounds/footer.webp') }}')">
    <x-ui.container>
        <div class="grid grid-cols-1 gap-10 border-b border-white/10 pb-12 md:grid-cols-12">
            <div class="space-y-4 md:col-span-5">
                <x-site.logo size="lg" />
                <div class="space-y-1 text-sm leading-relaxed text-white/80">
                    <p class="font-medium text-white">{{ config('himatif.full_name') }}</p>
                    <p>{{ config('himatif.campus') }}</p>
                    <p class="pt-1 text-xs text-white/60">{{ config('himatif.tagline') }}</p>
                </div>
            </div>

            <div class="md:col-span-4">
                <h3 class="mb-4 text-base font-bold tracking-wide">Menu</h3>
                <ul class="grid grid-flow-col grid-cols-2 grid-rows-3 gap-x-8 gap-y-2.5 text-sm">
                    @foreach ($menus as $item)
                        @php($route = $item['route'] ?? $item['children'][0]['route'])
                        <li><a href="{{ route($route) }}" class="text-white/75 transition-colors hover:text-white">{{ $item['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="flex md:col-span-3 md:justify-end">
                <div class="w-full rounded-2xl border border-white/10 bg-black/25 p-5 backdrop-blur-sm sm:w-auto sm:min-w-52">
                    <h3 class="mb-3.5 text-sm font-semibold">Ikuti Kami</h3>
                    <div class="flex items-center gap-3">
                        @foreach (config('himatif.socials') as $social)
                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                               class="flex size-10 items-center justify-center rounded-xl bg-white/10 transition-colors hover:bg-brand-500"
                               aria-label="{{ $social['name'] }} HIMATIF">
                                <x-ui.icon :name="$social['icon']" class="size-5" />
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center justify-between gap-4 pt-6 text-center text-xs text-white/70 md:flex-row md:text-left">
            <p>&copy; {{ date('Y') }} {{ config('himatif.name') }} {{ config('himatif.campus') }}.</p>
            <p class="flex items-center gap-1.5">
                <x-ui.icon name="map-pin" class="size-4 text-brand-300" />
                <span>{{ config('himatif.address') }}</span>
            </p>
        </div>
    </x-ui.container>
</footer>
