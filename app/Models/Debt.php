<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Debt extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'purchase_id', 'total', 'payment', 'remainder', 'debt_date', 'due_date', 'status'
    ];


    public function _purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id')->withTrashed();
    }
}
