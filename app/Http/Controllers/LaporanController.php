<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendapatan;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $pengeluaran = Pengeluaran::where('email', $user->email)->get();
        $pendapatan = Pendapatan::where('email', $user->email)->get();
        // Mengambil semua data pengeluaran
        $pengeluaranData = $pengeluaran->map(function ($item) {
            return [
                'kategori' => $item->kategori,
                'jumlah' => $item->jumlah,
                'jenis' => $item->jenis
            ];
        });
        $pendapatanData = $pendapatan->map(function ($item) {
            return [
                'kategori' => $item->kategori,
                'jumlah' => $item->jumlah,
                'jenis' => $item->jenis
            ];
        });

        return view('user.c_laporan', compact('pengeluaranData','pendapatanData','pengeluaran','pendapatan'));
    }
}
