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
            <h2 class="m-0 text-dark">{{ $exam->name('en') }} Questions</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>
              <li class="breadcrumb-item"><a href="{{ url("dashboard/exams/show/$exam->id") }}">{{ $exam->name('en') }}</a></li>
              <li class="breadcrumb-item active">{{ $exam->name('en') }} Questions</li>
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
            <div class="col-md-12 pb-3">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">All Questions</h3>
                    <div class="card-tools">
                        <a href="{{ url("dashboard/exams/create-question/$exam->id") }}" class="btn btn-primary" >
                            Add New Question
                        </a>
                    </div>
                  </div>
                  <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>title</th>
                              <th>Options</th>
                              <th>Right Answer</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($exam->questions as $ques)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ques->title }}</td>
                                    <td>                                            
                                        <p>1- {{ $ques->option_1 }}</p>
                                            
                                        <p>2- {{ $ques->option_2 }}</p>
                                            
                                        <p>3- {{ $ques->option_3 }}</p>
                                            
                                        <p>4- {{ $ques->option_4 }}</p>
                                    </td>
                                    <td>{{ $ques->right_answer }}</td>

                                    <td>
                      
                                      <a href="{{ url("dashboard/exams/edit-questions/$exam->id/$ques->id") }}" class="btn btn-sm btn-info" >
                                        <i class="fas fa-edit"></i>
                                      </a>
                                         
                                      <a href="{{ url("dashboard/exams/delete-question/$ques->id") }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                      </a>
                                      
                                    </td>
                                    
                                </tr> 
                              @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
                    <a href="{{ url("dashboard/exams") }}" class="btn btn-sm btn-success">Back To All Exams</a>
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





