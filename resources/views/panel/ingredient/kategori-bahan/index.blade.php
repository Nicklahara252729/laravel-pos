@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    {{-- title button --}}
                    @include(customComponent('ingredient', 'kategori-bahan', 'idx-title-button'))
                    {{-- end title button --}}
                    {{-- table --}}
                    <div class="table-responsive">
                        @include(table())
                    </div>
                    {{-- end table --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.ingredient.kategori-bahan.modal.kategori-bahan')
    @include('panel.ingredient.kategori-bahan.modal.assign-item')
@endsection
