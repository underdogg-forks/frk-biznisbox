<?php

namespace Tests\Feature\Controllers;

use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupportTicketControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_tickets()
    {
        SupportTicket::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/support-tickets');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_ticket()
    {
        $ticket = SupportTicket::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/support-tickets/{$ticket->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_ticket()
    {
        $ticketData = SupportTicket::factory()->make()->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/support-tickets', $ticketData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_ticket()
    {
        $ticket = SupportTicket::factory()->create();
        $updateData = ['subject' => 'Updated Subject'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/support-tickets/{$ticket->id}", array_merge($ticket->toArray(), $updateData));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_ticket()
    {
        $ticket = SupportTicket::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/support-tickets/{$ticket->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_ticket_number()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/support-ticket/number');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_share_ticket()
    {
        $ticket = SupportTicket::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/support-ticket/share/{$ticket->id}");

        $response->assertStatus(200);
    }
}
