<form action="" enctype="multipart/form-data" id="form-input">
    <div class="">
        <h5 class="mb-3">Pengaturan pajak dan gratifikasi</h5>
        <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
            <span class="font-medium text-gray-700">Aktifkan pajak</span>
            <div class="relative">
                <input type="checkbox" name="tax_activation" id="tax-activation" value="true" class="sr-only peer">
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                </div>
            </div>
        </label>
        <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
            <span class="font-medium text-gray-700">Aktifkan gratifikasi</span>
            <div class="relative">
                <input type="checkbox" name="gratuity_activation" id="gratuity-activation" value="true"
                    class="sr-only peer">
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                </div>
            </div>
        </label>
    </div>
    <div class="">
        <h5 class="mb-3">Penerapan pajak dan gratifikasi</h5>

        <div class="flex items-center mb-2">
            <input id="tax-gratuity-type-1" type="radio" value="add" name="tax_gratuity_type"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2">
            <label for="tax-gratuity-type-1" class="ml-2 font-medium text-gray-700 my-auto">Tambahkan pajak
                dan
                gratifikasi ke harga barang</label>
        </div>
        <div class="flex items-center mb-2">
            <input id="tax-gratuity-type-2" type="radio" value="include" name="tax_gratuity_type"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <label for="tax-gratuity-type-2" class="ml-2 font-medium text-gray-700 my-auto">Sertakan pajak
                dan
                gratifikasi ke harga barang</label>
        </div>

    </div>
    <div class="">
        <h5 class="mb-3">Pengaturan pembulatan</h5>
        <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
            <span class="font-medium text-gray-700">Aktifkan pembulatan</span>
            <div class="relative">
                <input type="checkbox" name="rounding_activation" id="rounding-activation" value="true" class="sr-only peer">
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                </div>
            </div>
        </label>

        <div class="" id="enabled-rounding-options">
            <div class="flex items-center mb-2">
                <input id="rounding-type-1" type="radio" value="2" name="rounding_type"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2">
                <label for="rounding-type-1" class="ml-2 font-medium text-gray-700 my-auto">00 - Ratusan</label>
            </div>
            <div class="flex items-center mb-3">
                <input id="rounding-type-2" type="radio" value="3" name="rounding_type"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                <label for="rounding-type-2" class="ml-2 font-medium text-gray-700 my-auto">000 - Ribuan</label>
            </div>

            <input type="number" name="rounding_number" id="rounding_number" class="form-control mb-2 w-full md:w-1/2"
                id="rounding-thresholder" placeholder="masukkan batasan pembulatan (3 digit)">
            <p> <span id="round-down">10500 </span>is 10000; <span id="round-up">10501</span> is 11000</p>
        </div>
    </div>
    <div class="">
        <h5 class="mb-3">Batas stock</h5>
        <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
            <span class="font-medium text-gray-700">Aktifkan stok limit
                <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                    Saat dinyalakan, mengaktifkan notifikasi pada aplikasi ketika stok item kamu
                    sudah menipis.</p>
            </span>
            <div class="relative mt-1">
                <input type="checkbox" name="stock_limit" id="stock-limit" value="true" class="sr-only peer">
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                </div>
            </div>
        </label>

        <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full"
            id="enabled-stock-limit-options">
            <span class="font-medium text-gray-700">Aktifkan stok limit
                <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                    Saat dinyalakan, kasir dapat terus melanjutkan transaksi walaupun stok item bisnis kamu sudah
                    menipis atau habis.</p>
            </span>
            <div class="relative mt-1">
                <input type="checkbox" name="stock_limit_type" id="stock-limit-type" value="true"
                    class="sr-only peer">
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                </div>
            </div>
        </label>
    </div>
</form>
