@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('produk', 'kategori-produk', 'idx-title-button'))
                    @include(customComponent('produk', 'kategori-produk', 'idx-search'))
                    <div class="col-lg-12 table-responsive">
                        @include(table())
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.produk.kategori-produk.modal.kategori')
    @include('panel.produk.kategori-produk.modal.assign-item')
    @include('panel.produk.kategori-produk.modal.detail')
@endsection
