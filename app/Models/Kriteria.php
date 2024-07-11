<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Indikator;
use App\Models\Pertanyaan;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function indikator() : HasMany {
        return $this->hasMany(Indikator::class);
    }

    public function pertanyaan() : HasMany {
        return $this->hasMany(Pertanyaan::class);
    }

    public function relkriteria() : BelongsTo {
        return $this->belongsTo(Rel_kriteria::class);
    }
}
