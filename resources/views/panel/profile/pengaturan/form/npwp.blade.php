<form enctype="multipart/form-data" id="form-npwp">
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="form-group mb-2" id="npwp-container">
                <label for="npwp_photo">NPWP Photo
                    <i class="mdi mdi-asterisk text-red-600 text-small"></i></small>
                </label>
                <input type="file" name="npwp_photo" id="npwp_photo" class="dropify" required
                    data-allowed-file-extensions="jpg jpeg png" data-max-file-size="2M">
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="form-group mb-4">
                <label for="npwp_name">Nama NPWP
                    <i class="mdi mdi-asterisk text-red-600 text-small"></i></small>
                </label>
                <input type="text" class="form-control" name="npwp_name" id="npwp_name" required
                    placeholder="Masukkan nama NPWP">
            </div>
            <div class="form-group mb-4">
                <label for="npwp">Nomor NPWP
                    <i class="mdi mdi-asterisk text-red-600 text-small"></i></small>
                </label>
                <input type="text" class="form-control" name="npwp" id="npwp" required
                    placeholder="Masukkan nomor NPWP">
            </div>
        </div>
    </div>
</form>
