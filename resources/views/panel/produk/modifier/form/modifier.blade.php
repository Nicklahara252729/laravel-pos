<form enctype="multipart/form-data" id="form-input">

    {{-- nama modifier --}}
    <div class="form-group mb-3">
        <label for="name">Nama modifier</label>
        <input type="text" class="form-control" id="modifier_name" name="modifier_name"
            placeholder="masukkan nama modifier">
    </div>
    {{-- end nama modifier --}}

    {{-- pilihan modifier --}}
    <div class="d-grid mb-3">
        <label for="name">Pilihan modifier</label>
        @include(customTable('produk', 'modifier', 'option'))
        <button class="btn btn-primary btn-block" type="button" id="add-option-button">Kelola pilihan modifier</button>
    </div>
    {{-- end pilihan modifier --}}

    {{-- modifier limit --}}
    <div class="d-grid mb-3">
        <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
            <span class="font-medium text-gray-700">Modifier limit</span>
            <div class="relative">
                <input type="checkbox" id="is-limit-switch" value="" class="sr-only peer">
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                </div>
            </div>
        </label>
        <div class="text-warning text-xs mb-2">Konfigurasi ini diterapkan hanya untuk pengguna pesanan saja dan tidak
            akan tercermin pada POS.</div>
        <div id="is-limit-container" class="hidden">
            <div class="w-full d-grid">
                <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700">Syarat <span class="text-danger">*</span></span>
                </label>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="modifier_limit" id="limit-yes">
                                <label class="w-full" for="limit-yes">
                                    <p class="p-0 m-0">Tidak</p>
                                    <span class="text-muted small">Modifier bersifat opsional</span>
                                </label>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Jumlah minimal</label>
                                <input type="number" min="0" class="form-control" id="modifier_limit_max"
                                    name="name" placeholder="masukkan jumlah minimal">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ms-auto">
                        <div class="mt-lg-0">
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="modifier_limit" id="limit-no">
                                    <label class="w-full" for="limit-no">
                                        <p class="p-0 m-0">Iya</p>
                                        <span class="text-muted small">Modifier diperlukan</span>
                                    </label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Jumlah maksimal</label>
                                    <input type="number" min="0" class="form-control" id="modifier_limit_min"
                                        name="name" placeholder="masukkan jumlah maksimal">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end modifier limit --}}

    {{-- resep modifier --}}
    <div class="d-grid mb-3">
        <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
            <span class="font-medium text-gray-700">Resep modifier</span>
            <div class="relative">
                <input type="checkbox" name="recipe_modifier" id="is-recipe-switch" value="" class="sr-only peer">
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                </div>
            </div>
        </label>
        <div class="text-warning text-xs mb-2">Setiap pembelian modifier akan mengurangi penggunaan bahan sebanyak
            jumlah yang ditentukan.</div>
        <div id="is-recipe-container" class="hidden">
            <div class="w-full d-grid">
                @include(customTable('produk', 'modifier', 'recipe'))
                <button class="btn btn-primary btn-block" type="button" id="add-recipe-button">Kelola resep
                    modifier</button>
            </div>
        </div>
    </div>
    {{-- end resep modifier --}}

</form>
