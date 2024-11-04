<form id="form-input">
    <div class="row">

        {{-- foto produk --}}
        <div class="col-sm-12 col-lg-4 h-full mb-4">
            <div class="form-group mb-2" id="product-container">
                <label for="">Foto</label>
                <input type="file" name="photo" id="photo" class="dropify"
                    data-allowed-file-extensions="jpg jpeg png" data-max-file-size="2M">
            </div>
            Jika kamu memilih untuk tidak mengunggah apa pun, foto akan diatur ke default.
        </div>
        {{-- end foto produk --}}

        <div class="col-sm-12 col-lg-8">

            {{-- nama produk --}}
            <div class="form-group mb-4">
                <label for="name-input" class="text-black">Nama produk</label>
                <input type="text" id="name-input" class="form-control placeholder:text-sm"
                    placeholder="masukkan nama produk" name="product_name">
            </div>
            {{-- end nama produk --}}

            {{-- kategori produk --}}
            <div class="form-group mb-4">
                <label for="kategori-input" class="text-black">Kategori</label>
                <select name="category" id="kategori-input" class="form-control choice-select">
                </select>
            </div>
            {{-- end kategori produk --}}

            {{-- deskripsi produk --}}
            <div class="form-group mb-4">
                <label for="description-input" class="text-black">Deskripsi</label>
                <textarea id="description-input" name="description" class="form-control" rows="8"
                    placeholder="masukkan deskripsi produk"></textarea>
            </div>
            {{-- end deskripsi produk --}}

            {{-- online attribute --}}
            <div class="flex justify-between items-center mb-4" id="online-attribute-switch">
                <h6 class="font-medium text-black">Online Attribute</h6>

                <label class="relative inline-flex items-center my-auto cursor-pointer">
                    <input type="checkbox" value="yes" class="sr-only peer" id="is-online-attribute">
                    <div
                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>
            {{-- end online attribute --}}

            {{-- produk bervariant --}}
            <div class="flex justify-between items-center mb-4" id="variant-switch">
                <h6 class="font-medium text-black">Produk
                    Bervariant</h6>

                <label class="relative inline-flex items-center my-auto cursor-pointer">
                    <input type="checkbox" value="yes" class="sr-only peer" id="is-variant">
                    <div
                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>
            {{-- end produk bervariant --}}

            {{-- harga berbeda tiap tipe penjualan --}}
            <div class="flex justify-between items-center mb-4" id="sales-type-switch">
                <h6 class="font-medium text-black">Harga berbeda tiap tipe penjualan</h6>

                <label class="relative inline-flex items-center my-auto cursor-pointer">
                    <input type="checkbox" value="yes" name="sales_type" class="sr-only peer" id="is-sales-type">
                    <div
                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                    </div>
                </label>
            </div>
            {{-- end harga berbeda tiap tipe penjualan --}}

            {{-- price input section --}}
            @include(customComponent('produk', 'daftar-produk', 'price-input'))
            {{-- end price input section --}}

            {{-- sales type input section --}}
            @include(customComponent('produk', 'daftar-produk', 'sales-type-input'))
            {{-- end sales type input section --}}

            {{-- varian input section --}}
            @include(customComponent('produk', 'daftar-produk', 'varian-input'))
            {{-- end varian input section --}}

            {{-- lacak stok barang dan peringatan stok --}}
            <div class="mb-4 mt-4" id="stock-switch">
                <div class="flex justify-between items-center">
                    <h6 class="font-medium text-black">Lacak Stok Barang dan peringatan stok</h6>
                    <label class="relative inline-flex items-center my-auto cursor-pointer">
                        <input type="checkbox" value="yes" name="stock" class="sr-only peer" id="is-stock">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                        </div>
                    </label>
                </div>
                <span class="text-warning"></span>
            </div>
            {{-- end lacak stok barang dan peringatan stok --}}

            {{-- stock input section --}}
            @include(customComponent('produk', 'daftar-produk', 'stock-input'))
            {{-- end stock input section --}}

            {{-- lacak harga pokok penjualan (HPP) --}}
            <div id="hpp-switch" class="mb-2">
                <div class="flex justify-between items-center">
                    <h6 class="font-medium text-muted">Lacak Harga Pokok Penjualan (HPP)
                        Bervariant</h6>

                    <label class="relative inline-flex items-center my-auto cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" id="is-hpp" disabled>
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                        </div>
                    </label>
                </div>

                <div class="d-grid">
                    <small class="text-danger">Harga pokok penjualan tidak dapat diaktifkan sebelum lacak stok barang
                        aktif</small>
                </div>
            </div>
            {{-- end lacak harga pokok penjualan (HPP) --}}

            {{-- hpp input section --}}
            @include(customComponent('produk', 'daftar-produk', 'hpp-input'))
            {{-- end hpp input section --}}

            {{-- modifier input section  --}}
            @include(customComponent('produk', 'daftar-produk', 'modifier-input'))
            {{-- end modifier input section --}}

        </div>
    </div>
</form>
