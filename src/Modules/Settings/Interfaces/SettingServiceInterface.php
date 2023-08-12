<?php

namespace Modules\Settings\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\Settings\DataTransferObjects\SettingDto;

interface SettingServiceInterface
{
    public function store(User $user, SettingDto $dto): Model;

    /**
     * @param  SettingDto[]  $settings
     */
    public function storeMany(User $user, array $settings): Collection;
}
