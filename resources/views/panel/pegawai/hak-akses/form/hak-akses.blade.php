<form enctype="multipart/form-data" id="form-input" class="lg:px-20">
    <div class="form-group mb-4">
        <label for="access_name">Nama Hak Akses <small class="text-danger">*</small></label>
        <label class="sr-only">Search</label>
        <div class="relative w-full">
            <input type="text" id="access_name" name="access_name"
                class="bg-gray-50 border-2 border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Masukan nama hak akses" required>
        </div>
    </div>

    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">Aplikasi mobile
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Pengaturan hak akses untuk bagian aplikasi mobile atau kasir
            </p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" value="yes" id="app-permission" name="app_permission" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>

    <div class="mobile-group display-none">
        <ul>
            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Manage All Open Bills</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="manage-all-open-bills" name="manage_all_open_bills"
                            class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Manage Discounts</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="manage-discounts" name="manage_discounts" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Issue Refunds</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="issue-refunds" name="issue_refunds" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Resend Receipts</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="resend-receipts" name="resend_receipts" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Record Invoice Paymanets</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="record-invoice-payments" name="record_invoice_payments"
                            class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Cancel Invoices</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="cancel-invoices" name="cancel_invoices" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">View Print Current Shift Details</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="view-print-current-shift-details"
                            name="view_print_current_shift_details" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Manage Items</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="manage-items" name="manage_items" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Manage Favorites</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="manage-favorites" name="manage_favorites" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Edit Customer Information</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="edit-customer-information" name="edit_customer_information"
                            class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Charge Custmmers</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="charge-customers" name="charge_customers" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Move tables</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="move-tables" name="move_tables" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>
        </ul>
    </div>

    <hr>
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">Backoffice
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Pengaturan hak akses untuk bagian backoffice.
            </p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" value="yes" id="backoffice-permission" name="backoffice_permission" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>

    <div class="backoffice-group display-none">
        <ul>
            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Dashboard</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="dashboard" name="dashboard" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Laporan Penjualan</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="laporan-penjualan" name="laporan_penjualan" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>

                <div class="backoffice-laporan-penjualan-group display-none">
                    <ul>
                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Ringkasan Laporan</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="ringkasan-laporan" name="ringkasan_laporan"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Keuntungan Kotor</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="keuntungan-kotor" name="keuntungan_kotor"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Metode Pembayaran</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="metode-pembayaran" name="metode_pembayaran"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Laporan Tipe Penjualan</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="laporan-tipe-penjualan" name="laporan_tipe_penjualan"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Penjualan Produk</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="penjualan-produk" name="penjualan_produk"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Penjualan Kategori</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="penjualan-kategori" name="penjualan_kategori"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Modifier Sales</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="modifier-sales" name="modifier_sales"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Diskon</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="diskon" name="diskon" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Pajak</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="pajak" name="pajak" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Gratifikasi</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="gratifikasi" name="gratifikasi" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Collected By</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="collected-by" name="collected_by"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Shift</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="shift" name="shift" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Riwayat Transaksi</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="riwayat-transaksi" name="riwayat_transaksi"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Pembayaran</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="pembayaran" name="pembayaran" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>

                <div class="backoffice-pembayaran-group display-none">
                    <ul>
                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Invoice</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="invoice" name="invoice" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Checkout Setting</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="checkout-setting" name="checkout_setting" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Metode Pembayaran</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="metode" name="metode" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Produk</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="produk" name="produk" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>

                <div class="backoffice-produk-group display-none">
                    <ul>
                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Daftar Produk</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="daftar-produk" name="daftar_produk" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Modifier</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="modifier" name="modifier" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Kategori Produk</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="kategori-produk" name="kategori_produk"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Paket Bundel</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="paket-bundle" name="paket_bundle"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Promo Produk</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="promo-produk" name="promo_produk" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Diskon Produk</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="diskon-produk" name="diskon_produk" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Pajak Produk</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="pajak-produk" name="pajak_produk"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Gratuity</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="gratuity" name="gratuity" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Tipe Penjualan</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="tipe-penjualan" name="tipe_penjualan" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Bahan dan Resep</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="bahan-dan-resep" name="bahan_dan_resep" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>

                <div class="backoffice-bahan-dan-resep-group display-none">
                    <ul>
                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Daftar Bahan</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="daftar-bahan" name="daftar_bahan" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Kategori Bahan</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="kategori-bahan" name="kategori_bahan" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Resep</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="resep" name="resep" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Inventori</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="inventori" name="inventori" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>

                <div class="backoffice-inventori-group display-none">
                    <ul>
                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Ringkasan Inventori</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="ringkasan-inventori" name="ringkasan_inventori" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Purchase Order</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="purchase-order" name="purchase_order" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Pelanggan</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="pelanggan" name="pelanggan" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Pegawai</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="pegawai" name="pegawai" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>

                <div class="backoffice-pegawai-group display-none">
                    <ul>
                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Daftar Pegawai</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="daftar-pegawai" name="daftar_pegawai" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Hak Akses</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="hak-akses" name="hak_akses" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700 pr-10">Outlet</span>
                    <div class="relative mt-1">
                        <input type="checkbox" value="yes" id="outlet" name="outlet" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                        </div>
                    </div>
                </label>

                <div class="backoffice-outlet-group display-none">
                    <ul>
                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Receipt</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="receipt" name="receipt" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li>
                            <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
                                <span class="font-medium text-gray-700 pr-10">Pengaturan Meja</span>
                                <div class="relative mt-1">
                                    <input type="checkbox" value="yes" id="pengaturan-meja" name="pengaturan_meja" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</form>
