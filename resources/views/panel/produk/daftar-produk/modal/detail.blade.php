<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-detail">Detail Produk</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-lg-4 h-full mb-4">
                        <img src="https://picsum.photos/1200" class="rounded img-fluid" alt="" id="detail-photo">
                    </div>
                    <div class="col-sm-12 col-lg-8">
                        <section id="detail-product-name">
                            <h6 class="text-primary">Nama produk</h6>
                            <p></p>
                        </section>
                        <section id="detail-kategori">
                            <h6 class="text-primary">Kategori</h6>
                            <p></p>
                        </section>
                        <section id="detail-description">
                            <h6 class="text-primary">Deskripsi Produk</h6>
                            <p>.</p>
                        </section>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <section id="detail-price">
                                <h6 class="text-primary">Harga Produk</h6>
                                <p>Rp 0</p>
                            </section>
                            <section id="detail-sku">
                                <h6 class="text-primary">SKU</h6>
                                <p>0</p>
                            </section>
                            <section id="detail-current-stock">
                                <h6 class="text-primary">Stok saat ini</h6>
                                <p>0</p>
                            </section>
                            <section id="detail-minimal-stock">
                                <h6 class="text-primary">Stok minimal</h6>
                                <p>0</p>
                            </section>
                        </div>
                        <section id="detail-variant" class="mb-4">
                            <h6 class="text-primary">Variant Produk</h6>
                            @include(customTable('produk', 'daftar-produk', 'variant'))
                        </section>
                        <section id="detail-stock" class="mb-4">
                            <h6 class="text-primary">Stok Produk</h6>
                            @include(customTable('produk', 'daftar-produk', 'stock'))
                        </section>
                        <section id="detail-hpp" class="mb-4">
                            <h6 class="text-primary">Harga Pokok Penjualan (HPP) Produk</h6>
                            @include(customTable('produk', 'daftar-produk', 'hpp'))
                        </section>
                        <section id="detail-modifier">
                            <h6 class="text-primary">Modifier</h6>
                            <ul class="-ml-7">
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
