<div id="modal-cancel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Batalkan Invoice</h5>
            </div>
            <div class="modal-body">
                <form id="form-cancel">
                    @include(customForm('pembayaran', 'invoice', 'cancel'))
                </form>
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-danger waves-effect waves-light" type="button" id="submit-cancel-invoice-button">Batalkan
                    Invoice</button>
            </div>
        </div>
    </div>
</div>
