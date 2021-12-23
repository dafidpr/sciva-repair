<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory, SoftDeletes;

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
