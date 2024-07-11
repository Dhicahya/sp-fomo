<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Indikator::with('kriteria')->get();
        return view('pages.admin.indikator.index', compact('data'));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        return view('pages.admin.indikator.create', compact('kriteria'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'kode_indikator' => 'required|string',
            'kriteria_id' => 'required|exists:kriterias,id',
            'pv_indikator' => 'nullable|numeric',
            'pv_kriteria' => 'nullable|numeric',
        ]);

        $indikator = new Indikator();
        $indikator->nama = $data['nama'];
        $indikator->kode_indikator = $data['kode_indikator'];
        $indikator->kriteria_id = $data['kriteria_id'];

        if (isset($data['pv_indikator']) && isset($data['pv_kriteria'])) {
            $indikator->nilai_pakar = $data['pv_indikator'] * $data['pv_kriteria'];
        }

        $indikator->save();
        return redirect()->route('indikator.index');
    }

    public function edit(Indikator $indikator)
    {
        $kriteria = Kriteria::all();
        return view('pages.admin.indikator.update', compact('indikator', 'kriteria'));
    }

    public function update(Request $request, Indikator $indikator)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'kode_indikator' => 'required|string',
            'kriteria_id' => 'required|exists:kriterias,id',
            'pv_indikator' => 'nullable|numeric',
            'pv_kriteria' => 'nullable|numeric',
        ]);

        $indikator->nama = $data['nama'];
        $indikator->kode_indikator = $data['kode_indikator'];
        $indikator->kriteria_id = $data['kriteria_id'];

        if (isset($data['pv_indikator']) && isset($data['pv_kriteria'])) {
            $indikator->nilai_pakar = $data['pv_indikator'] * $data['pv_kriteria'];
        } else {
            $indikator->nilai_pakar = null; // or set a default value if necessary
        }

        $indikator->save();
        return redirect()->route('indikator.index');
    }

    public function destroy(Indikator $indikator)
    {
        $indikator->delete();
        return redirect()->route('indikator.index');
    }

    public function nilai_pakar(Request $request, Indikator $indikator)
    {
        // $data = $request->validate([
        //     'pv_indikator' => 'required|numeric',
        //     'pv_kriteria' => 'required|numeric',
        // ]);

        $pv_kriteria = $indikator->kriteria->pv_kriteria;
        $indikator->nilai_pakar = $indikator->pv_indikator * $pv_kriteria;
        $indikator->update(['nilai_pakar', $indikator]);

        return redirect()->route('indikator.index');
    }
}
