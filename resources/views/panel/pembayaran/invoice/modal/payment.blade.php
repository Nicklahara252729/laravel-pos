<div id="modal-payment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Pembayaran Invoice</h5>
            </div>
            <div class="modal-body">
                <form id="form-payment">
                    @include(customForm('pembayaran', 'invoice', 'payment'))
                </form>
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light" type="button" id="preview-payment-invoice-button">Lanjukan Preview</button>
            </div>
        </div>
    </div>
</div>
