@extends('index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Nota Belanja</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <label>Daftar Nota Belanja</label>
                    <a href="/formTambahNotaBelanja" type="button" class="btn btn-primary btn-sm float-right ms-auto"><i
                            class="bi bi-card-list"></i>
                        Tambah Nota Belanja
                    </a>
                </div>
                <div class="card-body">
                    <table id="tabelData" class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Nota</th>
                                <th class="text-center">Tempat Belanja</th>
                                <th class="text-center">Total Harga</th>
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
                                    <td class="text-center">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#zoomNota{{ $item->id }}">
                                            <img src="{{ asset('storage/foto_nota/' . $item->nota) }}"
                                                style="width : 100px; ">
                                        </button>
                                    </td>
                                    <!-- Zoom Nota -->
                                    <div class="modal fade" id="zoomNota{{ $item->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $item->nama_tempat }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('storage/foto_nota/' . $item->nota) }}" class="w-100">
                                                </div>
                                                <div class="modal-footer">
                                                    <p class="card-text"><small class="text-body-secondary">Tanggal :
                                                            {{ date('d-m-Y', strtotime($item->tanggal)) }}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td class="text-center">{{ $item->nama_tempat }}</td>
                                    <td class="text-center">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <a href="/formEditNotaBelanja/{{ $item->id }}" class="btn btn-warning btn-sm"><i
                                                class="bi bi-pen-fill"></i>
                                            Edit</a>
                                        <a href="/hapusNotaBelanja/{{ $item->id }}" class="btn btn-danger btn-sm" id="hapus"><i
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
