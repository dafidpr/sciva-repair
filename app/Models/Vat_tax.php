<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vat_tax extends Model
{
    use HasFactory;
    protected $table = 'vat_taxes';
    protected $fillable = [
        'user_id', 'tax_code', 'nominal', 'type', 'date', 'description'
    ];

    public function _user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
