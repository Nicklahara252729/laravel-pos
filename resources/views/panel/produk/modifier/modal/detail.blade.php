<div id="modal-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Detail Modifier</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div>
                            <strong>Nama Modifier </strong>
                            <p id="detail-nama-modifier"></p>
                        </div>

                        <div class="mb-4" id="detail-option">
                            <strong>Pilihan Modifier </strong>
                            @include(customTable('produk', 'modifier', 'option'))
                        </div>

                        <div class="mb-4" id="detail-recipe">
                            <strong>Resep Modifier </strong>
                            @include(customTable('produk', 'modifier', 'recipe'))
                        </div>

                        <div>
                            <strong>Assign Item </strong>
                            <ul class="p-0" id="detail-modifier-item"></ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer flex justify-end">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
