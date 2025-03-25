<?php

namespace App\Models\Enums;

use App\Models\Traits\EnumValues;

enum Payments : string
{
    use EnumValues;

    case CASH = 'cash';
    case CARD = 'card';
}
