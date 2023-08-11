<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Settings\Enums\SettingType;
use Modules\Settings\Models\Setting;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Setting>
 */
class SettingFactory extends Factory
{
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => User::factory(),
            'type' => fake()->randomElement(SettingType::cases()),
            'value' => fake()->word,
        ];
    }
}
