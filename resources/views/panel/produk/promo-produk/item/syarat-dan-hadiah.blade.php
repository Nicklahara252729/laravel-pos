<div class="w-full d-grid mb-4" id="syarat-promo-container">
    <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700">Syarat Promo <span class="text-danger">*</span></span>
    </label>
    <div class="d-grid">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="syarat_promo" value="item" id="item-syarat-promo">
            <label class="w-full" for="item-syarat-promo">
                <p class="p-0 m-0">Item</p>
            </label>
        </div>
    </div>
    <div class="d-grid">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="syarat_promo" value="kategori" id="kategori-syarat-promo">
            <label class="w-full" for="kategori-syarat-promo">
                <p class="p-0 m-0">Item berdasarkan kategori</p>
            </label>
        </div>
    </div>
    <div class="assign-item-container mb-3 hidden">
    </div>
    <button class="btn btn-primary waves-effect waves-light btn-block" type="button" id="assign-item-button">Tambahkan
        Item</button>
</div>

<div class="w-full d-grid">
    <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700">Hadiah Promo <span class="text-danger">*</span></span>
    </label>
    <div class="d-grid">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="reward" value="persen" id="persen-reward">
            <label class="w-full" for="persen-reward">
                <p class="p-0 m-0">Item</p>
            </label>
        </div>  
    </div>
    <div class="d-grid">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="reward" value="nominal" id="nominal-reward">
            <label class="w-full" for="nominal-reward">
                <p class="p-0 m-0">Item berdasarkan kategori</p>
            </label>
        </div>
    </div>
    <input type="text" id="nominal" name="nominal"
        class="block w-full py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white"
        placeholder="Masukkan jumlah" required>
</div>
