<div id="modal-issue-refund" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Issue Refund</h5>
            </div>
            <div class="modal-body">
                @include(customForm('riwayat-transaksi', 'issue-refund', null))
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light" id="submit-issue-refund-button">Issue Refund</button>
            </div>
        </div>
    </div>
</div>
