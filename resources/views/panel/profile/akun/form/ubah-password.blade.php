<form id="form-ubah-password">
    <div class="mb-3">
        <label class="form-label" for="current-pasword">Password Lama</label>
        <div class="position-relative auth-pass-inputgroup input-custom-icon">
            <span class="bx bx-lock-alt"></span>
            <input type="password" class="form-control" id="current-password" name="current_password" placeholder="Masukkan password" autocomplete="current-password" required>
            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="current-password-toggle">
                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
            </button>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="new-password">Password Baru</label>
        <div class="position-relative auth-pass-inputgroup input-custom-icon">
            <span class="bx bx-lock-alt"></span>
            <input type="password" class="form-control" id="new-password" name="new_password" placeholder="Masukkan password" required>
            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="new-password-toggle">
                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
            </button>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="new-password-confirmation">Konfirmasi Password Baru</label>
        <div class="position-relative auth-pass-inputgroup input-custom-icon">
            <span class="bx bx-lock-alt"></span>
            <input type="password" class="form-control" id="new-password-confirmation" name="new_password_confirmation" placeholder="Masukkan password" required>
            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="new-password-confirmation-toggle">
                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
            </button>
        </div>
    </div>
</form>