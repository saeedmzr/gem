<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserAuthTest extends TestCase
{

    public function test_check_user_can_login()
    {
        $user = User::factory()->create();

        $response = $this->post('api/auth/login', [
            'email' => $user->email,
            'password' => '123456',
        ]);

        $response->assertStatus(200);
    }
    public function test_unauthenticated_user_cannot_login()
    {

    }
}
