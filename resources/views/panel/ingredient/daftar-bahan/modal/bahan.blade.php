<div id="modal-bahan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title">Kelola bahan resep</h5>
            </div>
            {{-- end modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                @include(customForm('ingredient', 'daftar-bahan', 'bahan'))
            </div>
            {{-- end modal body --}}
            {{-- modal footer --}}
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light" id="submit-bahan-button">Simpan</button>
            </div>
            {{-- end modal footer --}}
        </div>
    </div>
</div>
