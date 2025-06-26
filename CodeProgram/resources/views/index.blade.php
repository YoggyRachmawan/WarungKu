<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <title>WarungKu</title>
    {{-- sbadmin --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.css">
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    {{-- navbar --}}
    @include('layouts.navbar')
    <div id="layoutSidenav">
        {{-- sidebar --}}
        @include('layouts.sidebar')
        <div id="layoutSidenav_content">
            {{-- content --}}
            @include('layouts.content')
            {{-- footer --}}
            @include('layouts.footer')
        </div>
    </div>
    {{-- sbadmin --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    {{-- datatable --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.js"></script>
    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- js --}}
    <script>
        // dataTable & select2
        $(document).ready(function() {
            $("#tabelData").DataTable();
            $(".js-example-basic-single").select2();
        });

        // sweetAlert2
        $(document).on('click', '#hapus', function(event) {
            event.preventDefault();
            let link = $(this).attr('href');
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Data yang dihapus tidak bisa dikembalikan lagi!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batalkan",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                    Swal.fire({
                        title: "Terhapus!",
                        text: "Data berhasil dihapus.",
                        icon: "success",
                        timer: 999,
                        showConfirmButton: false
                    })
                }
            });
        })

        // Tambah
        @if (session('added'))
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "Data berhasil ditambahkan.",
                showConfirmButton: false,
                timer: 999
            })
        @endif

        // Edit
        @if (session('edited'))
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "Data berhasil diubah.",
                showConfirmButton: false,
                timer: 999
            })
        @endif

        // Gagal Input Omset
        @if (session('inputFailed'))
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "Data keuangan tanggal tersebut sudah tersedia!",
                showConfirmButton: true,
                confirmButtonColor: "#3085d6"
            })
        @endif

        // Gagal Input Katalog Produk
        @if (session('unsuccessful'))
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "Harga modal dan harga jual harus terisi!",
                showConfirmButton: true,
                confirmButtonColor: "#3085d6"
            })
        @endif
    </script>
</body>

</html>
