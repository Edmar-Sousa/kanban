<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\HasFaker;

class UserLoginTest extends TestCase
{
    use HasFaker;


    public function test_sucessfully_login(): void
    {
        $userFactory = User::factory()->create();

        $userData = [
            'email' => $userFactory->email,
            'password' => '12345678',
        ];

        $response = $this->post(route('login'), $userData);

        $response->assertStatus(302);
        $response->assertRedirect(route('taskboard.index'));
    }


    public function test_login_email_not_exists()
    {
        $userData = [
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
        ];

        $response = $this->post(route('login'), $userData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email']);
    }
}
