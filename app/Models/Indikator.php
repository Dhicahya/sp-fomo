<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Kriteria;
use App\Models\Pertanyaan;

class Indikator extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kriteria() : BelongsTo {
        return $this->belongsTo(Kriteria::class);
    }

    public function pertanyaan() : HasMany{
        return $this->hasMany(Pertanyaan::class);
    }

}
