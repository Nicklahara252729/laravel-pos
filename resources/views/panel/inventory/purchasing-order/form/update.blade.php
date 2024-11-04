<form id="form-update">
    <section id="update-outlet-name">
        <label>Nama Outlet</label>
        <p></p>
    </section>
    <section id="update-nomor-po" class="mb-4">
        <label>Nomor PO</label>
        <p></p>
    </section>

    <div class="d-grid">
        <div class="form-group mb-4">
            <label for="variant-input">Nota</label>
            <textarea name="nota" id="variant-input" class="form-control" rows="7"
                placeholder="Tulis catatan... (contoh. nota permintaan, pelacakan / nota pengiriman)"></textarea>
        </div>
    </div>

    <div class="d-grid mb-4">
        <label for="kategori-input">Pesanan Pembelian</label>
        <div id="update-bahan-container">
            @include(customTable('inventory','purchasing-order','pesanan-pembelian'))
        </div>
        <button class="btn btn-primary btn-block w-full" type="button" id="bahan-button">
            Tambah Bahan
        </button>
    </div>

    <section id="update-log">
        <label>Log Riwayat</label>
        <div></div>
    </section>
</form>
