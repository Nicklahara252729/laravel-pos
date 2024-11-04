@extends('themes.theme-panel')
@section('content')
    <div class="row">
        @include(customComponent('dashboard', 'idx-penjualan-kotor'))
        @include(customComponent('dashboard', 'idx-penjualan-bersih'))
        @include(customComponent('dashboard', 'idx-laba-kotor'))
        @include(customComponent('dashboard', 'idx-transaksi'))
        @include(customComponent('dashboard', 'idx-penjualan-rata'))
        @include(customComponent('dashboard', 'idx-margin-kotor'))
    </div>
    @include(customComponent('dashboard', 'idx-peringkat-penjualan'))
@endsection
