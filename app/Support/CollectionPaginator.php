<?php

namespace App\Support;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Paginasi untuk Collection biasa (selama data masih dummy).
 * Begitu pindah ke Eloquent, ganti dengan ->paginate($perPage)->withQueryString().
 */
class CollectionPaginator
{
    public static function make(Collection $items, Request $request, int $perPage = 6): LengthAwarePaginator
    {
        $page = max(1, (int) $request->query('page', 1));

        return new LengthAwarePaginator(
            $items->forPage($page, $perPage)->values(),
            $items->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()],
        );
    }
}
