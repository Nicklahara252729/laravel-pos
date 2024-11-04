@extends('themes.theme-panel')
@section('content')
    <div class="mb-3 flex justify-between items-center">
        @include(customComponent('riwayat-transaksi', 'idx-search'))
        @include(customComponent('riwayat-transaksi', 'idx-export'))
    </div>

    <div class="row">
        @include(customComponent('riwayat-transaksi', 'idx-transaksi'))
        @include(customComponent('riwayat-transaksi', 'idx-total-pendapatan'))
        @include(customComponent('riwayat-transaksi', 'idx-penjualan-bersih'))
    </div>

    @include(customItem('riwayat-transaksi', 'transaction-list'))
@endsection
@section('modal')
    @include('panel.riwayat-transaksi.modal.receipt')
    @include('panel.riwayat-transaksi.modal.resend-receipt')
    @include('panel.riwayat-transaksi.modal.issue-refund')
@endsection
