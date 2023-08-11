<?php

namespace Modules\Settings\DataTransferObjects;

use Modules\Settings\Enums\SettingType;
use Modules\Settings\Http\Requests\SettingsStoreRequest;

readonly class SettingDto
{
    public function __construct(
        public SettingType $type,
        public string $value,
    ) {
    }

    public static function fromRequest(SettingsStoreRequest $request): self
    {
        return new self(
            type: SettingType::from($request->validated('type')),
            value: $request->validated('value'),
        );
    }
}