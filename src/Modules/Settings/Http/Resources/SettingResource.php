<?php

namespace Modules\Settings\Http\Resources;

use Illuminate\Http\Request;
use Modules\CustomResource;
use Modules\Settings\Models\Setting;

class SettingResource extends CustomResource
{
    /**
     * Transform the resource into an array.
     *
     * @property Setting $resource
     *
     * @return array<string, mixed>
     */
    public function data(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'type' => $this->resource->type,
            'value' => $this->resource->value,
        ];
    }
}
