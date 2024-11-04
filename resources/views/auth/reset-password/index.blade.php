@extends('themes.theme-auth')
@section('content')
<div class="card">
    <div class="card-body p-4">
        <div class="text-center mt-2">
            <h5>Reset Password !</h5>
            <p class="text-muted">Enter your new password.</p>
        </div>
        <div class="p-2 mt-4">
            <form class="text-left" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="alert alert-danger password-alert" id="msg-pass">
                    <span></span>
                </div>

                <div class="mb-3">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <label class="form-label" for="email">Email</label>
                    <div class="position-relative input-custom-icon">
                        <input id="email" class="form-control" type="email" name="email" value="{{ $request->email }}" required autofocus autocomplete="username">
                        <span class="bx bx-user"></span>
                    </div>
                </div>

                <div class="mb-3">
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <label class="form-label" for="password-input">Password</label>
                    <div class="position-relative auth-pass-inputgroup input-custom-icon">
                        <span class="bx bx-lock-alt"></span>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password" autocomplete="new-password">
                        <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                            <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                    <label class="form-label" for="password_confirmation">Confirm Password:</label>
                    <div class="position-relative auth-pass-inputgroup input-custom-icon">
                        <span class="bx bx-lock-alt"></span>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
                        <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="confirm-password-addon">
                            <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                        </button>
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn disabled w-100 waves-effect waves-light" type="button" id="btnSimpan">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection