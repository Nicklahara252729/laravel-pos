@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('profile', 'daftar-outlet', 'idx-title-button'))
                    @include(table())
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.profile.daftar-outlet.modal.daftar-outlet')
@endsection
