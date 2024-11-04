@extends('themes.theme-auth')
@section('content')

<div class="card">
    <div class="card-body p-4">
        <div class="mt-2">
            <h5>Login Backoffice</h5>
            <p class="text-muted">Gunakan akun master atau akun staff untuk masuk</p>
        </div>
        <div id="alert-container"></div>
        <div class="p-2 mt-4">
            <form action="{{ route('login')}}" method="post" id="form-login">
                @csrf
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif

                <div class="mb-3">
                    <label class="form-label" for="email">E-mail</label>
                    <div class="position-relative input-custom-icon">
                        <input type="text" class="form-control" id="email" name="identity" placeholder="Masukkan Email" :value="old('email')" required autofocus autocomplete="username">
                        <span class="bx bx-user"></span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password-input">Password</label>
                    <div class="position-relative auth-pass-inputgroup input-custom-icon">
                        <span class="bx bx-lock-alt"></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" autocomplete="current-password">
                        <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                            <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                        </button>
                    </div>
                </div>

                <div class="form-check py-1">
                    <div class="float-end">
                        <a href="{{url('forgot-password')}}" class="text-muted text-decoration-underline">Lupa password ?</a>
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection