@extends('index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Harian</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <label> Form Tambah Keuangan </label>
                </div>
                <form action="/inputKeuanganHarian" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <input type="date" name="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror"
                                    placeholder="Masukkan omset harian" autocomplete="off" value={{ date('Y-m-d') }}>
                                @error('tanggal')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="omset"
                                    class="form-control @error('omset') is-invalid @enderror"
                                    placeholder="Masukkan omset harian" autocomplete="off">
                                @error('omset')
                                    <small style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex">
                        <button type="submit" class="btn btn-success float-right ms-auto btn-sm"><i class="bi bi-save"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <label> Daftar Keuangan Harian </label>
                </div>
                <div class="card-body">
                    <table id="tabelData" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Omset</th>
                                <th class="text-center">Modal</th>
                                <th class="text-center">Laba</th>
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
                                    <td>Rp {{ number_format($item->omset, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($item->modal, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($item->laba, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <a href="/hapusKeuanganHarian/{{ $item->id }}" class="btn btn-danger btn-sm" id="hapus"><i
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
