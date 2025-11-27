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
}
