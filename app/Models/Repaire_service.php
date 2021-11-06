<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repaire_service extends Model
{
    use HasFactory;
    protected $fillable = [
        'repaire_code', 'name', 'price'
    ];
}
