<?php

namespace Modules;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class CustomResource extends JsonResource
{
    /**
     * @param mixed $resource
     * @return JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        return (new CustomResourceResponse($this))
            ->toResponse($request);
    }

    public function toArray(Request $request)
    {
        if (is_null($this->resource)) {
            return [];
        }

        return $this->data($request);
    }

    abstract function data(Request $request): array;
}
