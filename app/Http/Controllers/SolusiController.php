<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolusiController extends Controller
{
    public function index()
    {
        return view('pages.admin.solusi.index');
    }
}
