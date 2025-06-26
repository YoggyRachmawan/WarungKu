<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link mt-3 {{ request()->is('beranda') ? 'active' : '' }}" href="/beranda">
                    <div class="sb-nav-link-icon"><i class="bi bi-graph-up-arrow"></i></div>
                    Beranda
                </a>
                <div class="sb-sidenav-menu-heading">Belanja</div>
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->is('daftarNotaBelanja', 'formTambahNotaBelanja', 'formEditNotaBelanja/*') ? 'active' : '' }}"
                        href="/daftarNotaBelanja">
                        <div class="sb-nav-link-icon"><i class="bi bi-journal-text"></i></div>
                        Nota Belanja
                    </a>
                    <a class="nav-link {{ request()->is('daftarTempatBelanja', 'formTambahTempatBelanja', 'formEditTempatBelanja/*') ? 'active' : '' }}"
                        href="/daftarTempatBelanja">
                        <div class="sb-nav-link-icon"><i class="bi bi-shop"></i></div>
                        Tempat Belanja
                    </a>
                </nav>

                <div class="sb-sidenav-menu-heading">Produk</div>
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->is('daftarProduk', 'formTambahProduk', 'formEditProduk/*') ? 'active' : '' }}"
                        href="/daftarProduk">
                        <div class="sb-nav-link-icon"><i class="bi bi-box-seam"></i></div>
                        Katalog Produk
                    </a>
                    <a class="nav-link {{ request()->is('daftarSatuanProduk') ? 'active' : '' }}"
                        href="/daftarSatuanProduk">
                        <div class="sb-nav-link-icon"><i class="bi bi-1-square"></i></div>
                        Satuan Produk
                    </a>
                </nav>

                <div class="sb-sidenav-menu-heading">Keuangan</div>
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->is('daftarKeuanganHarian') ? 'active' : '' }}" href="/daftarKeuanganHarian">
                        <div class="sb-nav-link-icon"><i class="bi bi-calendar2-date"></i></div>
                        Harian
                    </a>
                    <a class="nav-link {{ request()->is('daftarKeuanganBulanan') ? 'active' : '' }}" href="/daftarKeuanganBulanan">
                        <div class="sb-nav-link-icon"><i class="bi bi-calendar2-month"></i></div>
                        Bulanan
                    </a>
                </nav>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Tanggal :</div>
            @php
                echo date('d-m-Y')
            @endphp
        </div>
    </nav>
</div>
