<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_id',
        'buyer_name',
        'buyer_phone',
        'buyer_address',
        'quantity',
        'total_price',
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}

