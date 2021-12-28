@extends('layouts.frontend.master')

@section('title', 'Blog')

@section('css')
@endsection
@section('style')
<style type="text/css">
  @if(request()->get('tag'))
    .blog-sidebar .widget .popular-tag ul li a:hover,
    .blog-sidebar .widget .popular-tag ul li a.active {
      color: #07689f;
      border-color: #07689f;
    }
  @endif
  @if(request()->get('category'))
    .blog-sidebar .widget ul.list-style li a.active {
      background: #0070cd;
      color: #fff;
      padding: 5px;
    }
  @endif
</style>
@endsection

@section('content')

<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        @if(!empty($blogs))
          @forelse($blogs as $blog)
            <div class="blog-post text-center">
            <div class="blog-post-image">
              @if($blog->youtube_video_link != null)
                <iframe width="420" height="345" src="{{ $blog->youtube_video_link }}">
                </iframe>
              @else
                @if($blog->blog_image != null)
                <img class="img-fluid" src="{{ asset('/backend/images/'.$blog->blog_image) }}" alt="">
                @else
                @endif
              @endif
            </div>
            <div class="blog-post-content">
              <div class="blog-post-details">
                <div class="blog-post-title">
                  <h4><a href="{{ route('blog-detail',[$blog->slug]) }}">{{ $blog->title }}</a></h4>
                </div>
                <div class="blog-post-description">
                  @php $stringCut = substr(strip_tags($blog->content), 0, 280);
                       $endPoint = strrpos($stringCut, ' ');
                       $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                       $string .= '...';
                  @endphp
                  {{ $string }}
                  {{--<p class="mb-0">{!! $blog->content !!}</p>--}}
                </div>
                <div class="blog-post-link justify-content-center d-flex">
                  <a class="btn btn-link p-0" href="{{ route('blog-detail',[$blog->slug]) }}">Continue read</a>
                </div>
              </div>
              <div class="blog-post-footer">
                <div class="blog-post-time">
                  <a href="{{ route('blog-detail',[$blog->slug]) }}"><i class="far fa-clock"></i>{{ date('d F Y',strtotime($blog->publish_date)) }}</a>
                </div>
                @if($blog->author != null)
                <div class="blog-post-author">
                  <span>By<a href="{{ route('blog-detail',[$blog->slug]) }}">
                    @if($blog->coaches->display_image != null)
                    <img src="{{ asset('/frontend/images/avatar/'.$blog->coaches->display_image) }}" alt="">
                    @endif
                    {{ $blog->coaches->name }}</a></span>
                </div>
                @endif
                <div class="blog-post-share">
                  <div class="share-box">
                    <a href="#"> <i class="fas fa-share-alt"></i><span class="pl-2">Share</span></a>
                    <ul class="list-unstyled share-box-social">
                      <li> <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a> </li>
                      <li> <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a> </li>
                      <li> <a href="https://in.linkedin.com/"><i class="fab fa-linkedin"></i></a> </li>
                      <li> <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a> </li>
                      <li> <a href="https://www.pinterest.ie/"><i class="fab fa-pinterest"></i></a> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @empty
          <p>No blogs found.</p>
          @endforelse
        @endif
        <div class="row justify-content-center">
          <div class="col-12 text-center">
            @if(!empty($data))
              {{ $blogs->appends($data)->links() }}
            @else
              {{ $blogs->links() }}
            @endif
            {{--<ul class="pagination mt-4 mb-lg-0">
              <li class="page-item disabled mr-auto">
                <span class="page-link b-radius-none">Prev</span>
              </li>
              <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item ml-auto">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>--}}
          </div>
        </div>
      </div>
      <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="blog-sidebar">
          <div class="widget">
            <div class="widget-title">
              <h5>Search</h5>
            </div>
            <div class="search">
              <form method="POST" action="{{ route('blog') }}">
                @csrf
              <button type="submit" id="searchBlog"><i class="fas fa-search"></i></button>
              {{--<button class="btn btn-primary btn-md" type="submit" id="searchBlog">Search</button>--}}
              <input type="text" id="search_blog" name="search_blog" class="form-control" placeholder="Search..." autocomplete="off"></form>
            </div>
          </div>
          <div class="widget">
            <div class="widget-title">
              <h5>About The Blog</h5>
            </div>
            <p>Trying to go through life without clarity is similar to sailing a rudder-less ship!</p>
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
            {{--<div class="d-flex mb-3 align-items-start">
              <div class="avatar avatar-xl">
                <img class="img-fluid" src="{{ asset('/frontend/images/blog/06.jpg') }}" alt="">
              </div>
              <div class="ml-3 recent-posts">
                <a href="#"><b>Expanding Access to Tech Talent</b></a>
                <a class="d-block font-sm mt-1 text-light" href="#">25 Feb 2020</a>
              </div>
            </div>
            <div class="d-flex mb-3 align-items-start">
              <div class="avatar avatar-xl">
                <img class="img-fluid" src="{{ asset('/frontend/images/blog/07.jpg') }}" alt="">
              </div>
              <div class="ml-3 recent-posts">
                <a href="#"><b>How to become an Account Manager</b></a>
                <a class="d-block font-sm mt-1 text-light" href="#">20 March 2020</a>
              </div>
            </div>
            <div class="d-flex mb-3 align-items-start">
              <div class="avatar avatar-xl">
                <img class="img-fluid" src="{{ asset('/frontend/images/blog/08.jpg') }}" alt="">
              </div>
              <div class="ml-3 recent-posts">
                <a href="#"><b>Job interview tips for older workers</b></a>
                <a class="d-block font-sm mt-1 text-light" href="#">15 Jan 2020</a>
              </div>
            </div>--}}
          </div>
          <div class="widget">
            <div class="widget-title">
              <h5>Categories</h5>
            </div>
            <ul class="list-unstyled list-style mb-0">
              @if(!empty($blog_categories))
                @foreach($blog_categories as $category)
                @if($category->blogs_count > 0)
                  <li><a class="@if(request()->get('category') == $category->id) {{ "active" }} @endif" href="{{ route('blog',['category' => $category->id]) }}">{{ $category->name }}<span class="ml-auto">({{ $category->blogs_count }})</span></a></li>
                @endif
                @endforeach
              @endif
            </ul>
          </div>
          {{--<div class="widget">
            <div class="section-title mb-0">
              <h5>Testimonials</h5>
            </div>
            <div class="owl-carousel owl-nav-top-right owl-loaded owl-drag" data-nav-arrow="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="5">
              
              
              
            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-710px, 0px, 0px); transition: all 1.5s ease 0s; width: 2485px;"><div class="owl-item cloned" style="width: 350px; margin-right: 5px;"><div class="item">
                <div class="testimonial-item-02-small text-center">
                  <i class="fas fa-quote-left quotes"></i>
                  <div class="testimonial-content">
                    <p>Their turnaround time for fixing any issue is just a few minutes, and that is appreciable. Their Business Development Team is always there to help at any point in time. Thank you so much for all your effort.</p>
                  </div>
                  <div class="testimonial-author">
                    <div class="testimonial-avatar avatar avatar-lg">
                      <img class="img-fluid rounded-circle" src="{{ asset('/frontend/images/avatar/04.jpg') }}" alt="">
                    </div>
                    <div class="testimonial-name d-flex justify-content-center">
                      <h6 class="text-primary mr-2">Felica Queen</h6>
                      <span>UI Designer</span>
                    </div>
                  </div>
                </div>
              </div></div><div class="owl-item cloned" style="width: 350px; margin-right: 5px;"><div class="item">
                <div class="testimonial-item-02-small text-center">
                  <i class="fas fa-quote-left quotes"></i>
                  <div class="testimonial-content">
                    <p>Portal is very user-friendly in terms of searching for resumes and job postings. Also, they have an excellent database to search for resumes. As far as services are involved, it's terrific! </p>
                  </div>
                  <div class="testimonial-author">
                    <div class="testimonial-avatar avatar avatar-lg">
                      <img class="img-fluid rounded-circle" src="{{ asset('/frontend/images/avatar/01.jpg') }}" alt="">
                    </div>
                    <div class="testimonial-name d-flex justify-content-center">
                      <h6 class="text-primary mr-2">Anne Smith</h6>
                      <span>Art Director</span>
                    </div>
                  </div>
                </div>
              </div></div><div class="owl-item active" style="width: 350px; margin-right: 5px;"><div class="item">
                <div class="testimonial-item-02-small text-center">
                  <i class="fas fa-quote-left quotes"></i>
                  <div class="testimonial-content">
                    <p>Jobber is an excellent job portal. We value the resumes received through this channel. Magic Search and Power search are handy tools. We are delighted with their service. </p>
                  </div>
                  <div class="testimonial-author">
                    <div class="testimonial-avatar avatar avatar-lg">
                      <img class="img-fluid rounded-circle" src="{{ asset('/frontend/images/avatar/02.jpg') }}" alt="">
                    </div>
                    <div class="testimonial-name d-flex justify-content-center">
                      <h6 class="text-primary mr-2">John Doe</h6>
                      <span>Product Designer</span>
                    </div>
                  </div>
                </div>
              </div></div><div class="owl-item" style="width: 350px; margin-right: 5px;"><div class="item">
                <div class="testimonial-item-02-small text-center">
                  <i class="fas fa-quote-left quotes"></i>
                  <div class="testimonial-content">
                    <p>Their turnaround time for fixing any issue is just a few minutes, and that is appreciable. Their Business Development Team is always there to help at any point in time. Thank you so much for all your effort.</p>
                  </div>
                  <div class="testimonial-author">
                    <div class="testimonial-avatar avatar avatar-lg">
                      <img class="img-fluid rounded-circle" src="{{ asset('/frontend/images/avatar/04.jpg') }}" alt="">
                    </div>
                    <div class="testimonial-name d-flex justify-content-center">
                      <h6 class="text-primary mr-2">Felica Queen</h6>
                      <span>UI Designer</span>
                    </div>
                  </div>
                </div>
              </div></div><div class="owl-item" style="width: 350px; margin-right: 5px;"><div class="item">
                <div class="testimonial-item-02-small text-center">
                  <i class="fas fa-quote-left quotes"></i>
                  <div class="testimonial-content">
                    <p>Portal is very user-friendly in terms of searching for resumes and job postings. Also, they have an excellent database to search for resumes. As far as services are involved, it's terrific! </p>
                  </div>
                  <div class="testimonial-author">
                    <div class="testimonial-avatar avatar avatar-lg">
                      <img class="img-fluid rounded-circle" src="{{ asset('/frontend/images/avatar/01.jpg') }}" alt="">
                    </div>
                    <div class="testimonial-name d-flex justify-content-center">
                      <h6 class="text-primary mr-2">Anne Smith</h6>
                      <span>Art Director</span>
                    </div>
                  </div>
                </div>
              </div></div><div class="owl-item cloned" style="width: 350px; margin-right: 5px;"><div class="item">
                <div class="testimonial-item-02-small text-center">
                  <i class="fas fa-quote-left quotes"></i>
                  <div class="testimonial-content">
                    <p>Jobber is an excellent job portal. We value the resumes received through this channel. Magic Search and Power search are handy tools. We are delighted with their service. </p>
                  </div>
                  <div class="testimonial-author">
                    <div class="testimonial-avatar avatar avatar-lg">
                      <img class="img-fluid rounded-circle" src="{{ asset('/frontend/images/avatar/02.jpg') }}" alt="">
                    </div>
                    <div class="testimonial-name d-flex justify-content-center">
                      <h6 class="text-primary mr-2">John Doe</h6>
                      <span>Product Designer</span>
                    </div>
                  </div>
                </div>
              </div></div><div class="owl-item cloned" style="width: 350px; margin-right: 5px;"><div class="item">
                <div class="testimonial-item-02-small text-center">
                  <i class="fas fa-quote-left quotes"></i>
                  <div class="testimonial-content">
                    <p>Their turnaround time for fixing any issue is just a few minutes, and that is appreciable. Their Business Development Team is always there to help at any point in time. Thank you so much for all your effort.</p>
                  </div>
                  <div class="testimonial-author">
                    <div class="testimonial-avatar avatar avatar-lg">
                      <img class="img-fluid rounded-circle" src="{{ asset('/frontend/images/avatar/04.jpg') }}" alt="">
                    </div>
                    <div class="testimonial-name d-flex justify-content-center">
                      <h6 class="text-primary mr-2">Felica Queen</h6>
                      <span>UI Designer</span>
                    </div>
                  </div>
                </div>
              </div></div></div></div><div class="owl-nav"><div class="owl-prev"><i class="fas fa-chevron-left"></i></div><div class="owl-next"><i class="fas fa-chevron-right"></i></div></div><div class="owl-dots disabled"></div></div>
          </div>--}}
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
<script type="text/javascript">
  var base_url = '{{ url("/") }}';
  var csrftoken = '{{ csrf_token() }}';
</script>
@endsection

