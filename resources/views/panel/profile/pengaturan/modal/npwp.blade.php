<div id="modal-npwp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">NPWP</h5>
            </div>
            <div class="modal-body">
                @include(customForm('profile','pengaturan', 'npwp'))
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light" id="btn-submit-npwp">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>