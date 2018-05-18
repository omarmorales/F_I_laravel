@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="columns">
      <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
          <div class="card-header">
            <p class="card-header-title">{{ __('Register') }}</p>
          </div>
          <div class="card-content">
            <div class="content">
              <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="field">
                  <label class="label">{{ __('Name') }}</label>
                  <div class="control">
                    <input id="name" type="text" class="input{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help is-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>

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
                  <label class="label">{{ __('Confirm Password') }}</label>
                  <div class="control">
                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <button type="submit" class="button is-primary">{{ __('Register') }}</button>
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
