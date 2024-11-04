@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4>Akun</h4>
                    @include(customComponent('profile', 'akun', 'idx-detail-personal'))
                    @include(customComponent('profile', 'akun', 'idx-keamanan'))
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.profile.akun.modal.detail-personal')
    @include('panel.profile.akun.modal.ubah-password')
@endsection
