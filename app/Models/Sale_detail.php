<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id', 'product_id', 'discount', 'total', 'quantity', 'sub_total'
    ];

    public function _sale()
    {
        return $this->belongsTo(Sale::class, 'user_id');
    }
    public function _product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
