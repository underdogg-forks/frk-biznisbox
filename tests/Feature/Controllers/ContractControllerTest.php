<?php

namespace Tests\Feature\Controllers;

use App\Models\Contract;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContractControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_contracts()
    {
        Contract::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/contracts');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'message',
        ]);
    }

    /** @test */
    public function it_can_get_single_contract()
    {
        $contract = Contract::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/contracts/{$contract->id}");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'number',
            ],
            'message',
        ]);
    }

    /** @test */
    public function it_can_create_contract()
    {
        $contractData = Contract::factory()->make()->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/contracts', $contractData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('contracts', [
            'number' => $contractData['number'],
        ]);
    }

    /** @test */
    public function it_can_update_contract()
    {
        $contract = Contract::factory()->create();
        $updateData = ['notes' => 'Updated notes'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/contracts/{$contract->id}", array_merge($contract->toArray(), $updateData));

        $response->assertStatus(200);
        $this->assertDatabaseHas('contracts', [
            'id' => $contract->id,
            'notes' => 'Updated notes',
        ]);
    }

    /** @test */
    public function it_can_delete_contract()
    {
        $contract = Contract::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/contracts/{$contract->id}");

        $response->assertStatus(200);
        $this->assertSoftDeleted('contracts', [
            'id' => $contract->id,
        ]);
    }

    /** @test */
    public function it_can_get_contract_number()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/contract/number');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'message',
        ]);
    }

    /** @test */
    public function it_can_share_contract()
    {
        $contract = Contract::factory()->create();
        $shareData = ['email' => 'client@example.com'];

        $response = $this->actingAs($this->user, 'api')
            ->postJson("/api/contract/{$contract->id}/share", $shareData);

        $response->assertStatus(200);
    }
}
