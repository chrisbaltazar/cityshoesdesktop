<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Traits\UserMock;
use Tests\TestCase;

class SalesControllerTest extends TestCase
{

    use RefreshDatabase, UserMock;

    public function test_index(): void
    {
        $response = $this->getAuthMock()->get('/sales');

        $response->assertOk();
        $response->assertInertia(fn ($page) => $page->has('sizes'));
    }

    public function test_form_request_error()
    {
        $response = $this->getAuthMock()->post('/sales', [
            'type' => 'invalid',
            'salesman' => 'John Doe',
            'details' => [
                'product_id' => 1,
                'quantity' => 2,
            ],
        ]);

        $response->assertSessionHasErrors();
    }

    public function test_form_details_error()
    {
        $response = $this->getAuthMock()->post('/sales', [
            'type' => 'simple',
            'salesman' => 'John Doe',
            'details' => [
                'product_id' => 1,
                'quantity' => -1,
                'price' => null
            ],
        ]);

        $response->assertSessionHasErrors();
    }
}
