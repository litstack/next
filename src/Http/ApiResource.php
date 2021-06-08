<?php

namespace Ignite\Http;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class ApiResource extends JsonResource
{
    /**
     * Get index items.
     *
     * @param Request $request
     * @param array   $filters
     * @param array   $searchKeys
     * @param string  $index
     *
     * @return ResourceCollection
     */
    public static function items(
        Request $request,
        array $filters = [],
        array $searchKeys = [],
        $index = Index::class
    ): ResourceCollection
    {
        $items = (new $index($filters, $searchKeys))
            ->items($request, static::query());

        return static::collection($items);
    }
}
