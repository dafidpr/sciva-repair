<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'total', 'value', 'type', 'description'
    ];

    public function _product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
