@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="flex justify-between flex-wrap items-center mb-4">
                        <h4>Daftar Pegawai</h4>
                        <div class="">
                            @include(customComponent('pegawai', 'daftar-pegawai', 'idx-import-export'))
                            @include(customComponent('pegawai', 'daftar-pegawai', 'idx-filter'))
                            @include(customComponent('pegawai', 'daftar-pegawai', 'idx-add-pegawai'))
                        </div>
                    </div>

                    @include(table())
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('panel.pegawai.daftar-pegawai.modal.input')
    @include('panel.pegawai.daftar-pegawai.modal.pin-akses')
    @include('panel.pegawai.daftar-pegawai.modal.change-password')
    @include('panel.pegawai.daftar-pegawai.modal.import')
@endsection
