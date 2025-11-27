<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_profile()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/profile');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_profile()
    {
        $profileData = [
            'first_name' => 'Updated',
            'last_name' => 'Name',
        ];

        $response = $this->actingAs($this->user, 'api')
            ->putJson('/api/profile', $profileData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_password()
    {
        $passwordData = [
            'current_password' => 'password',
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ];

        $response = $this->actingAs($this->user, 'api')
            ->putJson('/api/profile/password', $passwordData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_change_theme()
    {
        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/profile/theme', [
                'theme' => 'dark',
            ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_setup_2fa()
    {
        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/profile/2fa');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_enable_2fa()
    {
        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/profile/2fa/verify', [
                'code' => '123456',
            ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_disable_2fa()
    {
        $response = $this->actingAs($this->user, 'api')
            ->deleteJson('/api/profile/2fa');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_notifications()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/notifications');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_mark_notification_as_read()
    {
        $notificationId = 'test-notification-id';

        $response = $this->actingAs($this->user, 'api')
            ->postJson("/api/notifications/{$notificationId}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_notification()
    {
        $notificationId = 'test-notification-id';

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/notifications/{$notificationId}");

        $response->assertStatus(200);
    }
}
