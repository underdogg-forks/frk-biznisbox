<?php

namespace Tests\Feature\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_data()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/data');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_logs()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/logs');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_categories()
    {
        Category::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/categories');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_category()
    {
        $category = Category::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/categories/{$category->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_category()
    {
        $categoryData = Category::factory()->make()->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/categories', $categoryData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_category()
    {
        $category = Category::factory()->create();
        $updateData = ['name' => 'Updated Category'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/categories/{$category->id}", $updateData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_category()
    {
        $category = Category::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/categories/{$category->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_dashboard_layout()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/dashboard');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_dashboard_layout()
    {
        $layoutData = [
            'layout' => ['widget1', 'widget2'],
        ];

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/dashboard', $layoutData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_dashboard_data()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/dashboard/data');

        $response->assertStatus(200);
    }
}
