<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

abstract class CustomTestCase extends TestCase
{
    use LazilyRefreshDatabase;

    protected function signIn($user = null)
    {
        $user = $user ?: User::factory()->create();

        $this->actingAs($user);

        return $user;
    }
}
