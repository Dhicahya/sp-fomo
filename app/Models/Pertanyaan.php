<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kriteria;
use App\Models\Indikator;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kriteria() : BelongsTo{
        return $this->belongsTo(Kriteria::class);   
    }

    public function indikator() : BelongsTo{
        return $this->belongsTo(Indikator::class);   
    }
}
