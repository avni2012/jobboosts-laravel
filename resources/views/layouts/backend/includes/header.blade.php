<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" id="navigation_icon" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars">
            </i>
        </a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell">
          </i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2">
            </i>
              4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2">
            </i>
              8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2">
            </i>
              3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li> -->
      <li class="nav-item dropdown user_link_top">
        <a class="nav-link user_link" data-toggle="dropdown" href="#">
          <div class="user-panel user-panel pb-2 pt-0">
            <div class="image">
              <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <ul>
            <li>
              <a class="dropdown-item"  href="{{route('profile')}}">
                  <i class="fas fa-user-alt">
                  </i>
                  &nbsp;
                  My Profile
              </a>
            </li>

            @if(auth()->guard()->user()->can('list-role'))
            <li>
              <a class="dropdown-item"  href="{{route('manage-role.index')}}">
                  <i class="fas fa-eye-slash">
                  </i>
                  &nbsp;
                  Roles and Permissions
              </a>
            </li>
            @endif

            {{--@if(auth()->guard()->user()->can('list-staff') )
            <li>
              <a class="dropdown-item"  href="{{route('manage-staff.index')}}">
                  <i class="fas fa-user-friends">
                  </i>
                  &nbsp;
                  Manage Staff
              </a>
            </li>
            @endif--}}

            @if(auth()->guard()->user()->roles->first()->name != 'super_admin')
              @if(auth()->guard()->user()->can('edit-coach-profile'))
                @if(auth()->guard()->user()->coach_id != null)
                <li>
                    <a class="dropdown-item" href="{{ route('manage-coach-profile.index') }}">
                        <i class="fas fa-user-plus">
                        </i>
                        &nbsp;
                        Coach Profile
                    </a>
                </li>
                @endif
              @endif
            @endif

            @if(auth()->guard()->user()->roles->first()->name != 'super_admin')
              @if(auth()->guard()->user()->can('edit-coach-availability'))
                @if(auth()->guard()->user()->coach_id != null)
                <li>
                    <a class="dropdown-item" href="{{ route('admin.manage-coach-availability') }}">
                        <i class="fas fa-calendar-plus-o">
                        </i>
                        &nbsp;
                        Manage Availability
                    </a>
                </li>
                @endif
              @endif
            @endif

            @if(auth()->guard()->user()->roles->first()->name != 'super_admin')
              @if(auth()->guard()->user()->can('list-online-coaching'))
              <li>
                  <a class="dropdown-item" href="{{ route('manage-online-coaching.index') }}">
                      <i class="fas fa-video-camera">
                      </i>
                      &nbsp;
                      My Sessions
                  </a>
              </li>
              @endif
            @endif

            @if(auth()->guard()->user()->roles->first()->name == 'super_admin')
              <li>
                  <a class="dropdown-item"  href="#">
                      <i class="fas fa-gears">
                      </i>
                      &nbsp;
                      Settings
                  </a>
              </li>
            @endif

            <li>
               <a class="dropdown-item" href="{{ route('admin.logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt">
                </i>
                   &nbsp;
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
