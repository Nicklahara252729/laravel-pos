<div id="modal-riwayat-pemenuhan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title">Riwayat Pemenuhan</h5>
            </div>
            {{-- end modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                {{-- section outlet name --}}
                <section id="riwayat-outlet-name">
                    <label>Nama Outlet</label>
                    <p></p>
                </section>
                {{-- end section outlet name --}}
                {{-- section nomor po --}}
                <section id="riwayat-nomor-po" class="mb-4">
                    <label>Nomor PO</label>
                    <p></p>
                </section>
                {{-- end section nomor po --}}
                {{-- section bahan dipesan --}}
                <section class="mb-4 bahan-dipesan">
                    <label>Bahan yang Dipesan</label>
                    @include(customTable('inventory', 'purchasing-order', 'bahan-pesanan'))
                </section>
                {{-- end section bahan dipesan --}}
                {{-- section riwayat pemenuhan --}}
                <section id="riwayat-log">
                    <label class="p-0 m-0">Riwayat Pemenuhan</label>
                    <div></div>
                </section>
                {{-- end section riyayat pemenuhan --}}
            </div>
            {{-- end modal body --}}
            {{-- modal footer --}}
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Tutup</button>
            </div>
            {{-- end modal footer --}}
        </div>
    </div>
</div>
