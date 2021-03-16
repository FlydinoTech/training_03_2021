@extends('layouts.admin.login')
@section('main-content')

    <section class="content">
        <div class="container-fluid pt-5">
            <div class="login-box mx-auto">
                <div class="login-logo">
                    <a href="javascript:void(0)"><b>Admin</b></a>
                </div>
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Đăng nhập trang quản trị</p>
                        @if (Session::has('error'))
                            <p class="text-danger text-center"><small>{{ Session::get('error') }}</small></p>
                        @endif
                        <form action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="row">
                                <div class="col-12">
                                    <div class="icheck-primary">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">
                                            Ghi nhớ đăng nhập
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                        <p class="mb-1">
                            <a href="{{ route('admin.forgot') }}">Quên mật khẩu?</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
