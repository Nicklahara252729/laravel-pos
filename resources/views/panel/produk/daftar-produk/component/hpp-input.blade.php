<section class="mb-4" id="hpp-input-container">

    {{-- single variant hpp input container --}}
    <div class="hidden" id="single-variant-hpp-input-container">
        <div class="form-group mb-4">
            <label for="hpp-input" class="text-black">Biaya Rata-rata <span class="text-danger">*</span></label>
            <input type="text" id="hpp-input" class="form-control placeholder:text-sm"
                placeholder="masukkan Biaya Rata-rata produk">
        </div>
    </div>
    {{-- end single variant hpp input container --}}

    {{-- multi variant hpp input container --}}
    <div class="hidden" id="multi-variant-hpp-input-container">
        @include(customTable('produk', 'daftar-produk', 'hpp'))
        <button class="btn btn-primary btn-block w-full" type="button" id="hpp-button">
            Kelola Harga Pokok Penjualan (HPP) Produk
        </button>
    </div>
    {{-- end multi variant hpp input container --}}

</section>
