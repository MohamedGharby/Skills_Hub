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
            <h1 class="m-0 text-dark">SkillsHub Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">SkillsHub Categories</li>
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
                    <h3 class="card-title">All categories</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-modal">
                            Add New
                        </button>
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
                          <th>Active</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          @foreach ($cats as $cat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cat->name('en') }}</td>
                                <td>{{ $cat->name('ar') }}</td>
                                <td>
                                    @if ($cat->active)
                                        <span class="badge bg-success">yes</span>
                                    @else
                                        <span class="badge bg-danger">no</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info edit-btn" data-id="{{ $cat->id }}" data-name-en="{{ $cat->name('en') }}" data-name-ar="{{ $cat->name('ar') }}" data-toggle="modal" data-target="#edit-modal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    
                                    <a href="{{ url("dashboard/categories/delete/$cat->id") }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a class="btn btn-sm btn-light" href="{{ url("dashboard/categories/toggle/$cat->id") }}">
                                        @if ($cat->active)
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
                {{ $cats->links() }}
            </div>
            <!-- /.card -->
              </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>


  <div class="modal fade " id="add-modal" style="padding-right: 17px; display: none;" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          @include('admin.inc.errors')
            <form method="POST" action="{{ url('dashboard/categories/store') }}" id="submit-modal">
                @csrf
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="add-modal1">Name (EN)</label>
                            <input type="text" name="name_en" class="form-control" id="add-modal1" >
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="add-modal2">Name (AR)</label>
                            <input type="text" name="name_ar" class="form-control" id="add-modal2" >
                        </div>    
                    </div>       
                </div>
                
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" form="submit-modal" class="btn btn-primary">Submit</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.add-modal -->

  <div class="modal fade " id="edit-modal" style="padding-right: 17px; display: none;" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          @include('admin.inc.errors')

            <form method="POST" action="{{ url('dashboard/categories/update') }}" id="edit-form">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit-form-id">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-form-id-name-en">Name (EN)</label>
                            <input type="text" name="name_en" class="form-control" id="edit-form-name-en" >
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-form-id-name-ar">Name (AR)</label>
                            <input type="text" name="name_ar" class="form-control" id="edit-form-name-ar" >
                        </div>    
                    </div>       
                </div>
                
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" form="edit-form" class="btn btn-info">Edit</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.edit-modal -->
  
  <!-- /.content-wrapper -->
@endsection



@section('scripts')
    <script>
        $('.edit-btn').click(function (){
            let id = $(this).attr('data-id')
            let nameEn = $(this).attr('data-name-en')
            let nameAr = $(this).attr('data-name-ar')

            $('#edit-form-id').val(id)
            $('#edit-form-name-en').val(nameEn)
            $('#edit-form-name-ar').val(nameAr)
             
        })

    </script>
@endsection





