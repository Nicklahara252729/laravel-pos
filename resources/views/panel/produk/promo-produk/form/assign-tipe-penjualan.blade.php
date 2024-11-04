<form enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="form-group mb-4">
                <label>Daftar Tipe Penjualan</label>
                <div class="mb-3">
                    <label for="search-tipe-penjualan-list"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="search-tipe-penjualan-list"
                            class="block w-full py-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white"
                            placeholder="Cari tipe penjualan...">
                    </div>
                </div>
                <ul class="grid grid-cols-1 m-0 p-0 gap-1" id="tipe-penjualan-assign-list"></ul>
            </div>
        </div>
    </div>
</form>
