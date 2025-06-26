<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\KeuanganChart;
use App\Models\ViewKeuanganBulanan;
use App\Models\ViewTotalKeuangan;
use Illuminate\Routing\Controller;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('tahun')) {
            // total_keuangan
            $dataTotalKeuangan = ViewTotalKeuangan::all();

            // daftar_tahun
            $daftarTahun = ViewKeuanganBulanan::select('tahun')->groupBy('tahun')->orderBy('tahun', 'desc')->get();

            // keuangan_tahunan
            $keuanganTahuanan = ViewKeuanganBulanan::where('tahun', 'LIKE', $request->tahun)->selectRaw('SUM(omset) as omset, SUM(modal) as modal, SUM(laba) as laba, tahun')->groupBy('tahun')->first();

            // Grafik 
            for ($i = 1; $i <= 12; $i++) {
                $omset = ViewKeuanganBulanan::where('tahun', 'LIKE', $request->tahun)->where('bulan', $i)->pluck('omset')->first();
                $modal = ViewKeuanganBulanan::where('tahun', 'LIKE', $request->tahun)->where('bulan', $i)->pluck('modal')->first();
                $laba = ViewKeuanganBulanan::where('tahun', 'LIKE', $request->tahun)->where('bulan', $i)->pluck('laba')->first();

                $dataOmset[] = $omset;
                $dataModal[] = $modal;
                $dataLaba[]  = $laba;
            }
        } else {
            // total_keuangan
            $dataTotalKeuangan = ViewTotalKeuangan::all();

            // daftar_tahun
            $daftarTahun = ViewKeuanganBulanan::select('tahun')->groupBy('tahun')->orderBy('tahun', 'desc')->get();

            // keuangan_tahunan
            $keuanganTahuanan = ViewKeuanganBulanan::where('tahun', date('Y'))->selectRaw('SUM(omset) as omset, SUM(modal) as modal, SUM(laba) as laba, tahun')->groupBy('tahun')->first();

            // Grafik 
            for ($i = 1; $i <= 12; $i++) {
                $omset = ViewKeuanganBulanan::where('tahun', date('Y'))->where('bulan', $i)->pluck('omset')->first();
                $modal = ViewKeuanganBulanan::where('tahun', date('Y'))->where('bulan', $i)->pluck('modal')->first();
                $laba = ViewKeuanganBulanan::where('tahun', date('Y'))->where('bulan', $i)->pluck('laba')->first();

                $dataOmset[] = $omset;
                $dataModal[] = $modal;
                $dataLaba[]  = $laba;
            }
        }

        return view('pages.beranda.index', [
            'totalKeuangan' => $dataTotalKeuangan,
            'daftarTahun' => $daftarTahun,
            'keuanganTahunan' => $keuanganTahuanan,
            'omset' => $dataOmset,
            'modal' => $dataModal,
            'laba' => $dataLaba
        ]);
    }
}
