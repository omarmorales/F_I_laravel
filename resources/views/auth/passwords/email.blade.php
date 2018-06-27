@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="columns">
      <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
          <div class="card-header">
            <p class="card-header-title">{{ __('Reset Password') }}</p>
          </div>
          <div class="card-content">
            <div class="content">
              @if (session('status'))
                  <div class="notification is-danger">
                      {{ session('status') }}
                  </div>
              @endif

              <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="field">
                  <label class="label">{{ __('E-Mail Address') }}</label>
                  <div class="control">
                    <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help is-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <button type="submit" class="button is-link">{{ __('Send Password Reset Link') }}</button>
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
