<div id="modal-input" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Meja</h5>
            </div>
            <div class="modal-body relative">
                @include(customForm('outlet', 'pengaturan-meja', 'input'))
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light" id="submit-input-button">Tambah Meja</button>
            </div>
        </div>
    </div>
</div>
