<div id="modal-update-proses-pesanan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title">Update Proses Pesanan</h5>
            </div>
            {{-- end modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                @include(customForm('inventory', 'purchasing-order', 'update-proses-pesanan'))
            </div>
            {{-- end modal body --}}
            {{-- modal footer --}}
            <div class="flex justify-between px-6 py-3 border-t">
                <button class="btn btn-danger waves-effect waves-light" id="hentikan-pemenuhan-button">Hentikan Pemenuhan</button>
              <div class="flex items-center gap-3">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light" id="submit-proses-pesanan-button">Simpan</button>
              </div>
            </div>
            {{-- end modal footer --}}
        </div>
    </div>
</div>