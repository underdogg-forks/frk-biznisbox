<?php

namespace Tests\Feature\Controllers;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BillControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_bills()
    {
        Bill::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/bills');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'message',
        ]);
    }

    /** @test */
    public function it_can_get_single_bill()
    {
        $bill = Bill::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/bills/{$bill->id}");

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
    public function it_can_create_bill()
    {
        $billData = Bill::factory()->make()->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/bills', $billData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('bills', [
            'number' => $billData['number'],
        ]);
    }

    /** @test */
    public function it_can_update_bill()
    {
        $bill = Bill::factory()->create();
        $updateData = ['notes' => 'Updated notes'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/bills/{$bill->id}", array_merge($bill->toArray(), $updateData));

        $response->assertStatus(200);
        $this->assertDatabaseHas('bills', [
            'id' => $bill->id,
            'notes' => 'Updated notes',
        ]);
    }

    /** @test */
    public function it_can_delete_bill()
    {
        $bill = Bill::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/bills/{$bill->id}");

        $response->assertStatus(200);
        $this->assertSoftDeleted('bills', [
            'id' => $bill->id,
        ]);
    }

    /** @test */
    public function it_can_get_bill_number()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/bill/number');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'message',
        ]);
    }

    /** @test */
    public function it_returns_404_when_bill_not_found()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/bills/99999');

        $response->assertStatus(404);
    }
}
