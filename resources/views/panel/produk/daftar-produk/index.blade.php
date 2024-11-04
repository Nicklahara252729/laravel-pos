@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('produk', 'daftar-produk', 'idx-title-button'))
                    <div class="mb-3 flex justify-between items-center">
                        @include(customComponent('produk', 'daftar-produk', 'idx-search'))
                        @include(customComponent('produk', 'daftar-produk', 'idx-filter'))
                    </div>
                    <div class="table-responsive">
                        @include(table())
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.produk.daftar-produk.modal.input');
    @include('panel.produk.daftar-produk.modal.detail');
    @include('panel.produk.daftar-produk.modal.variant');
    @include('panel.produk.daftar-produk.modal.stock');
    @include('panel.produk.daftar-produk.modal.import');
    @include('panel.produk.daftar-produk.modal.hpp');
@endsection
