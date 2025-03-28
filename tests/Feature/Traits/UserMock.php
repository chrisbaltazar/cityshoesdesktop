<?php

namespace Tests\Feature\Traits;

use App\Models\User;

trait UserMock
{

    protected function getAuthMock()
    {
        $user = User::factory()->create();

        return $this->actingAs($user);
    }

}
