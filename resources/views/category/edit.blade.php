@extends('layouts.sidebar') 
@section('content')
@section('title','Dashboard')
<section class="content-header">
  <h1>Edit Category</h1>
  <ol class="breadcrumb">
    <li class="active"><a href="{{ url('/category') }}"><i class="fa fa-dashboard"></i>Categories</a></li>
  </ol>
</section>
<section class="content">
  <div class="box">
    <div class="box-body">
      <div class="col-md-12">
        <form class="form-horizontal" method="POST" action="{{ url('/category/'.$category->id) }}">
          @csrf
          {{ method_field('PUT') }}
          <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-sm-4 control-label">Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="name" value="{{ $category->name }}" autofocus id="name" placeholder="Name">
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-7 pull-right">
            <a class="btn btn-white btn-danger" href="{{url('/category')}}">
                <i class="fa fa-times"></i> Cancel
              </a>
            </div>
            <div class="col-sm-1 pull-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection