@extends('index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Katalog Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/daftarProduk">Daftar Produk</a></li>
                <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <label> Form Tambah Produk</label>
                    <a href="/daftarProduk" type="button" class="btn btn-warning btn-sm float-right ms-auto"><i
                            class="bi bi-arrow-bar-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="card mb-4 text-bg-light">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <label> Modal</label>
                                        </div>
                                        <form action="/inputHargaModal" method="post" id="inputHargaModal">
                                            @csrf
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="text" name="harga"
                                                        class="form-control form-control-sm" id="harga"
                                                        autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="satuanProdukModal" class="form-label">Satuan</label>
                                                    <select class="js-example-basic-single" style="width: 100%"
                                                        name="satuan" id="satuanProdukModal">
                                                        <option value="">--Pilih Satuan--</option>
                                                        @foreach ($dataSatuanProduk as $item)
                                                            <option value="{{ $item->satuan }}">{{ $item->satuan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-footer text-muted">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bi bi-journal-plus"></i>
                                                    Tambahkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Harga Modal</th>
                                                        <th>Satuan</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabelHargaModal">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 text-bg-light">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <label> Jual</label>
                                        </div>
                                        <form action="/inputHargaJual" method="post" id="inputHargaJual">
                                            @csrf
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="text" name="harga"
                                                        class="form-control form-control-sm" id="harga"
                                                        autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="satuanProdukJual" class="form-label">Satuan</label>
                                                    <select class="js-example-basic-single" style="width: 100%"
                                                        name="satuan" id="satuanProdukJual">
                                                        <option value="">--Pilih Satuan--</option>
                                                        @foreach ($dataSatuanProduk as $item)
                                                            <option value="{{ $item->satuan }}">{{ $item->satuan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-footer text-muted">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bi bi-journal-plus"></i>
                                                    Tambahkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Harga Jual</th>
                                                        <th>Satuan</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabelHargaJual">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="/inputProduk" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card text-bg-light">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="namaProduk" class="form-label">Nama Produk</label>
                                        <input type="text" name="nama_produk"
                                            class="form-control form-control-sm @error('nama_produk') is-invalid @enderror"
                                            id="namaProduk" value="{{ old('nama_produk') }}" autocomplete="off">
                                        @error('nama_produk')
                                            <small style="color: red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="fotoProduk" class="form-label">Foto Produk</label>
                                        <input type="file" name="foto_produk"
                                            class="form-control form-control-sm @error('foto_produk') is-invalid @enderror"
                                            id="fotoProduk">
                                        @error('foto_produk')
                                            <small style="color: red;">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        // Harga Modal
        $(document).ready(function() {
            $.ajax({
                url: '/daftarHargaModal',
                method: 'GET',
                success: function(response) {
                    let formatter = new Intl.NumberFormat('id-ID', {
                        style: 'decimal',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0,
                    });
                    response.forEach(function(item, index) {
                        let formattedHarga = 'Rp ' + formatter.format(item.harga);
                        $('#tabelHargaModal').append(`
                            <tr data-index="${index}">
                                <td>${formattedHarga}</td>
                                <td>${item.satuan}</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-delete" data-id="${index}" id="hapusHargaModal">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        `);
                    });
                }
            });

            $('#inputHargaModal').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                let url = form.attr('action');
                let method = form.attr('method');
                let data = form.serialize();
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    success: function(response) {
                        $('#tabelHargaModal').empty();
                        let formatter = new Intl.NumberFormat('id-ID', {
                            style: 'decimal',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0,
                        });
                        response.forEach(function(item, index) {
                            let formattedHarga = 'Rp ' + formatter.format(item.harga);
                            $('#tabelHargaModal').append(`
                            <tr>
                                <td>${formattedHarga}</td>
                                <td>${item.satuan}</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-delete" data-id="${index}" id="hapusHargaModal">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            `);
                        });
                    }
                });
            });

            $(document).on('click', '#hapusHargaModal', function(e) {
                e.preventDefault();
                let index = $(this).data('id');

                $.ajax({
                    url: `/hapusHargaModal/${index}`,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                            'content')
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#tabelHargaModal tr').eq(index).remove();
                            $('#tabelHargaModal tr').each(function(index) {
                                $(this).find('.btn-delete').data('id', index);
                            });
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghapus!');
                    }
                });
            });
        });

        // Harga Jual
        $(document).ready(function() {
            $.ajax({
                url: '/daftarHargaJual',
                method: 'GET',
                success: function(response) {
                    let formatter = new Intl.NumberFormat('id-ID', {
                        style: 'decimal',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0,
                    });
                    response.forEach(function(item, index) {
                        let formattedHarga = 'Rp ' + formatter.format(item.harga);
                        $('#tabelHargaJual').append(`
                            <tr data-index="${index}">
                                <td>${formattedHarga}</td>
                                <td>${item.satuan}</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-delete" data-id="${index}" id="hapusHargaJual">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        `);
                    });
                }
            });

            $('#inputHargaJual').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                let url = form.attr('action');
                let method = form.attr('method');
                let data = form.serialize();
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    success: function(response) {
                        $('#tabelHargaJual').empty();
                        let formatter = new Intl.NumberFormat('id-ID', {
                            style: 'decimal',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0,
                        });
                        response.forEach(function(item, index) {
                            let formattedHarga = 'Rp ' + formatter.format(item.harga);
                            $('#tabelHargaJual').append(`
                            <tr>
                                <td>${formattedHarga}</td>
                                <td>${item.satuan}</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm btn-delete" data-id="${index}" id="hapusHargaJual">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            `);
                        });
                    }
                });
            });

            $(document).on('click', '#hapusHargaJual', function(e) {
                e.preventDefault();
                let index = $(this).data('id');

                $.ajax({
                    url: `/hapusHargaJual/${index}`,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                            'content')
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#tabelHargaJual tr').eq(index).remove();
                            $('#tabelHargaJual tr').each(function(index) {
                                $(this).find('.btn-delete').data('id', index);
                            });
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghapus!');
                    }
                });
            });
        });
    </script>
@endsection
