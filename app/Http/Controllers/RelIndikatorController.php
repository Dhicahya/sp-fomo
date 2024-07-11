<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\IndexRandom;
use App\Models\Kriteria;
use App\Models\Rel_indikator;
use Illuminate\Http\Request;

class RelIndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kriteria = Kriteria::all();
        $selectedKriteriaId = $request->input('kriteria_id');
        $indikators = collect();

        if ($selectedKriteriaId) {
            $indikators = Indikator::where('kriteria_id', $selectedKriteriaId)->get();
        }

        return view('pages.admin.perbandingan.indikator.index', compact('kriteria', 'indikators', 'selectedKriteriaId'));
    }

    public function store(Request $request)
    {
        $selectedKriteriaId = $request->input('kriteria_id');
        $indikators = Indikator::where('kriteria_id', $selectedKriteriaId)->get();

        $n = $indikators->count();
        $matrik = array();
        $urut = 0;

        for ($x = 0; $x <= ($n - 2); $x++) {
            for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                $urut++;
                $pilih = "pilih" . $urut;
                $bobot = "bobot" . $urut;

                $bobotValue = $request[$bobot] ?? 1; // Set default value to 1 if not set

                if ($bobotValue == 0) {
                    $bobotValue = 1; // Prevent division by zero by setting a default value
                }

                if ($request[$pilih] == 1) {
                    $matrik[$x][$y] = $bobotValue;
                    $matrik[$y][$x] = 1 / $bobotValue;
                } else {
                    $matrik[$x][$y] = 1 / $bobotValue;
                    $matrik[$y][$x] = $bobotValue;
                }

                Rel_indikator::updateOrCreate(
                    ['indikator1' => $indikators[$x]->id, 'indikator2' => $indikators[$y]->id],
                    ['nilai' => $matrik[$x][$y]]
                );
            }
        }

        // diagonal --> bernilai 1
        for ($i = 0; $i <= ($n - 1); $i++) {
            $matrik[$i][$i] = 1;
        }

        // inisialisasi jumlah tiap kolom dan baris penyakit
        $jmlmpb = array_fill(0, $n, 0);
        $jmlmnk = array_fill(0, $n, 0);

        // menghitung jumlah pada kolom penyakit tabel perbandingan berpasangan
        for ($x = 0; $x <= ($n - 1); $x++) {
            for ($y = 0; $y <= ($n - 1); $y++) {
                $value = $matrik[$x][$y];
                $jmlmpb[$y] += $value;
            }
        }

        // menghitung jumlah pada baris penyakit tabel nilai penyakit
        // matrikb merupakan matrik yang telah dinormalisasi
        for ($x = 0; $x <= ($n - 1); $x++) {
            for ($y = 0; $y <= ($n - 1); $y++) {
                $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
                $value = $matrikb[$x][$y];
                $jmlmnk[$x] += $value;
            }

            // nilai priority vektor
            $pv[$x] = $jmlmnk[$x] / $n;

            $indikators[$x]->update(['pv_indikator' => $pv[$x]]);
        }

        foreach ($indikators as $indikator) {
            $kriteria = $indikator->kriteria;
            if ($kriteria && $kriteria->pv_kriteria) {
                $indikator->nilai_pakar = $indikator->pv_indikator * $kriteria->pv_kriteria;
                $indikator->save();
            }
        }

        // cek konsistensi
        $eigenvektor = $this->getEigenVector($jmlmpb, $jmlmnk, $n);
        $consIndex = $this->getConsIndex($jmlmpb, $jmlmnk, $n);
        $consRatio = $this->getConsRatio($jmlmpb, $jmlmnk, $n);

        return view('pages.admin.perbandingan.indikator.result', compact('matrik', 'jmlmpb', 'matrikb', 'jmlmnk', 'pv', 'eigenvektor', 'consIndex', 'consRatio', 'n', 'indikators'));
    }

    private function getEigenVector($matrik_a, $matrik_b, $n)
    {
        $eigenvektor = 0;
        for ($i = 0; $i <= ($n - 1); $i++) {
            $eigenvektor += ($matrik_a[$i] * ($matrik_b[$i] / $n));
        }

        return $eigenvektor;
    }

    private function getConsIndex($matrik_a, $matrik_b, $n)
    {
        $eigenvektor = $this->getEigenVector($matrik_a, $matrik_b, $n);
        $consindex = ($eigenvektor - $n) / ($n - 1);

        return $consindex;
    }

    private function getConsRatio($matrik_a, $matrik_b, $n)
    {
        $consindex = $this->getConsIndex($matrik_a, $matrik_b, $n);
        $ir = IndexRandom::where('jumlah', $n)->first();
        $nilaiIR = $ir ? $ir->nilai : 0;

        // Prevent division by zero
        if ($nilaiIR == 0) {
            return 0; // or handle the situation appropriately
        }

        $consratio = $consindex / $nilaiIR;

        return $consratio;
    }
}
