<form enctype="multipart/form-data" id="form-input">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="p-2">
                <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700">Akitfkan Promo</span>
                    <div class="relative">
                        <input type="checkbox" id="status" name="status" value="active" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>

                <div class="card-header align-items-center d-flex p-0 pb-3">
                    <div class="flex-shrink-0">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="informasi-promo-tab" data-bs-toggle="tab"
                                    href="#informasi-promo-panel" role="tab">
                                    <span class="d-block d-sm-none">Informasi Promo</span>
                                    <span class="d-none d-sm-block">Informasi Promo</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="syarat-dan-hadiah-tab" data-bs-toggle="tab"
                                    href="#syarat-dan-hadiah-panel" role="tab">
                                    <span class="d-block d-sm-none">Syarat dan Hadiah</span>
                                    <span class="d-none d-sm-block">Syarat dan Hadiah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="konfigurasi-promo-tab" data-bs-toggle="tab"
                                    href="#konfigurasi-promo-panel" role="tab">
                                    <span class="d-block d-sm-none">Konfigurasi Promo</span>
                                    <span class="d-none d-sm-block">Konfigurasi Promo</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="informasi-promo-panel" role="tabpanel">
                            @include(customItem('produk', 'promo-produk', 'informasi-promo'))
                        </div>
                        <div class="tab-pane" id="syarat-dan-hadiah-panel" role="tabpanel">
                            @include(customItem('produk', 'promo-produk', 'syarat-dan-hadiah'))
                        </div>
                        <div class="tab-pane" id="konfigurasi-promo-panel" role="tabpanel">
                            @include(customItem('produk', 'promo-produk', 'konfigurasi-promo'))
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
