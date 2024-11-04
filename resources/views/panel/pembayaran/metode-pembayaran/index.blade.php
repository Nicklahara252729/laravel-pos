@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('pembayaran', 'metode-pembayaran', 'idx-title-header'))
                    @include(customComponent('pembayaran', 'metode-pembayaran', 'idx-search'))
                    <div class="table-responsive">
                        @include(table())
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.pembayaran.metode-pembayaran.modal.metode-pembayaran')
    @include('panel.pembayaran.metode-pembayaran.modal.assign-outlet')
    @include('panel.pembayaran.metode-pembayaran.modal.detail')
@endsection
