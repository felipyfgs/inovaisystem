<?php

namespace App\Support\Api;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Shared query option parser for list endpoints.
 *
 * Reads pagination, sorting, and filter inputs from the request and applies
 * them to an Eloquent builder. Concrete controllers declare which sort and
 * filter keys they support to avoid arbitrary client-driven scans.
 */
class QueryOptions
{
    /** Per-page values clamped to a sensible range. */
    public const DEFAULT_PER_PAGE = 25;

    public const MAX_PER_PAGE = 100;

    /**
     * @param  array<string, string>  $sortable  Map of api-facing sort key => column name.
     * @param  array<string, callable(Builder, mixed): void>  $filters  Map of api filter key => closure that
     *                                                                  applies the filter to the builder.
     */
    public static function apply(
        Builder $query,
        Request $request,
        array $sortable = [],
        array $filters = [],
    ): Builder {
        foreach ($filters as $key => $apply) {
            if ($request->filled($key)) {
                $apply($query, $request->input($key));
            }
        }

        $sort = (string) $request->input('sort', '');
        if ($sort !== '') {
            $direction = str_starts_with($sort, '-') ? 'desc' : 'asc';
            $key = ltrim($sort, '-');
            if (isset($sortable[$key])) {
                $query->orderBy($sortable[$key], $direction);
            }
        }

        return $query;
    }

    /**
     * Resolve the desired page size from the request, clamped to MAX_PER_PAGE.
     */
    public static function perPage(Request $request): int
    {
        $raw = (int) $request->input('per_page', self::DEFAULT_PER_PAGE);

        return max(1, min($raw, self::MAX_PER_PAGE));
    }
}
