@extends('admin.layouts.auth')

@section('auth-content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="javascript:void(0)" class="h1"><b>Admin</b>Reset</a>
            </div>
            <div class="card-body">

                @if (Session::has('error'))
                    <p class="login-box-msg text-danger">{{ Session::get('error') }}</p>
                @elseif(Session::has('success'))
                    <p class="login-box-msg text-success">{{ Session::get('success') }}</p>
                @else
                    <p class="login-box-msg">Đặt lại mật khẩu</p>
                @endif

                <form action="{{ route('admin.reset') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                    <input type="email" value="{{ request()->email }}" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="Email" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <p class="text-center text-danger">{{ $message }}</p>
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
                        <p class="text-center text-danger">{{ $message }}</p>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" name="confirm" class="form-control" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('confirm')
                        <p class="text-center text-danger">{{ $message }}</p>
                    @enderror

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đặt lại</button>
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
