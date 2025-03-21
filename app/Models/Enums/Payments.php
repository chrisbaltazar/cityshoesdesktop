<?php

namespace App\Models\Enums;

use App\Models\Traits\GetValues;

enum Payments : string
{
    use GetValues;

    case CASH = 'cash';
    case CARD = 'card';
}
