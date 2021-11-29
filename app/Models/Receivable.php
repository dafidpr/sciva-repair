<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receivable extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id', 'receivable_date', 'total', 'payment', 'remainder', 'due_date', 'status'
    ];

    public function _sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }
}
