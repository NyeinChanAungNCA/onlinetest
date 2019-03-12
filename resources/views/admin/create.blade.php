@extends('layouts.sidebar') 
@section('content')
@section('title','Dashboard')
<section class="content-header">
  <h1>Create New Admin</h1>
  <ol class="breadcrumb">
    <li class="active"><a href="{{ url('/user') }}"><i class="fa fa-dashboard"></i>Users</a></li>
  </ol>
</section>
<section class="content">
  <div class="box">
    <div class="box-body">
      <div class="col-md-12">
        <form class="form-horizontal" method="POST" action="{{ url('/user') }}">
          @csrf
          <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-sm-4 control-label">Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus id="name" placeholder="Name">
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-sm-4 control-label">Email Address</label>
            <div class="col-sm-6">
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Email">
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-sm-4 control-label">Password</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label for="cpassword" class="col-sm-4 control-label">Confirm Password</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" id="cpassword" placeholder="Confirm password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-7 pull-right">
            <a class="btn btn-white btn-danger" href="{{url('/user')}}">
                <i class="ace-icon fa fa-times"></i> Cancel
              </a>
            </div>
            <div class="col-sm-1 pull-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
            </div>
          </div>
          <!-- <div class="box-footer">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
            <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-times"></i> Cancel</button>
          </div> -->
        </form>
      </div>
    </div>
  </div>
</section>
@endsection