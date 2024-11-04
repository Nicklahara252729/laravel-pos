@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('inventory', 'purchasing-order', 'idx-title-button'))
                    @include(customComponent('inventory', 'purchasing-order', 'idx-kategori-tab'))
                    @include(customComponent('inventory', 'purchasing-order', 'idx-search'))
                    @include(customItem('inventory', 'purchasing-order', 'transaction-list'))
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.inventory.purchasing-order.modal.add')
    @include('panel.inventory.purchasing-order.modal.update')
    @include('panel.inventory.purchasing-order.modal.import')
    @include('panel.inventory.purchasing-order.modal.bahan')
    @include('panel.inventory.purchasing-order.modal.reject')
    @include('panel.inventory.purchasing-order.modal.detail')
    @include('panel.inventory.purchasing-order.modal.riwayat-pemenuhan')
    @include('panel.inventory.purchasing-order.modal.update-proses-pesanan')
    @include('panel.inventory.purchasing-order.modal.stop-pemenuhan')
    @include('panel.inventory.purchasing-order.modal.alasan-pemenuhan')
@endsection
