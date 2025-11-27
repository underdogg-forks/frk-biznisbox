<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DepartmentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_departments()
    {
        Department::factory()->count(3)->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson('/api/admin/departments');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_department()
    {
        $department = Department::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->getJson("/api/admin/departments/{$department->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_department()
    {
        $departmentData = Department::factory()->make()->toArray();

        $response = $this->actingAs($this->admin, 'api')
            ->postJson('/api/admin/departments', $departmentData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_department()
    {
        $department = Department::factory()->create();
        $updateData = ['name' => 'Updated Department'];

        $response = $this->actingAs($this->admin, 'api')
            ->putJson("/api/admin/departments/{$department->id}", $updateData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_department()
    {
        $department = Department::factory()->create();

        $response = $this->actingAs($this->admin, 'api')
            ->deleteJson("/api/admin/departments/{$department->id}");

        $response->assertStatus(200);
    }
}
