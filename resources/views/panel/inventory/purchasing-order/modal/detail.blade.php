<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title"
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
                {{-- section outlet name --}}
                <section id="detail-outlet-name">
                    <label>Nama Outlet</label>
                    <p></p>
                </section>
                {{-- end section outlet name --}}
                {{-- section nomor po --}}
                <section id="detail-nomor-po" class="mb-4">
                    <label>Nomor PO</label>
                    <p></p>
                </section>
                {{-- end section nomor po --}}
                {{-- section pesanan pembelian --}}
                <section class="mb-4">
                    <label>Pesanan Pembelian</label>
                    <div class="detail-pesanan-pembelian"></div>
                </section>
                {{-- end section pesanan pembelian --}}
                {{-- section log riwayat --}}
                <section id="detail-log">
                    <label>Log Riwayat</label>
                    <div></div>
                </section>
                {{-- end section log riwayat --}}
            </div>
            {{-- end modal body --}}
            {{-- detail button container --}}
            <div class="flex justify-between px-6 py-3 border-t" id="detail-button-container"></div>
            {{-- end detail button container --}}
        </div>
    </div>
</div>
