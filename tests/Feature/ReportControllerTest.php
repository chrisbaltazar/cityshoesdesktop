<?php

namespace Tests\Feature;

use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\UserMock;
use Tests\TestCase;

class ReportControllerTest extends TestCase
{

    use RefreshDatabase, UserMock;

    public function test_index(): void
    {
        Sale::factory()->count(5)->create();

        $response = $this->getAuthMock()->get('/report');

        $response->assertOk();

        $response->assertInertia(fn($page) => $page->has('sales', 5));
    }

    public function test_show(): void
    {
        $sale = Sale::factory()->hasDetails(3)->create();

        $response = $this->getAuthMock()->get('/report/' . $sale->id);

        $response->assertOk();

        $response->assertInertia(fn($page) => $page->has('details', 3, fn ($detail) =>
            $detail->where('sale_id', $sale->id)->etc()
        ));
    }
}
