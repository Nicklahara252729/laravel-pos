<div class="card-body">
    <div class="tab-content text-muted">
        <div class="tab-pane active" id="grup-meja" role="tabpanel">
            <div class="table-responsive">
                @include(customComponent('outlet', 'pengaturan-meja', 'grup-meja'))
                @include(customTable('outlet', 'pengaturan-meja', 'grup-meja'))
            </div>
        </div>
        <div class="tab-pane" id="laporan" role="tabpanel">
            <div class="table-responsive">
                @include(customComponent('outlet', 'pengaturan-meja', 'laporan'))
                @include(customTable('outlet', 'pengaturan-meja', 'laporan'))
            </div>
        </div>
    </div>
</div>