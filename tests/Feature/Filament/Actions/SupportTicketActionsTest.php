<?php

namespace Tests\Feature\Filament\Actions;

use App\Filament\Resources\SupportTickets\Pages\ListSupportTickets;
use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SupportTicketActionsTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_share_ticket_through_table_action(): void
    {
        /* arrange */
        $ticket = SupportTicket::factory()->create([
            'number' => 'TKT-001',
            'user_id' => $this->user->id,
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListSupportTickets::class)
            ->callTableAction('share', $ticket);

        /* assert */
        $component->assertSuccessful();
        $this->assertDatabaseHas('support_tickets', [
            'id' => $ticket->id,
        ]);
        // Share key should be generated
        $ticket->refresh();
        $this->assertNotNull($ticket->share_key);
    }
}
