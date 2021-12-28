@extends('layouts.backend.master')

@section('title', 'Edit Pricing')

@section('breadcrumb-title', 'Edit Pricing')

@section('breadcrumb-item')
<li class="breadcrumb-item active">Edit Pricing</li>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/css/pricing_custom.css') }}">
@endsection

@section('style')
  <script type="text/javascript" src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
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
              <h1>Edit Pricing</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item "><a href="{{route('manage-pricing.index')}}">Manage Pricing</a></li>
                <li class="breadcrumb-item active">Edit Pricing</li>
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
          <div class="manage_faq_page ">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form name="pricing-Edit" action="{{route('manage-pricing.update',$pricing_plan->id)}}" method="Post">
                      <div class="form-group">@csrf
                        {{ method_field('PATCH') }}
                          <label class="form-label">Plan Name</label><span class="text-danger">*</span>
                          <input type="text" name="plan_name" class="form-control" value="{{old('plan_name',$pricing_plan->plan_name)}}">
                          @if ($errors->has('plan_name'))
                            <span class="text-danger">{{ $errors->first('plan_name') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                          <label class="form-label">Plan Slug</label><span class="text-danger">*</span>
                          <input type="text" name="plan_slug" class="form-control" value="{{old('plan_slug',$pricing_plan->plan_slug)}}">
                          @if ($errors->has('plan_slug'))
                            <span class="text-danger">{{ $errors->first('plan_slug') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                          <label class="form-label">Description</label><span class="text-danger">*</span>
                            <textarea id='edit' name="plan_description" class="form-control">{{old('plan_description',implode(json_decode($pricing_plan->plan_description)))}}</textarea>
                            <p class="plan-description">For new point enter text in new line</p>
                          @if($errors->has('plan_description'))
                            <span class="text-danger">{{ $errors->first('plan_description') }}</span>
                          @endif
                      </div>
                      {{-- <div class="form-group">
                          <label class="form-label">Plan Image</label><!-- <span class="text-danger">*</span> -->
                          <input type="file" name="plan_image" class="form-control" value="{{old('plan_image',$pricing_plan->plan_image)}}">
                          @if ($errors->has('plan_image'))
                            <span class="text-danger">{{ $errors->first('plan_image') }}</span>
                          @endif
                      </div> --}}
                      <div class="form-group ">
                          <label class="form-label">Status</label><span class="text-danger">*</span>
                          <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option value="1" @if(old('status',$pricing_plan->status) == 1)selected @endif >Active</option>
                            <option value="0" @if(old('status',$pricing_plan->status) == 0)selected @endif >InActive</option>
                           </select>
                           @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                          <label class="form-label">Include</label><span class="text-danger">*</span>
                          <div class="row">
                          <?php $k=1; ?>
                          @forelse ($pricing as $planKey => $plan)
                              <div class="col-md-4">
                                <label class="container">
                                  <input type="checkbox" id="{{ $planKey }}" name="plan_include[]" value="{{ $planKey }}" data-id="{{ $k }}"
                                    @if(old('plan_include'))
                                        {{ in_array($planKey, old('plan_include')) ? "checked" : "" }}
                                    @else 
                                        {{ in_array($planKey, json_decode($plan_includes['plan_include'])) ? "checked" : "" }}
                                    @endif>
                                    {{ $plan }}
                                </label>
                              </div>
                          <?php $k++ ?>
                          @empty
                              <p class="bg-danger text-white p-1">No plans</p>
                          @endforelse
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <label class="container">
                              <input type="checkbox" id="job_search_plan" name="plan_include[]" value="Job_Search_Plan" data-id="job_search_plan" {{ in_array("Job_Search_Plan", json_decode($plan_includes['plan_include'])) ? "checked" : "" }}>
                                Job Search Plan
                              </label>
                            </div>
                            <div class="col-md-4 job-search-plan" style="display: none;">
                              <input type="text" id="job_search_plan_detail" name="job_search_plan" class="form-control" value="{{ (array_key_exists('Job_Search_Plan', $plan_includes) != false) ? $plan_includes['Job_Search_Plan']['Job_Search_Plan_Detail'] : old('job_search_plan') }}" placeholder="Enter plan detail">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <label class="container">
                              <input type="checkbox" id="job_search_coaching" name="plan_include[]" value="Job_Search_Coaching" data-id="job_search_coaching" {{ in_array("Job_Search_Coaching", json_decode($plan_includes['plan_include'])) ? "checked" : "" }}>
                                  Job Search Coaching
                              </label>
                            </div>
                            <div class="col-md-4 job-search-coaching" style="display: none;">
                              <input type="number" id="job_search_coaching_session" name="job_search_coaching_session" class="form-control" value="{{ (array_key_exists('Job_Search_Coaching', $plan_includes) != false) ? $plan_includes['Job_Search_Coaching']['Job_Search_Coaching_Session'] : old('job_search_coaching_session') }}" placeholder="Enter session" onkeypress="return event.charCode >= 48" min="1">
                            </div>
                            <div class="col-md-4 job-search-coaching" style="display: none;">
                              <input type="number" id="job_search_coaching_time" name="job_search_coaching_time" class="form-control" value="{{ (array_key_exists('Job_Search_Coaching', $plan_includes) != false) ? $plan_includes['Job_Search_Coaching']['Job_Search_Coaching_Time'] : old('job_search_coaching_time') }}" placeholder="Enter time in minutes" onkeypress="return event.charCode >= 48" min="1">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <label class="container">
                              <input type="checkbox" id="job_search_training" name="plan_include[]" value="Job_Search_Training" data-id="job_search_training" {{ in_array("Job_Search_Training", json_decode($plan_includes['plan_include'])) ? "checked" : "" }}>
                                  Job Search Training
                              </label>
                            </div>
                            {{--<div class="col-md-4 job-search-training" style="display: none;">
                              <input type="number" id="job_search_training_course" name="job_search_training_course" class="form-control" value="{{ (array_key_exists('Job_Search_Training', $plan_includes) != false) ? $plan_includes['Job_Search_Training']['Job_Search_Training_Course'] : old('job_search_training_course') }}" placeholder="Enter course" onkeypress="return event.charCode >= 48" min="1">
                            </div>--}}
                            <div class="col-md-4 job-search-training" style="display: none;">
                              <input type="number" id="job_search_training_course" name="job_search_training_course" class="form-control" value="@if(!empty($plan_incl)){{ $plan_includes_course }}@else{{ old('job_search_training_course') }}@endif" placeholder="Enter course" onkeypress="return event.charCode >= 48" min="1">
                            </div>
                            <div class="col-md-4 job-search-training" style="display: none;">
                              <select class="form-control job-training" name="job_search_training_text[]" id="job_search_training_text" multiple="multiple">
                                @if(count($courses_category) > 0)
                                    @foreach($courses_category as $course)
                                      @if(!empty($plan_incl))
                                      <option value="{{$course->id}}" 
                                          @if(in_array($course->id,json_decode($plan_incl,true)))
                                            {{ "selected" }}
                                          @else
                                            {{ old('job_search_training_text') }}  
                                          @endif>{{$course->name}}
                                      </option>
                                      @else
                                      <option value="{{$course->id}}">{{$course->name}}</option>
                                      @endif
                                    @endforeach
                                @endif
                              </select>
                            </div>
                            {{--<div class="col-md-4 job-search-training" style="display: none;">
                              <input type="text" id="job_search_training_text" name="job_search_training_text" class="form-control" value="{{ (array_key_exists('Job_Search_Training', $plan_includes) != false) ? $plan_includes['Job_Search_Training']['Job_Search_Training_Text'] : old('job_search_training_text') }}" placeholder="Enter training">--}}
                            </div>
                          </div>
                          @if($errors->has('plan_include'))
                            <span class="text-danger">{{ $errors->first('plan_include') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                          <label class="form-label">Validity(In Month)</label><span class="text-danger">*</span>
                          <input type="number" name="validity" class="form-control" value="{{old('validity',$pricing_plan->validity)}}" onkeypress="return event.charCode >= 48" min="1">
                          @if ($errors->has('validity'))
                            <span class="text-danger">{{ $errors->first('validity') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                          <div class="row">
                            <div class="col-md-4">
                              <label class="form-label">Price</label><span class="text-danger">*</span>
                              <input type="number" name="price" id="price" class="form-control" onkeypress="return event.charCode >= 48" min="0" onkeyup="setDiscountedPrice()" value="{{old('price',$pricing_plan->price)}}">
                              @if($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                              @endif
                            </div>
                            <div class="col-md-4">
                              <label class="form-label">Discount</label><!-- <span class="text-danger">*</span> -->
                              <div class="input-group">
                                <input type="number" class="form-control" name="discount_value" id="discount_value" aria-label="Text input with dropdown button" onkeypress="return event.charCode >= 48" min="0" onkeyup="setDiscountedPrice()" value="{{old('discount_value',$pricing_plan->discount_value)}}">
                                <div class="input-group-append">
                                  <select name="discount_type" id="discount_type" class="form-control">
                                  <option value="1">%</option>
                                  <option value="2">&#8377;</option>
                                </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label class="form-label">Discounted Price</label><!-- <span class="text-danger">*</span> -->
                              <input type="number" readonly="true" name="discounted_price" id="discounted_price" class="form-control" value="{{old('discounted_price',$pricing_plan->discounted_price)}}">
                            </div>
                          </div>
                      </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-purple">Update Pricing</button>
                      <a href="{{route('manage-pricing.index')}}" class="btn btn-default">Cancel</a>
                    </div>
                  </form>
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
@endsection

@section('script-js-last')
@endsection

@section('script')
<script type="text/javascript">
  var job_search_plan_check = $("#job_search_plan").prop("checked");
  var job_search_coaching_check = $("#job_search_coaching").prop("checked");
  var job_search_training_check = $("#job_search_training").prop("checked");
  <?php 
  if(array_key_exists('Job_Search_Plan', $plan_includes) != false){ ?>
    var job_search_plans = '{!! str_replace("'", "\'", json_encode($plan_includes["Job_Search_Plan"])) !!}';
  <?php
  }if(array_key_exists('Job_Search_Coaching', $plan_includes) != false){ ?>
    var job_search_coaching = '{!! str_replace("'", "\'", json_encode($plan_includes["Job_Search_Coaching"])) !!}';
    console.log(job_search_coaching);
  <?php }if(array_key_exists('Job_Search_Training', $plan_includes) != false){ ?>
    var job_search_training = '{!! str_replace("'", "\'", json_encode($plan_includes["Job_Search_Training"])) !!}';
  <?php } ?>
</script>
<script type="text/javascript" src="{{asset('backend/js/pricing.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/edit-pricing.js')}}"></script>
@endsection

