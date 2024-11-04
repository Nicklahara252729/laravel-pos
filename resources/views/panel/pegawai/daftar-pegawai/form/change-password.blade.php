<form id="form-change-password">
    <div class="form-control mb-3 border-0">
        <label for="new_password">Password baru</label>
        <div class="position-relative auth-pass-inputgroup">
            <input type="password" class="form-control" name="new_password" id="new-password"
                placeholder="masukkan password baru" required>

            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Looks bad!
            </div>
            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"
                id="new-password-addon-button">
                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
            </button>
        </div>
    </div>
    <div class="form-control mb-3 border-0">
        <label for="new_password_confirmation">Kofimarsi password</label>
        <div class="position-relative auth-pass-inputgroup">
            <input type="password" class="form-control" name="new_password_confirmation" id="new-password-confirmation"
                placeholder="masukkan ulang password baru" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Looks bad!
            </div>
            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="new-confirm-password-addon-button">
                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
            </button>
        </div>

    </div>
</form>
