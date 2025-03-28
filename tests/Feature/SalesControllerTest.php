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
}
