<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-purple">
  <!-- Brand Logo -->
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <img src="{{ asset('frontend/images/favicon.ico') }}" alt="Project Logo" class="brand-image img-circle elevation-3" style="opacity: .8; background-color: white">
    <span class="brand-text font-weight-light">
      @if(auth()->guard()->user())
        {{ auth()->guard()->user()->name }}
      @endif

    </span>
  </a>
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a  class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="nav-icon fas fa-tachometer-alt">

            </i>
            <p class="text">Dashboard</p>
          </a>
        </li>
        @if(auth()->guard()->user()->can('list-staff') )
        <li class="nav-item">
          <a href="{{ route('manage-staff.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-friends">
              </i>
              <p class="text">Staff</p>
          </a>
        </li>
        @endif
        @if(auth()->guard()->user()->can('list-homepageslider'))
           <li class="nav-item">
               <a href="{{route('manage-homepage-sliders.index')}}" class="nav-link">
                   <i class="nav-icon fas fa-picture-o"> </i>
                   <p class="text">Homepage Sliders</p>
               </a>
           </li>
        @endif
        @if(auth()->guard()->user()->can('list-contactus'))
           <li class="nav-item">
               <a href="{{route('manage-contact-us.index')}}" class="nav-link">
                   <i class="nav-icon fas fa-address-book"> </i>
                   <p class="text">Contact Us</p>
               </a>
           </li>
        @endif
        @if(auth()->guard()->user()->can('list-coach'))
           <li class="nav-item">
              <a href="{{route('manage-coach.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-users"> </i>
                  <p class="text">Coaches</p>
              </a>
           </li>
        @endif
        @if(auth()->guard()->user()->can('list-cms'))
          <li class="nav-item">
              <a href="{{route('manage-cms.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-file-text"> </i>
                  <p class="text">CMS</p>
              </a>
          </li>
        @endif

        @if(auth()->guard()->user()->can('list-faq'))
          <li class="nav-item">
              <a href="{{route('manage-faq.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-question-circle" aria-hidden="true">
                  </i>
                  <p class="text">FAQ</p>
              </a>
          </li>
        @endif

        @if(auth()->guard()->user()->can('list-emailtemplate'))
          <li class="nav-item">
              <a href="{{route('manage-email-templates.index')}}" class="nav-link">
                  <i class="nav-icon fas fa fa-envelope" aria-hidden="true">
                  </i>
                  <p class="text">Email Templates</p>
              </a>
          </li>
        @endif

          @if(auth()->guard()->user()->can('list-setting'))
              <li class="nav-item">
                  <a href="{{route('manage-settings.index')}}" class="nav-link">
                      <i class="nav-icon fas fa fa-cog" aria-hidden="true">
                      </i>
                      <p class="text">General Settings</p>
                  </a>
              </li>
          @endif

          @if(auth()->guard()->user()->can('list-user'))
            <li class="nav-item">
              <a href="{{route('manage-users.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user" aria-hidden="true">
                </i>
                <p class="text">Customers</p>
              </a>
            </li>
          @endif

          @if(auth()->guard()->user()->can('list-pricing'))
              <li class="nav-item">
                  <a href="{{route('manage-pricing.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-dollar-sign" aria-hidden="true">
                      </i>
                      <p class="text">Pricing</p>
                  </a>
              </li>
          @endif

          @if(auth()->guard()->user()->can('list-industry'))
              <li class="nav-item">
                  <a href="{{route('manage-industry.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-building" aria-hidden="true">
                      </i>
                      <p class="text">Industry</p>
                  </a>
              </li>
          @endif

          @if(auth()->guard()->user()->can('list-blog-category'))
              <li class="nav-item">
                  <a href="{{route('manage-blog-category.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-blog" aria-hidden="true">
                      </i>
                      <p class="text">Blog Category</p>
                  </a>
              </li>
          @endif

          @if(auth()->guard()->user()->can('list-tag'))
              <li class="nav-item">
                  <a href="{{route('manage-tag.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-tag" aria-hidden="true">
                      </i>
                      <p class="text">Tags</p>
                  </a>
              </li>
          @endif

          @if(auth()->guard()->user()->can('list-blog'))
              <li class="nav-item">
                  <a href="{{route('manage-blog.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-newspaper" aria-hidden="true">
                      </i>
                      <p class="text">Blogs</p>
                  </a>
              </li>
          @endif

          @if(auth()->guard()->user()->can('list-course'))
              <li class="nav-item">
                  <a href="{{route('manage-course.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-graduation-cap" aria-hidden="true">
                      </i>
                      <p class="text">Courses</p>
                  </a>
              </li>
          @endif

          @if(auth()->guard()->user()->can('list-coupon'))
              <li class="nav-item">
                  <a href="{{route('manage-coupon.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-tag" aria-hidden="true">
                      </i>
                      <p class="text">Coupons</p>
                  </a>
              </li>
          @endif

            @if(auth()->guard()->user()->can('list-online-coaching'))
              <li class="nav-item">
                  <a href="{{route('manage-online-coaching.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-book" aria-hidden="true">
                      </i>
                      <p class="text">Online Coaching</p>
                  </a>
              </li>
            @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
</aside>
