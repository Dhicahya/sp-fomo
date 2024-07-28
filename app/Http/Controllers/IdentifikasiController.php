<?php

namespace App\Http\Controllers;

use App\Models\Identifikasi;
use App\Models\Kriteria;
use App\Models\Pasien;
use App\Models\Pertanyaan;
use App\Models\Solusi;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $nilai_semesta_by_kriteria = [];
        $total_pakar_by_kriteria = [];
        $total_sementara_by_kriteria = [];

        // Hitung nilai pakar, nilai user, dan total nilai pakar untuk setiap kriteria
        foreach ($pertanyaans as $p) {
            $kriteria = $p->kriteria->nama;
            if (!isset($nilai_pakar_by_kriteria[$kriteria])) {
                $nilai_pakar_by_kriteria[$kriteria] = [];
                $nilai_user_by_kriteria[$kriteria] = [];
                $nilai_semesta_by_kriteria[$kriteria] = [];
                $total_pakar_by_kriteria[$kriteria] = 0;
            }
            $nilai_pakar_by_kriteria[$kriteria][$p->id] = $p->indikator->nilai_pakar;
            $nilai_user_by_kriteria[$kriteria][$p->id] = $request->input('pertanyaans')[$p->id]; // Nilai user yang dimasukkan di form
            $total_pakar_by_kriteria[$kriteria] += $p->indikator->nilai_pakar;
        }

        // Hitung nilai semesta (P(E|Hi)) dan ΣHi P(E|Hi) * P(Hi) untuk setiap kriteria
        foreach ($nilai_pakar_by_kriteria as $kriteria => $nilai_pakar) {
            $total_sementara = 0;
            foreach ($nilai_pakar as $id => $nilai) {
                $nilai_semesta_by_kriteria[$kriteria][$id] = $nilai / $total_pakar_by_kriteria[$kriteria];
                $total_sementara += $nilai_semesta_by_kriteria[$kriteria][$id] * $nilai_user_by_kriteria[$kriteria][$id];
            }
            $total_sementara_by_kriteria[$kriteria] = $total_sementara;
        }

        // Hitung P(Hi|E) dan hasil diagnosis untuk setiap kriteria
        $hasil_diagnosis_by_kriteria = [];
        foreach ($nilai_semesta_by_kriteria as $kriteria => $nilai_semesta) {
            $total_sementara = $total_sementara_by_kriteria[$kriteria];
            foreach ($nilai_semesta as $id => $nilai) {
                $p_hi_e = ($total_sementara != 0) ? $nilai * $nilai_user_by_kriteria[$kriteria][$id] / $total_sementara : 0;
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

        // Panggil fungsi kategoriHasil untuk menentukan kategori hasil
        return $this->kategoriHasil($request);
    }

    public function kategoriHasil(Request $request)
    {
        // Inisialisasi variabel total nilai user
        $total_nilai_user = 0;
        $nilai_kriteria = [];

        // Ambil data identifikasi berdasarkan pasien
        $identifikasi = Identifikasi::where('pasien_id', $request->input('pasien_id'))->get();

        // Hitung total nilai user dan nilai per kriteria
        foreach ($identifikasi as $item) {
            $total_nilai_user += $item->nilai_user;
            if (!isset($nilai_kriteria[$item->kriteria_id])) {
                $nilai_kriteria[$item->kriteria_id] = 0;
            }
            $nilai_kriteria[$item->kriteria_id] += $item->nilai_hasil; // Menggunakan nilai_hasil untuk kriteria
        }

        // Hitung jumlah total pertanyaan
        $total_pertanyaan = Pertanyaan::count();

        // Tentukan rentang kategori
        $rentang = $total_pertanyaan / 3;

        // Tentukan kategori berdasarkan total nilai user
        if ($total_nilai_user <= $rentang) {
            $solusi = Solusi::where('kategori', 'Rendah')->first();
        } elseif ($total_nilai_user <= 2 * $rentang) {
            $solusi = Solusi::where('kategori', 'Sedang')->first();
        } else {
            $solusi = Solusi::where('kategori', 'Tinggi')->first();
        }

        // Tentukan kategori solusi
        $kategori = $solusi ? $solusi->solusi : 'Tidak terdefinisi';

        // Hitung presentase dari total_nilai_user terhadap total_pertanyaan
        $presentase = ($total_nilai_user / $total_pertanyaan) * 100;

        // Temukan kriteria dengan nilai terbesar
        $kriteria_id_terbesar = array_keys($nilai_kriteria, max($nilai_kriteria))[0];

        // Update model Pasien dengan hasil
        $pasien = Pasien::find($request->input('pasien_id'));
        $pasien->hasil_tes = $kriteria_id_terbesar;
        $pasien->presentasi = $presentase;
        $pasien->kriteria_id = $kriteria_id_terbesar;
        $pasien->solusi_id = $solusi->id ?? null;
        $pasien->save();

        // Simpan kategori dan presentase ke session
        session()->put('kategori', $kategori);
        session()->put('presentase', $presentase);

        return redirect()->route('hasil-diagnosa', ['pasien_id' => $request->input('pasien_id')]);
    }

    public function hasilDiagnosa($pasien_id)
    {
        $pasien = Pasien::find($pasien_id);
        $identifikasi = Identifikasi::where('pasien_id', $pasien_id)
            ->with(['pertanyaan', 'pertanyaan.indikator', 'pertanyaan.kriteria'])
            ->get();

        // Calculate total_sementara for each kriteria
        $identifikasi_by_kriteria = [];
        $total_sementara_by_kriteria = [];
        $nilai_akhir_kriteria = [];
        $deskripsi_kriteria = []; // Array for kriteria descriptions

        // Retrieve kriteria descriptions
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

        // Sort nilai_akhir_kriteria from highest to lowest
        arsort($nilai_akhir_kriteria);

        // Retrieve kategori and presentase from session
        $kategori = session()->get('kategori', 'Tidak tersedia');
        $presentase = session()->get('presentase', 0);

        // Retrieve solusi based on the kategori
        $solusi = Solusi::where('kategori', $kategori)->first();

        // Get the highest kriteria
        $max_kriteria = array_keys($nilai_akhir_kriteria)[0] ?? 'Tidak tersedia';
        $max_nilai = $nilai_akhir_kriteria[$max_kriteria] ?? 0;

        // Find kriteria_id based on the max_kriteria
        $kriteria = Kriteria::where('nama', $max_kriteria)->first();
        $kriteria_id = $kriteria ? $kriteria->id : null;

        if ($kriteria_id) {
            // Update Pasien with the highest kriteria and its nilai
            $pasien->hasil_tes = $max_nilai;
            $pasien->kriteria_id = $kriteria_id;
            $pasien->save();
        }

        $data = [
            'title' => 'Hasil Diagnosa',
            'pasien' => $pasien,
            'identifikasi_by_kriteria' => $identifikasi_by_kriteria,
            'total_sementara_by_kriteria' => $total_sementara_by_kriteria,
            'nilai_akhir_kriteria' => $nilai_akhir_kriteria,
            'deskripsi_kriteria' => $deskripsi_kriteria, // Include the descriptions in the data array
            'kategori' => $kategori, // Include the kategori in the data array
            'presentase' => $presentase, // Include the presentase in the data array
            'solusi' => $solusi ? $solusi->kategori : 'Tidak tersedia' // Include the solusi in the data array
        ];

        return view('pages.identifikasi.hasil', $data);
    }



    public function cetak($id)
    {
        $pasien = Pasien::with('kriteria')->find($id);
        $hasil_tes = session()->get('hasil_tes', []);
        $kategori = session()->get('kategori', 'Tidak tersedia');
        $presentase = session()->get('presentase', 0);

        $identifikasis = Identifikasi::with('pertanyaan')->where('pasien_id', $id)->get();
        $groupedIdentifikasis = $identifikasis->groupBy('pertanyaan_id')->map(function ($group) {
            return $group->first();
        });

        // Calculate nilai_akhir_kriteria and retrieve deskripsi
        $nilai_akhir_kriteria = [];
        $deskripsi_kriteria = [];
        foreach ($identifikasis as $identifikasi) {
            $kriteria = $identifikasi->pertanyaan->kriteria->nama;
            $deskripsi = $identifikasi->pertanyaan->kriteria->deskripsi;

            // Calculate nilai_akhir_kriteria
            if (!isset($nilai_akhir_kriteria[$kriteria])) {
                $nilai_akhir_kriteria[$kriteria] = 0;
            }
            $nilai_akhir_kriteria[$kriteria] += $identifikasi->nilai_hasil;

            // Collect deskripsi_kriteria
            if (!isset($deskripsi_kriteria[$kriteria])) {
                $deskripsi_kriteria[$kriteria] = $deskripsi;
            }
        }

        // Sort nilai_akhir_kriteria from highest to lowest
        arsort($nilai_akhir_kriteria);

        $data = [
            'title' => 'Hasil Identifikasi',
            'pasien' => $pasien,
            'pertanyaan' => $groupedIdentifikasis,
            'hasil_tes' => $hasil_tes,
            'nilai_akhir_kriteria' => $nilai_akhir_kriteria,
            'deskripsi_kriteria' => $deskripsi_kriteria, // Add this line
            'kategori' => $kategori,
            'presentase' => $presentase,
        ];

        $pdf = Pdf::loadView('pages.identifikasi.cetak', $data);
        return $pdf->download('hasil_identifikasi.pdf');
    }




}
