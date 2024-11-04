<form enctype="multipart/form-data" id="form-add">

    <div class="d-grid">
        <div class="form-group mb-2">
            <label for="nama_outlet" class="text-black">Nama Outlet</label>
            <input id="nama_outlet" class="form-control" placeholder="Masukkan Nama Outlet" readonly>
        </div>

        <div class="d-grid">
            <div class="form-group mb-4">
                <label for="variant-input" class="text-black">Nota</label>
                <textarea name="note" id="variant-input" class="form-control" rows="7" placeholder="Tulis catatan... (contoh. nota permintaan, pelacakan / nota pengiriman)"></textarea>
            </div>
        </div>

        <div class="mb-4 hidden" id="bahan-container">
        </div>

        <div class="d-grid">
            <label for="kategori-input" class="text-black">Pesanan Pembelian</label>
            <button class="btn btn-primary btn-block w-full" type="button" id="bahan-button">
                Tambah Bahan
            </button>
        </div>
    </div>

</form>
