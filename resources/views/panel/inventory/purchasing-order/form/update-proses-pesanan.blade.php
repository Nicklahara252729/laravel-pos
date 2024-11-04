<form enctype="multipart/form-data" id="form-update-proses-pesanan">
    <section id="update-proses-pesanan-outlet-name">
        <label>Nama Outlet</label>
        <p></p>
    </section>
    <section id="update-proses-pesanan-nomor-po" class="mb-4">
        <label>Nomor PO</label>
        <p></p>
    </section>
    <section class="mb-4 bahan-dipesan">
        <label>Bahan yang Dipesan</label>
        @include(customTable('inventory', 'purchasing-order', 'bahan-pesanan'))
    </section>
    <section class="mb-4" id="pesanan-diterima">
        <label>Bahan yang Dipesan</label>
        <div></div>
    </section>

    <section id="update-proses-pesanan-log">
        <label>Riwayat Pemenuhan</label>
        <div></div>
    </section>
</form>
