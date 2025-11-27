<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OpenBankingControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_list_available_countries()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/open-banking/countries');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_list_banks()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/open-banking/banks');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_init_session()
    {
        $sessionData = [
            'institution_id' => 'test-bank-id',
        ];

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/open-banking/session', $sessionData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_open_banking_account()
    {
        $accountData = [
            'requisition_id' => 'test-requisition-id',
        ];

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/open-banking/account', $accountData);

        $response->assertStatus(200);
    }
}
