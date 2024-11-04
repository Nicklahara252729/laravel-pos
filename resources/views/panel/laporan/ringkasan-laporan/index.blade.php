@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('laporan', 'ringkasan-laporan', 'idx-title-button'))
                    @include(table())
                </div>
            </div>
        </div>
    </div>
@endsection
