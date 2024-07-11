<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rel_indikator extends Model
{
    use HasFactory;

    protected $fillable = ['indikator1', 'indikator2', 'nilai'];

    public function indikator1(){
        return $this->belongsTo(Indikator::class, 'indikator1');
    }

    public function indikator2(){
        return $this->belongsTo(Indikator::class, 'indikator2');
    }

    public function pvindikator(){
        return $this->belongsTo(Indikator::class, 'pv_indikator');
    }

    public function pvkriteria(){
        return $this->belongsTo(Kriteria::class, 'pv_kriteria');
    }
}
