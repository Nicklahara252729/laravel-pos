<form enctype="multipart/form-data" id="form-input">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="form-group mb-4">
                <label for="gratuity_name">Nama Gratifikasi <small class="text-danger">*</small></label>
                <div class="mb-3">
                    <div class="relative">
                        <input type="text" id="gratuity_name" name="gratuity_name"
                            class="block w-full py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white"
                            placeholder="Masukkan nama kategori produk" required>
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="amount">Jumlah <small class="text-danger">*</small></label>
                <div class="relative w-full">
                    <input type="number" min="0" name="amount" id="amount"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Masukan jumlah % gratuity" required>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-bold">%</div>
                </div>
            </div>
        </div>
    </div>
</form>
