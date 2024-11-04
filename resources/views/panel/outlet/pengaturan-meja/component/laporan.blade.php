<div class="mb-3 flex justify-between items-center">
    <div class="flex gap-2">
        <form class="flex items-center">
            <label for="search-laporan" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="search-laporan"
                    class="bg-gray-50 border-2 border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    placeholder="Search" required>
            </div>
        </form>

        <div class="btn-group" id="kategori-container">
            <button type="button" class="btn btn-soft-secondary dropdown-toggle text-black" data-bs-toggle="dropdown"
                aria-expanded="false"><span>Semua Transaksi</span> <i class="mdi mdi-chevron-down"></i></button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0)" data-action="all">Semua Transaksi</a>
                <a class="dropdown-item" href="javascript:void(0)" data-action="done">Transaksi Selesai</a>
                <a class="dropdown-item" href="javascript:void(0)" data-action="resevasi">Reservasi</a>
                <a class="dropdown-item" href="javascript:void(0)" data-action="cancel">Dibatalkan</a>
            </div>
        </div>

    </div>
    <button type="button" id="void-item-button" class="btn btn-link font-bold text-primary">Detail Void Item</button>
</div>
