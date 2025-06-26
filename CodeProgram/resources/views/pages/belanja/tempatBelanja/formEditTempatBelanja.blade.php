@extends('index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tempat Belanja</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/daftarTempatBelanja">Daftar Tempat Belanja</a></li>
                <li class="breadcrumb-item">Edit Tempat Belanja</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <label> Form Edit Tempat Belanja</label>
                    <a href="/daftarTempatBelanja" type="button" class="btn btn-warning btn-sm float-right ms-auto"><i
                            class="bi bi-arrow-bar-left"></i>
                        Kembali
                    </a>
                </div>
                <form action="/editTempatBelanja/{{ $data->id }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="namaTempat" class="form-label">Nama Tempat</label>
                            <input type="text" name="nama_tempat" class="form-control form-control-sm @error('nama_tempat') is-invalid @enderror" id="namaTempat" autocomplete="off" value="{{ $data->nama_tempat }}">
                            @error('nama_tempat')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kontak" class="form-label">Kontak</label>
                            <input type="text" name="kontak"
                                class="form-control form-control-sm @error('kontak') is-invalid @enderror" id="kontak" autocomplete="off" value="{{ $data->kontak }}">
                            @error('kontak')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                style="height: 100px" autocomplete="off">{{ $data->alamat }}</textarea>
                            @error('alamat')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer d-flex">
                        <button type="submit" class="btn btn-success float-right ms-auto"><i class="bi bi-save"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
