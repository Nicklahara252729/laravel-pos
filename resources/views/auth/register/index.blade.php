@extends('themes.auth')
@section('content')
<div class="row align-items-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h2 class="m-t-20">Sign In</h2>
                <p class="m-b-30">Enter your credential to get access</p>
                <form class="text-left" method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-semibold" for="name">Nama Lengkap:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" name="name" id="name" required placeholder="Masukan Nama Lengkap">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="username">Username:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" name="username" id="username" required placeholder="Masukan Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="email">Email:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="email" class="form-control" name="email" id="email" required placeholder="email">
                        </div>
                    </div>
                    <div class="alert alert-danger " id="msg-pass">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="password">Password:</label>
                        <div class="input-affix m-b-10">
                            <i class="prefix-icon anticon anticon-lock"></i>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Password" onkeyup="checkPass();">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="password_confirmation">Confirm Password:</label>
                        <div class="input-affix m-b-10">
                            <i class="prefix-icon anticon anticon-lock"></i>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Confirm Password" onkeyup="checkPass();">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="font-size-13 text-muted">
                                Have an account?
                                <a class="small" href="{{route('login')}}"> Login</a>
                            </span>
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="offset-md-1 col-md-6 d-none d-md-block">
        <img class="img-fluid" src="{{asset('assets/images/others/login-2.png')}}" alt="">
    </div>
</div>
@endsection