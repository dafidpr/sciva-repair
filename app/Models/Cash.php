<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    use HasFactory;
    protected $table = 'cashes';
    protected $fillable = [
        'user_id', 'cash_code', 'date', 'nominal', 'description', 'source'
    ];

    public function _user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
