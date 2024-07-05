<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PvKriteria extends Model
{
    use HasFactory;
    
    protected $fillable = ['kriteria_id', 'nilai'];

    public function kriteria(){
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
