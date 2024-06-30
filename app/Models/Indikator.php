<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Kriteria;

class Indikator extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kriteria() : BelongsTo {
        return $this->belongsTo(Kriteria::class);
    }

}
