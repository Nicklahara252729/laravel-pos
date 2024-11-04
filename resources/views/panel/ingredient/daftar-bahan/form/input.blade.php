<form id="form-input">
    <div class="row">

        {{-- foto produk --}}
        <div class="col-sm-12 col-lg-4 h-full mb-4">
            <div class="form-group mb-2" id="photo-container">
                <label for="photo">Foto</label>
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
                    placeholder="Masukkan nama produk" name="product_name">
            </div>
            {{-- end nama produk --}}

            {{-- kategori bahan --}}
            <div class="form-group mb-4">
                <label for="kategori-input" class="text-black">Kategori</label>
                <input type="text" id="kategori-input" class="form-control placeholder:text-sm"
                    placeholder="Masukkan kategori bahan" name="kategori">
            </div>
            {{-- end kategori bahan --}}

            {{-- satuan pengukuran --}}
            <div class="form-group mb-4">
                <label for="satuan-input" class="text-black">Satuan pengukuran</label>
                <select name="category" id="satuan-input" class="form-control choice-select m-0">
                    <option value='bal (bal)'>bal (bal)</option>
                    <option value='barrel (bbl)'>barrel (bbl)</option>
                    <option value='batang (btg)'>batang (btg)</option>
                    <option value='botol (bal)'>botol (bal)</option>
                    <option value='box (box)'>box (box)</option>
                    <option value='bungkus (bks)'>bungkus (bks)</option>
                    <option value='butir (btr)'>butir (btr)</option>
                    <option value='centimeter (cm)'>centimeter (cm)</option>
                    <option value='cup (c)'>cup (c)</option>
                    <option value='ekor (ekr)'>ekor (ekr)</option>
                    <option value='fluid ounce (fl oz)'>fluid ounce (fl oz)</option>
                    <option value='gallon (gal)'>gallon (gal)</option>
                    <option value='gram (g)'>gram (g)</option>
                    <option value='gros (grs)'>gros (grs)</option>
                    <option value='ikat (ikt)'>ikat (ikt)</option>
                    <option value='inch (in)'>inch (in)</option>
                    <option value='jar'>jar</option>
                    <option value='kaleng (klg)'>kaleng (klg)</option>
                    <option value='kardus (kds)'>kardus (kds)</option>
                    <option value='karton (ktn)'>karton (ktn)</option>
                    <option value='karung (krg)'>karung (krg)</option>
                    <option value='kilogram (kg)'>kilogram (kg)</option>
                    <option value='krat (crt)'>krat (crt)</option>
                    <option value='kwintal (kw)'>kwintal (kw)</option>
                    <option value='lembar (lbr)'>lembar (lbr)</option>
                    <option value='litre (l)'>litre (l)</option>
                    <option value='lusin (lsn)'>lusin (lsn)</option>
                    <option value='meter (m)'>meter (m)</option>
                    <option value='miligram (mg)'>miligram (mg)</option>
                    <option value='mililitre (ml)'>mililitre (ml)</option>
                    <option value='ons (ons)'>ons (ons)</option>
                    <option value='ounce (oz)'>ounce (oz)</option>
                    <option value='pack (pck)'>pack (pck)</option>
                    <option value='pieces (pcs)'>pieces (pcs)</option>
                    <option value='potong (ptg)'>potong (ptg)</option>
                    <option value='pound (lb)'>pound (lb)</option>
                    <option value='quart (q)'>quart (q)</option>
                    <option value='sachet (sct)'>sachet (sct)</option>
                    <option value='tablespoon (tbsp)'>tablespoon (tbsp)</option>
                    <option value='teaspoon (tsp)'>teaspoon (tsp)</option>
                    <option value='ton (tn)'>ton (tn)</option>
                    <option value='whole'>whole</option>
                </select>
                <div class="d-grid">
                    <small class="text-warning">Pilih berdasarkan penggunaan operasional Anda (misalnya gram untuk nasi,
                        mililitre untuk saus, dll)</small>
                </div>
            </div>
            {{-- end satuan pengukuran --}}

            {{-- resep --}}
            <section class="mb-2 mt-4" id="resep-container">
                <label class="text-black m-0">Resep</label>
                <p class="text-muted">Pasang komponen bahan baku</p>
                @include(customTable('ingredient', 'daftar-bahan', 'bahan'))
                <button type="button" class="btn btn-primary btn-block w-full" id="resep-button">
                    Kelola Resep
                </button>
            </section>
            {{-- end resep --}}

            {{-- lacak stok barang dan peringatan stok --}}
            <div class="mb-2 mt-4" id="stock-switch">
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
            @include(customItem('ingredient', 'daftar-bahan', 'stock-input'))
            {{-- end stock input section --}}

            {{--  harga pokok penjualan (HPP) --}}
            <div id="hpp-switch" class="mb-2 mt-4">
                <div class="flex justify-between items-center">
                    <h6 class="font-medium text-black">Harga Pokok Penjualan (HPP)
                        Bervariant</h6>

                    <label class="relative inline-flex items-center my-auto cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" id="is-hpp">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                        </div>
                    </label>
                </div>
            </div>
            {{-- end  harga pokok penjualan (HPP) --}}

            {{-- hpp input section --}}
            @include(customItem('ingredient', 'daftar-bahan', 'hpp-input'))
            {{-- end hpp input section --}}

        </div>
    </div>
</form>
