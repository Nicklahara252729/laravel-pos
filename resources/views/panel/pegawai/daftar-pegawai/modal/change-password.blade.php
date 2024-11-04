<div id="modal-change-password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-change-pass-title">Ubah password</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="same-password-alert">
                    Konfirmasi password tidak sama !
                </div>
                @include(customForm('pegawai','daftar-pegawai', 'change-password'))
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light" id="submit-change-password-button">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
