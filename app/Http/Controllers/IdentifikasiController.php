<?php

namespace App\Http\Controllers;

use App\Models\Identifikasi;
use App\Models\Pasien;
use App\Models\Pertanyaan;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IdentifikasiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $data = [
            'title' => 'Diagnosa',
        ];
        return view('pages.identifikasi.index', $data);
    }

    public function createPasien(Request $request)
    {
        $user_id = Auth::id();

        $data = [
            'nama_pasien' => $request->nama_pasien,
            'umur' => $request->umur,
            'instansi' => $request->instansi,
            'user_id' => $user_id,
        ];

        $pasien = Pasien::create($data);
        session()->put('pasien_id', $pasien->id);
        return redirect()->route('pilih-gejala');
    }

    // IdentifikasiController.php
    public function pilihGejala()
    {
        $pasien_id = session()->get('pasien_id');
        $data = [
            'title' => 'Diagnosa Penyakit',
            'pertanyaans' => Pertanyaan::with('kriteria')->get(),
            'pasien' => Pasien::find($pasien_id),
        ];

        return view('pages.identifikasi.pilih-gejala', $data);
    }


    public function prosesIdentifikasi(){
        $pasien_id = request('pasien_id');
        $pertanyaans = request('pertanyaans');
    }
}
