<?php

namespace Modules\Settings\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Modules\Settings\DataTransferObjects\SettingDto;
use Modules\Settings\Models\Setting;

interface SettingServiceInterface
{
    public function store(User $user, SettingDto $dto): Setting;
    
    /**
     * @param User $user
     * @param SettingDto[] $settings
     */
    public function storeMany(User $user, array $settings): Collection;
}
