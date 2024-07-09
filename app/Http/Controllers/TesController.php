<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class TesController extends Controller
{
    public function showForm(Request $request)
    {
        $pertanyaans = Pertanyaan::all();
        $user = $request->user();

        return view('pages.tes.pilih-gejala', compact('pertanyaans', 'user'));
    }

    public function submitForm(Request $request)
    {
        $data = $request->validate([
            'pertanyaans' => 'required|array',
            'pertanyaans.*' => 'required|numeric|min:0|max:1',
        ]);

        // Process the diagnosis based on the answers
        // Logic for processing can be added here

        return redirect()->route('pilih-gejala')->with('success', 'Diagnosis completed.');
    }
}
