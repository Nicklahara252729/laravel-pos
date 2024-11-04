<div id="modal-resend-receipt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Receipt</h5>
            </div>
            <div class="modal-body">
                @include(customForm('riwayat-transaksi', 'resend-receipt', null))
            </div>
            <div class="flex justify-between px-6 py-3 border-t">
                <button class="btn btn-outline-primary waves-effect waves-light" id="button-cetak">Cetak</button>
                <div class="flex items-center gap-3">
                    <button class="btn btn-soft-secondary waves-effect waves-light"
                        data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary waves-effect waves-light" id="submit-resend-receipt-button">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</div>
