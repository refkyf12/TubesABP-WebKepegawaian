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
    public function create()
    {
        return view('absen.form_add_absen', [
            'title' => 'Tambah Absen',
            'method' => 'POST',
            'action' => 'absen'
        ]);
    }

    public function store(Request $request)
    {
        $absen1 = new Absen;
        $absen1->users_id = $request->users_id;
        $absen1->waktu_absen = $request->waktu_absen;
        $absen1->save();
        return redirect('/absen')->with('msg', 'Tambah absen berhasil');

    }
}
