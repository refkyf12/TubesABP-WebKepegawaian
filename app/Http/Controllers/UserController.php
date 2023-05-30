<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

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
        if(request()-> segment(1) =='api') return response()->json([
            "error"=> false,
            "list" => $karyawan,
        ]);
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
        $this->validate($request,[
    		'email'=>'required',
    		'name'=>'required'
    	]);

    	$data['email'] = $request->email;
        $data['name'] = $request->name;
        $hashedPassword = Auth::user()->getAuthPassword();
        $data['password'] = $hashedPassword;
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
