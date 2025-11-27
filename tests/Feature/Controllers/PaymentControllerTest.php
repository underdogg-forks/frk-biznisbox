<?php

namespace Tests\Feature\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_payments()
    {
        Payment::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/payments');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_payment()
    {
        $payment = Payment::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/payments/{$payment->id}");

        $response->assertStatus(200);
    }
}
