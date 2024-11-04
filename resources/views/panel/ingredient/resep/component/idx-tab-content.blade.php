<div class="card-body">
    <div class="tab-content text-muted">
        {{-- tab produk --}}
        <div class="tab-pane active" id="produk" role="tabpanel">
            <div class="table-responsive">
                {{-- table --}}
                @include(customTable('ingredient', 'resep', 'produk'))
                {{-- end table --}}
            </div>
        </div>
        {{-- end tab produk --}}
        {{-- tab bahan setengah jadi --}}
        <div class="tab-pane" id="bahan-setengah-jadi" role="tabpanel">
            <div class="table-responsive">
                {{-- table --}}
                @include(customTable('ingredient', 'resep', 'bahan-setengah-jadi'))
                {{-- end table --}}
                {{-- text --}}
                <p><a class="text-primary" href="{{ url('ingredient/daftar-bahan') }}">Buka daftar
                        bahan</a> jika Anda ingin membuat resep
                    Bahan Setengah Jadi</p>
                {{-- end text --}}
            </div>
        </div>
        {{-- end tab bahan setengah jadi --}}
    </div>
</div>
