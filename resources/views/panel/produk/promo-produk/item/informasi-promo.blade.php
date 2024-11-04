<div class="form-group mb-4">
    <label for="promo-name">Nama Promo <small class="text-danger">*</small></label>
    <div class="mb-3">
        <div class="relative">
            <input type="text" id="promo-name" name="promo_name"
                class="block w-full py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white"
                placeholder="Masukkan nama promo" required>
        </div>
    </div>
</div>

<div class="w-full d-grid mb-4">
    <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700">Jenis Promo <span class="text-danger">*</span></span>
    </label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="promo_type" value="discount" id="diskon-per-item">
            <label class="w-full" for="diskon-per-item">
                <p class="p-0 m-0">Diskon per item</p>
                <span class="text-muted small">Pelanggan mendapatkan <span class="text-primary">diskon (dengan % atau
                        jumlah) secara otomatis</span> ketika mereka membeli barang dan kuantitas yang
                    ditentukan.</span>
            </label>
        </div>
    </div>

    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="promo_type" value="free" id="gratis-produk">
            <label class="w-full" for="gratis-produk">
                <p class="p-0 m-0">Gratis produk</p>
                <span class="text-muted small">Pelanggan mendapatkan <span class="text-primary">produk gratis secara
                        otomatis</span> ketika mereka membeli barang dan kuantitas yang ditentukan.</span>
            </label>
        </div>
    </div>
</div>

<div class="form-group mb-4">
    <label>Assign Outlet <small class="text-danger">*</small></label>
    <div class="mb-3">
        <div class="d-grid">
            <div class="assign-outlet-container mb-3 hidden">
                <label> Nama Outlet</label>
                <ul class="grid grid-cols-1 m-0 p-0 gap-1" id="assign-outlet-list">
                </ul>
            </div>
            <button class="btn btn-primary waves-effect waves-light btn-block" type="button"
                id="assign-outlet-button">Kelola Assign Outlet</button>
        </div>
    </div>
</div>

<div class="w-full d-grid" id="sales-type">
    <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700">Assign tipe penjualan <span class="text-danger">*</span></span>
    </label>
    <div class="d-grid">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sales_type" value="all" id="all-sales-type">
            <label class="w-full" for="all-sales-type">
                <p class="p-0 m-0">Semua jenis penjualan</p>
                <span class="text-muted small">Promo akan berlaku untuk jenis penjualan saat ini dan yang akan
                    datang.</span>
            </label>
        </div>
    </div>
    <div class="d-grid">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sales_type" value="certain" id="certain-sales-type">
            <label class="w-full" for="certain-sales-type">
                <p class="p-0 m-0">Jenis penjualan tertentu</p>
                <span class="text-muted small">Pilih jenis penjualan yang dipilih untuk promo ini.</span>
            </label>
        </div>
    </div>
    <div class="sales-type-container mb-3 hidden">
        <label> Tipe Penjualan</label>
        <ul class="grid grid-cols-1 m-0 p-0 gap-1" id="assign-tipe-penjualan-list">
        </ul>
    </div>
    <div class="d-grid" id="container-certain">
    </div>
</div>
