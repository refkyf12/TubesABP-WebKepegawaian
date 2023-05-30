<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    //
    
    public function show()
    {
        $data = Absen::all();
        return view('absen.index', compact('data'));
    }
}
