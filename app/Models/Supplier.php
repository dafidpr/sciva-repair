<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_code', 'name', 'telephone', 'bank', 'account_number', 'bank_account_name', 'address'
    ];
}
