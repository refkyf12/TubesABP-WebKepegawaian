<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Announcement::all();
        if (request()->segment(1) == 'api') return response()->json([
            "error"=>false,
            "list"=>$pengumuman,
        ]);
        return view('announcement.index', ['data' => $pengumuman]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcement.form_add_announcement', [
            'title' => 'Tambah Pengumuman',
            'method' => 'POST',
            'action' => 'announcement'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengumuman = new Announcement;
        $pengumuman->judul = $request->judul;
        $pengumuman->tanggal_awal = $request->tanggal_awal;
        $pengumuman->tanggal_akhir = $request->tanggal_akhir;
        $pengumuman->pesan = $request->pesan;
        $pengumuman->save();
        return redirect('/announcement')->with('msg', 'Tambah pengumuman berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $data = Announcement::find($id);
        $data ->delete();
        return redirect('/announcement')->with('msg', 'Data Berhasil di Hapus');
    }
}
