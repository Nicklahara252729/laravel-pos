<div id="modal-reject" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title">Tolak</h5>
            </div>
            {{-- end modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                @include(customForm('inventory', 'purchasing-order', 'reject'))
            </div>
            {{-- end modal body --}}
            {{-- modal footer --}}
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-danger waves-effect waves-light" id="submit-reject-button">Tambah Resep</button>
            </div>
            {{-- end modal footer --}}
        </div>
    </div>
</div>
