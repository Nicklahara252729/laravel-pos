<form enctype="multipart/form-data" id="form-input">
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="form-group mb-2" id="profile-container">
                <label for="">Foto</label>
                <input type="file" name="profile_photo_path" id="profile_photo_path" class="dropify"
                    data-allowed-file-extensions="jpg jpeg png" data-max-file-size="2M">
            </div>
            Jika kamu memilih untuk tidak mengunggah apa pun, foto akan diatur ke default.
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="form-group mb-3">
                <label for="name">Name <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="name" id="name"
                    placeholder="Masukkan nama pegawai">
            </div>
            <div class="form-group mb-3">
                <label for="phone">Kontak <small class="text-danger">*</small></label>
                <input type="number" class="form-control" name="phone" id="phone" min="0"
                    placeholder="Masukkan kontak pegawai">
            </div>
            <div class="form-group mb-3">
                <label for="uuid_access">Hak akses <small class="text-danger">*</small></label>
                <select name="uuid_access" id="uuid_access" class="form-control" data-text="Pilih Hak Akses">
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email <small class="text-danger">*</small></label>
                <input type="email" class="form-control" name="email" id="email"
                    placeholder="Masukkan email pegawai">
            </div>
            <div class="form-group mb-3" id="password-container">
                <label for="password">Password <small class="text-danger">*</small></label>
                <div class="position-relative auth-pass-inputgroup">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukkan password" autocomplete="current-password">
                    <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                        id="password-addon-button">
                        <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                    </button>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="pin">Pin</label>
                <div class="position-relative auth-pass-inputgroup">
                    <input type="password" maxlength="4" name="pin" id="pin" class="form-control mb-1"
                        placeholder="Masukkan 4 digit pin">
                    <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                        id="pin-addon-button">
                        <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                    </button>
                </div>

                <p class="text-xs text-warning">Masukkan pin hanya menggunakan angka </p>
            </div>
        </div>
    </div>
</form>
