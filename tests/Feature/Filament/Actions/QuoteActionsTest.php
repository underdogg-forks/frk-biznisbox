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
            'total' => 3500.00,
            'status' => 'draft',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListQuotes::class)
            ->callTableAction('share', $quote);

        /* assert */
        $component->assertSuccessful();
        $component->assertHasNoActionErrors();
        $component->assertNotified();
        
        // Verify quote is still in database
        $this->assertDatabaseHas('quotes', [
            'id' => $quote->id,
            'number' => 'QTE-001',
        ]);
        
        // Share key should be generated
        $quote->refresh();
        $this->assertNotNull($quote->share_key);
        $this->assertIsString($quote->share_key);
        $this->assertGreaterThan(20, strlen($quote->share_key));
    }

    /** @test */
    public function it_can_send_quote_notification_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'number' => 'QTE-002',
            'status' => 'draft',
        ]);
        
        // Create a primary contact to receive notification
        \App\Models\PartnerContact::factory()->create([
            'partner_id' => $partner->id,
            'email' => 'customer@example.com',
            'is_primary' => true,
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListQuotes::class)
            ->callTableAction('sendNotification', $quote);

        /* assert */
        $component->assertSuccessful();
        $component->assertHasNoActionErrors();
        $component->assertNotified();
        
        // Verify quote status may have changed to 'sent'
        $quote->refresh();
        $this->assertContains($quote->status, ['draft', 'sent']);
    }

    /** @test */
    public function it_can_convert_quote_to_invoice_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $quote = Quote::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'number' => 'QTE-003',
            'status' => 'sent',
            'total' => 5000.00,
            'currency' => 'USD',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListQuotes::class)
            ->callTableAction('convertToInvoice', $quote);

        /* assert */
        $component->assertSuccessful();
        $component->assertHasNoActionErrors();
        $component->assertNotified();
        
        // An invoice should be created from the quote
        $this->assertDatabaseHas('invoices', [
            'customer_id' => $quote->customer_id,
        ]);
        
        // Verify the created invoice has matching details
        $invoice = \App\Models\Invoice::where('customer_id', $quote->customer_id)->latest()->first();
        $this->assertNotNull($invoice);
        $this->assertEquals($quote->total, $invoice->total);
        $this->assertEquals($quote->currency, $invoice->currency);
    }
}
