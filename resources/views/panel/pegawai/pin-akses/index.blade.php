@extends('themes.theme-panel')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="grid grid-cols-1 max-w-3xl items-center mb-4">
                        <h4>Pin access</h4>
                        <p>Untuk meningkatkan keamanan operasional bisnis, Anda dapat membatasi akses karyawan dengan
                            mengaktifkan otorisasi akses PIN untuk fitur tertentu. Hal ini akan mengharuskan karyawan
                            memasukkan PIN 4-digit yang diizinkan untuk mengakses fitur.</p>
                    </div>
                    @include(form())
                </div>
            </div>
        </div>
    </div>
@endsection
