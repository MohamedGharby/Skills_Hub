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
            <h1 class="m-0 text-dark">SkillsHub Exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">SkillsHub Exams</li>
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
                    <h3 class="card-title">All exams</h3>
                    <div class="card-tools">
                        <a href="{{ url("dashboard/exams/create") }}" class="btn btn-primary" >
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
                          <th>Name (EN)</th>
                          <th>Name (AR)</th>
                          <th>Image</th>
                          <th>Skill</th>
                          <th>Questions info</th>
                          <th>Active</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($exams as $exam)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $exam->name('en') }}</td>
                                <td>{{ $exam->name('ar') }}</td>
                                    @php
                                        $exam->img = str_replace('public/' , 'storage/' , $exam->img)
                                    @endphp
                                <td>
                                    <img src="{{ asset($exam->img) }}" height="50px" alt="{{ $exam->name('en') }}">
                                </td>
                                <td>{{ $exam->skill->name('en') }}</td>
                                <td>
                                  <div class="row">
                                    <div class="col-md-6">{{ $exam->questions->count() }}</div>
                                    <div class="col-md-6">
                                      <a href="{{ url("dashboard/exams/show-questions/$exam->id") }}" class="btn btn-sm btn-warning" >
                                        <i class="fas fa-question"></i>
                                      </a>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                    @if ($exam->active)
                                        <span class="badge bg-success">yes</span>
                                    @else
                                        <span class="badge bg-danger">no</span>
                                    @endif
                                </td>
                                
                                <td>
                                    <a href="{{ url("dashboard/exams/show/$exam->id") }}" class="btn btn-sm btn-primary" >
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    
                                    <a href="{{ url("dashboard/exams/edit/$exam->id") }}" class="btn btn-sm btn-info" >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <a href="{{ url("dashboard/exams/delete/$exam->id") }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a class="btn btn-sm btn-light" href="{{ url("dashboard/exams/toggle/$exam->id") }}">
                                        @if ($exam->active)
                                            <i class="fas fa-toggle-on"></i>
                                        @else
                                            <i class="fas fa-toggle-off"></i>
                                        @endif
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
                {{ $exams->links() }}
            </div>
            <!-- /.card -->
              </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>


  
  <!-- /.content-wrapper -->
@endsection






