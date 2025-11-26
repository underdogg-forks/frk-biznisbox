<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\Currency;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CurrencyControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_currencies()
    {
        Currency::factory()->count(3)->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/currencies');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_currency()
    {
        $currency = Currency::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson("/api/admin/currencies/{$currency->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_currency()
    {
        $currencyData = Currency::factory()->make()->toArray();

        $response = $this->actingAs($this->admin, 'api')
            ->postJson('/api/admin/currencies', $currencyData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_currency()
    {
        $currency = Currency::factory()->create();
        $updateData = ['name' => 'Updated Currency'];

        $response = $this->actingAs($this->admin, 'api')
            ->putJson("/api/admin/currencies/{$currency->id}", $updateData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_currency()
    {
        $currency = Currency::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->deleteJson("/api/admin/currencies/{$currency->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_live_update_currency_rate()
    {
        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/currency/live-update');

        $response->assertStatus(200);
    }
}
