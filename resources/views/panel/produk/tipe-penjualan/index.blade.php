@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('produk', 'tipe-penjualan', 'idx-title-button'))
                    <div class="table-responsive">
                        @include(table())
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.produk.tipe-penjualan.modal.detail')
    @include('panel.produk.tipe-penjualan.modal.input')
@endsection