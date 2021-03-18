@extends('layouts.admin.master')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>NGƯỜI DÙNG</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index.index') }}">Người dùng</a></li>
                        <li class="breadcrumb-item active">Cập nhật</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật thông tin người dùng</h3>
                        </div>
                        <form role="form" method="POST" action="">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Họ tên (*)</label>
                                    <input type="text" name="name" value="{{ $objAdmin->name }}" class="form-control"
                                        id="name" placeholder="Nhập tên người dùng">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email (*)</label>
                                    <input type="text" name="email" value="{{ $objAdmin->email }}" class="form-control"
                                        id="email" placeholder="Email đăng ký" readonly>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirm">Vai trò (*)</label>
                                    <select name="role" id="role" class="custom-select">
                                        <option value="">--Chọn vai trò--</option>
                                        <option value="admin" {{ $objAdmin->role == 'admin' ? 'selected' : '' }}>Quản trị
                                            viên</option>
                                        <option value="staff" {{ $objAdmin->role == 'staff' ? 'selected' : '' }}>Nhân viên
                                        </option>
                                        <option value="mod" {{ $objAdmin->role == 'mod' ? 'selected' : '' }}>Cộng tác
                                        </option>
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Cập nhật
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    <i class="fas fa-retweet"></i>
                                    Nhập lại
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
