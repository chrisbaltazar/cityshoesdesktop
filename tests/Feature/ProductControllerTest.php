<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->get('/inventory');

        $response->assertOk();
    }
}
