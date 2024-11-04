@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('produk', 'modifier', 'idx-title-button'))
                    <div class="table-responsive">
                        @include(table())
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.produk.modifier.modal.input');
    @include('panel.produk.modifier.modal.option');
    @include('panel.produk.modifier.modal.recipe');
    @include('panel.produk.modifier.modal.assign-item');
    @include('panel.produk.modifier.modal.detail');
@endsection
