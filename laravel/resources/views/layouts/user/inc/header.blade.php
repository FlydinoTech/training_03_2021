<div class="header-top">

    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #2F3B59 !important;">
        <div class="container-fluid justify-content-between">
            <!-- Left elements -->
            <div class="d-flex">
			
                <!-- Brand -->
                <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="{{route('user.home')}}">
                    <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="20" alt=""
                        loading="lazy" style="margin-top: 2px;" />
                </a>

                <!-- Search form -->
                <form method="GET" action="{{route('user.course.searchCourse')}}"
                    class="input-group w-auto my-auto d-none d-sm-flex">
					@csrf
                    <input autocomplete="off" name="search" type="search" class="form-control rounded" placeholder="Tìm kiếm khóa học"
                        style="min-width: 125px;" />
                    <!-- <button class="btn btn-large" style="background-color:#e9ecef;padding:0"><span class="input-group-text border-0 d-none d-lg-flex"><i class="fa fa-search"></i></span></button> -->
                </form>
            </div>
            <!-- Left elements -->

            <!-- Center elements -->
           
            <!-- Center elements -->

            <!-- Right elements -->
            <ul class="navbar-nav flex-row">
                @if($user)
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="{{route('user.auth.profile')}}">
                        <span><i class="fa fa-user fa-lg"></i> Trang cá nhân</span>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="{{route('user.auth.logout')}}">
                        <span><i class="fa fa-sign-out fa-lg"></i> Đăng xuất</span>
                    </a>
                </li>
                @else
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="{{route('user.auth.login')}}">
                        <span><i class="fa fa-sign-in fa-lg"></i> Đăng nhập</span>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="{{route('user.auth.register')}}">
                        <span><i class="fa fa-plus-circle fa-lg"></i> Đăng ký</span>
                    </a>
                </li>
                @endif
            </ul>
            <!-- Right elements -->
        </div>
    </nav>
    <!-- Navbar -->
</div>