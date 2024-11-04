@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4>Pengaturan</h4>
                    @include(customComponent('profile', 'pengaturan', 'idx-sistem'))
                    @include(customComponent('profile', 'pengaturan', 'idx-info-bisnis'))
                    @include(customComponent('profile', 'pengaturan', 'idx-npwp'))
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.profile.pengaturan.modal.sistem')
    @include('panel.profile.pengaturan.modal.info-bisnis')
    @include('panel.profile.pengaturan.modal.npwp')
@endsection
