<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_register()
    {
        $this->postJson(route('user.register'), [
            'name' => "Alex",
            'email' => 'alex@gmail.com',
            'password' => 'passe123',
            'password_confirmation' => 'passe123',
        ])
            ->assertCreated();

        $this->assertDatabaseHas('users', ['name' => 'Alex']);
    }
}
