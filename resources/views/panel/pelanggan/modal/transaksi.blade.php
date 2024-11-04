<div id="modal-transaksi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-transaksi-title">Daftar Transaksi</h5>
            </div>
            <div class="modal-body relative">
                @include(customItem('pelanggan', 'transaksi-list'))
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
