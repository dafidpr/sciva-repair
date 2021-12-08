<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receivable_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'receivable_id', 'payment_date', 'nominal', 'user_id'
    ];

    public function _user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function _receivable()
    {
        return $this->belongsTo(Receivable::class, 'receivable_id');
    }
}
