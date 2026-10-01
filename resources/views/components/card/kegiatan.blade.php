{{-- Kartu kegiatan mendatang. $item: title, date, location, image --}}
@props(['item', 'href' => '#'])

<a href="{{ $href }}" {{ $attributes->class('group flex flex-col overflow-hidden rounded-2xl border border-stone-200 bg-white shadow-sm transition-shadow duration-300 hover:shadow-lg') }}>
    <div class="aspect-[2/1] overflow-hidden bg-stone-100">
        <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" loading="lazy"
             class="size-full object-cover transition-transform duration-500 group-hover:scale-105">
    </div>

    <div class="flex flex-1 flex-col p-5 sm:p-6">
        <div class="space-y-2 text-sm text-stone-600">
            <p class="flex items-center gap-2 font-semibold text-stone-700">
                <x-ui.icon name="calendar" class="size-4 text-brand-700" /> {{ $item['date'] }}
            </p>
            <p class="flex items-center gap-2">
                <x-ui.icon name="map-pin" class="size-4 text-brand-700" /> {{ $item['location'] }}
            </p>
        </div>

        <div class="mt-5 flex items-center justify-between gap-3 border-t border-stone-100 pt-4">
            <h3 class="text-base font-bold text-stone-900 transition-colors group-hover:text-brand-800">{{ $item['title'] }}</h3>
            <span class="flex size-8 shrink-0 items-center justify-center rounded-full border border-stone-200 text-stone-500 transition-colors group-hover:border-brand-800 group-hover:bg-brand-800 group-hover:text-white">
                <x-ui.icon name="arrow-right" class="size-4" />
            </span>
        </div>
    </div>
</a>
