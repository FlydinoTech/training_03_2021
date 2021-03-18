@extends('layouts.admin.master')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <span class="mr-2">LỊCH HỌC</span>
                        <a href="{{ route('admin.schedule.add') }}" class="btn btn-info">
                            <i class="fas fa-plus"></i>
                            Thêm mới
                        </a>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Lịch học</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách lịch học</h3>
                            <br>
                            @if (Session::has('msg'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span>{{ Session::get('msg') }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Khóa học</th>
                                        <th>Niên khóa</th>
                                        <th>Ngày khai giảng</th>
                                        <th>Lịch học</th>
                                        <th class="text-center">Đã đăng ký</th>
                                        <th class="text-center">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objSchedules as $item)
                                        @php
                                            $urlEdit = route('admin.schedule.edit', $item->id);
                                            $urlDel = route('admin.schedule.del', $item->id);
                                        @endphp
                                        <tr>
                                            <th>{{ $item->id }}</th>
                                            <td class="text-info"><strong>{{ $item->course->name }}</strong></td>
                                            <td class="text-danger"><strong>{{ $item->name }}</strong></td>
                                            <td>{{ $item->start }}</td>
                                            <td>{{ $item->calendar }}</td>
                                            <td class="text-center">{{ $item->registered }}</td>
                                            <td class="text-center">
                                                <a href="{{ $urlEdit }}" class="badge bg-info">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="{{ $urlDel }}" class="badge bg-danger"
                                                    onclick="return confirm('Bạn thật sự muốn xóa lịch học này?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{-- {{ $objCourses->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
