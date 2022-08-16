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
            <h2 class="m-0 text-dark">Edit Question</h2>
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
                <form  action="{{ url("dashboard/exams/update-questions/$exam->id/$ques->id") }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="border p-3 mb-5">
                            <div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $ques->title }}" >
                                </div>
                            </div> 
                            <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option 1</label>
                                        <input type="text" name="option_1" class="form-control" value="{{ $ques->option_1 }}" >
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option 2</label>
                                        <input type="text" name="option_2" class="form-control" value="{{ $ques->option_2 }}">
                                    </div>
                                 </div>   
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Option 3</label>
                                       <input type="text" name="option_3" class="form-control" value="{{ $ques->option_3 }}">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Option 4</label>
                                       <input type="text" name="option_4" class="form-control" value="{{ $ques->option_4 }}">
                                   </div>
                                </div>   
                           </div>
        
                           <div>
                            <div class="form-group">
                                <label>Right Answer</label>
                                <select name="right_answer" class="form-control form-control-sm" >
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                </select>
                            </div>
                           </div>
                           
                        </div>
                    
                    <button type="submit"  class="btn btn-success">Edit</button>
                </form>
            </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection





