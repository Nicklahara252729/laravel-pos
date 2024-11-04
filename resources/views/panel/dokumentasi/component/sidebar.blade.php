<div class="card">
    <div class="custom-accordion p-4">

        {{-- autentikasi --}}
        <div class="categories-group-card mb-1">
            {{-- title menu --}}
            <a href="javascript:void(0)" class="text-body fw-semibold pb-3 d-block collapsed btn-tab" aria-expanded="false"
                data-tab="autentikasi">
                Autentikasi
                <i class="mdi mdi-chevron-down float-end"></i>
            </a>
            {{-- end title menu --}}
            {{-- list menu --}}
            <div class="hidden autentikasi-tab">
                <div class="card p-2 border shadow-none">
                    <ul class="list-unstyled categories-list mb-0">
                        <li>
                            <a href="{{ url('dokumentasi?content=autentikasi.login') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=autentikasi.forgot-password') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Lupa Password
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- end list menu --}}
        </div>
        {{-- end autentikasi --}}

        {{-- notifikasi --}}
        <h5 class="font-size-14 mb-4">
            <a href="{{ url('dokumentasi?content=notifikasi') }}" class="text-body d-block">Notifikasi </a>
        </h5>
        {{-- end notifikasi --}}

        {{-- profil --}}
        <div class="categories-group-card mb-1">
            {{-- title menu --}}
            <a href="javascript:void(0)" class="text-body fw-semibold pb-3 d-block collapsed btn-tab"
                aria-expanded="false" data-tab="profil">
                Profil
                <i class="mdi mdi-chevron-down float-end"></i>
            </a>
            {{-- end title menu --}}
            {{-- list menu --}}
            <div class="hidden profil-tab">
                <div class="card p-2 border shadow-none">
                    <ul class="list-unstyled categories-list mb-0">
                        <li>
                            <a href="{{ url('dokumentasi?content=profil.daftar-outlet') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Daftar Outlet
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=profil.akun') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Akun
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=profil.pengaturan') }}">
                                <i class="mdi mdi-circle-medium me-1"></i>
                                Pengaturan
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- end list menu --}}
        </div>
        {{-- end profil --}}

        {{-- dashboard --}}
        <h5 class="font-size-14 mb-4">
            <a href="{{ url('dokumentasi') }}" class="text-body d-block">Dashboard </a>
        </h5>
        {{-- end dashboard --}}

        {{-- laporan --}}
        {{-- title menu --}}
        <h5 class="font-size-14 mb-0">
            <a href="javascript:void(0)" class="text-body d-block btn-tab" data-tab="laporan">Laporan
                <i class="mdi mdi-chevron-down float-end"></i>
            </a>
        </h5>
        {{-- end title menu --}}
        {{-- list menu --}}
        <div class="hidden mt-4 laporan-tab">
            <div class="categories-group-card">
                <div class="card p-2 border shadow-none">
                    <ul class="list-unstyled categories-list mb-0">
                        <li><a href="{{ url('dokumentasi?content=laporan.ringkasan-laporan') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Ringkasan Laporan
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=laporan.keuntungan-kotor') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Keuntungan Kotor
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=laporan.metode-pembayaran') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Metode Pembayaran
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=laporan.tipe-penjualan') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Tipe Penjualan
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=laporan.penjualan-produk') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Penjualan Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=laporan.penjualan-kategori') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Penjualan Kategori
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=laporan.modifier-sales') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Modifier Sales
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=laporan.diskon') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Diskon
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=laporan.pajak') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Pajak
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=laporan.gratifikasi') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Gratifikasi
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=laporan.collected-by') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Collected by
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=laporan.shift') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Shift
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- end list menu --}}
        {{-- end laporan --}}

        {{-- riwayat transaksi --}}
        <h5 class="font-size-14 mt-4">
            <a href="{{ url('dokumentasi?content=riwayat-transaksi') }}" class="text-body d-block">
                Riwayat Transaksi
            </a>
        </h5>
        {{-- end riwayat transaksi --}}

        {{-- pembayaran --}}
        <div class="categories-group-card mt-4">
            {{-- title menu --}}
            <a href="javascript:void(0);" class="text-body fw-semibold pb-3 d-block btn-tab" data-tab="pembayaran"
                aria-expanded="false"> Pembayaran
                <i class="mdi mdi-chevron-down float-end"></i>
            </a>
            {{-- end title menu --}}
            {{-- list menu --}}
            <div class="hidden pembayaran-tab">
                <div class="card p-2 border shadow-none">
                    <ul class="list-unstyled categories-list mb-0">
                        <li>
                            <a href="{{ url('dokumentasi?content=pembayaran.invoice') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Invoice
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=pembayaran.checkout-setting') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Checkout Setting
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=pembayaran.metode-pembayaran') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Metode Pembayaran
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- end list menu --}}
        </div>
        {{-- end pembayaran --}}

        {{-- produk --}}
        <div class="categories-group-card mt-2">
            {{-- title menu --}}
            <a href="javascript:void(0);" class="text-body fw-semibold pb-3 d-block btn-tab" aria-expanded="false"
                data-tab="produk">Produk
                <i class="mdi mdi-chevron-down float-end"></i>
            </a>
            {{-- end title menu --}}
            {{-- list menu --}}
            <div class="hidden produk-tab">
                <div class="card p-2 border shadow-none">
                    <ul class="list-unstyled categories-list mb-0">
                        <li>
                            <a href="{{ url('dokumentasi?content=produk.daftar-produk') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Daftar Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=produk.modifier') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Modifier
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=produk.kategori-produk') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Kategori Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=produk.paket-bumi') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Paket Bundel
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=produk.promo-produk') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Promo Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=produk.diskon-produk') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Diskon Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=produk.pajak-produk') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Pajak Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=produk.gratuity') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Gratuity
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=produk.tipe-penjualan') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Tipe Penjualan
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- end list menu --}}
        </div>
        {{-- end produk --}}

        {{-- bahan dan resep --}}
        <div class="categories-group-card mt-2">
            {{-- title menu --}}
            <a href="javascript:void(0);" class="text-body fw-semibold pb-3 d-block btn-tab" aria-expanded="false"
                data-tab="bahan-resep">Bahan dan Resep
                <i class="mdi mdi-chevron-down float-end"></i>
            </a>
            {{-- end title menu --}}
            {{-- list menu --}}
            <div class="hidden bahan-resep-tab">
                <div class="card p-2 border shadow-none">
                    <ul class="list-unstyled categories-list mb-0">
                        <li>
                            <a href="{{ url('dokumentasi?content=bahan-dan-resep.daftar-bahan') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Daftar Bahan
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=bahan-dan-resep.kategori-bahan') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Kategori Bahan
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=bahan-dan-resep.resep') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Resep
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- end list menu --}}
        </div>
        {{-- end bahan dan resep --}}

        {{-- inventori --}}
        <div class="categories-group-card mt-2">
            {{-- title menu --}}
            <a href="javascript:void(0);" class="text-body fw-semibold pb-3 d-block btn-tab" aria-expanded="false"
                data-tab="inventori">Inventori
                <i class="mdi mdi-chevron-down float-end"></i>
            </a>
            {{-- end title menu --}}
            {{-- list menu --}}
            <div class="hidden inventori-tab">
                <div class="card p-2 border shadow-none">
                    <ul class="list-unstyled categories-list mb-0">
                        <li>
                            <a href="{{ url('dokumentasi?content=inventori.ringkasan-inventori') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Ringkasan Inventori
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=inventori.purchase-order') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Purchase Order
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- end list menu --}}
        </div>
        {{-- end inventori --}}

        {{-- pelanggan --}}
        <h5 class="font-size-14 mt-2">
            <a href="{{ url('dokumentasi?content=pelanggan') }}" class="text-body d-block">
                Pelanggan
            </a>
        </h5>
        {{-- end pelanggan --}}

        {{-- pegawai --}}
        <div class="categories-group-card mt-4">
            {{-- title menu --}}
            <a href="javascript:void(0);" class="text-body fw-semibold pb-3 d-block collapsed btn-tab"
                data-tab="pegawai" aria-expanded="false">Pegawai
                <i class="mdi mdi-chevron-down float-end"></i>
            </a>
            {{-- end title menu --}}
            <div class="hidden pegawai-tab">
                <div class="card p-2 border shadow-none">
                    <ul class="list-unstyled categories-list mb-0">
                        <li>
                            <a href="{{ url('dokumentasi?content=pegawai.daftar-pegawai') }}">
                                <i class class="mdi mdi-circle-medium me-1"></i> Daftar Pegawai
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=pegawai.hak-akses') }}">
                                <i class="mdi mdi-circle-medium me-1"></i> Hak Akses
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- end list menu --}}
        </div>
        {{-- end pegawai --}}

        {{-- outlet --}}
        <div class="categories-group-card mt-2">
            {{-- title menu --}}
            <a href="javascript:void(0)" class="text-body fw-semibold pb-3 d-block collapsed btn-tab"
                data-tab="outlet" aria-expanded="false">
                Outlet
                <i class="mdi mdi-chevron-down float-end"></i>
            </a>
            {{-- end title menu --}}
            {{-- list menu --}}
            <div class="hidden outlet-tab">
                <div class="card p-2 border shadow-none">
                    <ul class="list-unstyled categories-list mb-0">
                        <li>
                            <a href="{{ url('dokumentasi?content=outlet.receipt') }}">
                                <i class="mdi mdi-circle-medium me-1"></i>
                                Receipt
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dokumentasi?content=outlet.pengaturan-meja') }}">
                                <i class="mdi mdi-circle-medium me-1"></i>
                                Pengaturan Meja
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- list menu --}}
        </div>
        {{-- end outlet --}}

    </div>
</div>
