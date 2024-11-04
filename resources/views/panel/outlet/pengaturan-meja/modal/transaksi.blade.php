<div id="modal-transaksi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
            </div>

            <div class="modal-body">

                {{-- invoice information --}}
                @include(customItem('outlet', 'pengaturan-meja', 'detail-invoice-information'))
                {{-- end invoice information --}}

                {{-- daftar barang --}}
                @include(customItem('outlet', 'pengaturan-meja', 'detail-daftar-barang'))
                {{-- end daftar barang --}}

                {{-- nominal --}}
                @include(customItem('outlet', 'pengaturan-meja', 'detail-nominal'))
                {{-- end nominal --}}

                {{-- biaya reservasi --}}
                @include(customItem('outlet', 'pengaturan-meja', 'detail-biaya-reservasi'))
                {{-- end biaya reservasi --}}

                {{-- catatan --}}
                @include(customItem('outlet', 'pengaturan-meja', 'detail-catatan'))
                {{-- end catatan --}}
            </div>

            <div class="modal-footer">
                <button class="btn btn-outline-primary waves-effect waves-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
