<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasi';
    protected $primaryKey = 'id_aspirasi';
    protected $guarded = [];

    // Relasi balik ke Input Aspirasi
        public function inputAspirasi() {
            return $this->belongsTo(InputAspirasi::class, 'id_pelaporan', 'id_pelaporan');
    }
}
