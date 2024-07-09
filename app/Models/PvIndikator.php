<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Indikator;

class PvIndikator extends Model
{
    use HasFactory;

    protected $fillable = ['indikator_id', 'nilai'];

    public function indikator(){
        return $this->belongsTo(Indikator::class, 'indikator_id');
    }
}

