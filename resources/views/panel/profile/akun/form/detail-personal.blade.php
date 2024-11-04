<form id="form-detail-personal" enctype="multipart/form-data">
    <div class="form-group mb-3" id="profile-container">
        <label for="">Foto</label>
        <input type="file" name="profile_photo_path" id="profile_photo_path" class="dropify"
            data-allowed-file-extensions="jpg jpeg png" data-max-file-size="2M">
    </div>

    <div class="mb-3">
        <label class="form-label" for="name">Nama <i
                class="mdi mdi-asterisk text-red-600 text-small"></i></small></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama kamu"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="phone">Nomor Telepon <i
                class="mdi mdi-asterisk text-red-600 text-small"></i></small></label>
        <div class="position-relative auth-pass-inputgroup input-custom-icon">
            <span class="fi fi-id fis"></span>
            <input type="tel" class="form-control" id="phone" name="phone"
                placeholder="Masukkan nomor telepon" required>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="email">Email <i
                class="mdi mdi-asterisk text-red-600 text-small"></i></small></label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email kamu"
            required>
    </div>
</form>
