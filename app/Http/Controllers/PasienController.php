<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::with('kriteria')->get();

        $data = [
            'title' => 'Data Diagnosa Pasien',
            'pasien' => $pasiens,
        ];

        return view('pages.identifikasi.index', $data);
    }
}
