<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PelanggaranController extends Controller
{
    /**
     * Menampilkan daftar pelanggaran.
     */
    public function index(): View
    {
        // Mengambil data pelanggaran dari database, diurutkan dari yang terbaru dan dipaginasi 10 data per halaman
        $pelanggarans = Pelanggaran::latest()->paginate(10);

        if (request('cari')) {
            $pelanggarans = $this->search(request('cari'));
        }
    

        // Mengembalikan tampilan dengan data pelanggaran
        return view('admin.pelanggaran.index', compact('pelanggarans'));
    }
    
    public function create()
    {
        return view('admin.pelanggaran.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:250',
            'konsekuensi' => 'required|string|max:250',
            'poin' => 'required'
        ]);

        pelanggaran::create([
            'jenis' => $request->jenis,
            'konsekuensi' => $request->konsekuensi,
            'poin' => $request->poin
        ]);

        return redirect()->route('pelanggaran.index')->with(['success' => 'Data Berhasil Di simpan']);
    }
    public function search(string $cari)
    {
        $pelanggarans = DB::table('pelanggaran')->where(DB::raw('lower(jenis)'), 'like', '%' . strtolower($cari) . '%')->paginate(10);
        return $pelanggarans;
    }

    public function edit(string $id): View
    {
        //get Data db
        $pelanggaran - pelanggaran::where('id', $id)
        ->first();
        return view('admin.pelanggaran.edit', compact('pelanggaran'));
    }

}
