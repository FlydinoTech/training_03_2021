@extends('layouts.admin.master')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <span class="mr-2">NGƯỜI DÙNG</span>
                        <a href="{{ route('admin.admin.add') }}" class="btn btn-info">
                            <i class="fas fa-plus"></i>
                            Thêm mới
                        </a>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Người dùng</li>
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
                            <h3 class="card-title">Danh sách người dùng</h3>
                            <br>
                            @if (Session::has('msg'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span>{{ Session::get('msg') }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span>{{ Session::get('error') }}</span>
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
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Vai trò</th>
                                        <th class="text-center">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objAdmins as $item)
                                        @php
                                            $urlEdit = route('admin.admin.edit', $item->id);
                                            $urlDel = route('admin.admin.del', $item->id);
                                        @endphp
                                        <tr>
                                            <th>{{ $item->id }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                @if ($item->role == 'admin')
                                                    <span class="badge bg-success">Quản trị</span>
                                                @elseif ($item->role == 'staff')
                                                    <span class="badge bg-info">Nhân viên</span>
                                                @else
                                                    <span class="badge bg-secondary">Cộng tác</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ $urlEdit }}" class="badge bg-info">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="{{ $urlDel }}" class="badge bg-danger"
                                                    onclick="return confirm('Bạn thật sự muốn xóa tài khoản này?')">
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
