<form enctype="multipart/form-data" id="form-daftar-outlet">
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="form-group mb-2" id="logo-container">
                <label for="logo">Foto</label>
                <input type="file" id="logo" name="logo" class="dropify" data-allowed-file-extensions="jpg jpeg png" data-max-file-size="2M">
            </div>
            Jika kamu memilih untuk tidak mengunggah apa pun, logo outlet akan diatur ke default ke gambar yang diunggah
            di profil outlet. Perubahan pada menu ini hanya akan mengubah logo outlet pada receipt yang kamu cetak
            selama transaksi.
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="form-group mb-4">
                <label for="name">Nama Outlet <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="outlet_name" id="name"
                    placeholder="Masukkan nama outlet">
            </div>
            <div class="form-group mb-4">
                <label for="contact">Kontak</label>
                <input type="text" class="form-control" name="phone_number" id="contact"
                    placeholder="Masukkan kontak outlet">
            </div>
            <div class="form-group mb-4">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" name="address" id="address"
                    placeholder="Masukkan alamat outlet">
            </div>
            <div class="form-group mb-4">
                <label for="province">Provinsi</label>
                <select name="id_province" id="province" data-text="Pilih Provinsi" class="form-control">
                    <option disabled selected>Pilih Provinsi</option>
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="city">Kota / Kabupaten</label>
                <select name="id_city" id="city" class="form-control" data-text="Pilih Kota / Kabupaten">
                    <option disabled selected>Pilih Kota/ Kabupaten</option>
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="district">Kecamatan</label>
                <select name="id_district" id="district" class="form-control" data-text="Pilih Kecamatan">
                    <option selected disabled>Pilih Kecamatan</option>
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="postal">Kode Pos</label>
                <input type="number" name="postal_code" id="postal" min="0" class="form-control" placeholder="Kode Pos">
            </div>

        </div>
    </div>
</form>
