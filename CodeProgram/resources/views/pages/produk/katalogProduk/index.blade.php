@extends('index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Katalog Produk</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <label>Daftar Produk</label>
                    <a href="/formTambahProduk" type="button" class="btn btn-primary btn-sm float-right ms-auto"><i
                            class="bi bi-card-list"></i>
                        Tambah Produk
                    </a>
                </div>
                <div class="card-body">
                    <table id="tabelData" class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Produk</th>
                                <th class="text-center">Foto Produk</th>
                                <th>Harga Modal</th>
                                <th>Harga Jual</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $no++ }}.</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#zoomFotoProduk{{ $item->id }}">
                                            <img src="{{ asset('storage/foto_produk/' . $item->foto_produk) }}" style="width : 100px; ">
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="zoomFotoProduk{{ $item->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $item->nama_produk }}
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('storage/foto_produk/' . $item->foto_produk) }}"
                                                            class="w-100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{!! nl2br($item->harga_modal) !!}</td>
                                    <td>{!! nl2br($item->harga_jual) !!}</td>
                                    <td class="text-center">
                                        <a href="/formEditProduk/{{ $item->nomor_produk }}" class="btn btn-warning btn-sm"><i
                                                class="bi bi-pen-fill"></i>
                                            Edit</a>
                                        <a href="/hapusProduk/{{ $item->nomor_produk }}" class="btn btn-danger btn-sm" id="hapus"><i
                                                class="bi bi-trash-fill"></i>
                                            Hapus</a>
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
