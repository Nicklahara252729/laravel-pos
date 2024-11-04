<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Detail Invoice</h5>
            </div>

            <div class="modal-body">

                {{-- invoice information --}}
                @include(customComponent('pembayaran', 'invoice', 'detail-information'))
                {{-- end invoice information --}}

                {{-- daftar barang --}}
                @include(customComponent('pembayaran', 'invoice', 'detail-daftar-barang'))
                {{-- end daftar barang --}}

                {{-- nominal --}}
                @include(customComponent('pembayaran', 'invoice', 'detail-nominal'))
                {{-- end nominal --}}

                {{-- catatan --}}
                @include(customComponent('pembayaran', 'invoice', 'detail-catatan'))
                {{-- end catatan --}}

                {{-- riwayat pembayaran --}}
                @include(customComponent('pembayaran', 'invoice', 'detail-riwayat-pembayaran'))
                {{-- end riwayat pembayaran --}}
            </div>

            {{-- action --}}
            @include(customComponent('pembayaran', 'invoice', 'detail-action'))
            {{-- end action --}}
        </div>
    </div>
</div>
