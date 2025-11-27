<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\User;
use App\Models\WebhookSubscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WebhookSubscriptionControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_webhook_subscriptions()
    {
        WebhookSubscription::factory()->count(3)->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/webhook_subscriptions');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_webhook_subscription()
    {
        $webhook = WebhookSubscription::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson("/api/admin/webhook_subscriptions/{$webhook->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_webhook_subscription()
    {
        $webhookData = WebhookSubscription::factory()->make()->toArray();

        $response = $this->actingAs($this->admin, 'api')
            ->postJson('/api/admin/webhook_subscriptions', $webhookData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_webhook_subscription()
    {
        $webhook = WebhookSubscription::factory()->create();
        $updateData = ['name' => 'Updated Webhook'];

        $response = $this->actingAs($this->admin, 'api')
            ->putJson("/api/admin/webhook_subscriptions/{$webhook->id}", $updateData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_webhook_subscription()
    {
        $webhook = WebhookSubscription::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->deleteJson("/api/admin/webhook_subscriptions/{$webhook->id}");

        $response->assertStatus(200);
    }
}
