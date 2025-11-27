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
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $result);
        // Verify all returned items are SupportTicket instances
        $result->each(function ($ticket) {
            $this->assertInstanceOf(SupportTicket::class, $ticket);
        });
    }

    /** @test */
    public function it_can_get_single_ticket(): void
    {
        /* arrange */
        $ticket = SupportTicket::factory()->create([
            'user_id' => $this->user->id,
            'number' => 'TKT-123',
            'subject' => 'Test Issue',
            'status' => 'open',
        ]);

        /* act */
        $result = $this->ticketService->getTicket($ticket->id);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(SupportTicket::class, $result);
        $this->assertEquals('TKT-123', $result->number);
        $this->assertEquals('Test Issue', $result->subject);
        $this->assertEquals('open', $result->status);
        $this->assertEquals($ticket->id, $result->id);
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
            'description' => 'This is a test ticket description',
        ];

        /* act */
        $result = $this->ticketService->createTicket($ticketData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(SupportTicket::class, $result);
        $this->assertDatabaseHas('support_tickets', [
            'number' => 'TKT-NEW-001',
            'subject' => 'Test Support Ticket',
            'status' => 'open',
            'priority' => 'medium',
        ]);
        // Verify the returned object matches what was created
        $this->assertEquals('TKT-NEW-001', $result->number);
        $this->assertEquals('Test Support Ticket', $result->subject);
        $this->assertNotNull($result->id);
    }

    /** @test */
    public function it_can_update_ticket(): void
    {
        /* arrange */
        $ticket = SupportTicket::factory()->create([
            'user_id' => $this->user->id,
            'status' => 'open',
            'priority' => 'low',
            'notes' => 'Original notes',
        ]);

        $updateData = [
            'status' => 'closed',
            'notes' => 'Resolved the issue',
            'priority' => 'high',
        ];

        /* act */
        $result = $this->ticketService->updateSupportTicket($ticket->id, $updateData);

        /* assert */
        $this->assertNotNull($result);
        $this->assertInstanceOf(SupportTicket::class, $result);
        $ticket->refresh();
        $this->assertEquals('closed', $ticket->status);
        $this->assertEquals('Resolved the issue', $ticket->notes);
        $this->assertEquals('high', $ticket->priority);
        // ID should remain the same
        $this->assertEquals($ticket->id, $result->id);
    }

    /** @test */
    public function it_can_delete_ticket(): void
    {
        /* arrange */
        $ticket = SupportTicket::factory()->create([
            'user_id' => $this->user->id,
            'number' => 'TKT-DELETE-001',
        ]);
        $ticketId = $ticket->id;

        /* act */
        $result = $this->ticketService->deleteSupportTicket($ticket->id);

        /* assert */
        $this->assertNotFalse($result);
        $this->assertSoftDeleted('support_tickets', [
            'id' => $ticketId,
        ]);
        // Verify the ticket can't be found with standard queries
        $this->assertNull(SupportTicket::find($ticketId));
        // But exists with trashed
        $this->assertNotNull(SupportTicket::withTrashed()->find($ticketId));
    }

    /** @test */
    public function it_can_get_ticket_number(): void
    {
        /* act */
        $result = $this->ticketService->getTicketNumber();

        /* assert */
        $this->assertNotNull($result);
        $this->assertIsString($result);
        // Should follow a pattern (e.g., TKT-XXXX or similar)
        $this->assertMatchesRegularExpression('/[A-Z0-9-]+/', $result);
    }
}
