<?php

namespace Tests\Feature\Controllers;

use App\Models\Partner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PartnerControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_partners()
    {
        Partner::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/partners');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_partner()
    {
        $partner = Partner::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/partners/{$partner->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_partner()
    {
        $partnerData = Partner::factory()->make()->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/partners', $partnerData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_partner()
    {
        $partner = Partner::factory()->create();
        $updateData = ['name' => 'Updated Partner Name'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/partners/{$partner->id}", array_merge($partner->toArray(), $updateData));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_partner()
    {
        $partner = Partner::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/partners/{$partner->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_partner_number()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/partner/number');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_partners_limited_data()
    {
        Partner::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/partner/limited');

        $response->assertStatus(200);
    }
}
