<div id="modal-stock" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-stock">Kelola stok varian produk</h5>
            </div>
            <div class="modal-body">
                @include(customForm('produk', 'daftar-produk', 'stock'))
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light"
                    id="submit-variant-stock-button">Simpan</button>
            </div>
        </div>
    </div>
</div>
