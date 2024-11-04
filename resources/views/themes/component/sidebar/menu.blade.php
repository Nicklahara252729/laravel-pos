<div data-simplebar class="sidebar-menu-scroll">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">

            <li class="menu-title" data-key="t-menu">Dashboard</li>

            @if(authAttribute()['level'] == 'owner' || authAttribute(  ['level'] == 'superadmin') || menuSplitting()->dashboard == "yes")
            <li>
                <a href="{{ url('dashboard') }}">
                    <i class="bx bx-home-alt icon nav-icon"></i>
                    <span class="menu-item">Dashboard</span>
                </a>
            </li>
            @endif

            @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->laporan == "yes")
            <li class="menu-title" data-key="t-menu">Laporan</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class="bx bx-file icon nav-icon"></i>
                    <span class="menu-item" data-key="t-email">Laporan penjualan</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->ringkasan_laporan == "yes")<li><a href="{{ url('laporan/ringkasan-laporan') }}" data-key="t-inbox">Ringkasan Laporan</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->keuntungan_kotor == "yes")<li><a href="{{ url('laporan/keuntungan-kotor') }}" data-key="t-read-email">Keuntungan Kotor</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->metode_pembayaran == "yes")<li><a href="{{ url('laporan/metode-pembayaran') }}" data-key="t-read-email">Metode Pembayaran</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->laporan_tipe_penjualan == "yes")<li><a href="{{ url('laporan/tipe-penjualan') }}" data-key="t-read-email">Tipe Penjualan</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->penjualan_produk == "yes")<li><a href="{{ url('laporan/penjualan-produk') }}" data-key="t-read-email">Penjualan Produk</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->penjualan_kategori == "yes")<li><a href="{{ url('laporan/penjualan-kategori') }}" data-key="t-read-email">Penjualan Kategori</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->modifier_sales == "yes")<li><a href="{{ url('laporan/modifier-sales') }}" data-key="t-read-email">Modifier Sales</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->diskon == "yes")<li><a href="{{ url('laporan/diskon') }}" data-key="t-read-email">Diskon</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->pajak == "yes")<li><a href="{{ url('laporan/pajak') }}" data-key="t-read-email">Pajak</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->gratifikasi == "yes")<li><a href="{{ url('laporan/gratifikasi') }}" data-key="t-read-email">Gratifikasi</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->collected_by == "yes")<li><a href="{{ url('laporan/collected-by') }}" data-key="t-read-email">Collected by</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->shift == "yes")<li><a href="{{ url('laporan/shift') }}" data-key="t-read-email">Shift</a></li>@endif
                </ul>
            </li>
            @endif

            @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->riwayat_transaksi == "yes")
            <li>
                <a href="{{ url('riwayat-transaksi') }}">
                    <i class="bx bx-time icon nav-icon"></i>
                    <span class="menu-item">Riwayat Transaksi</span>
                </a>
            </li>
            @endif

            <li class="menu-title" data-key="t-menu">Data</li>

            @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->pembayaran == "yes")
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class="bx bx-wallet-alt icon nav-icon"></i>
                    <span class="menu-item" data-key="t-email">Pembayaran</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->invoice == "yes")<li><a href="{{ url('pembayaran/invoice') }}" data-key="t-inbox">Invoice</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->checkout_setting == "yes")<li><a href="{{ url('pembayaran/checkout-setting') }}" data-key="t-read-email">Checkout Setting</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->metode == "yes")<li><a href="{{ url('pembayaran/metode-pembayaran') }}" data-key="t-read-email">Metode Pembayaran</a></li>@endif
                </ul>
            </li>
            @endif

            @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->pembayaran == "yes")
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class="bx bx-grid-alt icon nav-icon"></i>
                    <span class="menu-item" data-key="t-email">Produk</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->daftar_produk == "yes")<li><a href="{{ url('produk/daftar-produk') }}" data-key="t-inbox">Daftar Produk</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->modifier == "yes")<li><a href="{{ url('produk/modifier') }}" data-key="t-read-email">Modifier</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->kategori_produk == "yes")<li><a href="{{ url('produk/kategori-produk') }}" data-key="t-read-email">Kategori Produk</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->paket_bundel == "yes")<li><a href="{{ url('produk/paket-bundle') }}" data-key="t-read-email">Paket Bundel</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->promo_produk == "yes")<li><a href="{{ url('produk/promo-produk') }}" data-key="t-read-email">Promo Produk</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->diskon_produk == "yes")<li><a href="{{ url('produk/diskon-produk') }}" data-key="t-read-email">Diskon Produk</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->pajak_produk == "yes")<li><a href="{{ url('produk/pajak-produk') }}" data-key="t-read-email">Pajak Produk</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->gratuity == "yes")<li><a href="{{ url('produk/gratuity') }}" data-key="t-read-email">Gratuity</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->tipe_penjualan == "yes")<li><a href="{{ url('produk/tipe-penjualan') }}" data-key="t-read-email">Tipe penjualan</a></li>@endif
                </ul>
            </li>
            @endif

            @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->bahan_dan_resep == "yes")
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class="bx bx-food-menu icon nav-icon"></i>
                    <span class="menu-item" data-key="t-email">Bahan dan Resep</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->daftar_bahan == "yes")<li><a href="{{ url('ingredient/daftar-bahan') }}" data-key="t-read-email">Daftar Bahan</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->kategori_bahan == "yes")<li><a href="{{ url('ingredient/kategori-bahan') }}" data-key="t-read-email">Kategori Bahan</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->resep == "yes")<li><a href="{{ url('ingredient/resep') }}" data-key="t-read-email">Resep</a></li>@endif
                </ul>
            </li>
            @endif

            @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->inventori == "yes")
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class="bx bx-package icon nav-icon"></i>
                    <span class="menu-item" data-key="t-email">Inventori</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->ringkasan_inventori == "yes")<li><a href="{{ url('inventory/ringkasan-inventory') }}" data-key="t-read-email">Ringkasan inventori</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->purchase_order == "yes")<li><a href="{{ url('inventory/purchasing-order') }}" data-key="t-read-email">Purchase Order</a></li>@endif
                </ul>
            </li>
            @endif

            @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->pelanggan == "yes")
            <li>
                <a href="{{ url('pelanggan') }}">
                    <i class="bx bx-happy icon nav-icon"></i>
                    <span class="menu-item" data-key="t-chat">Pelanggan</span>
                    <span class="badge rounded-pill bg-danger" data-key="t-hot">Hot</span>
                </a>
            </li>
            @endif

            @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->pegawai == "yes")
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class="bx bx-user icon nav-icon"></i>
                    <span class="menu-item" data-key="t-email">Pegawai</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->daftar_pegawai == "yes")<li><a href="{{ url('pegawai/daftar-pegawai') }}" data-key="t-read-email">Daftar Pegawai</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->hak_akses == "yes")<li><a href="{{ url('pegawai/hak-akses') }}" data-key="t-read-email">Hak Akses</a></li>@endif
                </ul>
            </li>
            @endif

            @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->outlet == "yes")
            <li class="menu-title" data-key="t-menu">Outlet</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class="bx bx-store icon nav-icon"></i>
                    <span class="menu-item" data-key="t-email">Outlet</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->pengaturan_akun == "yes")<li><a href="{{ url('outlet/receipt') }}" data-key="t-read-email">Receipt</a></li>@endif
                    @if((authAttribute()['level'] == 'owner' || authAttribute()['level'] == 'superadmin') || menuSplitting()->pengaturan_umum == "yes")<li><a href="{{ url('outlet/pengaturan-meja') }}" data-key="t-read-email">Pengaturan Meja</a></li>@endif
                </ul>
            </li>
            @endif
        </ul>
    </div>
    <!-- Sidebar -->
</div>