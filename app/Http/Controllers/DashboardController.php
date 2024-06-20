<?php
namespace App\Http\Controllers;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use App\Models\Pendapatan;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
{
    $user = Auth::user();
    $pengeluaran = Pengeluaran::where('email', $user->email)->get();
    $pendapatan = Pendapatan::where('email', $user->email)->get();
    $pendapatan1 = Pendapatan::where('email', $user->email)->first();
    $pengeluaran1 = Pengeluaran::where('email', $user->email)->first();
    return view('user.c_dashboard', compact('pengeluaran', 'pendapatan', 'pendapatan1','pengeluaran1'));
}

    

public function store(Request $request)
{
    if (Auth::check()) {
        $userEmail = Auth::user()->email;
        
        $validasi = $request->validate([
            'email' => $userEmail,
            'tanggal' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            // 'gambar' => 'required|mimes:jpeg,png,jpg',
        ]);

        Pengeluaran::create($validasi);
        return redirect('/dashboard')->with('success', 'Data pengeluaran berhasil disimpan.');
    } else {
        return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
    }
}
public function update(Request $request): RedirectResponse
{
    $validatedData = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);
    $validatedData['email'] = auth()->user()->email;
    $user = $request->user();

    // $user->fill($validatedData);

    // Handle email change
    // if ($user->isDirty('email')) {
    //     $user->email_verified_at = null;
    // }

    // Handle password change
    if (!empty($validatedData['password'])) {
        $user->password = bcrypt($validatedData['password']);
    }

    // $user->save();
    User::where('id', $user->email)
                ->update($validatedData);
    return redirect()->route('profil')->with('status', 'profile-updated');
}
}
