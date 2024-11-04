@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @include(customComponent('inventory', 'ringkasan-inventory', 'idx-title-button'))
                    @include(customComponent('inventory', 'ringkasan-inventory', 'idx-search'))
                    @include(customComponent('inventory', 'ringkasan-inventory', 'idx-filter-kategori'))
                </div>
                <div class="table-responsive">
                    @include(table())
                </div>
            </div>
        </div>
    </div>
@endsection