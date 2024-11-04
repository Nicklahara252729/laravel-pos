<form enctype="multipart/form-data" id="form-input">
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="form-group mb-2" id="bundle-package-container">
                <input type="file" name="bundle_package_image" id="bundle_package_image" class="dropify"
                    data-allowed-file-extensions="jpg jpeg png" data-max-file-size="2M">
            </div>
            Jika kamu memilih untuk tidak mengunggah apa pun, foto akan diatur ke default.
        </div>

        <div class="col-lg-8 col-sm-12">
            <label class="mb-4 relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
                <span class="font-medium text-gray-700">Akitfkan Bundle</span>
                <div class="relative">
                    <input type="checkbox" id="status" name="status" value="active" class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                    </div>
                </div>
            </label>

            <div class="form-group mb-4">
                <label for="bundle-name">Nama Bundle <small class="text-danger">*</small></label>
                <div class="mb-3">
                    <div class="relative">
                        <input type="text" id="bundle-name" name="bundle_name"
                            class="block w-full py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white"
                            placeholder="Masukkan nama bundle" required>
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

            <div class="form-group mb-4">
                <label>Bundle Item <small class="text-danger">*</small></label>
                <div class="mb-3">
                    <div class="d-grid">
                        <div class="assign-item-container mb-3 hidden">
                        </div>
                        <button class="btn btn-primary waves-effect waves-light btn-block" type="button"
                            id="item-bundle-button">Tambah Item Bundle</button>
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="bundle-price">Harga Bundle <small class="text-danger">*</small></label>
                <div class="mb-3">
                    <div class="relative">
                        <input type="number" id="bundle-price" name="bundle_price" min="0"
                            class="block w-full py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white"
                            placeholder="Masukkan harga bundle" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
