<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Kriteria;
use App\Models\Pertanyaan;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Indikator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode_indikator',
        'nilai_pakar',
        'pv_indikator',
        'pv_kriteria',
        'kriteria_id',
    ];

    // public function pvindikator()
    // {
    //     return $this->belongsTo(PvIndikator::class, 'pv_indikator_id');
    // }

    // public function pvkriteria()
    // {
    //     return $this->belongsTo(PvKriteria::class, 'pv_kriteria_id');
    // }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
    
    public function pertanyaan(): HasMany
    {
        return $this->hasMany(Pertanyaan::class);
    }
}