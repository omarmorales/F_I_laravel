@extends('layouts.app')

@section('content')
<div class="container">
  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-header">
          <p class="card-header-title">{{ __('Login') }}</p>
        </div>
        <div class="card-content">
          <div class="content">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="field">
                <label class="label">{{ __('E-Mail Address') }}</label>
                <div class="control">
                  <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                      <span class="help is-danger">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="field">
                <label class="label">{{ __('Password') }}</label>
                <div class="control">
                  <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                      <span class="help is-danger">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>

              <div class="field is-grouped">
                <div class="control">
                  <button type="submit" class="button is-primary">{{ __('Login') }}</button>
                </div>
                <div class="control">
                  <a class="button is-text" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
