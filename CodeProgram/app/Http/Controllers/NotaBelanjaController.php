<?php

namespace App\Http\Controllers;

use App\Models\NotaBelanja;
use Illuminate\Http\Request;
use App\Models\TempatBelanja;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class NotaBelanjaController extends Controller
{
    public function index()
    {
        $data = NotaBelanja::select('nota_belanja.id','tanggal', 'nota', 'nama_tempat', 'total_harga')
                ->join('tempat_belanja', 'nota_belanja.id_tempat_belanja', '=', 'tempat_belanja.id')
                ->orderBy('tanggal', 'desc')
                ->get();
        return view('pages.belanja.notaBelanja.index', ['data' => $data]);
    }

    public function create()
    {
        $data = TempatBelanja::select('id', 'nama_tempat')->get();
        return view('pages.belanja.notaBelanja.formTambahNotaBelanja', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal'           => 'required|date',
            'id_tempat_belanja' => 'required|numeric',
            'nota'              => 'required|mimes:png,jpg,jpeg',
            'total_harga'       => 'required|numeric'
        ], [
            'tanggal.required'              => 'Jangan kosong!',
            'id_tempat_belanja.required'    => 'Jangan kosong!',
            'nota.required'                 => 'Jangan kosong!',
            'nota.mimes'                    => 'Format foto harus png, jpg atau jpeg!',
            'total_harga.required'          => 'Jangan kosong!',
            'total_harga.numeric'           => 'Hanya angka!'
        ]);

        $fotoNota = $request->file('nota');
        $namaFotoNota = $fotoNota->getClientOriginalName();
        $path = 'foto_nota/'.$namaFotoNota;
        Storage::disk('public')->put($path, file_get_contents($fotoNota));

        NotaBelanja::create([
            'tanggal'           => $request->tanggal,
            'nota'              => $namaFotoNota,
            'id_tempat_belanja' => $request->id_tempat_belanja,
            'total_harga'       => $request->total_harga,
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
        return redirect('/daftarNotaBelanja')->with('added', true);
    }

    public function edit($id)
    {
        $tempatBelanja = TempatBelanja::select('id', 'nama_tempat')->get();
        $data = NotaBelanja::find($id);
        return view('pages.belanja.notaBelanja.formEditNotaBelanja', ['data' => $data, 'tempatBelanja' => $tempatBelanja]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal'           => 'required|date',
            'id_tempat_belanja' => 'required|numeric',
            'nota'              => 'mimes:png,jpg,jpeg',
            'total_harga'       => 'required|numeric'
        ], [
            'tanggal.required'              => 'Jangan kosong!',
            'id_tempat_belanja.required'    => 'Jangan kosong!',
            'nota.mimes'                    => 'Format foto harus png, jpg atau jpeg!',
            'total_harga.required'          => 'Jangan kosong!',
            'total_harga.numeric'           => 'Hanya angka!'
        ]);

        $fotoNota = $request->file('nota');
        $data = NotaBelanja::find($id);

        if (isset($fotoNota)) {
            $namaFotoNota = $fotoNota->getClientOriginalName();
            $path = 'foto_nota/'.$namaFotoNota;
            Storage::disk('public')->put($path, file_get_contents($fotoNota));
            Storage::disk('public')->delete('foto_nota/'.$data['nota']);
        } else {
            $namaFotoNota = $data['nota'];
        }
        
        $data->update([
            'tanggal'           => $request->tanggal,
            'nota'              => $namaFotoNota,
            'id_tempat_belanja' => $request->id_tempat_belanja,
            'total_harga'       => $request->total_harga,
            'updated_at'        => now()
        ]);
        return redirect('/daftarNotaBelanja')->with('edited', true);
    }

    public function destroy($id)
    {
        $data = NotaBelanja::find($id);
        Storage::disk('public')->delete('foto_nota/'.$data['nota']);
        $data->delete();
        return back();
    }
}
