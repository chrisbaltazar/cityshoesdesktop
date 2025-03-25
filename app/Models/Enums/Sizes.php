<?php

namespace App\Models\Enums;

use App\Models\Traits\EnumValues;

enum Sizes :string
{
    use EnumValues;

    case XS = '12-14';
    case SM = '15-17';
    case MD = '18-21';
    case ML = '2-6';
    case LG = '5-9';
    case XL = '9-12';

}
