<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rel_kriteria extends Model
{
    use HasFactory;

    protected $fillable = ['kriteria1', 'kriteria2', 'nilai'];

    public function kriteria1(){
        return $this->belongsTo(Kriteria::class, 'kriteria1');
    }

    public function kriteria2(){
        return $this->belongsTo(Kriteria::class, 'kriteria2');
    }
}
