@extends('layouts.frontend.dashboard-master')

@section('title', 'Dashboard Candidate Courses')

@section('css')
@endsection
@section('style')
<style type="text/css">
  .desc-p p{
    margin-left: 20px;
  }
  .desc-p ul li{
    margin-left: 20px;
  }
  .instrucDiv {
    display: none;
  }
  .course-lern{
    margin-left: 20px;
  }
  .instruc{
    padding: 10px;
  }
  .btnrmore {
    margin-left: 20px;
  }
</style>
@endsection

@section('content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box mb-0">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title-02 mb-4">
                @if($user_plans_active == null)
                  <h4>My Courses</h4>
                  <p>No any courses found.</p>
                @else
                @if($user_plans_active->pricing_id <= 2)
                  <h4>My Courses</h4>
                  <p>No any courses found.</p>
                @else
                  @if(count($user_courses) > 0)
                    @if($course_name != '')
                      <h4>My Courses - {{ $course_name }} 
                    @endif
                  @else
                    <h4>My Courses</h4>
                    <p>No any courses found.</p>
                  @endif
                  {{--@if(count($course_category) > 0)
                  <h4>My Courses -
                    @foreach($course_category as $key => $category)
                      @if(!empty($plan_incl))
                        @if(in_array($category->id,json_decode($plan_incl,true)))
                          @php $count = count(array_filter(json_decode($plan_incl,true))); @endphp
                            @if($count == 1)"{{ $category->name }} @elseif($count == 2)
                              @if($key == 0)"{{ $category->name }} & @endif
                              @if($key == 1){{ $category->name }} @endif
                            @elseif($count == 3)
                              @if($key == 0)"{{ $category->name }}, @endif
                              @if($key == 1){{ $category->name }} & @endif
                              @if($key == 2){{ $category->name }} @endif
                            @endif
                        @endif
                      @else
                        <h4>My Courses</h4>
                        <p>No any courses found.</p>
                      @endif
                    @endforeach
                    Courses"
                    </h4>
                  @endif--}}
                @endif
                @endif
          </div>
            </div>
          </div>
          <div class="row">
          <div class="comparisonpln">
            @if(count($user_courses) > 0)
              @php $i = 1; @endphp
              @foreach($user_courses as $course)
                <h5>{{ $i }}.&nbsp;{{ $course->course_name }} @if($course->course_category_id != null)<span>({{ $course->course_category->name }})</span>@endif</h5>
                <div class="desc-p">{!! $course->description !!}</div>
                <div id="instruc_div{{ $i }}" class="instrucDiv">
                  <h6 class="course-lern">Instructions</h6>
                    <div class="desc-p">{!! $course->instructions !!}</div>
                </div>
                <div class="text-xs-center btnrmore">
                  <button class="btn btn-primary my-4 instruc" id="instrc_div{{ $i }}" target="{{ $i }}">Instructions +</button>
                </div>
                @php $i++; @endphp
              @endforeach
            @endif
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script-js-last')
@endsection

@section('script')
@endsection

