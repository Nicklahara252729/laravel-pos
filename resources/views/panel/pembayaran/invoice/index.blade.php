@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('pembayaran', 'invoice', 'idx-title-button'))
                    <div class="mb-3 flex justify-between items-center">
                        @include(customComponent('pembayaran', 'invoice', 'idx-search'))
                        @include(customComponent('pembayaran', 'invoice', 'idx-filter'))
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
    @include('panel.pembayaran.invoice.modal.detail')
    @include('panel.pembayaran.invoice.modal.payment')
    @include('panel.pembayaran.invoice.modal.cancel')
@endsection
