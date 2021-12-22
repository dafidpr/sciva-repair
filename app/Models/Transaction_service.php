<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction_service extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'transaction_services';
    protected $fillable = [
        'customer_id', 'user_id', 'transaction_code', 'unit', 'serial_number', 'complient', 'completenes', 'passcode', 'notes', 'service_date', 'estimated_cost', 'pickup_date', 'payment_method', 'payment', 'discount', 'cashback', 'total', 'status', 'technician'
    ];

    public function _customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function _user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function _teknisi()
    {
        return $this->belongsTo(User::class, 'technician');
    }
    // public function _repaire()
    // {
    //     return $this->belongsTo(Repaire_service::class, 'repaire_id');
    // }
}
