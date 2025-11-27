<?php

namespace Tests\Feature\Controllers;

use App\Models\Quote;
use App\Models\User;
use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuoteControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_quotes()
    {
        Quote::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/quotes');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_quote()
    {
        $quote = Quote::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/quotes/{$quote->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_quote()
    {
        $partner = Partner::factory()->create();
        $quoteData = Quote::factory()->make(['partner_id' => $partner->id])->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/quotes', $quoteData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_quote()
    {
        $quote = Quote::factory()->create();
        $updateData = ['notes' => 'Updated notes'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/quotes/{$quote->id}", array_merge($quote->toArray(), $updateData));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_quote()
    {
        $quote = Quote::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/quotes/{$quote->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_quote_number()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/quote/number');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_share_quote()
    {
        $quote = Quote::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/quote/share/{$quote->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_convert_quote_to_invoice()
    {
        $quote = Quote::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/quote/convert/{$quote->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_send_quote_notification()
    {
        $quote = Quote::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->postJson("/api/quote/{$quote->id}/send");

        $response->assertStatus(200);
    }
}
