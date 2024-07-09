<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Indikator;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index()
    {
        $data = Pertanyaan::with('kriteria', 'indikator')->get();
        return view('pages.admin.pertanyaan.index', compact('data'));
    }

    public function create(Request $request)
    {
        $kriteria = Kriteria::all();
        $indikator = collect();

        $selectedKriteriaId = $request->input('kriteria_id');

        if ($selectedKriteriaId) {
            $indikator = Indikator::where('kriteria_id', $selectedKriteriaId)->get();
        }
        return view('pages.admin.pertanyaan.create', compact('kriteria', 'indikator', 'selectedKriteriaId'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pertanyaan' => 'required|string',
            'kode_pertanyaan' => 'required|string',
            'kriteria_id' => 'required|exists:kriterias,id',
            'indikator_id' => 'required|exists:indikators,id',
        ]);

        Pertanyaan::create($data);
        return redirect()->route('pertanyaan.index');
    }

    public function edit(Request $request, Pertanyaan $pertanyaan)
    {
        $kriteria = Kriteria::all();
        $selectedKriteriaId = $request->input('kriteria_id', $pertanyaan->kriteria_id);
        $indikator = Indikator::where('kriteria_id', $selectedKriteriaId)->get();

        return view('pages.admin.pertanyaan.update', compact('pertanyaan', 'kriteria', 'indikator', 'selectedKriteriaId'));
    }

    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $data = $request->validate([
            'pertanyaan' => 'required|string',
            'kode_pertanyaan' => 'required|string',
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
