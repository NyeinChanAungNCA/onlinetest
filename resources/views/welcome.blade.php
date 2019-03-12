@extends('layouts.lo_master') 
@section('body')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/') }}"><b>Online </b>Test</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required placeholder="Name">
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
          @if ($errors->has('email'))
              <span class="form-control-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection