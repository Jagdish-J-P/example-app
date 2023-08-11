<?php

namespace Modules\Settings\Models;

use Database\Factories\SettingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CustomModel;
use Modules\Settings\Builders\SettingQueryBuilder;
use Modules\Settings\Enums\SettingType;

class Setting extends CustomModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'value',
    ];

    protected $casts = [
        'type' => SettingType::class,
    ];

    public function newEloquentBuilder($query): SettingQueryBuilder
    {
        return new SettingQueryBuilder($query);
    }

    public static function newFactory(): SettingFactory
    {
        return SettingFactory::new();
    }

}
