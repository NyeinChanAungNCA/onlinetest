@extends('layouts.sidebar') 
@section('content')
@section('title','Dashboard')
<section class="content-header">
  <h1>Edit Product</h1>
  <ol class="breadcrumb">
    <li class="active"><a href="{{ url('/product') }}"><i class="fa fa-dashboard"></i>Products</a></li>
  </ol>
</section>
<section class="content">
  <div class="box">
    <div class="box-body">
      <div class="col-md-12">
        <form class="form-horizontal" method="POST" action="{{ url('/product/'.$product->id) }}" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}
          <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-sm-4 control-label">Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="name" value="{{ $product->name }}" autofocus id="name" placeholder="Name">
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label for="category_name" class="col-md-4 control-label">Category Name</label>
            <div class="col-md-6">
              <select class="form-control select2" name="category_id">
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
            <label for="price" class="col-sm-4 control-label">Price</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="price" value="{{ $product->price }}" autofocus id="price" placeholder="Price">
              @if ($errors->has('price'))
                  <span class="help-block">
                      <strong>{{ $errors->first('price') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
              <label for="image" class="col-md-4 control-label">Image</label>
              <div class="col-md-6">
                  <input type="file" name="image" id="image">
                  <p class="help-block">Product Image.</p>
                  @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                  @endif
              </div>
          </div>
          <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-sm-4 control-label">Description</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="description" value="{{ $product->description }}" autofocus id="description" placeholder="Description">
              @if ($errors->has('description'))
                  <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-7 pull-right">
            <a class="btn btn-white btn-danger" href="{{url('/product')}}">
                <i class="ace-icon fa fa-times"></i>Cancel
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