<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Kriteria;
use App\Models\PvIndikator;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Indikator::with('pvindikator', 'kriteria')->get();
        return view('pages.admin.indikator.index', compact('data'));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        $pvindikators = PvIndikator::all();
        return view('pages.admin.indikator.create', compact('kriteria', 'pvindikators'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'kode_indikator' => 'required|string',
            'pv_indikator_id' => 'nullable|exists:pv_indikators,id',
            'kriteria_id' => 'required|exists:kriterias,id',
        ]);

        $indikator = new Indikator();
        $indikator->nama = $data['nama'];
        $indikator->kode_indikator = $data['kode_indikator'];
        $indikator->kriteria_id = $data['kriteria_id'];

        if (isset($data['pv_indikator_id'])) {
            $indikator->pv_indikator_id = $data['pv_indikator_id'];
        }

        $indikator->save();
        return redirect()->route('indikator.index');
    }

    public function edit(Indikator $indikator)
    {
        $kriteria = Kriteria::all();
        $pvindikators = PvIndikator::all();
        return view('pages.admin.indikator.update', compact('indikator', 'kriteria', 'pvindikators'));
    }

    public function update(Request $request, Indikator $indikator)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'kode_indikator' => 'required|string',
            'pv_indikator_id' => 'nullable|exists:pv_indikators,id',
            'kriteria_id' => 'required|exists:kriterias,id',
        ]);

        $indikator->nama = $data['nama'];
        $indikator->kode_indikator = $data['kode_indikator'];
        $indikator->kriteria_id = $data['kriteria_id'];

        if (isset($data['pv_indikator_id'])) {
            $indikator->pv_indikator_id = $data['pv_indikator_id'];
        }

        $indikator->save();
        return redirect()->route('indikator.index');
    }

    public function destroy(Indikator $indikator)
    {
        $indikator->delete();
        return redirect()->route('indikator.index');
    }
}
