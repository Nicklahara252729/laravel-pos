<div id="modal-import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-import-title">Import Daftar Pegawai</h5>
            </div>
            <div class="modal-body">
                @include(customForm('pegawai','daftar-pegawai', 'import'))
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light" id="submit-import-button">Unggah File</button>
            </div>
        </div>
    </div>
</div>