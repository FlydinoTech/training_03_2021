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
                        <p class="login-box-msg">Gửi yêu cầu đặt lại mật khẩu</p>
                        @if (Session::has('error'))
                            <p class="text-danger text-center"><small>{{ Session::get('error') }}</small></p>
                        @endif
                        <form action="" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                    placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Gửi yêu cầu</button>
                                </div>
                            </div>
                        </form>
                        <p class="mt-1">
                            <a href="{{ route('admin.login') }}">Về trang đăng nhập</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
