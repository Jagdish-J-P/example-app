<?php

namespace Modules\Settings\Builders;

use Illuminate\Database\Eloquent\Builder;

class SettingQueryBuilder extends Builder
{
    public function forUser($user): self
    {
        return $this->where('user_id', $user->id);
    }
}
