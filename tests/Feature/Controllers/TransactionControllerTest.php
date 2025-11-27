<?php

namespace Tests\Feature\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_transactions()
    {
        Transaction::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/transactions');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_transaction()
    {
        $transaction = Transaction::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/transactions/{$transaction->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_transaction()
    {
        $account = Account::factory()->create();
        $transactionData = Transaction::factory()->make(['account_id' => $account->id])->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/transactions', $transactionData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_transaction()
    {
        $transaction = Transaction::factory()->create();
        $updateData = ['description' => 'Updated description'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/transactions/{$transaction->id}", array_merge($transaction->toArray(), $updateData));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_transaction()
    {
        $transaction = Transaction::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/transactions/{$transaction->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_transaction_number()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/transaction/number');

        $response->assertStatus(200);
    }
}
