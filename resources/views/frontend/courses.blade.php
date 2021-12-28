@extends('layouts.frontend.master')

@section('title', 'Course')

@section('css')
@endsection
@section('style')
<style type="text/css">
  .courhead h3 .moretext2 p{
    display: none;
  }
  @media (min-width: 992px){
    .course-offer .row:nth-child(odd){
      flex-direction: row-reverse;
    }
  }
  .what-you-learnDiv{
    display: none;
  }
  .outcomesDiv {
    display: none;
  }
</style>
@endsection

@section('content')

@if(!empty($cms))
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-title mb-3">
          <h2>{{ $cms->page_name }}</h2>
          <span class="lead">{!! $cms->description !!}</span>
        </div>    
      </div>
      <div class="col-lg-6 mt-4 mt-lg-0">
        @if(!empty($cms->image))
          <img class="img-fluid w-100" src="{{ asset('/backend/images/course-section.jpg') }}" alt="">
        @endif
      </div>
    </div>
  </div>
</section>
@endif

@if(count($courses) > 0)
<section class="space-pb course-offer">
  <div class="container">
    <div class="row">
      <div class="col-12 justify-content-center">
        <div class="section-title center">
          <h2 class="title">Courses we offer</h2>
        </div>
      </div>
    </div>
    @php $i=1; $j=$i+1; @endphp
    @foreach($courses as $crse)
    <div class="row coursevms2">
      <div class="col-lg-6 p-4">
        <div class="view z-depth-1 text-center mx-5">
          @if($crse->image != null)
            <img src="{{ asset('/backend/images/course/'.$crse->image) }}" alt="" class="img-fluid">
          @else
          @endif
        </div>
      </div>
      <div class="col-lg-6">
        <div class="section-title mb-3 courhead">
          <h3>{{ $crse->title }}</h3>
          {!! $crse->description !!}
          <p class="lead">            
          </p>
          <div id="learndiv{{ $i }}" class="what-you-learnDiv">
            <h3 class="course-lern">What will you learn</h3>
              {!! $crse->what_you_learn !!}
          </div>
          <div id="outcomesdiv{{ $i }}" class="outcomesDiv">
            <h3 class="course-lern">outcomes</h3>
              {!! $crse->outcomes !!}
          </div>
          <button class="what-you-learn btn btn-primary my-4" id="what_you_learn{{ $i }}" target="{{ $i }}">What will you learn +</button>
          <button class="outcomes btn btn-primary my-4" id="outcomes_div{{ $i }}" target="{{ $i }}">Outcomes +</button>
        </div>
      </div>
    </div>
    @php $i++; $j++; @endphp
    @endforeach
  </div>
</section>
@endif

@endsection

@section('script-js-last')
@endsection

@section('script')
@endsection

