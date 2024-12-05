<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model {
    use HasFactory;

    protected $fillable = ['nama', 'email', 'telepon', 'poli_id', 'tanggal', 'nomor_antrian'];

    public function poli() {
        return $this->belongsTo(Poli::class);
    }
}
