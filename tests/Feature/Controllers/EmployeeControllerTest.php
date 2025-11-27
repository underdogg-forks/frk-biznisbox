<?php

namespace Tests\Feature\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_employees()
    {
        Employee::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/employees');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'message',
        ]);
    }

    /** @test */
    public function it_can_get_single_employee()
    {
        $employee = Employee::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/employees/{$employee->id}");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'first_name',
                'last_name',
            ],
            'message',
        ]);
    }

    /** @test */
    public function it_can_create_employee()
    {
        $employeeData = Employee::factory()->make()->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/employees', $employeeData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('employees', [
            'first_name' => $employeeData['first_name'],
            'last_name' => $employeeData['last_name'],
        ]);
    }

    /** @test */
    public function it_can_update_employee()
    {
        $employee = Employee::factory()->create();
        $updateData = ['first_name' => 'Updated'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/employees/{$employee->id}", array_merge($employee->toArray(), $updateData));

        $response->assertStatus(200);
        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'first_name' => 'Updated',
        ]);
    }

    /** @test */
    public function it_can_delete_employee()
    {
        $employee = Employee::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/employees/{$employee->id}");

        $response->assertStatus(200);
        $this->assertSoftDeleted('employees', [
            'id' => $employee->id,
        ]);
    }

    /** @test */
    public function it_can_get_employee_number()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/employee/number');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'message',
        ]);
    }

    /** @test */
    public function it_returns_404_when_employee_not_found()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/employees/99999');

        $response->assertStatus(404);
    }
}
