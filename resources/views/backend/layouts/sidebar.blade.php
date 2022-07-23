<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      {{-- <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('backend')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> --}}
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="{{route('admin.banner.index')}}">
            <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Quản Lý Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.banner.index')}}"><i class="fa fa-circle-o"></i> Danh sách slider</a></li>
            <li><a href="{{route('admin.banner.create')}}"><i class="fa fa-circle-o"></i> Thêm Slider</a></li>
          </ul>
        </li>

        <li><a href="{{route('admin.category.index')}}"><i class="fa fa-book"></i> <span>Quản Lý Danh mục</span></a></li>

        <li class="treeview" style="height: auto;">
            <a href="#">
              <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Quản Lý Bài Viết</span>
                <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href="{{route('admin.article.index')}}"><i class="fa fa-circle-o"></i> Danh Sách Bài Viết</a></li>
                <li><a href="{{route('admin.article.create')}}"><i class="fa fa-circle-o"></i> Thêm Mới Bài Viết</a></li>
            </ul>
        </li>

        <li class="treeview" style="height: auto;">
            <a href="#">
              <i class="fa fa-cog" aria-hidden="true"></i> <span>Quản Lý Hệ Thống</span>
                <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href="{{route('admin.setting.index')}}"><i class="fa fa-circle-o"></i> Thay đổi Thông Tin</a></li>
            </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>