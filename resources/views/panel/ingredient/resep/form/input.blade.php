<form enctype="multipart/form-data" id="form-input">
    <div class="d-grid">
        {{-- produk --}}
        <div class="form-group mb-2">
            <label for="produk-input" class="text-black">Pilih produk</label>
            <select name="produk" id="produk-input" class="form-control choice-select">
            </select>
        </div>
        {{-- end produk --}}
        {{-- variant --}}
        <div class="d-grid">
            <div class="form-group mb-4">
                <label for="variant-input" class="text-black">Pilih variant</label>
                <select name="variant" id="variant-input" class="form-control choice-select">
                </select>
            </div>
        </div>
        {{-- end variant --}}
        {{-- bahan container --}}
        <div class="mb-4 hidden" id="bahan-container"></div>
        {{-- end bahan container --}}
        {{-- button --}}
        <div class="d-grid">
            <label for="kategori-input" class="text-black">Bahan yang dibutuhkan</label>
            <button class="btn btn-primary btn-block w-full" type="button" id="bahan-button">
                Kelola resep
            </button>
        </div>
        {{-- end button --}}
    </div>
</form>
