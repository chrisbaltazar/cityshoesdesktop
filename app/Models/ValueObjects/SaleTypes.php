<?php

namespace App\Models\ValueObjects;

enum SaleTypes : string
{
    case SIMPLE = 'simple';
    case FISCAL = 'fiscal';
}
