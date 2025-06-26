@extends('index')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Beranda</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex">
                            <label>Total Keuangan</label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($totalKeuangan as $item)
                                    <div class="col-xl-4 col-md-4">
                                        <div class="card text-bg-secondary mb-4">
                                            <div class="card-body text-center display-6">Rp
                                                {{ number_format($item->total_omset, 0, ',', '.') }}</div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <i class="bi bi-cash-stack"></i>
                                                <label class="small text-white fw-bold">Total Omset</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4">
                                        <div class="card text-bg-secondary mb-4">
                                            <div class="card-body text-center display-6">Rp
                                                {{ number_format($item->total_modal, 0, ',', '.') }}</div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <i class="bi bi-cash-stack"></i>
                                                <label class="small text-white fw-bold">Total Modal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4">
                                        <div class="card text-bg-secondary mb-4">
                                            <div class="card-body text-center display-6">Rp
                                                {{ number_format($item->total_laba, 0, ',', '.') }}</div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <i class="bi bi-cash-stack"></i>
                                                <label class="small text-white fw-bold">Total Laba</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex">
                            @if (!empty($keuanganTahunan['tahun']))
                                <label>Keuangan Tahun {{ $keuanganTahunan['tahun'] }}</label>
                            @else
                                <label>Keuangan </label>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    @if (!empty($keuanganTahunan['tahun']))
                                        <div id="chart"></div>
                                        <div id="chartKosong" style="display: none"></div>
                                    @else
                                        <div id="chart" style="display: none"></div>
                                        <div id="chartKosong"></div>
                                    @endif
                                </div>
                                <div class="col-lg-2">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card mb-5">
                                                <form action="/beranda" method="GET">
                                                    <div class="card-body">
                                                        <label for="daftarTahun" class="form-label">Filter</label>
                                                        <select class="js-example-basic-single" style="width: 100%"
                                                            name="tahun" id="daftarTahun">
                                                            <option value="">--Pilih Tahun--</option>
                                                            @foreach ($daftarTahun as $item)
                                                                <option value="{{ $item->tahun }}">{{ $item->tahun }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="card-footer d-flex">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary float-right ms-auto"><i
                                                                class="bi bi-binoculars"></i>
                                                            Tampilkan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    @if (!empty($keuanganTahunan['tahun']))
                                                        <label for="omset" class="form-label">Omset</label>
                                                        <input type="text" class="form-control form-control-sm mb-3"
                                                            id="omset"
                                                            value="Rp {{ number_format($keuanganTahunan['omset'], 0, ',', '.') }}"
                                                            disabled>
                                                        <label for="modal" class="form-label">Modal</label>
                                                        <input type="text" class="form-control form-control-sm mb-3"
                                                            id="modal"
                                                            value="Rp {{ number_format($keuanganTahunan['modal'], 0, ',', '.') }}"
                                                            disabled>
                                                        <label for="laba" class="form-label">Laba</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="laba"
                                                            value="Rp {{ number_format($keuanganTahunan['laba'], 0, ',', '.') }}"
                                                            disabled>
                                                    @else
                                                        <label for="omset" class="form-label">Omset</label>
                                                        <input type="text" class="form-control form-control-sm mb-3"
                                                            id="omset" value="" disabled>
                                                        <label for="modal" class="form-label">Modal</label>
                                                        <input type="text" class="form-control form-control-sm mb-3"
                                                            id="modal" value="" disabled>
                                                        <label for="laba" class="form-label">Laba</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="laba" value="" disabled>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- Apexchart --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                    name: "Omset",
                    data: @json($omset)
                },
                {
                    name: "Modal",
                    data: @json($modal)
                },
                {
                    name: "Laba",
                    data: @json($laba)
                }
            ],
            chart: {
                height: 500,
                type: 'line',
                zoom: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return 'Rp ' + value.toLocaleString('id-ID');
                    }
                },
            },
            xaxis: {
                categories: ['Bulan 1', 'Bulan 2', 'Bulan 3', 'Bulan 4', 'Bulan 5', 'Bulan 6', 'Bulan 7', 'Bulan 8',
                    'Bulan 9', 'Bulan 10', 'Bulan 11', 'Bulan 12'
                ]
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        // kosong
        var options = {
            series: [{
                    name: "Omset",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name: "Modal",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name: "Laba",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                }
            ],
            chart: {
                height: 500,
                type: 'line',
                zoom: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return 'Rp ' + value.toLocaleString('id-ID');
                    }
                },
            },
            xaxis: {
                categories: ['Bulan 1', 'Bulan 2', 'Bulan 3', 'Bulan 4', 'Bulan 5', 'Bulan 6', 'Bulan 7', 'Bulan 8',
                    'Bulan 9', 'Bulan 10', 'Bulan 11', 'Bulan 12'
                ]
            }
        };

        var chart = new ApexCharts(document.querySelector("#chartKosong"), options);
        chart.render();
    </script>
@endsection
