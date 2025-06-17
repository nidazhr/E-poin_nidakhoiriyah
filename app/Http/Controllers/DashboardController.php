<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pelanggar;
use App\Models\Pelanggaran;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Jumlah total siswa
        $jmlSiswas = Siswa::count();

        // Jumlah total pelanggar
        $jmlPelanggars = Pelanggar::count();

        // Top 10 siswa dengan poin pelanggaran tertinggi
        $pelanggars = Pelanggar::orderByDesc('poin_pelanggar')
            ->limit(10)
            ->get();

        // Top 10 pelanggaran yang paling sering dilakukan
        $hitung = Pelanggaran::select('jenis', 'konsekuensi', 'poin', DB::raw('COUNT(*) as totals'))
            ->groupBy('jenis', 'konsekuensi', 'poin')
            ->orderByDesc('totals')
            ->limit(10)
            ->get();

        // Kirim semua ke view
        return view('admin.dashboard', compact(
            'jmlSiswas',
            'jmlPelanggars',
            'pelanggars',
            'hitung'
        ));
    }
}
