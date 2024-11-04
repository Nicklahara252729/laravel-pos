<form id="form-issue-refund">
    <div class="">
        <div class="p-2 w-full bg-soft-primary text-center rounded">
            <p>
            <h6>Jumlah yang direfund</h6>
            </p>
            <h5 class="text-red-500">Rp. <span id="total-refund">90.000</span></h5>
        </div>
        <div class="text-center">
            <p>
            <h5 class="text-muted">Sales type</h5>
            </p>
        </div>
        <div>
            <p>
            <h6>Produk yang di refund</h6>
            </p>
            <ul id="item-refund"></ul>
        </div>
        <div class="p-2">
            <h6>Alasan Refund</h6>
            <select name="reason" id="reason" class="form-control mb-3">
                <option value="produk retur">Produk retur</option>
                <option value="kesalahan transaksi">Kesalahan transaksi</option>
                <option value="pembatalan pemesanan">Pembatalan pemesanan</option>
                <option value="lainnya">Lainnya</option>
            </select>
            <div id="alasan-lainnya"></div>
        </div>
    </div>
</form>
