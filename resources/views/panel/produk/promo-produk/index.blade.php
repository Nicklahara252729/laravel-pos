@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('produk', 'promo-produk', 'idx-title-button'))
                    <div class="mb-3 flex justify-between items-center">
                        @include(customComponent('produk', 'promo-produk', 'idx-search'))
                        @include(customComponent('produk', 'promo-produk', 'idx-filter'))
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
    @include('panel.produk.promo-produk.modal.input')
    @include('panel.produk.promo-produk.modal.assign-outlet')
    @include('panel.produk.promo-produk.modal.assign-item')
    @include('panel.produk.promo-produk.modal.assign-tipe-penjualan')
    @include('panel.produk.promo-produk.modal.detail')
@endsection
