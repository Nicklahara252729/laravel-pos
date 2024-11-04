@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('ingredient', 'resep', 'idx-title-button'))
                    @include(customComponent('ingredient', 'resep', 'idx-tab'))
                    @include(customComponent('ingredient', 'resep', 'idx-search'))
                    @include(customComponent('ingredient', 'resep', 'idx-tab-content'))
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.ingredient.resep.modal.input')
    @include('panel.ingredient.resep.modal.bahan')
    @include('panel.ingredient.resep.modal.import')
    @include('panel.ingredient.resep.modal.detail')
@endsection
