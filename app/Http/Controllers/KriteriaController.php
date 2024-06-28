<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $data = Kriteria::all();
        return view('pages.admin.kriteria.index', compact('data'));
    }

    public function create()
    {
        return view('pages.admin.kriteria.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'kode_kriteria' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        Kriteria::create($data);
        return redirect()->route('kriteria.index');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('pages.admin.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'kode_kriteria' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $kriteria->update($data);
        return redirect()->route('kriteria.index');
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index');
    }
}
