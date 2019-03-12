@extends('layouts.sidebar') 
@section('content')
@section('title','Product')
<!-- Content Header (Page header) -->
<section class="content-header">
  <a href="{{ url('/product/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Product</a>
  <ol class="breadcrumb">
    <li class="active"><a href="{{ url('/product') }}"><i class="fa fa-dashboard"></i>Products</a></li>
  </ol>
</section>
@include('partials.success')
<section class="content">
  <div class="box">
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Category</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
          <tr>
            <td>
              <img src="<?php echo asset("images/$product->image")?>" style = "width: 25px;height: 25px;" ></img>
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
              <a href="{{ url('/product/'.$product->id.'/edit') }}" class="btn btn-xs btn-primary" class="btn btn-xs btn-primary tooltip">
                <i class="fa fa-fw fa-edit"></i>
              </a>&nbsp;&nbsp;
              <form action="{{ url('/product/'.$product->id) }}" method="post" class="inline">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <a data-id="{{$product->id}}" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#confirmDelete">
                  <i class="fa fa-fw fa-trash"></i>
                </a>
              </form>
              @include('partials.confirmdelete')
            </td>
          </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>Name</th>
          <th>Category</th>
          <th>Price</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>
@endsection