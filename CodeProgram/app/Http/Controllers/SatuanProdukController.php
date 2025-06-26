<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SatuanProduk;

class SatuanProdukController extends Controller
{
    public function index()
    {
        $data = SatuanProduk::orderBy('id','desc')->get();
        return view('pages.produk.satuanProduk.index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'satuan' => 'required',
            
        ],[
            'satuan.required' => 'Jangan kosong!'
        ]);
        
        SatuanProduk::create([
            'satuan'        => $request->satuan,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
        return back()->with('added', true);
    }

    public function destroy($id)
    {
        $data = SatuanProduk::find($id)->delete();
        return back();
    }
}
