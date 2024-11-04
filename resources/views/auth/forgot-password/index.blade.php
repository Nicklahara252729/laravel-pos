@extends('themes.theme-auth')
@section('content')
<div class="card">
    <div class="card-body p-4">
        <div class="mt-2">
            <h5>Forgot Password !</h5>
            <p class="text-muted">Masukkan email kamu, dan kami akan mengirimkan tautan untuk mereset passwordmu.</p>
        </div>
        <div class="p-2 mt-4">
            <form class="authentication-form" action="{{ route('password.email') }}" method="post">
                @csrf
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif

                @error('email')
                <div class="alert alert-danger">
                    Maaf, email anda tidak terdaftar
                </div>
                @enderror
                <div class="mb-3" id="email-field">
                    <label class="form-label" for="email">Email</label>
                    <div class="position-relative input-custom-icon">
                        <input id="email" name="email" type="text" class="form-control" value="{{ old('email') }}" placeholder="contohemail@gmail.com">
                        <span class="bx bx-envelope"></span>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="button" onclick="window.history.back()" class="btn waves-effect waves-ligh" value="">Kembali</button>
                    <button class="btn btn-primary waves-effect waves-light" type="submit">Send Link Reset Password</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection