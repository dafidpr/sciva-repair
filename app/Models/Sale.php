<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'customer_id', 'invoice', 'method', 'total', 'payment', 'cashback', 'vat_tax'
    ];


    public function _user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function _customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function _sale_detail()
    {
        return $this->hasMany(Sale_detail::class, 'sale_id');
    }
}
