<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
            'pv_kriteria' => 'nullable|numeric',

        ]);

        Kriteria::create($data);
        Alert::success('Sukses!', 'Data Berhasil Disimpan');
        return redirect()->route('kriteria.index');
    }

    public function edit(Kriteria $kriterium)
    {
        return view('pages.admin.kriteria.update', compact('kriterium'));
    }

    public function update(Request $request, Kriteria $kriterium)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'kode_kriteria' => 'required|string',
            'deskripsi' => 'required|string',
            'pv_kriteria' => 'required|string',
        ]);

        $kriterium->update($data);
        Alert::success('Sukses!', 'Data Berhasil Diubah');
        return redirect()->route('kriteria.index');
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        Alert::success('Sukses!', 'Data Berhasil Dihapus');
        return redirect()->route('kriteria.index');
    }
}