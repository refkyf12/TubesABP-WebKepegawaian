<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users;

class UserController extends Controller
{

    public function authenticate(Request $request){
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
            ]
            )){
                session()->put('nama', Auth::user()->name);
                return redirect('/karyawan');
        } else {
            return redirect('/login')->with('msg', 'Email/Password salah');   
        }

    }

    public function login(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //get credentials from request
        $credentials = $request->only('email', 'password');

        //if auth failed
        if(!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
        }

        //if auth success
        return response()->json([
            'success' => true,
            'user'    => auth()->guard('api')->user(),    
            'token'   => $token   
        ], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Users::all();
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
        $pass_crypt = bcrypt($request->password);
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

    public function show_karyawan(string $id)
    {
        $data = Users::find($id);
        // $lembur = Lembur::get();
        // $cuti = Cuti::get();
        // $data = Users::with('lembur', 'cuti', 'departement')->get();
        return view('karyawan.form_edit_account_karyawan', compact('data'));
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
        $data = Users::find($id);
        $data->nip = $request->nip;
        $data->name = $request->name;
        $data->telp = $request->telp;
        $data->gaji_total = $request->gaji_total;
        $data->departement = $request->departement;
        $data->update();
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