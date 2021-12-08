<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'debt_id', 'payment_date', 'nominal', 'user_id'
    ];

    public function _debt()
    {
        return $this->belongsTo(Debt::class, 'debt_id');
    }
    public function _user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
