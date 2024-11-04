<div class="flex justify-between flex-wrap items-center">
    <h4>Resep</h4>
    <div class="flex gap-2">
        {{-- button group --}}
        <div class="btn-group">
            {{-- button import / export --}}
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">Import / Export <i class="mdi mdi-chevron-down"></i>
            </button>
            {{-- end button import / export --}}
            {{-- dropdown menu --}}
            <div class="dropdown-menu" id="import-export-button">
                <a class="dropdown-item" href="javascript:void(0)" data-action="import">Import</a>
                <a class="dropdown-item" href="javascript:void(0)" data-action="export">Export</a>
            </div>
            {{-- end dropdown menu --}}
        </div>
        {{-- end button group --}}
        {{-- button add --}}
        <button class="btn btn-primary" id="add-button" data-bs-toggle="modal" data-bs-target="#modal-input">
            Tambah Resep
        </button>
        {{-- end button add --}}
    </div>
</div>
