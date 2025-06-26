@extends('index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tempat Belanja</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <label>Daftar Tempat Belanja</label>
                    <a href="/formTambahTempatBelanja" type="button" class="btn btn-primary btn-sm float-right ms-auto"><i
                            class="bi bi-card-list"></i>
                        Tambah Tempat Belanja
                    </a>
                </div>
                <div class="card-body">
                    <table id="tabelData" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Tempat</th>
                                <th class="text-center">Kontak</th>
                                <th class="text-center">Alamat</th>
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
                                    <td>{{ $item->nama_tempat }}</td>
                                    <td class="text-center">{{ $item->kontak }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td class="text-center">
                                        <a href="/formEditTempatBelanja/{{ $item->id }}" class="btn btn-warning btn-sm"><i
                                                class="bi bi-pen-fill"></i> Edit</a>
                                        <a href="/hapusTempatBelanja/{{ $item->id }}" class="btn btn-danger btn-sm" id="hapus"><i
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
