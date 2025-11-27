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
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListInvoices::class)
            ->callTableAction('share', $invoice);

        /* assert */
        $component->assertSuccessful();
        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
        ]);
        // Share key should be generated
        $invoice->refresh();
        $this->assertNotNull($invoice->share_key);
    }

    /** @test */
    public function it_can_send_invoice_notification_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-002',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListInvoices::class)
            ->callTableAction('sendNotification', $invoice);

        /* assert */
        $component->assertSuccessful();
    }

    /** @test */
    public function it_can_add_invoice_payment_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-003',
            'total' => 1000.00,
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
        $this->assertDatabaseHas('transactions', [
            'invoice_id' => $invoice->id,
            'amount' => 500.00,
        ]);
    }

    /** @test */
    public function it_can_generate_invoice_pdf_through_table_action(): void
    {
        /* arrange */
        $partner = Partner::factory()->create();
        $invoice = Invoice::factory()->create([
            'partner_id' => $partner->id,
            'number' => 'INV-004',
        ]);

        /* act */
        $component = Livewire::actingAs($this->user)
            ->test(ListInvoices::class)
            ->callTableAction('generatePdf', $invoice);

        /* assert */
        $component->assertSuccessful();
    }
}
