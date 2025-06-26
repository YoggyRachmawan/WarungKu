@extends('index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Nota Belanja</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/daftarNotaBelanja">Daftar Nota Belanja</a></li>
                <li class="breadcrumb-item">Tambah Nota Belanja</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <label> Form Tambah Nota Belanja</label>
                    <a href="/daftarNotaBelanja" type="button" class="btn btn-warning btn-sm float-right ms-auto"><i
                            class="bi bi-arrow-bar-left"></i>
                        Kembali
                    </a>
                </div>
                <form action="/inputNotaBelanja" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="tanggalBelanja" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control form-control-sm @error('tanggal') is-invalid @enderror"
                                    id="tanggalBelanja" value={{ date('Y-m-d') }}>
                                @error('tanggal')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-9">
                                <label for="tempatBelanja" class="form-label">Tempat Belanja</label>
                                <select class="js-example-basic-single @error('id_tempat_belanja') is-invalid @enderror"
                                    style="width: 100%" name="id_tempat_belanja">
                                    <option value="">--Pilih Tempat Belanja--</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_tempat }}</option>
                                    @endforeach
                                </select>
                                @error('id_tempat_belanja')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="notaBelanja" class="form-label">Nota</label>
                            <input type="file" name="nota"
                                class="form-control form-control-sm @error('nota') is-invalid @enderror" id="notaBelanja">
                            @error('nota')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="totalHarga" class="form-label">Total Harga</label>
                            <input type="text" name="total_harga"
                                class="form-control form-control-sm @error('total_harga') is-invalid @enderror"
                                id="totalHarga" autocomplete="off">
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
