<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kriteria(){
        return $this->belongsTo(Kriteria::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function solusi(){
        return $this->belongsTo(Solusi::class);
    }



}
