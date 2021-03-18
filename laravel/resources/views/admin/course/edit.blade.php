@extends('layouts.admin.master')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>KHÓA HỌC</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.course.index') }}">Khóa học</a></li>
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
                            <h3 class="card-title">Cập nhật thông tin khóa học</h3>
                        </div>
                        <form role="form" method="POST" action="">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Tên khóa học (*)</label>
                                    <input type="text" name="name" value="{{ $objCourse->name }}" class="form-control"
                                        id="name" placeholder="Nhập tên khóa học">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tuition">Học phí (*)</label>
                                    <input type="text" name="tuition" value="{{ $objCourse->tuition }}"
                                        class="form-control" id="tuition" placeholder="Học phí">
                                    @error('tuition')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="time">Thời lượng (*)</label>
                                    <input type="text" name="time" value="{{ $objCourse->time }}" class="form-control"
                                        id="time" placeholder="Thời gian đào tạo (vd: 6 tháng)">
                                    @error('time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="desc">Mô tả (*)</label>
                                    <textarea name="desc" id="desc" class="form-control"
                                        placeholder="Nhập mô tả khóa học">{{ $objCourse->desc }}</textarea>
                                    @error('desc')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="detail">Chi tiết (*)</label>
                                    <textarea name="detail" id="detail" class="form-control"
                                        placeholder="Nhập chi tiết khóa học">{{ $objCourse->detail }}</textarea>
                                    @error('detail')
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
