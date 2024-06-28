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
        $data = Indikator::all();
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
            'nilai_pakar' => 'nullable|numeric',
            'kriteria_id' => 'required|exists:kriterias,id',
        ]);

        Indikator::create($data);
        return redirect()->route('indikator.index');
    }

    public function edit(Indikator $indikator)
    {
        $kriteria = Kriteria::all();
        return view('pages.admin.indikator.edit', compact('indikator', 'kriteria'));
    }

    public function update(Request $request, Indikator $indikator)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'kode_indikator' => 'required|string',
            'nilai_pakar' => 'nullable|numeric',
            'kriteria_id' => 'required|exists:kriterias,id',
        ]);

        $indikator->update($data);
        return redirect()->route('indikator.index');
    }

    public function destroy(Indikator $indikator)
    {
        $indikator->delete();
        return redirect()->route('indikator.index');
    }
}
