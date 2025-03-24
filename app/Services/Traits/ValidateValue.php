<?php

namespace App\Services\Traits;

trait ValidateValue
{

    protected function validateNumber(...$values): bool {
        foreach ($values as $value) {
            if (!$value || !is_numeric($value) || $value < 0) {
                return false;
            }
        }
        return true;
    }

}
