<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\Pengeluaran;
use App\Models\Pendapatan;
use App\Models\User;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function tpel(Request $request)
    {
        $request->validate([
            'pilihan' => 'required|in:pendapatan,pengeluaran',
            'tanggal' => 'required|date',
            'jenis' => 'required|string',
            'jumlah' => 'required|numeric',
            'pilihan' => 'required|string',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }
        if ($request->pilihan == 'pendapatan'){
            Pendapatan::create([
                'email' => $user->email,
                'tanggal' => $request->tanggal,
                'jenis' => $request->jenis,
                'jumlah' => $request->jumlah,
                'pilihan' => $request->pilihan
            ]);        
    //         $pendapatan = $user->pendapatan;  // Mengambil semua pendapatan untuk pengguna ini

    // return view('dashboard', compact('pendapatan'));
        }
        else {
            Pengeluaran::create([
                'email' => $user->email,
                'tanggal' => $request->tanggal,
                'jenis' => $request->jenis,
                'jumlah' => $request->jumlah,
                'pilihan' => $request->pilihan
            ]);
        }
        
        return redirect()->route('dashboard');
    }
}

