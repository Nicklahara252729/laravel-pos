<div class="flex justify-between px-6 py-3 border-t">
    <div class="flex items-center gap-3 detail-button-container">
        <button class="btn btn-outline-dark waves-effect waves-light" id="resend-button">Resend
            Invoice</button>
        <button class="btn btn-outline-dark waves-effect waves-light" id="payment-button">Pembayaran
            Invoice</button>
        <div class="btn-group">
            <button type="button" class="btn btn-outline-dark waves-effect waves-light dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">More <i
                    class="mdi mdi-chevron-down"></i></button>
            <div class="dropdown-menu" id="more-container">
                <a class="dropdown-item" href="javascript:void(0)" data-action="print">Print invoice</a>
                <a class="dropdown-item" href="javascript:void(0)" data-action="cancel">Batalkan invoice</a>
            </div>
        </div>
    </div>
    <button class="btn btn-outline-dark waves-effect waves-light d-none" id="submit-payment-invoice-button">Simpan Pembayaran</button>
    <button class="btn btn-outline-primary waves-effect waves-light" data-bs-dismiss="modal">Tutup</button>
</div>