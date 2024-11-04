<div id="modal-void-item" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Void Item</h5>
            </div>
            <div class="modal-body relative">
                <div class="flex justify-between">
                    <div class="gap-3 product-cancel">
                        <h5 class="text-primary">0</h5>
                        <p>Total produk dibatalkan</p>
                    </div>

                    <div class="text-center gap-3 total-harga">
                        <h5 class="text-primary">Rp 0</h5>
                        <p>Total harga produk</p>
                    </div>

                    <div class="gap-3">
                        <button class="btn btn-outline-primary waves-effect waves-light mt-3" id="export-button">Export</button>
                    </div>
                </div>
                @include(customTable('outlet', 'pengaturan-meja', 'void'))
            </div> 
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
