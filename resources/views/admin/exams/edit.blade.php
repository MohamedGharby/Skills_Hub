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
            <h2 class="m-0 text-dark">Edit Exam</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>
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
            <form id="submit-form" action="{{ url("dashboard/exams/update/$exam->id") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name (EN)</label>
                            <input type="text" name="name_en" class="form-control" value="{{ $exam->name('en') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Name (AR)</label>
                            <input type="text" name="name_ar" class="form-control" value="{{ $exam->name('ar') }}">
                        </div>    
                    </div>       
                </div>

                <div class="form-group">
                    <label>Description (EN)</label>
                    <textarea name="desc_en" class="form-control" rows="3" placeholder="Enter ...">{{ $exam->desc('en') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Description (AR)</label>
                    <textarea name="desc_ar" class="form-control" rows="3" placeholder="Enter ...">{{ $exam->desc('ar') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Skill</label>
                            <select class="custom-select form-control"  name="skill_id">
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->id }}" @if ($exam->skill_id == $skill->id) selected @endif>{{ $skill->name() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Exam Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img" >
                                    <label class="custom-file-label">Choose image</label>
                                </div>
                                    @php
                                        $exam->img = str_replace('public/' , 'storage/' , $exam->img)
                                    @endphp
                                <img src="{{ asset($exam->img) }}" height="70px" alt="{{ $exam->name('en') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Difficulty</label>
                            <select name="difficulty" class="form-control form-control-sm" selected value="{{ $exam->difficulty }}">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Duration By Minutes</label>
                            <input type="text" name="duration_mins" class="form-control form-control-sm" value="{{ $exam->duration_mins }}">
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





