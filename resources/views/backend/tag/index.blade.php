@extends('layouts.backend.master')

@section('title', 'Manage Tag')

@section('breadcrumb-title', 'Manage Tag')

@section('breadcrumb-item')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<li class="breadcrumb-item active">Manage Tag</li>
@endsection

@section('css')
@endsection

@section('style')
<style type="text/css">
  .trash_icon{
    cursor: pointer;
  }
</style>
@endsection

@section('content')
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Manage Tag</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Manage Tag</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="manage_staff_page">
            <div class="row drpdn_btn_add_btn">
              <div class="col-sm-6">
                {{--@if(Auth::guard()->user()->can('delete-tag'))
                <div class="dropdown_select form-group">
                  <select class="form-control">
                    <option>Delete</option>
                  </select>
                  <button type="button" onclick="MultipleDelete('/multiple-tag-delete','tagDatatable')" class="btn btn-default btn-purple">Apply</button>
                </div>
                @endif--}}
              </div>
              <div class="col-sm-6">
                <div class="add_staff_btn">
                  {{--@if(Auth::user()->can('create-tag'))
                    <a type="button" class="btn btn-default btn-purple" href="{{route('manage-tag.create')}}" id="addtag" data-toggle="modal" data-target="#addTag">
                      <i class="fas fa-plus-circle"></i> Add Tag
                    </a>
                  @endif--}}
                  @if(Auth::guard()->user()->can('delete-tag'))<button type="button" onclick="MultipleDelete('/multiple-tag-delete','tagDatatable')" class="btn btn-default btn-purple"> <i class="fas fa-trash-alt"></i>  Delete Selected</button>@endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="flash-message">
                  @if(session()->has('message.level'))
                    <div class="alert alert-{{ session('message.level') }}">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {{ session('message.content') }}
                      <?php Session::forget('message')?>
                    </div>
                  @endif
                </div>
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="tagDatatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th class="select_all">
                            <label class="container_chk ">
                              <input type="checkbox" >
                              <span class="checkmark"></span>
                            </label>
                          </th>
                          <th>No</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

  </div>
  <div class="modal fade" id="addTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content add-tags">
              <form id="addtagform" method="post" action="{{route('manage-tag.store')}}">
                <div class="modal-header">@csrf
                    <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                      <div class="alert alert-danger" style="display:none"></div>
                      <div class="alert alert-success" style="display:none"></div>

                    <div class="">
                        <div class="form-group">
                            <label class="form-label">Tag Name</label><span class="text-danger">*</span>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>  
                        <label class="form-label">Status</label><span class="text-danger">*</span>
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option value="1" @if(old('status') == 1)selected @endif >Active</option>
                            <option value="0" @if(old('status') == 0)selected @endif >InActive</option>
                        </select>                         
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-purple">Save Tag</button>
                    <button type="button" class="btn btn-purple" data-dismiss="modal">Cancel</button>

                </div>
              </form>
            </div>
        </div>
  </div>

  <div class="modal fade" id="updateTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content add-tags">
              <form id="addtagform" method="post" action="{{route('manage-tag.store')}}">
                <div class="modal-header">@csrf
                    <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                      <div class="alert alert-danger" style="display:none"></div>
                      <div class="alert alert-success" style="display:none"></div>

                    <div class="">
                      <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="form-label">Tag Name</label><span class="text-danger">*</span>
                            <input type="text" name="name" id="tag_name" class="form-control" value="{{ old('name') }}">
                        </div>  
                        <label class="form-label">Status</label><span class="text-danger">*</span>
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option value="1" @if(old('status') == 1)selected @endif >Active</option>
                            <option value="0" @if(old('status') == 0)selected @endif >InActive</option>
                        </select>                         
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-purple">Save Tag</button>
                    <button type="button" class="btn btn-purple" data-dismiss="modal">Cancel</button>

                </div>
              </form>
            </div>
        </div>
  </div>
@endsection


@section('script-js-last')
<script src="{{asset('backend/developer/developer.js')}}"></script>
@endsection

@section('script')
<script>
    var csrftoken = '{{ csrf_token() }}';
    var base_url = "{{url('/')}}";
</script>

@if(Auth::guard()->user()->can('delete-tag') || Auth::guard()->user()->can('edit-tag'))
<script>
  delete_edit_action = true;
</script>
@endif

@if(Auth::guard()->user()->can('delete-tag'))
<script>
   deletecheck = true;
</script>
@endif

@endsection
