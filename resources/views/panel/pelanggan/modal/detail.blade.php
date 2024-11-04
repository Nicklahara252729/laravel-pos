<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-detail-title">Detail kustomer</h5>
            </div>
            <div class="modal-body relative">
                @include(customItem('pelanggan', 'detail-profil-customer'))
                @include(customItem('pelanggan', 'detail-sorotan-customer'))
                @include(customItem('pelanggan', 'detail-riwayat-pembelian'))
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
