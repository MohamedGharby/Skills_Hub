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
            <h1 class="m-0 text-dark">SkillsHub Messages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">SkillsHub Messages</li>
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
                    <h3 class="card-title">All Messages</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          @foreach ($messages as $message)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject ?? "<< no subject ... >>" }}</td>
                                <td>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <a href="{{ url("/dashboard/messages/show/$message->id") }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                      </a>
                                    </div>
                                    <div class="col-md-9">
                                      <form action="{{ url("/dashboard/messages/delete/$message->id") }}" method="post">
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
                {{ $messages->links() }}
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