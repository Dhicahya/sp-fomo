<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Indikator;
use app\Models\Pertanyaan;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function indikator() : HasMany {
        return $this->hasMany(Indikator::class);
    }

    public function pertanyaan() : HasMany {
        return $this->hasMany(Pertanyaan::class);
    }
}
