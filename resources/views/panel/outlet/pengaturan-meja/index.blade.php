@extends('themes.theme-panel')
@section('content')
    @include(customComponent('outlet', 'pengaturan-meja', 'idx-laporan-total'))
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('outlet', 'pengaturan-meja', 'idx-title-button'))
                    @include(customComponent('outlet', 'pengaturan-meja', 'idx-kategori-tab'))
                    @include(customComponent('outlet', 'pengaturan-meja', 'idx-kategori'))
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.outlet.pengaturan-meja.modal.table-view')
    @include('panel.outlet.pengaturan-meja.modal.input')
    @include('panel.outlet.pengaturan-meja.modal.transaksi')
    @include('panel.outlet.pengaturan-meja.modal.void')
@endsection
