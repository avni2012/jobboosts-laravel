@extends('layouts.backend.master')

@section('title', 'Create Coupon')

@section('breadcrumb-title', 'Create Coupon')

@section('breadcrumb-item')
<li class="breadcrumb-item active">Create Coupon</li>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/plugins/datepicker/bootstrap-datepicker.min.css') }}">
@endsection

@section('style')
<style type="text/css">
  .input-capital{
    text-transform: uppercase;
  }
  /*.datepicker{
    top: 130.7812px !important;
  }*/
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
              <h1>Create Coupon</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item "><a href="{{route('manage-coupon.index')}}">Manage Coupon</a></li>
                <li class="breadcrumb-item active">Create Coupon</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      @if(session()->has('message.level'))
          <div class="alert alert-{{ session('message.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('message.content') }}
            <?php Session::forget('message')?>
          </div>
      @endif
      <!-- Main content -->
      <section class="content ">
        <div class="container-fluid">
          <div class="manage_Cms_page ">
            <div class="row">
              <div class="col-8">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form name="Coupon-create" id="Coupon-create" action="{{route('manage-coupon.store')}}" method="Post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <label class="form-label">Type</label><span class="text-danger">*</span>
                            <select class="form-control" name="type" id="type">
                              <option value="">Select Coupon Type</option>
                              <option value="Subscription" {{ old('type') == 'Subscription' ? "selected" : "" }}>Subscription</option>
                            </select>
                            @if ($errors->has('type'))
                              <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                          </div>
                          <div class="col-sm-6">
                            <label class="form-label">Coupon Code</label><span class="text-danger">*</span>
                            <input type="text" name="coupon_code" class="form-control input-capital" value="{{old('coupon_code')}}">
                            @if ($errors->has('coupon_code'))
                              <span class="text-danger">{{ $errors->first('coupon_code') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="form-group ">
                        <div class="row">
                          <div class="col-sm-6">
                            <label class="form-label">Discount Type</label><span class="text-danger">*</span>
                            <div class="radio_payment_option">
                                <div class="radio_payment_option_inner">
                                    <div class="radio_payment_radio">
                                        <label class="fancy-radio free_label">
                                            <input name="discount_type" id="fixed" value="1" type="radio" {{(old('discount_type') == '1') ? 'checked' : ''}}>
                                            <span><i></i>Fixed</span>
                                        </label>
                                    </div>
                                    <div class="radio_payment_radio">
                                        <label class="fancy-radio one_time_label">
                                            <input name="discount_type" id="percentage" value="2" type="radio" {{(old('discount_type') == '2') ? 'checked' : ''}}>
                                            <span><i></i>Percentage</span>
                                        </label>
                                    </div>
                                </div>
                              </div>
                              @if ($errors->has('discount_type'))
                                <span class="text-danger">{{ $errors->first('discount_type') }}</span>
                              @endif
                          </div>
                          <div class="col-sm-6">
                            <label class="form-label">Discount Value</label><span class="text-danger">*</span>
                            <input type="text" name="discount_value" class="form-control" value="{{old('discount_value')}}" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            @if ($errors->has('discount_value'))
                              <span class="text-danger">{{ $errors->first('discount_value') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <label class="form-label">Start Date</label><span class="text-danger">*</span>
                            <div class="input-group date" data-provide="start_date">
                              <input type="text" class="form-control start_date" name="start_date" id="start_date" value="{{old('start_date')}}">
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                            </div>
                            @if ($errors->has('start_date'))
                              <span class="text-danger">{{ $errors->first('start_date') }}</span>
                            @endif
                          </div>
                          <div class="col-sm-6">
                            <label class="form-label">End Date</label><span class="text-danger">*</span>
                            <div class="input-group date" data-provide="end_date">
                              <input type="text" class="form-control end_date" name="end_date" id="end_date" value="{{old('end_date')}}">
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                            </div>
                            @if ($errors->has('end_date'))
                              <span class="text-danger">{{ $errors->first('end_date') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <label class="form-label">One time use per user</label><span class="text-danger">*</span>
                              <div class="radio_payment_option">
                                <div class="radio_payment_option_inner">
                                    <div class="radio_payment_radio">
                                        <label class="fancy-radio free_label">
                                            <input name="one_time_use" id="yes" value="1" type="radio" {{(old('one_time_use') == '1') ? 'checked' : ''}}>
                                            <span><i></i>Yes</span>
                                        </label>
                                    </div>
                                    <div class="radio_payment_radio">
                                        <label class="fancy-radio one_time_label">
                                            <input name="one_time_use" id="no" value="0" type="radio" {{(old('one_time_use') == '0') ? 'checked' : ''}}>
                                            <span><i></i>No</span>
                                        </label>
                                    </div>
                                </div>
                                @if ($errors->has('one_time_use'))
                                  <span class="text-danger">{{ $errors->first('one_time_use') }}</span>
                                @endif
                              </div>
                          </div>
                          {{--<div class="col-sm-6">
                            <label class="form-label">Currency</label><span class="text-danger">*</span>
                            <select class="form-control" name="currency" id="currency">
                                  <option value="0" @if(old('currency') == 0)selected @endif >USD</option>
                                  <option value="1" @if(old('currency') == 1)selected @else {{ "selected" }} @endif >INR</option>
                            </select>
                            @if($errors->has('currency'))
                              <span class="text-danger">{{ $errors->first('currency') }}</span>
                            @endif
                          </div>--}}
                        </div>
                      </div>
                  </form>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-sm-4">
                 <div class="card">
                  <div class="card-header">
                    <h6>Save</h6>
                  </div>
                  <div class="card-body">
                   <div class="text-center">
                    <button type="submit" form="Coupon-create" class="btn btn-purple">Save Coupon</button>
                    <a href="{{route('manage-coupon.index')}}" class="btn btn-default">Cancel</a>
                  </div>
                  </div>
                </div>
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
@endsection

@section('script-js-last')
<script src="{{ asset('/backend/plugins/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{asset('backend/developer/developer.js')}}"></script>
<script src="{{asset('backend/js/coupon.js')}}"></script>
@endsection

@section('script')
@endsection

