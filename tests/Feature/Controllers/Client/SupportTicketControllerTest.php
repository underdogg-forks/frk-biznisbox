<?php

namespace Tests\Feature\Controllers\Client;

use App\Models\SupportTicket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupportTicketControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_ticket_with_key()
    {
        $ticket = SupportTicket::factory()->create();

        $response = $this->getJson("/api/client/support-ticket?key={$ticket->share_key}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_returns_404_for_invalid_key()
    {
        $response = $this->getJson('/api/client/support-ticket?key=invalid-key');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_can_reply_to_ticket()
    {
        $ticket = SupportTicket::factory()->create();

        $response = $this->postJson('/api/client/support-ticket', [
            'key' => $ticket->share_key,
            'message' => 'Test reply message',
        ]);

        $response->assertStatus(200);
    }
}
