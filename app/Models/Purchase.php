<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice', 'supplier_id', 'user_id', 'discount', 'total', 'method', 'payment', 'cashback'
    ];

    public function _supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function _user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
