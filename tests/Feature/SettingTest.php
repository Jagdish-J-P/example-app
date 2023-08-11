<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Settings\Enums\SettingType;
use Modules\Settings\Http\Controllers\Api\SettingController;
use Tests\CustomTestCase;

class SettingTest extends CustomTestCase
{
    /**
     * @test
     */
    public function guest_cannot_store_setting()
    {

        $response = $this->postJson(route('api.settings.store'), $this->validData());

        $response->assertUnauthorized();
    }

    private function validData(): array
    {
        return [
            'type' => SettingType::Timezone,
            'value' => 'string',
        ];
    }
}
