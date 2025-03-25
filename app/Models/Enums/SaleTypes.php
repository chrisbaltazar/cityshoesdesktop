<?php

namespace App\Models\Enums;

use App\Models\Traits\EnumValues;

enum SaleTypes : string
{
    use EnumValues;

    case SIMPLE = 'simple';
    case FISCAL = 'fiscal';
}
