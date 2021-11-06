<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_opname extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'stock', 'real_stock', 'difference_stock', 'value', 'description'
    ];

    public function _product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
