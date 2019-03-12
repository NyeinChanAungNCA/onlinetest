@extends('layouts.sidebar') 
@section('content')
@section('title','Category')
<!-- Content Header (Page header) -->
<section class="content-header">
  <a href="{{ url('/category/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Category</a>
  <ol class="breadcrumb">
    <li class="active"><a href="{{ url('/category') }}"><i class="fa fa-dashboard"></i>Categories</a></li>
  </ol>
</section>
@include('partials.success')
<section class="content">
  <div class="box">
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
            <td>
              <!-- <a href="{{ url('/category/'.$category->id.'/edit') }}" class="btn btn-xs btn-primary" class="btn btn-xs btn-primary tooltip">
                <i class="fa fa-fw fa-edit"></i>
              </a> -->

              <button class="edit-category-modal btn btn-info btn-xs" data-id="{{$category->id}}" data-name="{{$category->name}}">
                  <i class="fa fa-fw fa-edit"></i>
              </button>

              &nbsp;&nbsp;
              <form action="{{ url('/category/'.$category->id) }}" method="post" class="inline">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <a data-id="{{$category->id}}" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#confirmDelete">
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
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>
@include('modal.categoryModal')
@endsection