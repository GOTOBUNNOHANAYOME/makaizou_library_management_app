<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; top: 0; bottom: 0;">
  <a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light pl-4">管理画面</span>
  </a>
  <div class="sidebar position-relative px-auto" style="overflow-y: auto;">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item {{ Request::routeIs('admin.library.create') ? 'menu-open' : ''}}">
          <div class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              書籍
              <i class="right fas fa-angle-left"></i>
            </p>
          </div>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.library.create') }}" class="nav-link {{ Request::routeIs('admin.library.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>書籍登録</p>
              </a>
            </li>
          </ul>
        </li>
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
        <li class="nav-item {{ Request::routeIs('admin.mail_send.create') || Request::routeIs('admin.mail_send.edit') ? 'menu-open' : ''}}">
          <div class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              メール
              <i class="right fas fa-angle-left"></i>
            </p>
          </div>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.mail_send.create') }}" class="nav-link {{ Request::routeIs('admin.mail_send.create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>メール送信</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.mail_send.edit') }}" class="nav-link {{ Request::routeIs('admin.mail_send.edit') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>設定</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>
