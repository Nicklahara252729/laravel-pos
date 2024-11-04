@extends('themes.theme-panel')
@section('content')
    <div class="row">
        {{-- sidebar --}}
        <div class="col-xl-3 col-lg-4">
            @include(customComponent('dokumentasi', 'sidebar'))
        </div>
        {{-- end sidebar --}}
        {{-- content --}}
        <div class="col-xl-9 col-lg-8">
            @include(customContent('dokumentasi', $content))
        </div>
        {{-- end content --}}
    </div>
@endsection
