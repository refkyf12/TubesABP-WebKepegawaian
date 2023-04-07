<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use App\Models\Lembur;
use App\Models\Cuti;

class UserController extends Controller
{

    public function authenticate(Request $request){
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
            ])){
                session()->put('nama', Auth::user()->name);
                return redirect('/karyawan');
        } else {
            return redirect('/login')->with('msg', 'Email/Password salah');   
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Users::with('lembur', 'cuti', 'departement')->get();
        return view('karyawan.index', ['data' => $karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.form_add_account', [
            'title' => 'Tambah Karyawan',
            'method' => 'POST',
            'action' => 'karyawan'
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $karyawan = new Users;
        $karyawan->name = $request->name;
        $karyawan->email = $request->email;
        $pass_crypt = Hash::make($request->password);
        $karyawan->password = $pass_crypt;
        $karyawan->role = $request->role;
        $karyawan->save();
        return redirect('/karyawan')->with('msg', 'Tambah akun berhasil');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Users::find($id);
        return view('karyawan.form_edit_account', compact('data'));
    }

    public function show_karyawan(string $id)
    {
        $data = Users::find($id);
        // $lembur = Lembur::get();
        // $cuti = Cuti::get();
        // $data = Users::with('lembur', 'cuti', 'departement')->get();
        return view('karyawan.form_edit_account_karyawan', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dt = Users::find($id);
    	$title = "Edit Karyawan $dt->name";

    	return view('karyawan.edit',compact('dt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $data = Users::find($id);
        if ($request->password != ""){
            $data->name = $request->name;
            $data->email = $request->email;
            $pass_crypt = bcrypt($request->password);
            $data->password = $pass_crypt;
            $data->role = $request->role;
            $data->update();
            return redirect('/karyawan')->with('msg', 'Akun berhasil diperbarui');
        } else {
            $id = optional(Auth::user())->id;
            return Redirect::back()->withErrors(['msg' => 'Password harus diisi']);
        }
    }

    public function update_hrd(Request $request, string $id)
    {
        $data = Users::with('lembur', 'cuti', 'departement')->find($id);
        $data = Users::find($id);
        
        $lembur = Lembur::find($id);
        $cuti = Cuti::find($id);
        $data = array();
        $data['name'] = $request->name;
        $data['gaji_total'] = $request->gaji_total;
        $lembur['lama_lembur'] = $request->lama_lembur;
        $cuti['lama_cuti'] = $request->lama_cuti;
        $lembur['tanggal_lembur'] = $request->tanggal_lembur;
        $cuti['tanggal_cuti'] = $request->tanggal_cuti;
        Lembur::where('users_id',$id)->update($lembur);
        Cuti::where('users_id',$id)->update($cuti);
        Users::where('id',$id)->update($data);
        return redirect('/karyawan')->with('msg', 'Akun berhasil diperbarui');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data = Users::find($id);
        $data ->delete();
        return redirect('/karyawan')->with('msg', 'Data Berhasil di Hapus');
    }
}
