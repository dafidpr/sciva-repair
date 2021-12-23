<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_service_detail extends Model
{
    use HasFactory;
    protected $table = 'transaction_service_details';
    protected $fillable = [
        'transaction_id', 'repaire_id', 'sparepart_id', 'total', 'qty', 'discount', 'sub_total'
    ];

    public function _transction_service()
    {
        return $this->belongsTo(Transaction_service::class);
    }
    public function _product()
    {
        return $this->belongsTo(Product::class, 'sparepart_id');
    }
    public function _repaire()
    {
        return $this->belongsTo(Repaire_service::class, 'repaire_id');
    }
}
