<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth/login', [
            'title' => 'login', // Perbaikan typo dari 'tittle' menjadi 'title'
            'active' => 'login'
        ]);
    }

    public function store(Request $request){
        $valid = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($valid)) {
            $request->session()->regenerate();
            return redirect()->intended('/aut/login');
        }
        // $email = 'email';
        // Menampilkan pesan error jika login gagal
        return back()->with('loginError', "Login Gagal!!!");
    }
}
