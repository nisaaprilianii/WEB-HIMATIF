{{--
    Kartu berita / program kerja.
    $item: title, date, image, excerpt, category (opsional)
--}}
@props(['item', 'href' => '#', 'linkLabel' => 'Baca Selengkapnya'])

<article {{ $attributes->class('group flex flex-col overflow-hidden rounded-2xl border border-stone-200 bg-white shadow-sm transition-shadow duration-300 hover:shadow-lg') }}>
    <div class="aspect-[16/9] overflow-hidden bg-stone-100">
        <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" loading="lazy"
             class="size-full object-cover transition-transform duration-500 group-hover:scale-105">
    </div>

    <div class="flex flex-1 flex-col p-5 sm:p-6">
        <div class="mb-3 flex flex-wrap items-center gap-x-3 gap-y-2 text-xs font-semibold text-stone-600">
            @if (! empty($item['category']))
                <x-ui.badge variant="solid">{{ $item['category'] }}</x-ui.badge>
            @endif
            <span class="inline-flex items-center gap-1.5">
                <x-ui.icon name="calendar" class="size-4 text-brand-700" />
                {{ $item['date'] }}
            </span>
        </div>

        <h3 class="mb-2 line-clamp-2 text-lg leading-snug font-bold text-stone-900 transition-colors group-hover:text-brand-800">
            {{ $item['title'] }}
        </h3>

        <p class="mb-5 line-clamp-3 flex-1 text-sm leading-relaxed text-stone-600">{{ $item['excerpt'] }}</p>

        <x-ui.link-arrow :href="$href" class="mt-auto">{{ $linkLabel }}</x-ui.link-arrow>
    </div>
</article>
