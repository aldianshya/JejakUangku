<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use app\Models\Pengguna;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('c_daftar');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $validasi = $request->validate([
        //     'username' => 'required',
        //     'email' => 'required|email|unique:pengguna',
        //     'password' => 'required'
        // ]);
        // $validasi['password'] = bcrypt($validasi['password']);
        // Pengguna::create($validasi);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // return redirect('/login')->with('success', 'Kamu berhasil daftar silahkan login...');
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        

        // event(new Registered($user));

        Auth::login($user);
        
        return redirect(route('/login', absolute: false));
    }
}
