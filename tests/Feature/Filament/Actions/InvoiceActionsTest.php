<?php

namespace Tests\Feature\Filament\Actions;

use App\Filament\Resources\Invoices\Pages\ListInvoices;
use App\Models\Invoice;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class InvoiceActionsTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_share_invoice_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-001',
            'status' => 'draft',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListInvoices::class)
            ->callTableAction('share', $invoice);

        /* assert */
        $component->assertSuccessful();
        $component->assertHasNoActionErrors();
        $component->assertNotified();
        
        // Verify invoice is still in database
        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'number' => 'INV-001',
        ]);
        
        // Share key should be generated
        $invoice->refresh();
        $this->assertNotNull($invoice->share_key);
        $this->assertIsString($invoice->share_key);
        $this->assertGreaterThan(20, strlen($invoice->share_key));
    }

    /** @test */
    public function it_can_send_invoice_notification_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'number' => 'INV-002',
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
            ->test(ListInvoices::class)
            ->callTableAction('sendNotification', $invoice);

        /* assert */
        $component->assertSuccessful();
        $component->assertHasNoActionErrors();
        $component->assertNotified();
        
        // Verify invoice status may have changed to 'sent'
        $invoice->refresh();
        $this->assertContains($invoice->status, ['draft', 'sent']);
    }

    /** @test */
    public function it_can_add_invoice_payment_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'customer_id' => $partner->id,
            'number' => 'INV-003',
            'total' => 1000.00,
            'status' => 'unpaid',
            'currency' => 'USD',
        ]);

        $paymentData = [
            'amount' => 500.00,
            'date' => now()->format('Y-m-d'),
        ];

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListInvoices::class)
            ->callTableAction('addPayment', $invoice, data: $paymentData);

        /* assert */
        $component->assertSuccessful();
        $component->assertHasNoActionErrors();
        $component->assertNotified();
        
        // Verify transaction was created
        $this->assertDatabaseHas('transactions', [
            'invoice_id' => $invoice->id,
            'amount' => 500.00,
            'type' => 'income',
        ]);
        
        // Verify invoice status updated to partial
        $invoice->refresh();
        $this->assertEquals('partial', $invoice->status);
    }

    /** @test */
    public function it_can_generate_invoice_pdf_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-004',
            'total' => 2500.00,
            'currency' => 'EUR',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListInvoices::class)
            ->callTableAction('generatePdf', $invoice);

        /* assert */
        $component->assertSuccessful();
        $component->assertHasNoActionErrors();
        
        // Verify invoice still exists
        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'number' => 'INV-004',
        ]);
    }
}
