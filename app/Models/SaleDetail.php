<?php

namespace App\Models;

use App\Models\Traits\Formatter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory, Formatter;

    protected $guarded = ['id'];

    public $timestamps = false;

    protected $appends = ['total'];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->asMoney($value),
        );
    }

    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ($this->attributes['price'] * $this->quantity),
        );
    }
}
