<?php

namespace Ignite\Http;

use Illuminate\Http\Resources\Json\JsonResource as LaravelJsonResource;

class JsonResource extends LaravelJsonResource
{
    protected ApiResource $apiResource;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return $this->apiResource->toArray($this->resource);
    }
}
