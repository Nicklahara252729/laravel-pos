<div class="btn-group">
    {{-- button --}}
    <button type="button" class="btn btn-soft-secondary dropdown-toggle text-black" data-bs-toggle="dropdown"
        aria-expanded="false">
        Semua Tipe Bahan <i class="mdi mdi-chevron-down"></i>
    </button>
    {{-- button --}}
    <div class="dropdown-menu" id="tipe-bahan-container">
        {{-- setengah jadi --}}
        <a class="dropdown-item" href="javascript:void(0)">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tipe_bahan[]" value="setengah jadi"
                    id="bahan-setengah-jadi">
                <label class="form-check-label" for="bahan-setengah-jadi">
                    Setengah Jadi
                </label>
            </div>
        </a>
        {{-- end setengah jadi --}}
        {{-- bahan mentah --}}
        <a class="dropdown-item" href="javascript:void(0)">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tipe_bahan[]" value="mentah" id="bahan-mentah">
                <label class="form-check-label" for="bahan-mentah">
                    Mentah
                </label>
            </div>
        </a>
        {{-- end bahan mentah --}}
    </div>
</div>
