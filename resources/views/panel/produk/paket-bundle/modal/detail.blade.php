<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Detail Paket Bundle</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <img src="{{ asset('assets/images/logo/blank.png') }}" class="img-thumbnail detail-bundle-image" alt="">
                    </div>

                    <div class="col-lg-8 col-sm-12">
                        <div class="flex justify-between mb-2">
                            <div>
                                <strong>Nama Bundle</strong>
                                <p class="detail-bundle-name p-0"></p>
                            </div>
                            <div>
                                <strong>Status Bundle</strong>
                                <p id="detail-status-bundle p-0"></p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <strong> Assign Outlet</strong>
                            <ul class="grid grid-cols-1 m-0 p-0 gap-1" id="detail-assign-outlet-list">
                            </ul>
                        </div>

                        <div class="mb-4">
                            <strong> Item Bundle </strong>
                            @include(customTable('produk', 'paket-bundle', 'item'))
                        </div>

                        <div class="mb-4">
                            <strong> Harga Pokok Penjualan (HPP) Produk </strong>
                            @include(customTable('produk','paket-bundle','varian'))
                        </div>

                        <div class="flex">
                            <div>
                                <strong>Harga Bundle</strong>
                                <p class="detail-bundle-price"></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
