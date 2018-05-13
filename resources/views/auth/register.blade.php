@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="">
            <b><img style="width: 40px;height: 40px;" src="{{asset('AdminLTE-3.0.0-alpha/dist/img/logobuku1.png')}}">Perpustakaan</b>
                Online
        </a>
    </div>    
            <div class="card">
                <div class="card-body login-card-body">
                     <p class="login-box-msg"><b>Form Pendaftaran</b></p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Nama') }}</label>

                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                              <button type="submit" class="btn btn-block btn-outline-warning">
                                    {{ __('Daftar') }}
                                </button>
                                <br>
                            <p style="text-align: center;">Sudah Menjadi Anggota?</p>
                            <button class="btn btn-block btn-outline-info"><a  href="{{ route('login') }}" style="text-decoration: none; color: black;">Login Sekarang</a></button>
                        </div>
                    </form>
                </div>
            </div> 
</div>
@endsection
