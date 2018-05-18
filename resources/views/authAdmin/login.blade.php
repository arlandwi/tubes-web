@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="">
            Online
            <b><img style="width: 40px;height: 40px;" src="{{asset('AdminLTE-3.0.0-alpha/dist/img/coba.png')}}">Library</b>
        </a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Log In as Admin</p>
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >

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
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                        </div>
                </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-outline-primary">
                                    {{ __('Log In') }}
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                            </a>
                            
                        </div>
            </form>
        </div>
     </div>
</div>
@endsection
