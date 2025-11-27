<?php

namespace Tests\Feature\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_can_get_all_products()
    {
        Product::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/products');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_single_product()
    {
        $product = Product::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->getJson("/api/products/{$product->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_product()
    {
        $productData = Product::factory()->make()->toArray();

        $response = $this->actingAs($this->user, 'api')
            ->postJson('/api/products', $productData);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_product()
    {
        $product = Product::factory()->create();
        $updateData = ['name' => 'Updated Product'];

        $response = $this->actingAs($this->user, 'api')
            ->putJson("/api/products/{$product->id}", array_merge($product->toArray(), $updateData));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_delete_product()
    {
        $product = Product::factory()->create();

        $response = $this->actingAs($this->user, 'api')
            ->deleteJson("/api/products/{$product->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_product_number()
    {
        $response = $this->actingAs($this->user, 'api')
            ->getJson('/api/product/number');

        $response->assertStatus(200);
    }
}
