@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('laporan', 'penjualan-produk', 'idx-title-button'))
                    @include(customComponent('laporan', 'penjualan-produk', 'idx-tab'))
                    @include(customComponent('laporan', 'penjualan-produk', 'idx-tab-konten'))
                </div>
            </div>
        </div>
    </div>
@endsection
