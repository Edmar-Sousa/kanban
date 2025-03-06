<?php

namespace Tests\Feature;

use App\Jobs\CreateCustomerAssas;
use App\Jobs\UploadImageJob;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        Queue::fake();
    }

    private function createFakerUser(): array
    {
        $image = UploadedFile::fake()->image('avatar.jpg', 200, 200);

        $faker = Faker::create('pt_BR');
        return [
            'username' => $faker->userName(),
            'email' => $faker->unique()->safeEmail(),
            'password' => $faker->password(),
            'document' => $faker->cpf(),
            'phone' => $faker->cellphoneNumber(),
            'image' => $image,
        ];
    }

    public function test_register_user(): void
    {
        $user = $this->createFakerUser();
        $response = $this->post(route('register.create'), $user);

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    public function test_register_user_has_free_plan(): void
    {
        $user = $this->createFakerUser();

        $response = $this->post(route('register.create'), $user);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'email' => $user['email'],
        ]);
    }

    public function test_register_user_check_jobs(): void
    {
        $user = $this->createFakerUser();
        $response = $this->post(route('register.create'), $user);

        Queue::assertPushed(UploadImageJob::class);
        Queue::assertPushed(CreateCustomerAssas::class);
    }
}
