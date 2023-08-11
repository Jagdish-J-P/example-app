<?php

namespace Modules\Settings\Http\Resources;

use Illuminate\Http\Request;
use Modules\CustomResource;

/**
 * @property Setting $resource
 */
class SettingResource extends CustomResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function data(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'value' => $this->value,
        ];
    }
}
