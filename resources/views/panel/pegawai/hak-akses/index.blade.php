@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('pegawai', 'hak-akses', 'idx-title-button'))
                    <div class="table-responsive">
                        @include(table())
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.pegawai.hak-akses.modal.hak-akses')
@endsection
