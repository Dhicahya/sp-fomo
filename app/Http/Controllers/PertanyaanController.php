<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Indikator;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pertanyaan::with('kriteria', 'indikator')->get();
        return view('pages.admin.pertanyaan.index', compact('data'));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        $indikator = Indikator::all();
        return view('pages.admin.pertanyaan.create', compact('kriteria', 'indikator'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pertanyaan' => 'required|string',
            'kode_pertanyaan' => 'required|string',
            'bobot' => 'nullable|exists:indikator,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'indikator_id' => 'required|exists:indikators,id',
        ]);

        Pertanyaan::create($data);
        return redirect()->route('pertanyaan.index');
    }

    public function edit(Pertanyaan $pertanyaan)
    {
        $kriteria = Kriteria::all();
        $indikator = Indikator::all();
        return view('pages.admin.pertanyaan.update', compact('pertanyaan', 'kriteria', 'indikator'));
    }

    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $data = $request->validate([
            'pertanyaan' => 'required|string',
            'kode_pertanyaan' => 'required|string',
            'bobot' => 'nullable|exists:indikator,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'indikator_id' => 'required|exists:indikators,id',
        ]);

        $pertanyaan->update($data);
        return redirect()->route('pertanyaan.index');
    }

    public function destroy(Pertanyaan $pertanyaan)
    {
        $pertanyaan->delete();
        return redirect()->route('pertanyaan.index');
    }
}
