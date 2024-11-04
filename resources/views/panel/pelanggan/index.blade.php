@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('pelanggan', 'idx-title-button'))
                    @include(customComponent('pelanggan', 'idx-title-button'))
                    @include(table())
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.pelanggan.modal.detail');
    @include('panel.pelanggan.modal.receipt');
    @include('panel.pelanggan.modal.import');
    @include('panel.pelanggan.modal.transaksi');
@endsection
