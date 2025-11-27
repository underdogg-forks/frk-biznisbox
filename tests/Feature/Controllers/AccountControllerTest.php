<?php

namespace Tests\Feature\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_accounts()
    {
        Account::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/accounts');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'message',
        ]);
    }

    /** @test */
    public function it_can_get_single_account()
    {
        $account = Account::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/accounts/{$account->id}");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
            ],
            'message',
        ]);
    }

    /** @test */
    public function it_can_create_account()
    {
        $accountData = Account::factory()->make()->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/accounts', $accountData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('accounts', [
            'name' => $accountData['name'],
        ]);
    }

    /** @test */
    public function it_can_update_account()
    {
        $account = Account::factory()->create();
        $updateData = ['name' => 'Updated Account Name'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/accounts/{$account->id}", $updateData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('accounts', [
            'id' => $account->id,
            'name' => 'Updated Account Name',
        ]);
    }

    /** @test */
    public function it_can_delete_account()
    {
        $account = Account::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/accounts/{$account->id}");

        $response->assertStatus(200);
        $this->assertSoftDeleted('accounts', [
            'id' => $account->id,
        ]);
    }

    /** @test */
    public function it_returns_404_when_account_not_found()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/accounts/99999');

        $response->assertStatus(404);
    }
}
