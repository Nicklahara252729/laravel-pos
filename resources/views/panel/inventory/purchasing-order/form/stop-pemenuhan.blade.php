<form enctype="multipart/form-data" id="form-stop-pemenuhan">
    <section class="mb-4">
        <label class="m-0">Apakah kamu yakin ingin menghentikan proses pemenuhan?</label>
        <p>Jumlah yang tersisa dan nilai biayanya akan dikecualikan dari Pesanan Pembelian dan Pemenuhan akan
            ditandai sebagai Selesai.</p>
    </section>
    <section id="stop-pemenuhan-outlet-name">
        <label>Nama Outlet</label>
        <p></p>
    </section>
    <section id="stop-pemenuhan-nomor-po" class="mb-4">
        <label>Nomor PO</label>
        <p></p>
    </section>
    <section class="mb-4 bahan-dipesan">
        <label>Bahan yang Dipesan</label>
        @include(customTable('inventory', 'purchasing-order', 'bahan-pesanan'))
    </section>
    <section id="stop-pemenuhan-log">
        <div></div>
    </section>
</form>
