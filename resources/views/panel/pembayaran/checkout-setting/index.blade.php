@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="flex justify-between items-center mb-4">
                        <h4>Checkout</h4>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-5">
                        @include(form())
                        <div class="flex justify-between items-center">
                            <button type="button" class="btn btn-primary float-right" id="submit-button"> Simpan
                                Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
