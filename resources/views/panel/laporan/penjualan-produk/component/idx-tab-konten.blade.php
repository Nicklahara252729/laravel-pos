<div class="card-body">
    <div class="tab-content text-muted">
        <div class="tab-pane active" id="income" role="tabpanel">
            <div class="table-responsive">
                @include(customTable('laporan', 'penjualan-produk', 'income'))
            </div>
        </div>
        <div class="tab-pane" id="outcome" role="tabpanel">
            <div class="table-responsive">
                @include(customTable('laporan', 'penjualan-produk', 'quantity'))
            </div>
        </div>
    </div>
</div>
