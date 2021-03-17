@extends('layouts.admin.master')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>LỊCH HỌC</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.schedule.index') }}">Lịch học</a></li>
                        <li class="breadcrumb-item active">Thêm</li>
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
                            <h3 class="card-title">Thêm lịch học</h3>
                        </div>
                        <form role="form" method="POST" action="">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Khóa học (*)</label>
                                    <select name="course_id" id="course-id" class="custom-select">
                                        <option value="">-- Chọn khóa học --</option>
                                        @foreach ($objCourses as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $objSchedule->course_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Niên khóa (*)</label>
                                    <input type="text" name="name" value="{{ $objSchedule->name }}" class="form-control"
                                        id="name" placeholder="Nhập tên niên khóa (Vd: PHP 01)">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="start">Ngày khai giảng(*)</label>
                                    <input type="date" name="start" value="{{ $objSchedule->start }}" class="form-control"
                                        id="start" placeholder="Ngày khai giảng">
                                    @error('start')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="calendar">Lịch học (*)</label>
                                    <input type="text" name="calendar" value="{{ $objSchedule->calendar }}"
                                        class="form-control" id="calendar"
                                        placeholder="Nhập lịch học (Vd: thứ 3, thứ 7 từ 19h-21h30)">
                                    @error('calendar')
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
