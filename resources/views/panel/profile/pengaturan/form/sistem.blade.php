<form enctype="multipart/form-data" id="form-sistem">
    <div class="form-group mb-3" id="logo-container">
        <label for="logo">Logo</label>
        <input type="file" name="logo" id="logo" class="dropify" data-allowed-file-extensions="jpg jpeg png" required
            data-max-file-size="2M">
    </div>
    <div class="mb-3">
        <label class="form-label" for="application_name">Nama Aplikasi
            <i class="mdi mdi-asterisk text-red-600 text-small"></i></small>
        </label>
        <input type="text" class="form-control" id="application_name" name="application_name" required
            placeholder="Masukkan nama aplikasi" required>
    </div>
</form>
