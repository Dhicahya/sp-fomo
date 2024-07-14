<?php

namespace App\Http\Controllers;

use App\Models\Identifikasi;
use App\Models\Pasien;
use App\Models\Pertanyaan;
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

    public function prosesIdentifikasi(Request $request)
    {
        $pasien_id = $request->input('pasien_id');
        $pertanyaans = $request->input('pertanyaans');

        // Simpan data identifikasi
        foreach ($pertanyaans as $pertanyaan_id => $nilai_user) {
            $pertanyaan = Pertanyaan::find($pertanyaan_id);

            $data = [
                'pasien_id' => $pasien_id,
                'kriteria_id' => $pertanyaan->kriteria_id,
                'pertanyaan_id' => $pertanyaan_id,
                'nilai_user' => $nilai_user,
            ];
            Identifikasi::create($data);
        }

        // Ambil semua data pertanyaan dan indikator
        $pertanyaans = Pertanyaan::with('indikator')->get();

        // Inisialisasi variabel untuk perhitungan Bayes berdasarkan kriteria
        $nilai_pakar_by_kriteria = [];
        $nilai_user_by_kriteria = [];
        $nilai_sementara_by_kriteria = [];
        $total_pakar_by_kriteria = [];
        $total_sementara_by_kriteria = [];

        // Hitung nilai pakar dan user untuk setiap kriteria
        foreach ($pertanyaans as $p) {
            $kriteria = $p->kriteria->nama;
            if (!isset($nilai_pakar_by_kriteria[$kriteria])) {
                $nilai_pakar_by_kriteria[$kriteria] = [];
                $nilai_user_by_kriteria[$kriteria] = [];
                $nilai_sementara_by_kriteria[$kriteria] = [];
                $total_pakar_by_kriteria[$kriteria] = 0;
            }
            $nilai_pakar_by_kriteria[$kriteria][$p->id] = $p->indikator->nilai_pakar;
            $nilai_user_by_kriteria[$kriteria][$p->id] = $request->input('pertanyaans')[$p->id]; // Nilai user yang dimasukkan di form
            $total_pakar_by_kriteria[$kriteria] += $p->indikator->nilai_pakar;
        }

        // Hitung nilai semesta P(Hi) dan ΣHi P(E|Hi) * P(Hi) untuk setiap kriteria
        foreach ($nilai_pakar_by_kriteria as $kriteria => $nilai_pakar) {
            $total_sementara = 0;
            foreach ($nilai_pakar as $id => $nilai) {
                $nilai_sementara_by_kriteria[$kriteria][$id] = $nilai / $total_pakar_by_kriteria[$kriteria];
                $total_sementara += $nilai_sementara_by_kriteria[$kriteria][$id] * $nilai_user_by_kriteria[$kriteria][$id];
            }
            $total_sementara_by_kriteria[$kriteria] = $total_sementara;
        }

        // Hitung P(Hi|E) dan hasil diagnosis untuk setiap kriteria
        $hasil_diagnosis_by_kriteria = [];
        foreach ($nilai_sementara_by_kriteria as $kriteria => $nilai_sementara) {
            foreach ($nilai_sementara as $id => $nilai) {
                $p_hi_e = ($total_sementara_by_kriteria[$kriteria] != 0) ? $nilai / $total_sementara_by_kriteria[$kriteria] : 0;
                $hasil_diagnosis_by_kriteria[$kriteria][$id] = $p_hi_e * $nilai_pakar_by_kriteria[$kriteria][$id];
            }
        }

        // Simpan hasil diagnosis
        foreach ($hasil_diagnosis_by_kriteria as $kriteria => $hasil_diagnosis) {
            foreach ($hasil_diagnosis as $pertanyaan_id => $nilai_hasil) {
                Identifikasi::where('pasien_id', $pasien_id)
                    ->where('pertanyaan_id', $pertanyaan_id)
                    ->update(['nilai_hasil' => $nilai_hasil]);
            }
        }

        // Simpan total_pakar dan total_sementara ke session untuk digunakan di view
        session()->put('total_pakar_by_kriteria', $total_pakar_by_kriteria);
        session()->put('total_sementara_by_kriteria', $total_sementara_by_kriteria);

        return redirect()->route('hasil-diagnosa', ['pasien_id' => $pasien_id]);
    }

    public function hasilDiagnosa($pasien_id)
    {
        $pasien = Pasien::find($pasien_id);
        $identifikasi = Identifikasi::where('pasien_id', $pasien_id)
            ->with(['pertanyaan', 'pertanyaan.indikator', 'pertanyaan.kriteria'])
            ->get();

        // Hitung total_sementara untuk setiap kriteria
        $identifikasi_by_kriteria = [];
        $total_sementara_by_kriteria = [];
        $nilai_akhir_kriteria = [];
        $deskripsi_kriteria = []; // Array untuk deskripsi kriteria

        // Ambil deskripsi kriteria
        foreach ($identifikasi as $item) {
            $kriteria = $item->pertanyaan->kriteria->nama;
            $deskripsi_kriteria[$kriteria] = $item->pertanyaan->kriteria->deskripsi; // Assuming there's a 'deskripsi' field in the Kriteria model

            if (!isset($identifikasi_by_kriteria[$kriteria])) {
                $identifikasi_by_kriteria[$kriteria] = [];
                $total_sementara_by_kriteria[$kriteria] = 0;
                $nilai_akhir_kriteria[$kriteria] = 0;
            }
            $identifikasi_by_kriteria[$kriteria][] = $item;
            $total_sementara_by_kriteria[$kriteria] += $item->pertanyaan->indikator->nilai_pakar * $item->nilai_user;
            $nilai_akhir_kriteria[$kriteria] += $item->nilai_hasil;
        }

        // Urutkan nilai_akhir_kriteria dari yang terbesar ke yang terkecil
        arsort($nilai_akhir_kriteria);

        $data = [
            'title' => 'Hasil Diagnosa',
            'pasien' => $pasien,
            'identifikasi_by_kriteria' => $identifikasi_by_kriteria,
            'total_sementara_by_kriteria' => $total_sementara_by_kriteria,
            'nilai_akhir_kriteria' => $nilai_akhir_kriteria,
            'deskripsi_kriteria' => $deskripsi_kriteria, // Include the descriptions in the data array
        ];

        return view('pages.identifikasi.hasil', $data);
    }
}
