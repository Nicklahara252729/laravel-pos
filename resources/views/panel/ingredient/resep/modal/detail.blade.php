<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            {{-- modal hedaer --}}
            <div class="modal-header">
                <h5 class="modal-title">Detail Resep</h5>
            </div>
            {{-- end modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                {{-- section nama produk --}}
                <section id="detail-product-name">
                    <h6>Nama Produk</h6>
                    <p></p>
                </section>
                {{-- end section nama produk --}}
                {{-- section variant --}}
                <section id="detail-variant" class="mb-4">
                    <h6>Variant</h6>
                    @include(customTable('ingredient', 'resep', 'variant'))
                </section>
                {{-- end section variant --}}
                {{-- section resep --}}
                <section id="detail-resep" class="mb-4">
                    <h6>Resep</h6>
                    @include(customTable('ingredient', 'resep', 'resep'))
                </section>
                {{-- end section resep --}}
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
