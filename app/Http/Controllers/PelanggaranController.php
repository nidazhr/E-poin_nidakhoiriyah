<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PelanggaranController extends Controller
{
    /**
     * Menampilkan daftar pelanggaran.
     */
    public function index(): View
    {
        // Jika ada pencarian
        if (request()->has('cari')) {
            $pelanggarans = Pelanggaran::whereRaw('LOWER(jenis) LIKE ?', ['%' . strtolower(request('cari')) . '%'])
                ->latest()
                ->paginate(10);
        } else {
            $pelanggarans = Pelanggaran::latest()->paginate(10);
        }

        return view('admin.pelanggaran.index', compact('pelanggarans'));
    }

    /**
     * Tampilkan form tambah pelanggaran.
     */
    public function create(): View
    {
        return view('admin.pelanggaran.create');
    }

    /**
     * Simpan data pelanggaran baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis' => 'required|string|max:250',
            'konsekuensi' => 'required|string|max:250',
            'poin' => 'required|integer'
        ]);

        Pelanggaran::create([
            'jenis' => $request->jenis,
            'konsekuensi' => $request->konsekuensi,
            'poin' => $request->poin
        ]);

        return redirect()->route('pelanggaran.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Tampilkan form edit pelanggaran.
     */
    public function edit(string $id): View
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        return view('admin.pelanggaran.edit', compact('pelanggaran'));
    }

    /**
     * Update data pelanggaran.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'jenis' => 'required|string|max:250',
            'konsekuensi' => 'required|string|max:250',
            'poin' => 'required|integer'
        ]);

        $pelanggaran = Pelanggaran::findOrFail($id);
        $pelanggaran->update([
            'jenis' => $request->jenis,
            'konsekuensi' => $request->konsekuensi,
            'poin' => $request->poin
        ]);

        return redirect()->route('pelanggaran.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Hapus data pelanggaran.
     */
    public function destroy(string $id): RedirectResponse
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $pelanggaran->delete();

        return redirect()->route('pelanggaran.index')->with('success', 'Data berhasil dihapus.');
    }
}
