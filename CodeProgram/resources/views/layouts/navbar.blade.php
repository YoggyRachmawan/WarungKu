<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <label class="navbar-brand ps-3 text-center fw-bold">Warung<span style="border-top-right-radius: 10px;" class="text-bg-light text-dark">Ku</label>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="bi bi-justify"></i></button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><label class="dropdown-item">{{ Auth::user()->name; }}</label></li>
                <li>
                    <hr class="dropdown-divider"/>
                </li>
                <li><a class="dropdown-item" href="/logout"><i class="bi bi-door-open-fill"></i> Keluar</a></li>
            </ul>
        </li>
    </ul>
</nav>