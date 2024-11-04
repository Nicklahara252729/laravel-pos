<div id="modal-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title">Detail Pesanan Pembelian</h5>
                <span class="btn btn-sm"></span>
            </div>
            {{-- end modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                @include(customForm('inventory', 'purchasing-order', 'update'))
            </div>
            {{-- end modal body --}}
            {{-- update button container --}}
            <div class="flex justify-between px-6 py-3 border-t" id="update-button-container"></div>
            {{-- end update button container --}}
        </div>
    </div>
</div>
