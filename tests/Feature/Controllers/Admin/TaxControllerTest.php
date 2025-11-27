<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\Tax;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaxControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_taxes()
    {
        Tax::factory()->count(3)->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/taxes');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_tax()
    {
        $tax = Tax::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson("/api/admin/taxes/{$tax->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_tax()
    {
        $taxData = Tax::factory()->make()->toArray();

        $response = $this->actingAs($this->admin, 'api')
            ->postJson('/api/admin/taxes', $taxData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_tax()
    {
        $tax = Tax::factory()->create();
        $updateData = ['name' => 'Updated Tax'];

        $response = $this->actingAs($this->admin, 'api')
            ->putJson("/api/admin/taxes/{$tax->id}", $updateData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_tax()
    {
        $tax = Tax::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->deleteJson("/api/admin/taxes/{$tax->id}");

        $response->assertStatus(200);
    }
}
