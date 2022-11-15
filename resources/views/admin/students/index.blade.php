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
            <h1 class="m-0 text-dark">SkillsHub Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">SkillsHub Students</li>
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
                    <h3 class="card-title">All Students</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Verified</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    @if ($student->email_verified_at)
                                        <span class="badge bg-success">yes</span>
                                    @else
                                        <span class="badge bg-danger">no</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url("/dashboard/students/show-scores/$student->id") }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-percent"></i>
                                    </a>
                                </td>
                            </tr> 
                          @endforeach
                      </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="m-3 d-flex justify-content-center">
                {{ $students->links() }}
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