<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class DaftarController extends Controller
{
    public function index(){
        return view('c_daftar',[
            'title' => 'daftar',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
        $validasi = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:pengguna',
            'password' => 'required'
        ]);
        $validasi['password'] = bcrypt($validasi['password']);
        Pengguna::create($validasi);

        return redirect('/login')->with('success', 'Kamu berhasil daftar silahkan login...');
    }
}
