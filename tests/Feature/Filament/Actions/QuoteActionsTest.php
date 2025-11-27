<?php

namespace Tests\Feature\Filament\Actions;

use App\Filament\Resources\Quotes\Pages\ListQuotes;
use App\Models\Quote;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class QuoteActionsTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_share_quote_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'QTE-001',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListQuotes::class)
            ->callTableAction('share', $quote);

        /* assert */
        $component->assertSuccessful();
        $this->assertDatabaseHas('quotes', [
            'id' => $quote->id,
        ]);
        // Share key should be generated
        $quote->refresh();
        $this->assertNotNull($quote->share_key);
    }

    /** @test */
    public function it_can_send_quote_notification_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'QTE-002',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListQuotes::class)
            ->callTableAction('sendNotification', $quote);

        /* assert */
        $component->assertSuccessful();
    }

    /** @test */
    public function it_can_convert_quote_to_invoice_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'QTE-003',
            'status' => 'sent',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListQuotes::class)
            ->callTableAction('convertToInvoice', $quote);

        /* assert */
        $component->assertSuccessful();
        // An invoice should be created from the quote
        $this->assertDatabaseHas('invoices', [
            'customer_id' => $quote->customer_id,
        ]);
    }
}
