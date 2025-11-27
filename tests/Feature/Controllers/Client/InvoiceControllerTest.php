<?php

namespace Tests\Feature\Controllers\Client;

use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_invoice_with_key()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->getJson("/api/client/invoice?key={$invoice->share_key}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_returns_404_for_invalid_key()
    {
        $response = $this->getJson('/api/client/invoice?key=invalid-key');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_can_initiate_stripe_payment()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->postJson('/api/online-payment/invoice/stripe', [
            'key' => $invoice->share_key,
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_initiate_paypal_payment()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->postJson('/api/online-payment/invoice/paypal', [
            'key' => $invoice->share_key,
        ]);

        $response->assertStatus(200);
    }
}
