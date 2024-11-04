<div class="w-full d-grid mb-4">
    <div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="config_compounding" value="yes" id="config-compounding">
            <label class="w-full" for="config-compounding">
                <p class="p-0 m-0">Terapkan berkelipatan</p>
                <span class="text-muted small">(Misalnya jika ada 'diskon 5%', pelanggan yang membeli 2 akan mendapatkan
                    diskon 5% untuk 2 item, beli 3 akan mendapatkan diskon 5% untuk 3 item, dll.)
            </label>
        </div>
    </div>

    <div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="config_time" value="yes" id="config-time">
            <label class="w-full" for="config-time">
                <p class="p-0 m-0">Atur jangka waktu promo</p>
                <span class="text-muted small">Dengan tidak menetapkan jangka waktu promo, promo ini akan berjalan
                    selamanya mulai besok. Anda dapat mengaturnya nanti.
            </label>
        </div>
    </div>
</div>

<div class="w-full hidden" id="waktu-promo-container">
    <section class="mb-4">
        <div class="d-grid">
            <div class="flex justify-between mb-2">
                <div class="form-group">
                    <label>Atur tanggal</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="atur-waktu">
                </div>
            </div>
    </section>

    <section class="mb-4">
        <div class="d-grid">
            <div class="flex justify-between mb-2">
                <div class="form-group">
                    <label>Atur waktu</label>
                </div>
                <div class="col-md-10 flex">
                    <div class="col-md-6 p-r-2">
                        <input type="text" class="form-control" id="start-time">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="end-time">
                    </div>
                </div>
            </div>
    </section>

    <section>
        <div class="d-grid">
            <div class="flex justify-between mb-2">
                <div class="form-group">
                    <label>Atur hari</label>
                </div>
                <div class="col-md-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="config_day[]" value="all"
                            id="all-days">
                        <label class="w-full" for="all-days">
                            <p class="p-0 m-0">Pilih semua</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="config_day[]" value="senin"
                            id="senin">
                        <label class="w-full" for="senin">
                            <p class="p-0 m-0">Senin</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="config_day[]" value="selasa"
                            id="selasa">
                        <label class="w-full" for="selasa">
                            <p class="p-0 m-0">Selasa</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="config_day[]" value="rabu"
                            id="rabu">
                        <label class="w-full" for="rabu">
                            <p class="p-0 m-0">Rabu</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="config_day[]" value="kamis"
                            id="kamis">
                        <label class="w-full" for="kamis">
                            <p class="p-0 m-0">Kamis</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="config_day[]" value="jumat"
                            id="jumat">
                        <label class="w-full" for="jumat">
                            <p class="p-0 m-0">Jumat</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="config_day[]" value="sabtu"
                            id="sabtu">
                        <label class="w-full" for="sabtu">
                            <p class="p-0 m-0">Sabtu</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="config_day[]" value="minggu"
                            id="minggu">
                        <label class="w-full" for="minggu">
                            <p class="p-0 m-0">Minggu</p>
                        </label>
                    </div>
                </div>
            </div>
    </section>
</div>
