<?php

namespace App\Models\Enums;

use App\Models\Traits\GetValues;

enum SaleTypes : string
{
    use GetValues;

    case SIMPLE = 'simple';
    case FISCAL = 'fiscal';
}
