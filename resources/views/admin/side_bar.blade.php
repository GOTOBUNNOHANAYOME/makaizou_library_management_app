
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light pl-4">管理画面</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item {{ Request::routeIs('admin.report.access') || Request::routeIs('admin.report.user') ? 'menu-open' : ''}}">
          <div class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              集計
              <i class="right fas fa-angle-left"></i>
            </p>
          </div>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.report.access') }}" class="nav-link {{ Request::routeIs('admin.report.access') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>ログインユーザー</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.report.user') }}" class="nav-link {{ Request::routeIs('admin.report.user') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>登録ユーザー</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <div class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              追加予定
              <span class="right badge badge-danger">New</span>
            </p>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>