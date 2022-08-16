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
            <h2 class="m-0 text-dark">{{ $exam->name('en') }} Exam</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>
              <li class="breadcrumb-item active">{{ $exam->name('en') }}</li>
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
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">{{ $exam->name('en') }} information</h3>
                    </div>
                    
                    <div class="card-body p-0">
                    <table class="table table-sm">
                    <tbody>
                    <tr>
                    <th>Name (en)</th>
                    <td>{{ $exam->name('en') }}</td>
                    </tr>
                    
                    <tr>
                        <th>Name (ar)</th>
                        <td>{{ $exam->name('ar') }}</td>
                    </tr>

                    <tr>
                        <th>Skill</th>
                        <td>{{ $exam->skill->name('en') }}</td>
                    </tr>

                    <tr>
                        <th>Image</th>
                        @php
                        $exam->img = str_replace('public/' , 'storage/' , $exam->img)
                        @endphp
                        <td>
                            <img src="{{ asset($exam->img) }}" height="50px" alt="{{ $exam->name('en') }}">
                        </td>
                    </tr>

                    <tr>
                        <th>Description (en)</th>
                        <td>{{ $exam->desc('en') }}</td>
                    </tr>

                    <tr>
                        <th>Descripton (ar)</th>
                        <td>{{ $exam->desc('ar') }}</td>
                    </tr>

                    <tr>
                        <th>Questions Count</th>
                        <td>{{ $exam->questions->count() }}</td>
                    </tr>

                    <tr>
                        <th>Difficulty</th>
                        <td>{{ $exam->difficulty }}</td>
                    </tr>

                    <tr>
                        <th>Duration</th>
                        <td>{{ $exam->duration_mins }} minute</td>
                    </tr>

                    <tr>
                        <th>Activation</th>
                        <td>
                            @if ($exam->active)
                                <span class="badge bg-success">yes</span>
                            @else
                                <span class="badge bg-danger">no</span>
                            @endif
                        </td>
                    </tr>

                    </tbody>
                    </table>

                    </div>
                    </div>
                    <a href="{{ url("dashboard/exams/show-questions/$exam->id") }}" class="btn btn-sm btn-success">Exam Questions</a>
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





