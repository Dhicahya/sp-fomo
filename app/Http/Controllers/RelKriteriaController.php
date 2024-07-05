<?php

namespace App\Http\Controllers;

use App\Models\IndexRandom;
use App\Models\Kriteria;
use App\Models\PvKriteria;
use App\Models\Rel_kriteria;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RelKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title'     => 'Perbandingan Kriteria',
            'kriterias' => Kriteria::get(),
        ];
        return view('pages.admin.perbandingan.kriteria.index', $data);
    }

    public function store(Request $request)
    {
        $kriterias = Kriteria::all(); // Add this line to retrieve the list of Penyakit

        $n = Kriteria::count();
        $matrik = array();
        $urut = 0;

        for ($x = 0; $x <= ($n - 2); $x++) {
            for ($y = ($x + 1); $y <= ($n - 1); $y++) {
                $urut++;
                $pilih = "pilih" . $urut;
                $bobot = "bobot" . $urut;
                if ($request[$pilih] == 1) {
                    $matrik[$x][$y] = $request[$bobot];
                    $matrik[$y][$x] = 1 / $request[$bobot];
                } else {
                    $matrik[$x][$y] = 1 / $request[$bobot];
                    $matrik[$y][$x] = $request[$bobot];
                }

                Rel_kriteria::updateOrCreate(
                    ['kriteria1' => $kriterias[$x]->id, 'kriteria2' => $kriterias[$y]->id],
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

            PvKriteria::updateOrCreate(
                ['kriteria_id' => $kriterias[$x]->id],  // Use the id of the penyakit
                ['nilai' => $pv[$x]]
            );
        }

        // cek konsistensi
        $eigenvektor = $this->getEigenVector($jmlmpb, $jmlmnk, $n);
        $consIndex = $this->getConsIndex($jmlmpb, $jmlmnk, $n);
        $consRatio = $this->getConsRatio($jmlmpb, $jmlmnk, $n);

        return view('pages.admin.perbandingan.kriteria.result', compact('matrik', 'jmlmpb', 'matrikb', 'jmlmnk', 'pv', 'eigenvektor', 'consIndex', 'consRatio', 'n', 'kriterias'));
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
        $consratio = $consindex / $nilaiIR;

        return $consratio;
    }
}

