<?php

namespace App\Http\Controllers;

use App\Models\Solusi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SolusiController extends Controller
{
    public function index()
    {
        $data = Solusi::all();
        return view('pages.admin.solusi.index', compact('data'));
    }


    public function create()
    {
        $solusi = Solusi::all();
        return view('pages.admin.solusi.create', compact('solusi'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'solusi' => 'required|string',
        ]);
        Solusi::create($request->all());
        Alert::success('Sukses!', 'Data Berhasil Disimpan');
        return redirect()->route('solusi.index');
    }


    public function show(Solusi $solusi)
    {
        //
    }


    public function edit(Solusi $solusi)
    {
        return view('pages.admin.solusi.update', compact('solusi'));
    }


    public function update(Request $request, Solusi $solusi)
    {
        $request->validate([
            'kategori' => 'required|string',
            'solusi' => 'required|string',
        ]);

        $solusi->update($request->all());
        Alert::success('Sukses!', 'Data Berhasil Diubah');
        return redirect()->route('solusi.index');
    }


    public function destroy(Solusi $solusi)
    {
        $solusi->delete();
        Alert::success('Sukses!', 'Data Berhasil Dihapus');
        return redirect()->route('solusi.index');
    }
}