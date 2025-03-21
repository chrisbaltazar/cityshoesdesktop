<?php

namespace App\Models\ValueObjects;

enum Payments : string
{
    case CASH = 'cash';
    case CARD = 'card';
}
