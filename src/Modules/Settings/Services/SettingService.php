<?php

namespace Modules\Settings\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\Settings\CustomExceptions;
use Modules\Settings\DataTransferObjects\SettingDto;
use Modules\Settings\Interfaces\SettingServiceInterface;
use Modules\Settings\Models\Setting;

class SettingService implements SettingServiceInterface
{
    public function store(User $user, SettingDto $dto): Model
    {
        if (! $dto->value) {
            throw CustomExceptions::noValueProvided();
        }

        return Setting::updateOrCreate([
            'user_id' => $user->id,
            'type' => $dto->type,
        ], [
            'value' => $dto->value,
        ]);
    }

    /**
     * @param  SettingDto[]  $settings
     */
    public function storeMany(User $user, array $settings): Collection
    {
        $settings = collect($settings)->map(fn (SettingDto $dto) => $this->store($user, $dto));

        return $settings;
    }
}
