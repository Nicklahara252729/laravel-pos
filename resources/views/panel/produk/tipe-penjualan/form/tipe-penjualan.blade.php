<form enctype="multipart/form-data" id="form-input">
    <div class="flex justify-between items-center mb-3" id="status-container">
        <h6 class="font-medium text-gray-600">Aktifkan tipe penjualan</h6>
            
        <label class="relative inline-flex items-center my-auto cursor-pointer" for="is-active">
            <input type="checkbox" name="sales_status" class="sr-only peer" id="is-active">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
            </div>
        </label>
    </div>

    <div class="form-group mb-3">
        <label for="sales_type_name">Nama tipe penjualan</label>
        <input type="text" name="sales_type_name" id="name" class="form-control" placeholder="Masukkan nama tipe penjualan">
    </div>

    <div class="form-group mb-3">
        <label for="">Terapkan gratifikasi</label>
        <ul class="m-0 p-0" id="gratuity-list">
            
        </ul>
    </div>
</form>