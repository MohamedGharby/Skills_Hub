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
            <h1 class="m-0 text-dark">SkillsHub Admins</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">SkillsHub Admins</li>
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
                <div class="col-12">
                    @include('admin.inc.messages')
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">All Admins</h3>
                    <div class="card-tools">
                        <a href="{{ url("dashboard/admins/create") }}" class="btn btn-primary" >
                            Add New
                        </a>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Role</th>
                          <th>Email</th>
                          <th>Verified</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->role->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    @if ($admin->email_verified_at)
                                        <span class="badge bg-success">yes</span>
                                    @else
                                        <span class="badge bg-danger">no</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            @if ($admin->role->name == 'admin')
                                                <form action="{{ url("/dashboard/admins/promote/$admin->id") }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        <i class="fas fa-level-up-alt "></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ url("/dashboard/admins/demote/$admin->id") }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-level-down-alt "></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            <form action="{{ url("/dashboard/admins/delete/$admin->id") }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash "></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                  

                                    
                                </td>

                            </tr> 
                          @endforeach
                      </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="m-3 d-flex justify-content-center">
                {{ $admins->links() }}
            </div>
            <!-- /.card -->
              </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection