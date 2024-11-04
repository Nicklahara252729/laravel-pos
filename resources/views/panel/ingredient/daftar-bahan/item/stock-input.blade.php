<section class="mb-2 hidden" id="stock-input-container">
    <div class="row">

        {{-- stok saat ini --}}
        <div class="col-md-6">
            <div class="form-group mb-4">
                <label for="current-stock-input" class="text-black">Stok saat ini <span
                        class="text-danger">*</span></label>
                <input type="text" id="current-stock-input" name="current-stock-input" class="form-control"
                    placeholder="masukkan stok produk saat ini">
            </div>
        </div>
        {{-- stok saat ini --}}

        {{-- stok minimal --}}
        <div class="col-md-6">
            <div class="form-group mb-4">
                <label for="min-stock-input" class="text-black">Stok minimal</label>
                <input type="text" name="min-stock-input" id="min-stock-input" class="form-control"
                    placeholder="masukkan stok minimal produk">
            </div>
        </div>
        {{-- stok minimal --}}

    </div>
</section>
