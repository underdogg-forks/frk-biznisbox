<?php

namespace Tests\Unit\Services;

use App\Models\SupportTicket;
use App\Models\User;
use App\Services\SupportTicketService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupportTicketServiceTest extends TestCase
{
    use RefreshDatabase;

    protected SupportTicketService $ticketService;
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->ticketService = new SupportTicketService();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_share_ticket(): void
    {
        /* arrange */
        $ticket = SupportTicket::factory()->create([
            'user_id' => $this->user->id,
        ]);

        /* act */
        $result = $this->ticketService->shareTicket($ticket->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertArrayHasKey('share_key', $result);
        $ticket->refresh();
        $this->assertNotNull($ticket->share_key);
    }

    /** @test */
    public function it_returns_false_when_sharing_non_existent_ticket(): void
    {
        /* act */
        $result = $this->ticketService->shareTicket(99999);

        /* assert */
        $this->assertFalse($result);
    }

    /** @test */
    public function it_can_get_all_tickets(): void
    {
        /* arrange */
        SupportTicket::factory()->count(5)->create([
            'user_id' => $this->user->id,
        ]);

        /* act */
        $result = $this->ticketService->getTickets();

        /* assert */
        $this->assertNotNull($result);
        $this->assertCount(5, $result);
    }

    /** @test */
    public function it_can_get_single_ticket(): void
    {
        /* arrange */
        $ticket = SupportTicket::factory()->create([
            'user_id' => $this->user->id,
            'number' => 'TKT-123',
        ]);

        /* act */
        $result = $this->ticketService->getTicket($ticket->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertEquals('TKT-123', $result->number);
    }

    /** @test */
    public function it_returns_false_when_getting_non_existent_ticket(): void
    {
        /* act */
        $result = $this->ticketService->getTicket(99999);

        /* assert */
        $this->assertFalse($result);
    }

    /** @test */
    public function it_can_create_ticket(): void
    {
        /* arrange */
        $ticketData = [
            'user_id' => $this->user->id,
            'number' => 'TKT-NEW-001',
            'subject' => 'Test Support Ticket',
            'status' => 'open',
            'priority' => 'medium',
        ];

        /* act */
        $result = $this->ticketService->createTicket($ticketData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertDatabaseHas('support_tickets', [
            'number' => 'TKT-NEW-001',
            'subject' => 'Test Support Ticket',
        ]);
    }

    /** @test */
    public function it_can_update_ticket(): void
    {
        /* arrange */
        $ticket = SupportTicket::factory()->create([
            'user_id' => $this->user->id,
            'status' => 'open',
        ]);

        $updateData = [
            'status' => 'closed',
            'notes' => 'Resolved the issue',
        ];

        /* act */
        $result = $this->ticketService->updateSupportTicket($ticket->id, $updateData);

        /* assert */
        $this->assertNotNull($result);
        $ticket->refresh();
        $this->assertEquals('closed', $ticket->status);
        $this->assertEquals('Resolved the issue', $ticket->notes);
    }

    /** @test */
    public function it_can_delete_ticket(): void
    {
        /* arrange */
        $ticket = SupportTicket::factory()->create([
            'user_id' => $this->user->id,
        ]);

        /* act */
        $result = $this->ticketService->deleteSupportTicket($ticket->id);

        /* assert */
        $this->assertNotFalse($result);
        $this->assertSoftDeleted('support_tickets', [
            'id' => $ticket->id,
        ]);
    }

    /** @test */
    public function it_can_get_ticket_number(): void
    {
        /* act */
        $result = $this->ticketService->getTicketNumber();

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
    }
}
