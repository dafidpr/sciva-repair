<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_id', 'product_id', 'selling_price', 'purchase_price',    'quantity', 'sub_total'
    ];

    public function _purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }
    public function _product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
