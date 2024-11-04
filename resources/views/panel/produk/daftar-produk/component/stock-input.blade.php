<section class="mb-2" id="stock-input-container">

    {{-- single variant stock input container --}}
    <div class="hidden" id="single-variant-stock-input-container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="current-stock-input" class="text-black">Stok saat ini <span
                            class="text-danger">*</span></label>
                    <input type="text" id="current-stock-input" name="current-stock-input" class="form-control"
                        placeholder="masukkan stok produk saat ini">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="min-stock-input" class="text-black">Stok minimal</label>
                    <input type="text" name="min-stock-input" id="min-stock-input" class="form-control"
                        placeholder="masukkan stok minimal produk">
                </div>
            </div>
        </div>
    </div>
    {{-- end single variant stock input container --}}

    {{-- multi varian stock input container --}}
    <div class="hidden" id="multi-variant-stock-input-container">
        @include(customTable('produk', 'daftar-produk', 'stock'))
        <button type="button" class="btn btn-primary btn-block w-full" id="stock-modal-button">
            Kelola Stok Varian Produk
        </button>
    </div>
    {{-- end multi varian stock input container --}}

</section>
