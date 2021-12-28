@extends('layouts.backend.master')

@section('title', 'Edit Coach Availability')

@section('breadcrumb-title', 'Edit Coach Availability')

@section('breadcrumb-item')
    <li class="breadcrumb-item active">Edit Coach Availability</li>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/plugins/datepicker/bootstrap-datepicker.min.css') }}">
@endsection

@section('style')
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
                            <h1>Edit Coach Availability</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Coach Availability</li>
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
                            <div class="col-12">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <form name="edit-availability" id="edit-availability" action="{{route('save-and-edit-coach-availability', $coach_data->id)}}" method="Post" data-parsley-validate>
                                        @csrf
                                        <div class="card-header">
                                            <p class="card-title">Coach Name: <b>{{ $coach_data->name }}</b></p>
                                        </div>
                                        <div class="row m-0 px-3 mt-2">
                                            <div class="col-sm-3">
                                                <label class="form-label">Availability Start Date</label>
                                                <div class="input-group date" data-provide="publish_date">
                                                    <input type="text" class="form-control publish_date" name="availability_start_date" id="availability_start_date" value="@if($coach_availabilities_dates != null){{old('availability_start_date',$coach_availabilities_dates->availability_start_date)}}@endif">
                                                    <div class="input-group-addon">
                                                      <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                                @if ($errors->has('availability_start_date'))
                                                    <span class="text-danger">{{ $errors->first('availability_start_date') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="form-label">Availability End Date</label>
                                                <div class="input-group date" data-provide="publish_date">
                                                    <input type="text" class="form-control publish_date" name="availability_end_date" id="availability_end_date" value="@if($coach_availabilities_dates != null){{old('availability_end_date',$coach_availabilities_dates->availability_end_date)}}@endif">
                                                    <div class="input-group-addon">
                                                      <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                                @if ($errors->has('availability_end_date'))
                                                    <span class="text-danger">{{ $errors->first('availability_end_date') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @if(count($coach_availabilities) > 0)
                                                <div class="available_days">
                                                    <label class="form-label">Add the number of available days of coach ({{ $coach_data->name }}).</label>
                                                    <input type="hidden" name="available_days_count" value="{{ count($coach_availabilities) }}" id="available_days_count">
                                                    <div class="row available_day_block new" id="available_day_block_{{ count($coach_availabilities)+1 }}">
                                                        <div class="col-md-11">
                                                            <div class="info-box">
                                                                <div class="form-group col-md-5 ml-1">
                                                                    <label class="form-label">Day</label>
                                                                    <select class="form-control day" name="day_{{ count($coach_availabilities)+1 }}">
                                                                        <option value="">Select Day</option>
                                                                        @foreach($weekdays as $weekday)
                                                                            <option value="{{ $weekday }}">{{ $weekday }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3 ml-1 start_time_div">
                                                                    <label class="form-label">Start Time</label>
                                                                    <input class="form-control start_time" type="time" name="start_time_{{ count($coach_availabilities)+1 }}">
                                                                </div>
                                                                <div class="form-group col-md-3 ml-1 end_time_div">
                                                                    <label class="form-label">End Time</label>
                                                                    <input class="form-control end_time" type="time" name="end_time_{{ count($coach_availabilities)+1 }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button type="button" class="btn btn-sm btn-success add"><i class="fa fa-plus"></i> </button>
                                                            {{--<button type="button" class="btn btn-sm btn-danger" onclick="removeBlock(1)"><i class="fa fa-minus"></i> </button>--}}
                                                        </div>
                                                    </div>
                                                    @foreach($coach_availabilities as $key => $availability)
                                                        <div class="row available_day_block" id="available_day_block_{{ $key+1 }}">
                                                            <div class="col-md-11">
                                                                <div class="info-box">
                                                                    <div class="form-group col-md-5 ml-1">
                                                                        <label class="form-label">Day</label>
                                                                        <select class="form-control day" name="day_{{ $key+1 }}">
                                                                            <option value="">Select Day</option>
                                                                            @foreach($weekdays as $weekday)
                                                                                <option value="{{ $weekday }}" @if($weekday == $availability->day) selected @endif>{{ $weekday }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-3 ml-1 start_time_div">
                                                                        <label class="form-label">Start Time</label>
                                                                        <input class="form-control start_time" type="time" name="start_time_{{ $key+1 }}" value="{{ $availability->start_time }}">
                                                                    </div>
                                                                    <div class="form-group col-md-3 ml-1 end_time_div">
                                                                        <label class="form-label">End Time</label>
                                                                        <input class="form-control end_time" type="time" name="end_time_{{ $key+1 }}" value="{{ $availability->end_time }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                {{--<button type="button" class="btn btn-sm btn-success add"><i class="fa fa-plus"></i> </button>--}}
                                                                <button type="button" class="btn btn-sm btn-danger" onclick="removeBlock(parseInt('{{ $key+1 }}'))"><i class="fa fa-minus"></i> </button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="available_days">
                                                    <label class="form-label">Add the number of available days of coach ({{ $coach_data->name }}).</label>
                                                    <input type="hidden" name="available_days_count" value="0" id="available_days_count">
                                                    <div class="row available_day_block new" id="available_day_block_1">
                                                        <div class="col-md-11">
                                                            <div class="info-box">
                                                                <div class="form-group col-md-5 ml-1">
                                                                    <label class="form-label">Day</label>
                                                                    <select class="form-control day" name="day_1">
                                                                        <option value="">Select Day</option>
                                                                        @foreach($weekdays as $weekday)
                                                                            <option value="{{ $weekday }}">{{ $weekday }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3 ml-1 start_time_div">
                                                                    <label class="form-label">Start Time</label>
                                                                    <input class="form-control start_time" type="time" name="start_time_1">
                                                                </div>
                                                                <div class="form-group col-md-3 ml-1 end_time_div">
                                                                    <label class="form-label">End Time</label>
                                                                    <input class="form-control end_time" type="time" name="end_time_1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button type="button" class="btn btn-sm btn-success add"><i class="fa fa-plus"></i> </button>
                                                            {{--<button type="button" class="btn btn-sm btn-danger" onclick="removeBlock(1)"><i class="fa fa-minus"></i> </button>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="text-right">
                                                <button type="submit" form="edit-availability" class="btn btn-purple">Save Availability</button>
                                            </div>
                                        </div>
                                    </form>

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

@section('script')
<script src="{{ asset('/backend/plugins/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script>
        var addAvailabilityblock = '{{ route('add-availability-block') }}';
        $('.add').on('click', function () {
            var index = $('.available_days').find('.available_day_block').length + 1;
            $('#available_days_count').val(index);
            $.post(addAvailabilityblock, {index: parseInt(index), _token: $('meta[name="csrf-token"]').attr('content')}, function (result) {
                $('.available_days').find('.new').after(result.html);
            });
        });
        $('.publish_date').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            // startDate: new Date(),
            autoclose: true
        });
    </script>
@endsection

@section('script-js-last')
<script src="{{asset('backend/developer/coach.js')}}"></script>
@endsection
