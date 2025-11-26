<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PermissionRoleControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_roles()
    {
        Role::factory()->count(3)->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/roles');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_role()
    {
        $role = Role::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson("/api/admin/roles/{$role->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_role()
    {
        $roleData = [
            'name' => 'Test Role',
            'description' => 'Test Description',
        ];

        $response = $this->actingAs($this->admin, 'api')
            ->postJson('/api/admin/roles', $roleData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_role()
    {
        $role = Role::factory()->create();
        $updateData = ['name' => 'Updated Role'];

        $response = $this->actingAs($this->admin, 'api')
            ->putJson("/api/admin/roles/{$role->id}", $updateData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_role()
    {
        $role = Role::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->deleteJson("/api/admin/roles/{$role->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_all_permissions()
    {
        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/permissions');

        $response->assertStatus(200);
    }
}
