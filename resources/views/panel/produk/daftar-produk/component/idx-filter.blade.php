<div class="btn-group">
    <button type="button" class="btn btn-soft-secondary dropdown-toggle text-black"
        data-bs-toggle="dropdown" aria-expanded="false">Semua Status <i
            class="mdi mdi-chevron-down"></i></button>
    <div class="dropdown-menu" id="filter-container">
        <a class="dropdown-item" href="#">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="dibatalkan" value="1"
                    name="status[]">
                <label class="form-check-label" for="dibatalkan">
                    Dibatalkan
                </label>
            </div>
        </a>
        <a class="dropdown-item" href="#">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="belum-dibayar" value="2"
                    name="status[]">
                <label class="form-check-label" for="belum-dibayar">
                    Belum dibayar
                </label>
            </div>
        </a>
        <a class="dropdown-item" href="#">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="lewat-tanggal" value="5"
                    name="status[]">
                <label class="form-check-label" for="lewat-tanggal">
                    Lewat tanggal
                </label>
            </div>
        </a>
        <a class="dropdown-item" href="#">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="dibayar" value="3"
                    name="status[]">
                <label class="form-check-label" for="dibayar">
                    Sudah Dibayar
                </label>
            </div>
        </a>
        <a class="dropdown-item" href="#">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="dibayar-sebagian" value="4"
                    name="status[]">
                <label class="form-check-label" for="dibayar-sebagian">
                    Dibayar Sebagian
                </label>
            </div>
        </a>
    </div>
</div>