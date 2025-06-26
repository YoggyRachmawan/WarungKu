@extends('index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Satuan Produk</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <label> Form Tambah Satuan Produk </label>
                </div>
                <form action="/inputSatuanProduk" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" placeholder="Masukkan satuan produk baru" autocomplete="off">
                        @error('satuan')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="card-footer d-flex">
                        <button type="submit" class="btn btn-success float-right ms-auto btn-sm"><i class="bi bi-save"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <label> Daftar Satuan Produk </label>
                </div>
                <div class="card-body">
                    <table id="tabelData" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-start">No</th>
                                <th>Satuan</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-start">{{ $no++ }}.</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td class="text-center">
                                        <a href="/hapusSatuanProduk/{{ $item->id }}" class="btn btn-danger btn-sm"
                                            id="hapus" title='Hapus'><i class="bi bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
