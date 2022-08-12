<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>OHAYO</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>OHAYO</b>SHOP</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @if(\Illuminate\Support\Facades\Auth::check())
          @php
              $user = \Illuminate\Support\Facades\Auth::user();
          @endphp

              <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                      <!-- inner menu: contains the actual data -->
                      <ul class="menu">
                          <li><!-- start message -->
                              <a href="#">
                                  <div class="pull-left">
                                      <img src="{{ url('backend')}}/dist/img/user2-160x160.jpg" class="img-circle"
                                           alt="User Image">
                                  </div>
                                  <h4>
                                      Support Team
                                      <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                  </h4>
                                  <p>Why not buy a new awesome theme?</p>
                              </a>
                          </li>
                          <!-- end message -->
                          <li>
                              <a href="#">
                                  <div class="pull-left">
                                      <img src="{{asset('backend')}}/dist/img/user3-128x128.jpg" class="img-circle"
                                           alt="User Image">
                                  </div>
                                  <h4>
                                      AdminLTE Design Team
                                      <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                  </h4>
                                  <p>Why not buy a new awesome theme?</p>
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <div class="pull-left">
                                      <img src="{{asset('backend')}}/dist/img/user4-128x128.jpg" class="img-circle"
                                           alt="User Image">
                                  </div>
                                  <h4>
                                      Developers
                                      <small><i class="fa fa-clock-o"></i> Today</small>
                                  </h4>
                                  <p>Why not buy a new awesome theme?</p>
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <div class="pull-left">
                                      <img src="{{asset('backend')}}/dist/img/user3-128x128.jpg" class="img-circle"
                                           alt="User Image">
                                  </div>
                                  <h4>
                                      Sales Department
                                      <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                  </h4>
                                  <p>Why not buy a new awesome theme?</p>
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <div class="pull-left">
                                      <img src="{{asset('backend')}}/dist/img/user4-128x128.jpg" class="img-circle"
                                           alt="User Image">
                                  </div>
                                  <h4>
                                      Reviewers
                                      <small><i class="fa fa-clock-o"></i> 2 days</small>
                                  </h4>
                                  <p>Why not buy a new awesome theme?</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                      <!-- inner menu: contains the actual data -->
                      <ul class="menu">
                          <li>
                              <a href="#">
                                  <i class="fa fa-users text-aqua"></i> 5 new members joined today
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <i class="fa fa-warning text-yellow"></i> Very long description here that
                                  may not fit into the
                                  page and may cause design problems
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <i class="fa fa-users text-red"></i> 5 new members joined
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <i class="fa fa-user text-red"></i> You changed your username
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
              </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if($user->avatar && file_exists(public_path($user->avatar)))
                      <img src="{{ asset($user->avatar) }}" class="img-circle" height="25px" width="25px" alt="">
                  @else
                      <img src="{{ asset('upload/user/user-404.png') }}" class="img-circle" height="25px" width="25px"  alt="">
                  @endif

                  <span class="hidden-xs">{{ $user->name }}</span>
              </a>
              <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                      @if($user->avatar && file_exists(public_path($user->avatar)))
                          <img src="{{ asset($user->avatar) }}" class="img-circle" alt="">
                      @else
                          <img src="{{ asset('upload/user/user-404.png') }}" class="img-circle" alt="">
                      @endif

                      <p>
                          {{ $user->name }}
                          <small>Chào mừng bạn quay lại</small>
                      </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                      <div class="pull-left">
                          <a href="{{ route('admin.user.edit',['user' => $user->id]) }}" class="btn btn-default btn-flat">Edit Profile</a>
                      </div>
                      <div class="pull-right">
                          <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Đăng xuất</a>
                      </div>
                  </li>
              </ul>
          </li>

      @endif
        </ul>
      </div>
    </nav>
  </header>