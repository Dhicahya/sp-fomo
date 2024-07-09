<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Kriteria;
use App\Models\Pertanyaan;
use App\Models\PvIndikator;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Indikator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode_indikator',
        'pv_indikator_id',
        'kriteria_id',
        'nilai_pakar',
    ];

    public function kriteria() : BelongsTo {
        return $this->belongsTo(Kriteria::class);
    }

    public function pertanyaan() : HasMany{
        return $this->hasMany(Pertanyaan::class);
    }

    public function pvindikator(){
        return $this->belongsTo(PvIndikator::class, 'pv_indikator_id');
    }

}
