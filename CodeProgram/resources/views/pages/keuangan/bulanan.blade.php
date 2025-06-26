@extends('index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Bulanan</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex">
                    <label> Daftar Keuangan Bulanan </label>
                </div>
                <div class="card-body">
                    <table id="tabelData" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tahun</th>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Omset</th>
                                <th class="text-center">Modal</th>
                                <th class="text-center">Laba</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $no++ }}.</td>
                                    <td class="text-center">{{ $item->tahun }}</td>
                                    <td class="text-center">{{ $item->bulan }}</td>
                                    <td>Rp {{ number_format($item->omset, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($item->modal, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($item->laba, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
