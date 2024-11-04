<form id="form-resep">
    {{-- resep bahan --}}
    <section id="input-resep-bahan">
        <label>Resep Bahan</label>
        <p>Produk 01</p>
    </section>
    {{-- resep bahan --}}

    {{-- resep ini untuk membuat --}}
    <section class="mb-2">
        <label>Resep ini untuk membuat</label>
        <div class="row">
            {{-- input jumlah dibuat --}}
            <div class="col-md-6">
                <div class="form-group">
                    <input type="number" min="0" id="jumlah-dibuat" name="jumlah_dibuat" class="form-control"
                        placeholder="Jumlah dibuat">
                </div>
            </div>
            {{-- end input jumlah dibuat --}}
            {{-- satuan --}}
            <div class="col-md-6 text-left pt-2">
                <strong>Kilogram (Kg)</strong> dari <strong>Produk 01</strong>
            </div>
            {{-- end satuan --}}
        </div>
        <small class="text-warning">Pilih berdasarkan penggunaan operasional Anda (misalnya gram untuk nasi,
            mililitre untuk saus, dll)</small>
    </section>
    {{-- resep ini untuk membuat --}}

    {{-- bahan yang dibutuhkan --}}
    <section class="mb-2 mt-2">
        <label for="bahan" class="text-black">Bahan yang dibutuhkan</label>
        {{-- bahan container --}}
        <div id="bahan-container"></div>
        {{-- end bahan container --}}
        {{-- button --}}
        <button type="button" class="btn btn-primary btn-block w-full" id="resep-bahan-button">
            Kelola Pilihan Bahan
        </button>
        {{-- end button --}}
    </section>
    {{-- bahan yang dibutuhkan --}}
</form>
