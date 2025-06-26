@extends('index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Nota Belanja</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/daftarNotaBelanja">Daftar Nota Belanja</a></li>
                <li class="breadcrumb-item">Edit Nota Belanja</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <label> Form Edit Nota Belanja</label>
                    <a href="/daftarNotaBelanja" type="button" class="btn btn-warning btn-sm float-right ms-auto"><i
                            class="bi bi-arrow-bar-left"></i>
                        Kembali
                    </a>
                </div>
                <form action="/editNotaBelanja/{{ $data->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="tanggalNotaBelanja" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control form-control-sm @error('tanggal') is-invalid @enderror"
                                    id="tanggalNotaBelanja" value={{ $data->tanggal }}>
                                @error('tanggal')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-9">
                                <label for="tempatBelanja" class="form-label">Tempat Belanja</label>
                                <select class="js-example-basic-single @error('id_tempat_belanja') is-invalid @enderror"
                                    style="width: 100%" name="id_tempat_belanja">
                                    <option value="">--Pilih Tempat Belanja--</option>
                                    @foreach ($tempatBelanja as $item)
                                        @if ($data->id_tempat_belanja == $item->id)
                                            <option value="{{ $item->id }}" selected>
                                                {{ $item->nama_tempat }}</option>
                                        @else
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_tempat }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('id_tempat_belanja')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="notaSaatIni" class="form-label">Nota</label>
                                    <i id="notaSaatIni" class="form-control form-control-sm">{{ $data->nota }}</i>
                                </div>
                                <div class="col-lg-9">
                                    <label for="notaPengganti" class="form-label">Nota Pengganti</label>
                                    <input type="file" name="nota"
                                        class="form-control form-control-sm @error('nota') is-invalid @enderror"
                                        id="notaPengganti">
                                    @error('nota')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="totalHarga" class="form-label">Total Harga</label>
                            <input type="text" name="total_harga"
                                class="form-control form-control-sm @error('total_harga') is-invalid @enderror"
                                id="totalHarga" value={{ $data->total_harga }} autocomplete="off">
                            @error('total_harga')
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
