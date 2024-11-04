<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ assetAttribute('application name') }} - Backoffice</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/logo/'.assetAttribute('logo'))}}" />

    @vite('resources/css/app.css')

    <link href="{{asset('assets/css/config/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/config/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/config/app.min.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('assets/css/config/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset(cssAuth()['plugin'].'.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset(cssAuth()['css'].'.css')}}">
</head>

<body class="overflow-hidden">
    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="row w-full">
            <div class="col-lg-6 col-md-12 d-none d-lg-block p-0 bg-cover bg-center bg-slate-500" id="login-image">
            </div>
            <div class="col-lg-6 col-md-12 p-0">
                <div class="container">
                    <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                        <div class="row justify-content-center my-auto">
                            <div class="col-md-8 col-lg-8 col-xl-5">

                                <div class="mb-4 pb-2">
                                    <a href="{{url('/')}}" class="d-block auth-logo">
                                        <img src="{{asset('assets/images/logo/'.assetAttribute('logo'))}}" alt="" class="auth-logo-dark me-start">
                                        <img src="{{asset('assets/images/logo/'.assetAttribute('logo'))}}" alt="" class="auth-logo-light me-start">
                                    </a>
                                </div>
                                @yield("content")
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center p-4">
                                    {{ config("app.copyright") }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/config/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendors/sweetalert2/sweetalert.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js-cookie/dist/js.cookie.min.js') }}"></script>
    <script src="{{ asset('assets/js/config/config.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/utilities/jwt-util.js') }}"></script> --}}

    <script src="{{asset(jsAuth()['plugin'].'.js')}} "></script>
    <script src="{{asset(jsAuth()['js'].'.js')}} " type="module"></script>
</body>

</html>