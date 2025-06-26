<?php

namespace App\Http\Controllers;

use App\Models\Belanjaan;
use App\Models\HargaJual;
use App\Models\HargaModal;
use App\Models\SatuanProduk;
use Illuminate\Http\Request;
use App\Models\KatalogProduk;
use App\Models\TempatBelanja;
use App\Http\Controllers\Controller;
use App\Models\ViewKatalogProduk;
use Illuminate\Support\Facades\Storage;

class KatalogProdukController extends Controller
{
    public function index()
    {
        $data = ViewKatalogProduk::orderBy('id', 'desc')->get();
        return view('pages.produk.katalogProduk.index', ['data' => $data]);
    }

    public function create()
    {
        session()->forget('hargaModal');
        session()->forget('hargaJual');
        $dataSatuanProduk = SatuanProduk::all();
        return view('pages.produk.katalogProduk.formTambahProduk', ['dataSatuanProduk' => $dataSatuanProduk]);
    }

    public function store(Request $request)
    {
        // nomor_produk
        $idKatalogProduk = KatalogProduk::max('id');
        $nomorProduk = 'PRD' . '-' . date('dmY') . '-' . $idKatalogProduk + 1;

        // validasi data_produk
        $validasi = $request->validate([
            'nama_produk'   => 'required',
            'foto_produk'   => 'required|mimes:png,jpg,jpeg'
        ], [
            'nama_produk.required'  => 'Jangan kosong!',
            'foto_produk.required'  => 'Jangan kosong!',
            'foto_produk.mimes'     => 'Format foto harus png, jpg atau jpeg!',
        ]);

        if (!empty(session('hargaModal') && session('hargaJual')) && $validasi == true) {
            // harga_modal
            $dataHargaModal = [];
            foreach (session('hargaModal') as $itemHargaModal) {
                $dataHargaModal[] = [
                    'nomor_produk'  => $nomorProduk,
                    'harga_modal'   => (int) $itemHargaModal['harga'],
                    'satuan_produk' => $itemHargaModal['satuan'],
                    'created_at'    => now(),
                    'updated_at'    => now()
                ];
            }
            HargaModal::insert($dataHargaModal);

            // harga_jual
            $dataHargaJual = [];
            foreach (session('hargaJual') as $itemHargaJual) {
                $dataHargaJual[] = [
                    'nomor_produk'  => $nomorProduk,
                    'harga_jual'    => (int) $itemHargaJual['harga'],
                    'satuan_produk' => $itemHargaJual['satuan'],
                    'created_at'    => now(),
                    'updated_at'    => now()
                ];
            }
            HargaJual::insert($dataHargaJual);

            // data_produk
            $fotoProduk = $request->file('foto_produk');
            $namaFotoProduk = $fotoProduk->getClientOriginalName();
            $path = 'foto_produk/' . $namaFotoProduk;
            Storage::disk('public')->put($path, file_get_contents($fotoProduk));

            KatalogProduk::create([
                'nomor_produk'  => $nomorProduk,
                'nama_produk'   => $request->nama_produk,
                'foto_produk'   => $namaFotoProduk,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);

            // bersihkan_session
            session()->forget('hargaModal');
            session()->forget('hargaJual');

            return redirect('/daftarProduk')->with('added', true);
        } else {
            return back()->with('unsuccessful', true);
        }
    }

    public function edit($nomorProduk)
    {
        session()->forget('hargaModal');
        session()->forget('hargaJual');

        // harga_modal
        $dataHargaModal = HargaModal::where('nomor_produk', $nomorProduk)->get();
        foreach ($dataHargaModal as $itemHargaModal) {
            $hargaModalSaatIni[] = [
                'harga' => $itemHargaModal->harga_modal,
                'satuan' => $itemHargaModal->satuan_produk
            ];
        }
        $dataHargaModalSaatIni = session()->get('hargaModal', $hargaModalSaatIni);
        session()->put('hargaModal', $dataHargaModalSaatIni);

        // harga_jual
        $dataHargaJual = HargaJual::where('nomor_produk', $nomorProduk)->get();
        foreach ($dataHargaJual as $itemHargaJual) {
            $hargaJualSaatIni[] = [
                'harga' => $itemHargaJual->harga_jual,
                'satuan' => $itemHargaJual->satuan_produk
            ];
        }
        $dataHargaJualSaatIni = session()->get('hargaJual', $hargaJualSaatIni);
        session()->put('hargaJual', $dataHargaJualSaatIni);

        // data_satuan_produk
        $dataSatuanProduk = SatuanProduk::all();

        // data_produk
        $dataProduk = KatalogProduk::where('nomor_produk', $nomorProduk)->first();

        return view('pages.produk.katalogProduk.formEditProduk', ['dataSatuanProduk' => $dataSatuanProduk, 'dataProduk' => $dataProduk]);
    }

    public function update(Request $request, $nomorProduk)
    {
        // validasi data_produk
        $validasi = $request->validate([
            'nama_produk'   => 'required',
            'foto_produk'   => 'mimes:png,jpg,jpeg'
        ], [
            'nama_produk.required'  => 'Jangan kosong!',
            'foto_produk.mimes'     => 'Format foto harus png, jpg atau jpeg!',
        ]);

        if (!empty(session('hargaModal') && session('hargaJual')) && $validasi == true) {

            // hapus_data_pada_tabel_hargaModal&hargaJual_berdasarkan_nomorProduk
            HargaModal::where('nomor_produk', $nomorProduk)->delete();
            HargaJual::where('nomor_produk', $nomorProduk)->delete();

            // harga_modal
            $dataHargaModal = [];
            foreach (session('hargaModal') as $itemHargaModal) {
                $dataHargaModal[] = [
                    'nomor_produk'  => $nomorProduk,
                    'harga_modal'   => $itemHargaModal['harga'],
                    'satuan_produk' => $itemHargaModal['satuan'],
                    'created_at'    => now(),
                    'updated_at'    => now()
                ];
            }
            HargaModal::insert($dataHargaModal);

            // harga_jual
            $dataHargaJual = [];
            foreach (session('hargaJual') as $itemHargaJual) {
                $dataHargaJual[] = [
                    'nomor_produk'  => $nomorProduk,
                    'harga_jual'    => $itemHargaJual['harga'],
                    'satuan_produk' => $itemHargaJual['satuan'],
                    'created_at'    => now(),
                    'updated_at'    => now()
                ];
            }
            HargaJual::insert($dataHargaJual);

            // data_produk
            $fotoProduk = $request->file('foto_produk');
            $dataProduk = KatalogProduk::where('nomor_produk', $nomorProduk)->first();
            
            if (isset($fotoProduk)) {
                $namaFotoProduk = $fotoProduk->getClientOriginalName();
                $path = 'foto_produk/' . $namaFotoProduk;
                Storage::disk('public')->put($path, file_get_contents($fotoProduk));
                Storage::disk('public')->delete('foto_produk/'.$dataProduk['foto_produk']);
            } else {
                $namaFotoProduk = $dataProduk['foto_produk'];
            }

            $dataProduk->update([
                'nama_produk'   => $request->nama_produk,
                'foto_produk'   => $namaFotoProduk,
                'updated_at'    => now()
            ]);

            // bersihkan_session
            session()->forget('hargaModal');
            session()->forget('hargaJual');

            return redirect('/daftarProduk')->with('added', true);
        } else {
            return back()->with('unsuccessful', true);
        }
    }

    public function destroy($nomorProduk)
    {
        // data_produk
        $dataProduk = KatalogProduk::where('nomor_produk', $nomorProduk)->first();
        Storage::disk('public')->delete('foto_produk/' . $dataProduk['foto_produk']);
        $dataProduk->delete();

        // data_harga
        HargaModal::where('nomor_produk', $nomorProduk)->delete();
        HargaJual::where('nomor_produk', $nomorProduk)->delete();

        return back();
    }
}
