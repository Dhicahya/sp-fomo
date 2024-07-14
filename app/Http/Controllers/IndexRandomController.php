<?php

namespace App\Http\Controllers;

use App\Models\IndexRandom;
use Illuminate\Http\Request;

class IndexRandomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = IndexRandom::all();
        return view('pages.admin.random-index.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $indexRandom = IndexRandom::all();
        return view('pages.admin.random-index.create', compact('indexRandom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'numeric|string',
            'nilai' => 'numeric|string',
        ]);
        IndexRandom::create($request->all());
        return redirect()->route('indexRandom.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(IndexRandom $indexRandom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IndexRandom $indexRandom)
    {
        return view('pages.admin.random-index.update', compact('indexRandom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IndexRandom $indexRandom)
    {
        $request->validate([
            'jumlah' => 'numeric|string',
            'nilai' => 'numeric|string',
        ]);

        $indexRandom->update($request->all());
        return redirect()->route('indexRandom.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IndexRandom $indexRandom)
    {
        $indexRandom->delete();
        return redirect()->route('indexRandom.index');
    }
}
