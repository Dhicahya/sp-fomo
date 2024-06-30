<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Model\Indikator;
use app\Model\Pertanyaan;

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
