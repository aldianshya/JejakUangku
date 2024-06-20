<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;
use App\Models\Pengeluaran;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfilController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $pengeluaran = Pengeluaran::where('email', $user->email)->get();
        $pendapatan = Pendapatan::where('email', $user->email)->get();
        $pendapatan1 = Pendapatan::where('email', $user->email)->first();
        $pengeluaran1 = Pengeluaran::where('email', $user->email)->first();

        // Siapkan data untuk diagram lingkaran
        $pengeluaranData = $pengeluaran->groupBy('kategori')
                                        ->map(function ($row) {
                                            return $row->sum('jumlah');
                                        });
                                        // $pengeluaranData = $pengeluaran->map(function ($item) {
                                        //     return [
                                        //         'kategori' => $item->kategori,
                                        //         'jumlah' => $item->sum('jumlah'),
                                        //         'jenis' => $item->jenis
                                        //     ];
                                        // });                                
                                        $totalPengeluaran = $pengeluaranData->sum(); // Total pengeluaran
        $pendapatanData = $pendapatan->groupBy('kategori')
                                        ->map(function ($row) {
                                            return $row->sum('jumlah');
                                        });
                                        // $pengeluaranData = $pengeluaran->map(function ($item) {
                                        //     return [
                                        //         'kategori' => $item->kategori,
                                        //         'jumlah' => $item->sum('jumlah'),
                                        //         'jenis' => $item->jenis
                                        //     ];
                                        // });                                
                                        $totalPendapatan = $pendapatanData->sum(); // Total pengeluaran

                                        return view('user.c_profil', compact('pendapatanData','totalPendapatan','pengeluaran', 'pendapatan', 'pendapatan1', 'pengeluaran1', 'pengeluaranData', 'totalPengeluaran'));
}
public function update(Request $request): RedirectResponse
{
    $validatedData = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = $request->user();
    $validatedData['email'] = $user->email; // Jika email tidak diubah, ini mungkin tidak diperlukan

    // Handle password change
    if (!empty($validatedData['password'])) {
        $validatedData['password'] = bcrypt($validatedData['password']);
    } else {
        unset($validatedData['password']);
    }

    // Update user data
    $user->update($validatedData);

    return redirect()->route('profil')->with('status', 'profile-updated');
}

}