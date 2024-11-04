<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h6 class="modal-title">Detail</h6>
            </div>
            {{-- end modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-4 h-full mb-4">
                        <img src="https://picsum.photos/1200" class="rounded img-fluid" alt=""
                            id="detail-photo">
                    </div>
                    <div class="col-sm-12 col-lg-8">
                        {{-- section nama produk --}}
                        <section id="detail-product-name">
                            <label>Nama produk</label>
                            <p></p>
                        </section>
                        {{-- end secton nama produk --}}
                        {{-- section kategori --}}
                        <section id="detail-kategori">
                            <label>Kategori</label>
                            <p></p>
                        </section>
                        {{-- end section kategori --}}
                        {{-- section satuan pengukuran --}}
                        <section id="detail-satuan">
                            <label>Satuan Pengukuran</label>
                            <p></p>
                        </section>
                        {{-- end section satuan pengukuran --}}
                        {{-- section resep --}}
                        <section id="detail-resep" class="mb-4">
                            <label>Resep</label>
                            @include(customTable('ingredient', 'daftar-bahan', 'bahan'))
                        </section>
                        {{-- end section resep --}}
                        {{-- section stok produk --}}
                        <section id="detail-stock" class="mb-4">
                            <label>Stok Produk</label>
                            @include(customTable('ingredient', 'daftar-bahan', 'stock'))
                        </section>
                        {{-- end section stok produk --}}
                    </div>
                </div>
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
