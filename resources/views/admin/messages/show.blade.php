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
            <h2 class="m-0 text-dark">Contact Messages</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('dashboard/messages') }}">All Messages</a></li>
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
                      <h3 class="card-title">Message Content</h3>
                    </div>
                      
                    <div class="card-body p-0">
                      <table class="table table-sm">
                      <tbody>
                      <tr>
                        <th>Name</th>
                        <td>{{ $message->name }}</td>
                      </tr>
                      
                      <tr>
                        <th>Email</th>
                        <td>{{ $message->email }}</td>
                      </tr>

                      <tr>
                        <th>Subject</th>
                        <td>{{ $message->subject }}</td>
                      </tr>

                      <tr>
                        <th>Body</th>
                        <td>{{ $message->body }}</td>
                      </tr>
  
                      </tbody>
                      </table>
  
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Response Message</h3>
                    </div>
                    @include('admin.inc.errors')
                    @include('admin.inc.messages')
                    <div class="card-body p-3">
                        <form id="submit-form" action="{{ url("dashboard/messages/response/$message->id") }}" method="post" enctype="multipart/form-data">
                            @csrf
                             
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label >Body</label>
                                <textarea name="body" class="form-control"></textarea>
                            </div>
                         
                        </form>
                    <button type="submit" form="submit-form" class="btn btn-primary">Send</button>
                    <a href="{{ url("dashboard/messages") }}" class="btn btn-sm btn-success">Back To All Messages </a>  

                    </div>
                </div>
                      
              </div>
  
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection







