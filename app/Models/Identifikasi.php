<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identifikasi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }

    public function kriteria(){
        return $this->belongsTo(Kriteria::class);
    }

    public function Solusi(){
        return $this->belongsTo(Solusi::class);
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
