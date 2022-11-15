@extends('admin.layout')

@section('title')
    Dashboard|SkillsHub
@endsection

@section('main')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Create New Admin</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('dashboard/admins') }}">Admins</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1 pb-3">
                @include('admin.inc.errors')
                @include('admin.inc.messages')
                <form id="submit-form" action="{{ url("dashboard/admins/store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="email" name="email" class="form-control" >
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" >
                            </div>    
                        </div>       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="custom-select form-control"  name="role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>   
                </form>
                <button type="submit" form="submit-form" class="btn btn-success">Submit</button>
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary" >Back</a>
            </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection





