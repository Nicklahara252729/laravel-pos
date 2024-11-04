<div class="d-grid mb-2">
    <label class="relative inline-flex items-center justify-between cursor-pointer w-full">
        <span class="font-medium text-gray-700">Total tagihan</span>
    </label>
    <h4 class="font-medium text-gray-700" id="total-tagihan"></h4>
</div>

<div class="d-grid mb-2">
    <div class="w-full d-grid">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="jumlah-diterima">Jumlah diterima <span class="text-danger">*</span></label>
                    <input type="number" min="0" class="form-control" id="jumlah-diterima" name="jumlah"
                        placeholder="Masukkan jumlah diterima">
                </div>
            </div>
            <div class="col-md-6 ms-auto">
                <div class="mt-lg-0">
                    <div class="form-group mb-3">
                        <label for="tanggal-pembayaran">Tanggal pembayaran <span class="text-danger">*</span></label>
                        <input type="date" min="0" class="form-control" id="tanggal-pembayarna"
                            name="tanggal">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-grid mb-2" id="tipe-pembayaran-container">
    <div class="w-full d-grid">
        <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
            <span class="font-medium text-gray-700">Tipe pembayaran <span class="text-danger">*</span></span>
        </label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipe_pembayaran" id="cash" value="cash"
                data-action="cash">
            <label class="w-full font-normal" for="cash">
                <p class="p-0 m-0">Cash</p>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipe_pembayaran" id="cek" value="cek"
                data-action="cek">
            <label class="w-full font-normal" for="cek">
                <p class="p-0 m-0">Cek</p>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipe_pembayaran" id="transfer-bank"
                value="transfer bank" data-action="transfer bank">
            <label class="w-full font-normal" for="transfer-bank">
                <p class="p-0 m-0">Transfer bank</p>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipe_pembayaran" id="lainnya" data-action="lainnya">
            <label class="w-full font-normal" for="lainnya">
                <p class="p-0 m-0">Lainnya</p>
            </label>
        </div>
        <div class="form-group hidden" id="tipe-pembayaran-lainnya-container">
        </div>
    </div>
</div>

<div class="d-grid mb-2">
    <div class="w-full d-grid">
        <div class="form-group mb-3">
            <label for="name">Note </label>
            <textarea class="form-control" rows="5" id="catatan" name="note" placeholder="Masukkan catatan"></textarea>
        </div>
    </div>
</div>
