<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index.index') }}" class="brand-link">
        <img src="templates/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="templates/admin/dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
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
                    <a href="{{ route('admin.index.index') }}"
                        class="nav-link {{ request()->routeIs('admin.index.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- Quan ly khoa hoc -->
                <li class="nav-header">QUẢN LÝ KHÓA HỌC</li>
                <li class="nav-item">
                    <a href="{{ route('admin.course.index') }}"
                        class="nav-link {{ request()->routeIs('admin.course.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            Khóa học
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.schedule.index') }}"
                        class="nav-link {{ request()->routeIs('admin.schedule.*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Lịch học
                        </p>
                    </a>
                </li>

                <!-- Quan ly khoa hoc -->
                <li class="nav-header">QUẢN LÝ NGƯỜI DÙNG</li>
                <li class="nav-item">
                    <a href="{{ route('admin.admin.index') }}"
                        class="nav-link {{ request()->routeIs('admin.admin.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Danh sách
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Thông tin tài khoản
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
