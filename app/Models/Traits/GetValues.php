<?php

namespace App\Models\Traits;

trait GetValues
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
