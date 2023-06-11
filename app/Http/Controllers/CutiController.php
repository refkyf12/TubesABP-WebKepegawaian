<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Users;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuti = Cuti::orderBy('lama_cuti')->get();
        // $usr = Lembur::with('users')->get();
        
        return view('cuti.index', ['data' => $cuti]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cutiData = new Cuti;
        $cutiData->users_id = $request->users_id;
        $cutiData->lama_cuti = $request->lama_cuti;
        $cutiData->tanggal_cuti = $request->tanggal_cuti;
        $cutiData->save();
        if (request()->segment(1)=='api') return response()->json([
            "error" => false,
            "message" => 'Tambah berhasil',
        ]);
        return redirect('/cuti')-with('msg', 'Tambah berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Cuti::find($id);
        return view('cuti.form_edit_cuti', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Cuti::find($id);
        $data['lama_cuti'] = $request->lama_cuti;
        $data['tanggal_cuti'] = $request->tanggal_cuti;
        $data['users_id'] = $request->users_id;
        $data['disetujui'] = $request->disetujui;
        $data->update();
    
        //$data->disetujui = $request->disetujui;

        // Update field disetujui dengan nilai dari input form
        /*$data->update([
            'disetujui' => $request->disetujui,
        ]);*/

        return redirect('/cuti')->with('msg', 'data cuti berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
