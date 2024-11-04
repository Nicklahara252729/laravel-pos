<form enctype="multipart/form-data" id="form-input" class="lg:px-20">
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">Print bill
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Karyawan akan diminta memasukkan PIN otorisasi setiap kali melakukan print bill.</p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" name="print_bill" value="true" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">Manage All Open Bills
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Karyawan akan diminta memasukkan PIN otorisasi setiap kali melakukan perubahan pada bill yang telah disimpan, seperti edit dan delete open bills.</p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" name="manage_all_open_bills" value="true" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">Apply Discounts to Bills and Items
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Karyawan akan diminta memasukkan PIN otorisasi setiap kali akan memilih diskon untuk sebuah bill.</p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" name="apply_discount_bill_item" value="true" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">Manage Discounts
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Karyawan akan diminta memasukkan PIN otorisasi setiap kali membuat dan menghapus diskon</p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" name="manage_discounts" value="true" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">Issue Refunds
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Karyawan akan diminta memasukkan PIN otorisasi setiap kali melakukan pencatatan pengembalian barang (Issue Refund) di bagian Activity.</p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" name="issue_refunds" value="true" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">Resend Receipts
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Karyawan akan diminta memasukkan PIN otorisasi setiap kali melakukan pencatatan pengembalian barang.</p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" name="resend_receipts" value="true" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">Record Invoice
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Karyawan akan diminta memasukan PIN otorisasi setiap kali melakukan transaksi Invoice di bagian Activity.</p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" name="record_invoice_payments" value="true" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">Cancel Invoices
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Karyawan akan diminta memasukkan PIN otorisasi setiap kali membatalkan invoice yang telah dibuat.</p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" name="cancel_invoices" value="true" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">View Shift History
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Karyawan akan diminta memasukan PIN otorisasi setiap kali melihat riwayat shift.</p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" name="view_shift_histories" value="true" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">Edit Customer Information
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Karyawan akan diminta memasukkan PIN otorisasi setiap kali mengubah data pelanggan yang telah dibuat.</p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" name="edit_customer_infomation" value="true" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <label class="relative inline-flex items-start justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700 pr-10">View Activity
            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 ">
                Karyawan akan diminta memasukan PIN otorisasi setiap kali melihat Activity.</p>
        </span>
        <div class="relative mt-1">
            <input type="checkbox" name="view_activity" value="true" class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <button class="btn btn-primary w-full">Save</button>
</form>