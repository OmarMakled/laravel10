<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    public function test_get_all_products(): void
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    public function test_get_a_product_by_id(): void
    {
        $response = $this->get('/api/products/1');

        $response->assertStatus(200);
    }

    public function test_create_product(): void
    {
        $response = $this->post('/api/products');

        $response->assertStatus(201);
    }

    public function test_delete_product(): void
    {
        $response = $this->delete('/api/products/1');

        $response->assertStatus(204);
    }
}