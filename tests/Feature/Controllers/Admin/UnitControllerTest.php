<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UnitControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_units()
    {
        Unit::factory()->count(3)->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/units');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_unit()
    {
        $unit = Unit::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson("/api/admin/units/{$unit->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_unit()
    {
        $unitData = Unit::factory()->make()->toArray();

        $response = $this->actingAs($this->admin, 'api')
            ->postJson('/api/admin/units', $unitData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_unit()
    {
        $unit = Unit::factory()->create();
        $updateData = ['name' => 'Updated Unit'];

        $response = $this->actingAs($this->admin, 'api')
            ->putJson("/api/admin/units/{$unit->id}", $updateData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_unit()
    {
        $unit = Unit::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->deleteJson("/api/admin/units/{$unit->id}");

        $response->assertStatus(200);
    }
}
