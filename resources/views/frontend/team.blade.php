@extends('layouts.frontend.master')

@section('title', 'Team')

@section('css')
@endsection
@section('style')
@endsection

@section('content')

<section class="space-ptb team-mtb">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-6">
        <h2 class="mb-4">Lorem Ipsum is simply dummy text of the printing</h2>
      </div>
      <div class="col-lg-10">
        <div class="text-center">
          <p class="mb-lg-5 mb-4 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="space-ptb team-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
        @if(!empty($coaches))
          @foreach($coaches as $coach)  
            <div class="col-md-6 mb-3">
            <div class="inner1">
              <div id="btn-{{ $coach->id }}" class="manuul" style="display: none;">
                <div class="close-modal" id="">
                  <p>{{ $coach->profile }}</p>
                </div>
              </div>
              <div class="toglebtn1 show-modal open-modal show-profile" id="{{ $coach->id }}" style="display: inline;">
                <div id="fancy{{ $coach->id }}" style="">
                  @if($coach->display_image != null)
                    <img src="{{ asset('/frontend/images/avatar/'.$coach->display_image) }}" class="img-responsive">
                  @else
                    <img src="{{ asset('/frontend/images/No-image-available.png') }}" class="img-responsive">
                  @endif
                  <h5>{{ $coach->name }}</h5>
                </div>
                <div class="candidate-list-option" id="about-me{{ $coach->id }}">
                  <ul class="list-unstyled">
                    <li>{{ $coach->about_me }}</li>
                  </ul>
                </div>
                @if($coach->linkedin_link != null)
                <div class="team-folw" id="social{{ $coach->id }}">
                  <a href="{{ $coach->linkedin_link }}" target="_blank"><i class="fab fa-linkedin pr-1 lin-clr"></i>Follow</a>
                </div>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        @endif          
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script-js-last')
<script src="{{ asset('/frontend/js/team.js') }}"></script>
@endsection

@section('script')
@endsection

