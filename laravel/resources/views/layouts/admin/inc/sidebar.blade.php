<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="templates/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="templates/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Quan tri vien</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- Dashboard -->
          <li class="nav-item">
            <a href="{{ route('admin.index.index') }}" class="nav-link {{ request()->routeIs('admin.index.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <!-- Quan ly khoa hoc -->
          <li class="nav-header">QUẢN LÝ KHÓA HỌC</li>
          <li class="nav-item">
            <a href="{{ route('admin.course.index') }}" class="nav-link {{ request()->routeIs('admin.course.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Khóa học
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Lịch học
              </p>
            </a>
          </li>

          <!-- Quan ly khoa hoc -->
          <li class="nav-header">QUẢN LÝ THÀNH VIÊN</li>
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Danh sách thành viên
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Thông tin của tôi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>