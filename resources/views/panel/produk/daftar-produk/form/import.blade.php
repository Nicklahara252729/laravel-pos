<form enctype="multipart/form-data" id="form-import">
    Untuk mengunggah item secara masal, pertama - tama unduh <a href="{{asset('assets/files/Import-Pelanggan.xlsx')}}" class="text-primary">Template kami.</a>
    Kemudian, isi atau perbarui informasi item berdasarkan form yang tersedia.<br>
    <strong>Mohon di perhatikan !</strong><br>
    <span class="text-secondary">*Maks 10.000 item dalam satu file, dan maks ukuran file 2MB untuk mengoptimalkan
        kinerja impor.</span><br>
    <span class="text-secondary">*Pastikan nama outlet terdaftar sebelumnya. Jika tidak terdaftar maka proses import akan gagal.</span>
    <div class="form-group mb-2" id="import-container">
        <input type="file" name="file" id="file" class="dropify" data-allowed-file-extensions="xls xlsx csv"
            data-max-file-size="2M">
    </div>
</form>
