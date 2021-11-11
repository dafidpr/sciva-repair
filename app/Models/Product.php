<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'barcode', 'name', 'selling_price', 'purchase_price', 'member_price', 'stock', 'limit', 'supplier_id'
    ];

    public function _supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
