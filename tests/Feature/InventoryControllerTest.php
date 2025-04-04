<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\UserMock;
use Tests\TestCase;

class InventoryControllerTest extends TestCase
{

    use RefreshDatabase, UserMock;

    public function test_index(): void
    {
        Product::factory()->count(10)->create();

        $response = $this->getAuthMock()->get('/inventory');

        $response->assertOk();
        $response->assertInertia(fn ($page) => $page->has('products', 10));
    }
}
