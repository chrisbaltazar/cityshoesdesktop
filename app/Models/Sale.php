<?php

namespace App\Models;

use App\Models\Traits\Formatter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes, Formatter;

    protected $guarded = ['id'];

    protected $with = ['details', 'store', 'salesman'];

    protected $appends = ['date', 'total'];

    public function details()
    {
        return $this->hasMany(SaleDetail::class, 'sale_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function salesman()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->asMoney($this->details->sum('total')),
        );
    }

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->created_at->format('d/m/Y H:i'),
        );
    }
}
