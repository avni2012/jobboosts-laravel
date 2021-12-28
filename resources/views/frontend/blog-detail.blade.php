@extends('layouts.frontend.master')

@section('title', 'Blog Details')

@section('css')
@endsection
@section('style')
@endsection

@section('content')

<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="blog-detail">
          @if(!empty($blog_detail))
          <div class="blog-post">
            <div class="blog-post-title">
              <h4>{{ $blog_detail->title }}</h4>
            </div>
            <div class="blog-post-footer border-0 justify-content-start">
              <div class="blog-post-time">
                <a href="javascript:void();"> <i class="far fa-clock"></i>{{ date('d F Y',strtotime($blog_detail->publish_date)) }}</a>
              </div>
              @if($blog_detail->author != null)
              <div class="blog-post-author">
                <span> By <a href="javascript:void();"> 
                  @if($blog_detail->coaches->display_image != null)
                    <img src="{{ asset('/frontend/images/avatar/'.$blog_detail->coaches->display_image) }}" alt="">
                    @endif
                    {{ $blog_detail->coaches->name }}</a> </span>
              </div>
              @endif
            </div>
            <div class="blog-post-image">
                @if($blog_detail->youtube_video_link != null)
                  <iframe width="420" height="345" src="{{ $blog_detail->youtube_video_link }}">
                  </iframe>
                @else
                  @if($blog_detail->blog_image != null)
                  <img class="img-fluid" src="{{ asset('/backend/images/'.$blog_detail->blog_image) }}" alt="">
                  @else
                  @endif
                @endif
            </div>
            <div class="blog-post-content mt-4">
              <div class="blog-post-description">
                <p class="mb-0">{!! $blog_detail->content !!}</p>
              </div>
              <div class="blog-post-tags mb-4 align-items-center d-flex">
                <span>Popular-Tags:</span>
                <ul class="list-inline mb-0 mt-2 mt-sm-0 ml-sm-3">
                  @if(!empty($get_tags))
                    @foreach($get_tags as $tag)
                      <li class="list-inline-item"><a href="javascript:void();">{{ $tag->name }}</a></li>
                    @endforeach
                  @endif
                </ul>
              </div>
              @if(!empty($previous_blog_detail) || !empty($next_blog_detail))
              <nav class="navigation post-navigation">
                <div class="nav-links">
                  @if(!empty($previous_blog_detail))
                  <div class="nav-previous">
                    <a href="{{ route('blog-detail',[$previous_blog_detail->slug]) }}"><span class="pagi-text"> PREV</span><span class="nav-title"> {{ $previous_blog_detail->title }}</span></a>
                  </div>
                  @endif
                  @if(!empty($next_blog_detail))
                  <div class="nav-next">
                    <a href="{{ route('blog-detail',[$next_blog_detail->slug]) }}"><span class="nav-title"> {{ $next_blog_detail->title }}</span> <span class="pagi-text">NEXT</span></a> </div>
                  </div>
                  @endif
                </nav>
                @endif
                @if($blog_detail->author != null)
                <div class="mt-4">
                  <h5 class="mb-3">About Author</h5>
                  <div class="border p-4">
                    <div class="d-sm-flex">
                      <div class="avatar avatar-xlll mb-3 mb-sm-0">
                        @if($blog_detail->coaches->display_image != null)
                          <img class="img-fluid rounded-circle" src="{{ asset('/frontend/images/avatar/'.$blog_detail->coaches->display_image) }}" alt="">
                        @endif
                      </div>
                      <div class="pl-sm-4">
                        <h6 class="mb-3"> <span class="text-primary"> Posted by:</span> 
                          {{ $blog_detail->coaches->name }}
                        </h6>
                        <p>{{ $blog_detail->coaches->about_me }}</p>
                        @if($blog_detail->coaches->facebook_link != null || $blog_detail->coaches->twitter_link != null || $blog_detail->coaches->instagram_link != null || $blog_detail->coaches->linkedin_link != null)
                        <div class="social-icon d-flex">
                          <span>Follow us:</span>
                          <ul class="list-unstyled mb-0 ml-3 list-inline">
                            @if($blog_detail->coaches->facebook_link != null)
                            <li class="list-inline-item"> <a href="{{ $blog_detail->coaches->facebook_link }}"> <i class="fab fa-facebook-f"></i> </a> </li>
                            @endif
                            @if($blog_detail->coaches->twitter_link != null)
                            <li class="list-inline-item"> <a href="{{ $blog_detail->coaches->twitter_link }}"> <i class="fab fa-twitter"></i> </a> </li>
                            @endif
                            @if($blog_detail->coaches->instagram_link != null)
                            <li class="list-inline-item"> <a href="{{ $blog_detail->coaches->instagram_link }}"> <i class="fab fa-instagram"></i> </a> </li>
                            @endif
                            @if($blog_detail->coaches->linkedin_link != null)
                            <li class="list-inline-item"> <a href="{{ $blog_detail->coaches->linkedin_link }}"> <i class="fab fa-linkedin"></i> </a> </li>
                            @endif
                          </ul>
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                @else
                @endif
              </div>
            </div>
          </div>
          @endif
        </div>
        <div class="col-lg-4 mt-5 mt-lg-0">
          <div class="blog-sidebar">
            <div class="widget">
              <div class="widget-title">
                <h5>Search</h5>
              </div>
              <div class="search">
                <form method="POST" action="{{ route('blog') }}">
                @csrf
                <button type="submit" id="searchBlog"><i class="fas fa-search"></i></button>
                <input type="text" id="search_blog" name="search_blog" class="form-control" placeholder="Search..." autocomplete="off"></form>
              </div>
            </div>
            <div class="widget">
              <div class="widget-title">
                <h5>About The Blog</h5>
              </div>
              <p>Trying to go through life without clarity is similar to sailing a rudder-less ship – no good thing can or will happen!</p>
              <ol class="pl-3">
                <li class="mb-2">Success is something of which we all want.</li>
                <li class="mb-2">Most people believe that success is difficult.</li>
                <li class="mb-2">They’re wrong – it’s not!</li>
              </ol>
            </div>
            <div class="widget">
              <div class="widget-title">
                <h5>Recent Posts</h5>
              </div>
              @foreach($recent_posts as $recent)
              <div class="d-flex mb-3 align-items-start">
                <div class="avatar avatar-xl">
                  @if($recent->youtube_video_link != null)
                    <iframe width="42" height="52" src="{{ $recent->youtube_video_link }}">
                    </iframe>
                  @else
                    @if($recent->blog_image != null)
                    <img class="img-fluid" src="{{ asset('/backend/images/'.$recent->blog_image) }}" alt="">
                    @else
                    @endif
                  @endif
                </div>
                <div class="ml-3 recent-posts">
                  <a href="{{ route('blog-detail',[$recent->slug]) }}"><b>{{ $recent->title }}</b></a>
                  <a class="d-block font-sm mt-1 text-light" href="{{ route('blog-detail',[$recent->slug]) }}">{{ date('d F Y',strtotime($recent->publish_date)) }}</a>
                </div>
              </div>
            @endforeach
            </div>
            <div class="widget">
              <div class="widget-title">
                <h5>Categories</h5>
              </div>
              <ul class="list-unstyled list-style mb-0">
                @if(!empty($blog_categories))
                  @foreach($blog_categories as $category)
                  @if($category->blogs_count > 0)
                    <li><a href="{{ route('blog',['category' => $category->id]) }}">{{ $category->name }}<span class="ml-auto">({{ $category->blogs_count }})</span></a></li>
                  @endif
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="widget">
              <div class="widget-title">
                <h5>Popular Tags</h5>
              </div>
              <div class="popular-tag">
                <ul class="list-unstyled mb-0">
                  @foreach($tags as $tag)
                    <li><a class="@if(request()->get('tag') == $tag->id) {{ "active" }} @endif" href="{{ route('blog',['tag' => $tag->id]) }}">{{ $tag->name }}</a></li>
                  @endforeach
                </ul>
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

