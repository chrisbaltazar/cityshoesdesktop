<?php

namespace App\Models;

use App\Models\Traits\Formatter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $size
 * @property float $price
 */
class Product extends Model
{
    use HasFactory, Formatter;

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->asMoney($value),
        );
    }
}
