<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_products(): void
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    public function test_get_a_product_by_id(): void
    {
        $product = Product::factory()->create();
        $response = $this->get('/api/products/' . $product->id);

        $response->assertStatus(200);
    }

    public function test_create_product(): void
    {
        $response = $this->post('/api/products');

        $response->assertStatus(201);
    }

    public function test_delete_product(): void
    {
        $product = Product::factory()->create();
        $response = $this->delete('/api/products/' . $product->id);

        $response->assertStatus(204);
    }
}
