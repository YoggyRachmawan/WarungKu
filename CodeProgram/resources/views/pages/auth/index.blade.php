<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <title>WarungKu</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .bg {
            background-image: url("{{ asset('assets/img/warung.jpg') }}");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-secondary bg">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container pt-lg-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-dark">
                                    <h3 class="text-center fw-bold my-4 text-light">Warung<span
                                            style="border-top-right-radius: 10px;" class="text-bg-light text-dark">Ku
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form action="/login" method="post">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('name') is-invalid @enderror"
                                                id="username" type="text" placeholder="Username" name="name"
                                                autocomplete="off" />
                                            <label for="username">Username</label>
                                            @error('name')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                id="inputPassword" type="password" placeholder="Password"
                                                name="password" autocomplete="off" />
                                            <label for="inputPassword">Password</label>
                                            @error('password')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="d-flex align-items-center  mt-4 mb-0">
                                            <button type="submit" class="btn btn-dark form-control">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer py-3">
                                    <div class="d-flex align-items-center justify-content-between small">
                                        <div class="text-muted"></div>
                                        <div>
                                            <label class="fw-bold">Yo<span class="text-bg-dark">Ra</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
        // Login Gagal
        @if (session('failed'))
            Swal.fire({
                icon: "error",
                title: "Login Gagal",
                text: "Username atau Password anda salah!",
                showConfirmButton: true,
                confirmButtonColor: "#3085d6"
            })
        @endif
        });
    </script>
</body>

</html>
