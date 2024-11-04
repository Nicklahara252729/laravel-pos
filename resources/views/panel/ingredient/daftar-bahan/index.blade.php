@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    {{-- title button --}}
                    @include(customComponent('ingredient', 'daftar-bahan', 'idx-title-button'))
                    {{-- end title button --}}
                    <div class="mb-3 flex justify-between items-center">
                        {{-- search --}}
                        @include(customComponent('ingredient', 'daftar-bahan', 'idx-search'))
                        {{-- end search --}}
                        {{-- tipe bahan dan kategori --}}
                        <div>
                            @include(customComponent('ingredient', 'daftar-bahan', 'idx-tipe-bahan'))
                            @include(customComponent('ingredient', 'daftar-bahan', 'idx-kategori'))
                        </div>
                        {{-- end tipe bahan dan kategori --}}
                    </div>
                    {{-- table --}}
                    <div class="table-responsive">
                        @include(table())
                    </div>
                    {{-- end table --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.ingredient.daftar-bahan.modal.input')
    @include('panel.ingredient.daftar-bahan.modal.resep')
    @include('panel.ingredient.daftar-bahan.modal.bahan')
    @include('panel.ingredient.daftar-bahan.modal.detail')
    @include('panel.ingredient.daftar-bahan.modal.import')
@endsection
