@extends('themes.theme-panel')
@section('content')
    <div class="row mb-5">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    @include(form())
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Receipt</h5>
                </div>
                <div class="modal-body">
                    @include(customItem('outlet', 'receipt', 'haeder'))
                    @include(customItem('outlet', 'receipt', 'information'))
                    @include(customItem('outlet', 'receipt', 'type'))
                    @include(customItem('outlet', 'receipt', 'item'))
                    @include(customItem('outlet', 'receipt', 'addons'))
                    @include(customItem('outlet', 'receipt', 'total'))
                    @include(customItem('outlet', 'receipt', 'social-media'))
                    @include(customItem('outlet', 'receipt', 'note'))
                </div>
            </div>
        </div>
    </div>
@endsection
