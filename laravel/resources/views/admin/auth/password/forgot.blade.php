@extends('admin.layouts.auth')

@section('auth-content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="javascript:void(0)" class="h1"><b>Admin</b>Forgot</a>
            </div>
            <div class="card-body">

                @if (Session::has('error'))
                    <p class="login-box-msg text-danger">{{ Session::get('error') }}</p>
                @else
                    <p class="login-box-msg">Nhập email quên mật khẩu</p>
                @endif

                <form action="{{ route('admin.forgot') }}" method="POST">
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
                        <p class="text-center text-danger">{{ $message }}</p>
                    @enderror

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Gửi yêu cầu</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-2">
                    <a href="{{ route('admin.login') }}">Quay về trang đăng nhập</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
