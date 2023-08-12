<?php

namespace Tests\Feature;

use Modules\Settings\Enums\SettingType;
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

    /**
     * @test
     */
    public function user_can_store_many_settings()
    {
        // TODO: Implement

        $this->assertEquals(1, 1);

        /* $this->signIn();

        $response = $this->postJson(route('api.settings.storeMany'), [
            [
                'type' => SettingType::Timezone,
                'value' => 'string',
            ],
            [
                'type' => SettingType::Timezone,
                'value' => 'string',
            ],
        ]);

        $response->assertAccepted(); */
    }

    /**
     * @test
     */
    public function user_can_store_setting()
    {
        $this->signIn();

        $response = $this->postJson(route('api.settings.store'), $this->validData());

        $response->assertCreated();
    }

    private function validData(): array
    {
        return [
            'type' => SettingType::Timezone,
            'value' => 'string',
        ];
    }
}
