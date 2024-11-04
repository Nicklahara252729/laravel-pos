<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Promo Produk</h5>
            </div>
            <div class="modal-body">
                @include(customItem('produk', 'promo-produk', 'detail-information'))
                @include(customItem('produk', 'promo-produk', 'detail-assign-outlet'))
                @include(customItem('produk', 'promo-produk', 'detail-tipe-penjualan'))
                @include(customItem('produk', 'promo-produk', 'detail-syarat-promo'))
                @include(customItem('produk', 'promo-produk', 'detail-hadiah-promo'))
                @include(customItem('produk', 'promo-produk', 'detail-konfigurasi-promo'))
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
