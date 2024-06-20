<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;


class PengeluaranController extends Controller
{
    public function index()
    {
        $data = Pengeluaran::all();
        // dd($dataLapangan);

        return view('user/c_dashboard',compact('data'));
    }
    public function create()
    {
        return view('user/c_dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $validasi = $request->validate([
            'email' => 'required|string|max:255',
            'tanggal' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            // 'gambar' => 'required|mimes:jpeg,png,jpg',
        ]);
        $userEmail = Auth::user()->email;

        // Simpan data ke tabel dengan email sebagai foreign key
        $data = new Pengguna();
        $data->email = $userEmail; // Simpan email pengguna
        $data->tanggal = $request->input('tanggal');
        $data->jenis = $request->input('jenis');
        $data->jumlah = $request->input('jumlah');
        $data->save();
        Pengeluaran::create($validasi);
        return redirect('/dashboard')->with('success', 'Kamu berhasil daftar silahkan login...');

}
}
// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Lapangan;

// class LapanganController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $dataLapangan = Lapangan::all();
//         // dd($dataLapangan);

//         return view('lapangan/index',compact('dataLapangan'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         return view('lapangan/tambah-data');
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         // dd($request);

//         $request->validate([
//             'no_lapangan' => 'required|string|max:255',
//             'tipe_lapangan' => 'required|string|max:255',
//             // 'gambar' => 'required|mimes:jpeg,png,jpg',
//         ],[
//             'no_lapangan' => 'Pastikan No Lapangan Diisi'
//         ]);



//         // $gambarPath = null;
//         if ($request->hasFile('gambar')) {
//             $file = $request->file('gambar');
//             $extension = $file->getClientOriginalExtension(); // you can also use file name
//             $fileName = time().'.'.$extension;
//             $path = public_path().'/images/lapangan';
//             $uplaod = $file->move($path,$fileName);
//         }else{
//             return redirect()->back()->with('error','Pastikan Anda Mengupload Gambar');
//         }

//         Lapangan::create([
//             'no_lapangan' => $request->input('no_lapangan'),
//             'tipe_lapangan' => $request->input('tipe_lapangan'),
//             'gambar' => $fileName,
//         ]);
//         return redirect()->route('lapangan/index')->with('success', 'Lapangan Berhasil Ditambah');
//     }

//     public function edit($id)
//     {
//         $dataLapangan = Lapangan::find($id);

//         return view('lapangan/edit-data', compact('dataLapangan'));
//     }

//     public function update(Request $request,$id)
//     {

//         $request->validate([
//             'no_lapangan' => 'required|string|max:255',
//             'tipe_lapangan' => 'required|string|max:255',
//             // 'gambar' => 'required|mimes:jpeg,png,jpg',
//         ],[
//             'no_lapangan' => 'Pastikan No Lapangan Diisi'
//         ]);



//         // $gambarPath = null;

//         if ($request->hasFile('gambar')) {
//             $file = $request->file('gambar');
//             $extension = $file->getClientOriginalExtension(); // you can also use file name
//             $fileName = time().'.'.$extension;
//             $path = public_path().'/images/lapangan';
//             $upload = $file->move($path,$fileName);

//             Lapangan::where('id_lapangan',$id)->update([
//                 'no_lapangan' => $request->input('no_lapangan'),
//                 'tipe_lapangan' => $request->input('tipe_lapangan'),
//                 'gambar' => $fileName,
//             ]);
//         }else{

//             Lapangan::where('id_lapangan',$id)->update([
//                 'no_lapangan' => $request->input('no_lapangan'),
//                 'tipe_lapangan' => $request->input('tipe_lapangan'),
//             ]);
//         }


//         return redirect()->route('lapangan/index')->with('success', 'Lapangan Berhasil Diubah');
//     }


//     public function destroy($id)
//     {
//         Lapangan::find($id)->delete();
//         return redirect('data-lapangan')->with('success', 'Product deleted successfully');
//     }
// }