<form id="form-input">
    <div class="form-group mb-4">
        <label for="nama-meja" class="text-black">Nama Meja <span class="text-danger">*</span></label>
        <input type="text" name="grup_meja" id="nama-meja" class="form-control placeholder:text-sm" placeholder="Masukkan Nama Meja"
            name="nama_meja">
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="pax" class="text-black">Pax <span class="text-danger">*</span></label>
            <div>
                <button class="btn btn-primary btn-soft-primary" type="button"> - </button>
                <span class="ml-3 mr-3">0</span>
                <button class="btn btn-primary btn-soft-primary" type="button"> + </button>
            </div>
        </div>

        <div class="col-md-6">
            <div class="w-full d-grid">
                <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
                    <span class="font-medium text-gray-700">Bentuk Meja <span class="text-danger">*</span></span>
                </label>

                <div class="flex justify-between">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="bentuk_meja" id="petak" value="petak"
                            data-action="petak">
                        <label class="w-full font-normal" for="petak">
                            <p class="p-0 m-0">Petak</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="bentuk_meja" id="lingkaran" value="lingkaran"
                            data-action="lingkaran">
                        <label class="w-full font-normal" for="lingkaran">
                            <p class="p-0 m-0">Lingkaran</p>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
