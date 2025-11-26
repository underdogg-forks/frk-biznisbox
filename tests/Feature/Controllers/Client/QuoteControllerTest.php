<?php

namespace Tests\Feature\Controllers\Client;

use App\Models\Quote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuoteControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_quote_with_key()
    {
        $quote = Quote::factory()->create();

        $response = $this->getJson("/api/client/quote?key={$quote->share_key}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_returns_404_for_invalid_key()
    {
        $response = $this->getJson('/api/client/quote?key=invalid-key');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_can_accept_quote()
    {
        $quote = Quote::factory()->create();

        $response = $this->postJson('/api/client/quote/accept-reject', [
            'key' => $quote->share_key,
            'status' => 'accepted',
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_reject_quote()
    {
        $quote = Quote::factory()->create();

        $response = $this->postJson('/api/client/quote/accept-reject', [
            'key' => $quote->share_key,
            'status' => 'rejected',
        ]);

        $response->assertStatus(200);
    }
}
