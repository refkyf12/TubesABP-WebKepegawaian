<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lembur;
use App\Models\Users;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $lembur = Lembur::with('users')->get();

        $lembur = Lembur::orderBy('lama_lembur')->get();
        if (request()->segment(1) == 'api') return response()->json([
            "error"=>false,
            "list"=>$lembur,
        ]);
        
        // $usr = Lembur::with('users')->get();
        
        return view('lembur.index', ['data' => $lembur]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Lembur::find($id);
        return view('lembur.form_edit_lembur', compact('data'));
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
        /*$request->validate([
            'disetujui' => 'required|boolean', // field disetujui harus ada dan berupa boolean
        ]);*/

        // Cari data lembur berdasarkan ID
        $data = Lembur::find($id);
        $data['lama_lembur'] = $request->lama_lembur;
        $data['tanggal_lembur'] = $request->tanggal_lembur;
        $data['users_id'] = $request->users_id;
        $data['disetujui'] = $request->disetujui;
        $data->update();
    
        //$data->disetujui = $request->disetujui;

        // Update field disetujui dengan nilai dari input form
        /*$data->update([
            'disetujui' => $request->disetujui,
        ]);*/

        return redirect('/lembur')->with('msg', 'data lembur berhasil diperbarui');
       
        // $data = Lembur::find($id);
        //$data->update($request->all());
        //return redirect('/lembur')->with('msg', 'data lembur berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
