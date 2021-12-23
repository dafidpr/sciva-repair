<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receivable extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sale_id', 'service_id', 'receivable_date', 'total', 'payment', 'remainder', 'due_date', 'status'
    ];

    public function _sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }
    public function _servis()
    {
        return $this->belongsTo(Transaction_service::class, 'service_id');
    }
}
