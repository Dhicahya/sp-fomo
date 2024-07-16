<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RiwayatTesContoller extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $pasiens = Pasien::where('user_id', $user_id)
            ->whereNotNull('kriteria_id')
            ->get();

        return view('pages.profil', compact('pasiens'));
    }
}
