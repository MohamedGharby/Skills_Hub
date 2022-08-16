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
            <h2 class="m-0 text-dark">Add Exam Questions</h2>
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
                <form  action="{{ url("dashboard/exams/store-questions/{$exam_id}") }}" method="post">
                        @csrf
                    @for ($i = 1; $i <= $question_num; $i++)
                        <h5>Question {{ $i }}</h5>
                        <div class="border p-3 mb-5">
                            <div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="titles[]" class="form-control" >
                                </div>
                            </div> 
                            <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option 1</label>
                                        <input type="text" name="option_1s[]" class="form-control" >
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option 2</label>
                                        <input type="text" name="option_2s[]" class="form-control" >
                                    </div>
                                 </div>   
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Option 3</label>
                                       <input type="text" name="option_3s[]" class="form-control" >
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Option 4</label>
                                       <input type="text" name="option_4s[]" class="form-control" >
                                   </div>
                                </div>   
                           </div>
        
                           <div>
                            <div class="form-group">
                                <label>Right Answer</label>
                                <select name="right_anss[]" class="form-control form-control-sm">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                </select>
                            </div>
                           </div>
                           
                        </div>
                    @endfor
                    
                    <button type="submit"  class="btn btn-success">Submit</button>
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





