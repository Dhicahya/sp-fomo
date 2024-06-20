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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'kode_kriteria' => 'required|string',
            'deskripsi' => 'required|string'        
        ]);

        Kriteria::create($data);
        return redirect()->route('kriteria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriterium)
    {
        return view('pages.admin.kriteria.update', compact('kriterium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriterium)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'kode_kriteria' => 'required|string',
            'deskripsi' => 'required|string'   
        ]);

        $kriterium->update($data);
        return redirect()->route('kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index');
    }
}
