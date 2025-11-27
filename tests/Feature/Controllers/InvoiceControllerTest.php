<?php

namespace Tests\Feature\Controllers;

use App\Models\Invoice;
use App\Models\User;
use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_invoices()
    {
        Invoice::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/invoices');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_invoice()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/invoices/{$invoice->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_invoice()
    {
        $partner = Partner::factory()->create();
        $invoiceData = Invoice::factory()->make(['partner_id' => $partner->id])->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/invoices', $invoiceData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_invoice()
    {
        $invoice = Invoice::factory()->create();
        $updateData = ['notes' => 'Updated notes'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/invoices/{$invoice->id}", array_merge($invoice->toArray(), $updateData));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_invoice()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/invoices/{$invoice->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_invoice_number()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/invoice/number');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_share_invoice()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/invoice/{$invoice->id}/share/");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_send_invoice_notification()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->postJson("/api/invoice/{$invoice->id}/send");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_add_invoice_payment()
    {
        $invoice = Invoice::factory()->create();
        $paymentData = [
            'amount' => 100.00,
            'payment_method' => 'bank_transfer',
            'date' => now()->format('Y-m-d'),
        ];

        $response = $this->actingAs($this->user, 'api')
            ->postJson("/api/invoice/{$invoice->id}/payment", $paymentData);

        $response->assertStatus(200);
    }
}
