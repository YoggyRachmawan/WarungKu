<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\ViewKeuanganBulanan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function indexHarian()
    {
        $data = Keuangan::orderBy('tanggal', 'desc')->get();
        return view('pages.keuangan.harian', ['data' => $data]);
    }

    public function indexBulanan()
    {
        $data = ViewKeuanganBulanan::orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->get();
        return view('pages.keuangan.bulanan', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'omset'   => 'required|numeric'
        ], [
            'tanggal.required' => 'Jangan kosong!',
            'omset.required'  => 'Jangan kosong!',
            'omset.numeric'   => 'Hanya angka!'
        ]);

        $laba = ($request->omset / 100) * 15;
        $modal = $request->omset - $laba;

        $exist = Keuangan::where('tanggal', $request->tanggal)->exists();

        if (!$exist) {
            Keuangan::create([
                'tanggal'       => $request->tanggal,
                'omset'         => $request->omset,
                'modal'         => $modal,
                'laba'          => $laba,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
            return back()->with('added', true);
        } else {
            return back()->with('inputFailed', true);
        }
    }
    
    public function destroy($id)
    {
        $data = Keuangan::find($id)->delete();
        return back();
    }
}
