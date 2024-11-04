{{-- modal opsi import --}}
<div id="modal-opsi-import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title">Pilih opsi import</h5>
            </div>
            {{-- end modal header --}}
            {{-- modal body --}}
            <div class="modal-body">

                {{-- change import --}}
                <div class="card border border-primary" id="opsi-import-container" data-action="change">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Ubah isi daftar bahan saat ini</h5>
                        <p class="card-text">Tambahkan bahan baru dan perbarui bahan yang sudah ada. Bahan tidak
                            dihapus, hanya diubah</p>
                    </div>
                </div>
                {{-- add import --}}

                {{-- replace import --}}
                <div class="card border border-primary" id="opsi-import-container" data-action="replace">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Timpa dan ganti daftar bahan saat ini</h5>
                        <p class="card-text">Timpa bahan yang ada. Semua bahan akan dihapus dan diganti</p>
                    </div>
                </div>
                {{-- add import --}}

            </div>
            {{-- end modal body --}}
            {{-- modal footer --}}
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
            </div>
            {{-- end modal footer --}}
        </div>
    </div>
</div>
{{-- end modal opsi import --}}

{{-- modal import --}}
<div id="modal-import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            {{-- modal header --}}
            <div class="modal-header">
                <h5 class="modal-title">Import</h5>
            </div>
            {{-- end modal header --}}
            {{-- modal body --}}
            <div class="modal-body">
                @include(customForm('ingredient', 'daftar-bahan', 'import'))
            </div>
            {{-- end modal body --}}
            {{-- modal footer --}}
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light" id="submit-import-button">Unggah file</button>
            </div>
            {{-- end modal footer --}}
        </div>
    </div>
</div>
{{-- end modal import --}}
