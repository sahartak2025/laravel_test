<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testsUsersAreCreatedCorrectly()
    {
        $headers = ['Authorization' => env('API_KEY')];
        $payload = [
            'name' => 'Test Name',
            'surname' => 'Test Surname',
            'email' => 'test@test.com',
            'event_id' => '1',
        ];

        $this->json('POST', '/api/user', $payload, $headers)
            ->assertStatus(201)
            ->assertJson([
                'id' => 1,
                'name' => 'Test Name',
                'surname' => 'Test Surname',
                'email' => 'test@test.com',
                'event_id' => '1']);
    }

    public function testsUsersAreUpdatedCorrectly()
    {
        $headers = ['Authorization' => env('API_KEY')];

        $user = factory(User::class)->create([
            'name' => 'Test Name',
            'surname' => 'Test Surname',
            'email' => 'test@test.com',
            'event_id' => '1'
        ]);

        $payload = [
            'name' => 'Test Name 2',
            'email' => 'test2@test.com',
        ];

        $response = $this->json('PUT', '/api/user/' . $user->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
                'name' => 'Test Name 2',
                'surname' => 'Test Surname',
                'email' => 'test2@test.com',
                'event_id' => '1'
            ]);
    }

    public function testsUsersAreDeletedCorrectly()
    {
        $headers = ['Authorization' => env('API_KEY')];

        $user = factory(User::class)->create([
            'name' => 'Test Name',
            'surname' => 'Test Surname',
            'email' => 'test@test.com',
            'event_id' => '1'
        ]);

        $this->json('DELETE', '/api/user/' . $user->id, [], $headers)
            ->assertStatus(204);
    }

    public function testUsersAreListedCorrectly()
    {
        $headers = ['Authorization' => env('API_KEY')];

        $userData1 = [
            'name' => 'Test Name',
            'surname' => 'Test Surname',
            'email' => 'test@test.com',
            'event_id' => '1'
        ];
        $userData2 = [
            'name' => 'Test Name 2',
            'surname' => 'Test Surname 2',
            'email' => 'test2@test.com',
            'event_id' => '2'
        ];
        factory(User::class)->create($userData1);
        factory(User::class)->create($userData2);

        $this->json('GET', '/api/all-users', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                $userData1,
                $userData2
            ])
            ->assertJsonStructure([
                '*' => ['id', 'name', 'surname', 'email', 'event_id', 'event'],
            ]);
    }
}
