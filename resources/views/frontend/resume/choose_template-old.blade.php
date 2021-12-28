@extends('layouts.frontend.master')

@section('title', 'Choose Template')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/custom.css') }}">
@endsection
@section('style')
<style type="text/css">
    .resume-desc{
        font-size: 11px;
        letter-spacing: 0.3px;
        color: rgb(152, 161, 179);
        margin-bottom: 2px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        min-height: 52px;
    }
</style>
@endsection

@section('content')


    <!--=================================
    Advertise A Job -->
    <section class="space-pb con-light-bg">
        @csrf
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators" style="display: none;">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>   
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                @php $i = 1; @endphp
                @if(!empty($resume_templates))
                    @foreach(array_chunk(json_decode($resume_templates,TRUE),4) as $template)
                        @php $item_class = ($i == 1) ? 'item active' : 'item'; @endphp
                        <div class="carousel-{{ $item_class }}">
                            <div class="row">
                                @foreach($template as $key => $value)
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <div class="text-center resume-template-name">{{ $value['name'] }}</div>
                                            <p class="resume-desc">{{ $value['description'] }}</p>
                                            <div class="choose-template" id="choose_resume_template">
                                                <img src="{{ asset($value['image']) }}" class="resume-templates-images">
                                                @if($value['is_available'] == 1)
                                                <form action="{{ route('choose-template',[$value['id']]) }}" method="" id="choose_resume_template_form">
                                                    <button type="submit" class="btn btn-primary use-template-btn">Use this template</button>
                                                    {{--<a href="{{ route('resumes',['template' => $value['name']]) }}" class="btn btn-primary use-template-btn">Use this template</a>--}}
                                                </form>
                                                @else
                                                    <a href="{{ route('resumes',['template' => 'madrid']) }}" class="btn btn-primary use-template-btn" style="pointer-events: none; cursor: default;">Coming Soon</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @php $i++ @endphp
                    @endforeach
                @endif
                {{--<div class="carousel-item active">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="thumb-wrapper">
                                <div class="text-center resume-template-name">Demo</div>
                                <div class="choose-template">
                                    <img src="{{ asset('/frontend/images/resume_templates/demo.jpg') }}" class="resume-templates-images">
                                    <a href="{{ route('resumes',['template' => 'demo']) }}" class="btn btn-primary use-template-btn">Use this template</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="thumb-wrapper">
                                <div class="text-center resume-template-name">London</div>
                                <div class="choose-template">
                                    <img src="{{ asset('/frontend/images/resume_templates/london.jpg') }}" class="resume-templates-images">
                                    <a href="{{ route('resumes',['template' => 'london']) }}" class="btn btn-primary use-template-btn">Use this template</a>
                                </div>
                            </div>
                        </div>      
                        <div class="col-sm-3">
                            <div class="thumb-wrapper">
                                <div class="text-center resume-template-name">Tokyo</div>
                                <div class="choose-template">
                                    <img src="{{ asset('/frontend/images/resume_templates/tokyo.jpg') }}" class="resume-templates-images">
                                    <a href="{{ route('resumes',['template' => 'tokyo']) }}" class="btn btn-primary use-template-btn">Use this template</a>
                                </div>
                            </div>
                        </div>                              
                        <div class="col-sm-3">
                            <div class="thumb-wrapper">
                                <div class="text-center resume-template-name">Madrid</div>
                                <div class="choose-template">
                                    <img src="{{ asset('/frontend/images/resume_templates/madrid.jpg') }}" class="resume-templates-images">
                                    <a href="{{ route('resumes',['template' => 'madrid']) }}" class="btn btn-primary use-template-btn" style="pointer-events: none; cursor: default;">Coming Soon</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="thumb-wrapper">
                                <div class="text-center resume-template-name">Demo</div>
                                <div class="choose-template">
                                    <img src="{{ asset('/frontend/images/resume_templates/paris.jpg') }}" class="resume-templates-images">
                                    <a href="{{ route('resumes',['template' => 'demo']) }}" class="btn btn-primary use-template-btn">Use this template</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="thumb-wrapper">
                                <div class="text-center resume-template-name">London</div>
                                <div class="choose-template">
                                    <img src="{{ asset('/frontend/images/resume_templates/london.jpg') }}" class="resume-templates-images">
                                    <a href="{{ route('resumes',['template' => 'london']) }}" class="btn btn-primary use-template-btn">Use this template</a>
                                </div>
                            </div>
                        </div>      
                        <div class="col-sm-3">
                            <div class="thumb-wrapper">
                                <div class="text-center resume-template-name">Tokyo</div>
                                <div class="choose-template">
                                    <img src="{{ asset('/frontend/images/resume_templates/tokyo.jpg') }}" class="resume-templates-images">
                                    <a href="{{ route('resumes',['template' => 'tokyo']) }}" class="btn btn-primary use-template-btn">Use this template</a>
                                </div>
                            </div>
                        </div>                              
                        <div class="col-sm-3">
                            <div class="thumb-wrapper">
                                <div class="text-center resume-template-name">Madrid</div>
                                <div class="choose-template">
                                    <img src="{{ asset('/frontend/images/resume_templates/madrid.jpg') }}" class="resume-templates-images">
                                    <a href="{{ route('resumes',['template' => 'madrid']) }}" class="btn btn-primary use-template-btn" style="pointer-events: none; cursor: default;">Coming Soon</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </section>
    @include('frontend.resume.resume_popup')
    <!--=================================
    Advertise A Job -->

@endsection

@section('script-js-last')
<script type="text/javascript" src="{{ asset('/frontend/js/resumes/choose-resume-template.js') }}"></script>
<script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var csrftoken = '{{ csrf_token() }}';
    $(document).ready(function(){

    });
</script>
@endsection

@section('script')
@endsection

