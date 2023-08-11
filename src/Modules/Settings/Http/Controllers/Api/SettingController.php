<?php

namespace Modules\Settings\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Settings\DataTransferObjects\SettingDto;
use Modules\Settings\Http\Requests\SettingsStoreRequest;
use Modules\Settings\Http\Resources\SettingResource;
use Modules\Settings\Interfaces\SettingServiceInterface;

class SettingController extends Controller
{

    public function __construct(
        private SettingServiceInterface $settingService
    ) {
    }

    public function __invoke(SettingsStoreRequest $request): SettingResource
    {
        $setting = $this->settingService->store(
            $request->user(),
            SettingDto::fromRequest(
                request: $request
            )
        );

        return SettingResource::make($setting);
    }
}
