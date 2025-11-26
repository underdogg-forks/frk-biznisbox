<?php

namespace Tests\Feature\Controllers\Client;

use App\Models\Contract;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContractControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_contract_with_key()
    {
        $contract = Contract::factory()->create();

        $response = $this->getJson("/api/client/contract?key={$contract->share_key}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_returns_404_for_invalid_key()
    {
        $response = $this->getJson('/api/client/contract?key=invalid-key');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_can_sign_contract()
    {
        $contract = Contract::factory()->create();

        $response = $this->postJson('/api/client/contract/sign', [
            'key' => $contract->share_key,
            'signature' => 'base64-signature-data',
        ]);

        $response->assertStatus(200);
    }
}
