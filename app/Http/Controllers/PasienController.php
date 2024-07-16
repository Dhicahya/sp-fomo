<?php

namespace App\Http\Controllers;

use App\Models\Identifikasi;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::with('kriteria')->whereNotNull('kriteria_id')->get();

        $data = [
            'title' => 'Data Diagnosa Pasien',
            'pasien' => $pasiens,
        ];

        return view('pages.admin.riwayat-tes.index', $data);
    }

    public function destroy($id)
    {
        Identifikasi::where('pasien_id', $id)->delete();

        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->back()->with('success', 'Data pasien berhasil dihapus.');
    }
}
