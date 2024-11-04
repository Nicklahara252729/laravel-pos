<form action="" enctype="multipart/form-data" id="form-input">
    <div class="form-group mb-3">
        <label for="name">Nama diskon</label>
        <input type="text" name="discount_name" id="discount-name" class="form-control" placeholder="Masukkan nama diskon">

    </div>

    <div class="form-group mb-3">

        <label for="">Jenis Diskon</label>

        <div class="flex">
            <div class="flex items-center h-5">
                <input id="amount-status-fixed" aria-describedby="fixed" type="radio" name="amount_status" value="fixed"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            </div>
            <div class="ml-2 text-sm">
                <label for="fixed" class="font-medium text-gray-600">Diskon tetap</label>
                <p id="fixed" class="text-xs font-normal text-gray-500">
                    Jumlah yang dikonfigurasi di Back Office dan tidak dapat diubah di POS</p>
            </div>
        </div>

        <div class="flex">
            <div class="flex items-center h-5">
                <input id="amount-status-custom" aria-describedby="custom" type="radio" name="amount_status" value="custom"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            </div>
            <div class="ml-2 text-sm">
                <label for="custom" class="font-medium text-gray-600">Diskon Kustom</label>
                <p id="custom" class="text-xs font-normal text-gray-500">
                    Jumlah yang dikonfigurasi di Back Office dan dapat diubah di POS</p>
            </div>
        </div>
    </div>


    <div class="form-group mb-3">
        <label for="">Jumlah diskon</label>

        <div class="flex">
            <div class="flex items-center h-5">
                <input id="amount-type-percent" aria-describedby="percentage" type="radio" name="amount_type"
                    value="persen"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            </div>
            <div class="ml-2 text-sm">
                <label for="percentage" class="font-medium text-gray-600">Potogan per persen</label>
            </div>
        </div>

        <div class="flex">
            <div class="flex items-center h-5">
                <input id="amount-type-nominal" aria-describedby="nominal" type="radio" name="amount_type" value="rupiah"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            </div>
            <div class="ml-2 text-sm">
                <label for="nominal" class="font-medium text-gray-600">Potogan per nominal</label>
            </div>
        </div>

        <input type="number" name="amount" id="amount" class="form-control" placeholder="Masukkan jumlah potongan">
    </div>

</form>
