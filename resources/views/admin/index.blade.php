@extends('layouts.sidebar') 
@section('content')
@section('title','Dashboard')
<!-- Content Header (Page header) -->
<section class="content-header">
  <a href="{{ url('/user/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Admin</a>
  <ol class="breadcrumb">
    <li class="active"><a href="{{ url('/user') }}"><i class="fa fa-dashboard"></i>Users</a></li>
  </ol>
</section>
@include('partials.success')
<!-- <div class="row">
        <div class="col-md-4 pull-right">
        <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Success alert preview. This alert is dismissable.
              </div>
            </div>
          </div> -->
<section class="content">
  <div class="box">
    <!-- <div class="box-header">
      <h3 class="box-title">Data Table With Full Features</h3>
    </div> -->
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <a href="{{ url('/user/'.$user->id.'/edit') }}" class="btn btn-xs btn-primary" class="btn btn-xs btn-primary tooltip">
                <i class="fa fa-fw fa-edit"></i>
              </a>&nbsp;&nbsp;
              <!-- <a href="#" class="btn btn-xs btn-danger" class="btn btn-xs btn-primary tooltip">
                  <i class="fa fa-fw fa-trash"></i>
              </a> -->
              <form action="{{ url('/user/'.$user->id) }}" method="post" class="inline">

                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <a data-id="{{$user->id}}" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#confirmDelete">
                  <i class="fa fa-fw fa-trash"></i>
                </a>
              </form>
              @include('partials.confirmdelete')
            </td>
            <!-- <td class="center">
                <a href="#" class="btn btn-xs bg-olive" class="btn btn-xs btn-primary tooltip" data-original-title="View" data-placement="top" data-toggle="tooltip">
                    <i class="fa fa-fw fa-eye"></i>
                </a>
                <a href="#" class="btn btn-xs btn-primary" class="btn btn-xs btn-primary tooltip" data-original-title="Edit" data-placement="top" data-toggle="tooltip">
                    <i class="fa fa-fw fa-edit"></i>
                </a>
                <a href="#" class="btn btn-xs btn-danger" onClick="return doconfirm()" class="btn btn-xs btn-primary tooltip" data-original-title="Delete" data-placement="top" data-toggle="tooltip">
                    <i class="fa fa-fw fa-trash"></i>
                </a>
            </td> -->
          </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>Name</th>
          <th>Email</th>
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