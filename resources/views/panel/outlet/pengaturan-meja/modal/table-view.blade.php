<div id="modal-table-view" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Atur Meja</h5>
                <button class="btn btn-block btn-primary float-right" id="add-button">Tambah Meja</button>
            </div>
            <div class="modal-body relative">
                @include(customForm('outlet','pengaturan-meja','atur-meja'))
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light" id="submit-atur-meja-button">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
