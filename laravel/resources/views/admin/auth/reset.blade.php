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
                        <p class="login-box-msg">Đặt lại mật khẩu</p>
                        @if (Session::has('error'))
                            <p class="text-danger text-center"><small>{{ Session::get('error') }}</small></p>
                        @endif
                        @if (Session::has('msg'))
                            <p class="text-success text-center"><small>{{ Session::get('msg') }}</small></p>
                        @endif
                        <form action="" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="email" name="email" value="{{ $email }}" class="form-control"
                                    placeholder="Email" readonly>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

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

                            <div class="input-group mb-3">
                                <input type="password" name="confirm" class="form-control" placeholder="Confirm password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            @error('confirm')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Đặt lại</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
