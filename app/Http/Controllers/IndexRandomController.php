<?php

namespace App\Http\Controllers;

use App\Models\IndexRandom;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class IndexRandomController extends Controller
{

    public function index()
    {
        $data = IndexRandom::all();
        return view('pages.admin.random-index.index', compact('data'));
    }


    public function create()
    {
        $indexRandom = IndexRandom::all();
        return view('pages.admin.random-index.create', compact('indexRandom'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'numeric|string',
            'nilai' => 'numeric|string',
        ]);
        IndexRandom::create($request->all());
        Alert::success('Sukses!', 'Data Berhasil Disimpan');
        return redirect()->route('indexRandom.index');
    }


    public function show(IndexRandom $indexRandom)
    {
        //
    }


    public function edit(IndexRandom $indexRandom)
    {
        return view('pages.admin.random-index.update', compact('indexRandom'));
    }


    public function update(Request $request, IndexRandom $indexRandom)
    {
        $request->validate([
            'jumlah' => 'numeric|string',
            'nilai' => 'numeric|string',
        ]);

        $indexRandom->update($request->all());
        Alert::success('Sukses!', 'Data Berhasil Diubah');
        return redirect()->route('indexRandom.index');
    }


    public function destroy(IndexRandom $indexRandom)
    {
        $indexRandom->delete();
        Alert::success('Sukses!', 'Data Berhasil Dihapus');
        return redirect()->route('indexRandom.index');
    }
}