<div class="flex justify-between mb-4">
    <h4>Daftar Bahan</h4>
    <div class="flex gap-2">
        {{-- button import export --}}
        <div class="btn-group">
            {{-- button --}}
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Import / Export <i class="mdi mdi-chevron-down"></i>
            </button>
            {{-- end button --}}
            {{-- dropdown menu --}}
            <div class="dropdown-menu" id="import-export-button">
                <a class="dropdown-item" href="javascript:void(0)" data-action="import">Import</a>
                <a class="dropdown-item" href="javascript:void(0)" data-action="export">Export</a>
            </div>
            {{-- end dropdown menu --}}
        </div>
        {{-- end button import export --}}
        {{-- button tambah bahan --}}
        <div class="btn-group">
            {{-- button --}}
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Tambah Bahan <i class="mdi mdi-chevron-down"></i>
            </button>
            {{-- end button --}}
            {{-- dropdown menu --}}
            <div class="dropdown-menu" id="bahan-button">
                <a class="dropdown-item" href="javascript:void(0)" data-action="half raw">Bahan Setengah
                    Jadi</a>
                <a class="dropdown-item" href="javascript:void(0)" data-action="raw">Bahan Mentah</a>
            </div>
            {{-- end dropdown menu --}}
        </div>
        {{-- end button tambah bahan --}}
    </div>
</div>
