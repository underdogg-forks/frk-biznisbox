<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_users()
    {
        User::factory()->count(3)->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/users');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson("/api/admin/users/{$user->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_user()
    {
        $userData = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ];

        $response = $this->actingAs($this->admin, 'api')
            ->postJson('/api/admin/users', $userData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_user()
    {
        $user = User::factory()->create();
        $updateData = ['first_name' => 'Updated'];

        $response = $this->actingAs($this->admin, 'api')
            ->putJson("/api/admin/users/{$user->id}", $updateData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->deleteJson("/api/admin/users/{$user->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_reset_user_password()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->putJson("/api/admin/users/{$user->id}/reset-password", [
                'password' => 'newpassword123',
            ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_disable_2fa()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->postJson("/api/admin/users/{$user->id}/disable-2fa");

        $response->assertStatus(200);
    }
}
