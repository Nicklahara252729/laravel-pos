@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('produk', 'paket-bundle', 'idx-title-button'))
                    <div class="table-responsive">
                        @include(table())
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.produk.paket-bundle.modal.input')
    @include('panel.produk.paket-bundle.modal.assign-outlet');
    @include('panel.produk.paket-bundle.modal.assign-item');
    @include('panel.produk.paket-bundle.modal.detail');
@endsection
