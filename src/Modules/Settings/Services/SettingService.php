<?php

namespace Modules\Settings\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

use Modules\Settings\CustomExceptions;
use Modules\Settings\DataTransferObjects\SettingDto;
use Modules\Settings\Interfaces\SettingServiceInterface;
use Modules\Settings\Models\Setting;

class SettingService implements SettingServiceInterface
{
    public function store(User $user, SettingDto $dto): Setting
    {
        if (!$dto->value) {
            throw CustomExceptions::noValueProvided();
        }

        return Setting::updateOrCreate([
            'user_id' => $user->id,
            'type' => $dto->type,
        ], [
            'value' => $dto->value,
        ]);
    }

    public function storeMany(User $user, array $settings): Collection
    {
        $settings = collect($settings)->map(function (SettingDto $dto) use ($user) {
            return $this->store($user, $dto);
        });

        return $settings;
    }
}
