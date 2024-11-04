<form enctype="multipart/form-data" id="form-input">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="form-group mb-4">
                <label for="configuration_name">Nama Konfigurasi <small class="text-danger">*</small></label>
                <div class="mb-3">
                    <div class="relative">
                        <input type="text" id="configuration-name" name="configuration_name"
                            class="block w-full py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white"
                            placeholder="Masukkan nama konfigurasi" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-sm-12">
            <div class="form-group mb-4">
                <label>Assign Outlet <small class="text-danger">*</small></label>
                <div class="mb-3">
                    <div class="d-grid">
                        <button class="btn btn-primary waves-effect waves-light btn-block" type="button"
                            id="assign-outlet-button">Kelola Assign Outlet</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-sm-12">
            <label class="relative inline-flex items-start justify-between cursor-pointer w-full">
                <span class="font-medium text-gray-700 pr-10">Konfigurasi Pembayaran
                    <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 p-0 m-0">
                        Setidaknya satu metode pembayaran harus diaktifkan.
                    </p>
                </span>
            </label>

            <ul class="payment-list">
            </ul>
        </div>
    </div>
</form>
