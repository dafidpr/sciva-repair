<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commision extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'servis_id', 'total'
    ];

    public function _user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function _servis()
    {
        return $this->belongsTo(Transaction_service::class, 'servis_id');
    }
}
