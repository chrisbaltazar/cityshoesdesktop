<?php

namespace App\Models\Traits;

trait Money
{

    protected function asMoney(mixed $value, int $decimals = 2): string
    {
        return "$" . number_format((float)$value, $decimals);
    }

}
