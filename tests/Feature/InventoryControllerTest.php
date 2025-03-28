<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_index(): void
    {
        $user = User::factory()->create();
        Product::factory()->count(10)->create();

        $response = $this
            ->actingAs($user)
            ->get('/inventory');

        $response->assertOk();
        $response->assertInertia(fn ($page) => $page->has('products', 10));
    }
}
