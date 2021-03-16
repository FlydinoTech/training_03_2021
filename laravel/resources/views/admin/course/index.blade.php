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
                <li class="breadcrumb-item"><a href="{{route('admin.index.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Khóa học</li>
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
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Danh sách khóa học </h3>
                  <div class="card-tools">
                    <a href="{{route('admin.course.add')}}" class="btn btn-sm btn-success">
                      <small><i class="fas fa-plus"></i></small>
                      THÊM MỚI
                    </a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tên khóa học</th>
                        <th>Mô tả</th>
                        <th>Thời lượng</th>
                        <th>Học phí</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>1</th>
                        <td>PHP & MySql</td>
                        <td>Khoa hoc php va mysql</td>
                        <td>6 thang</td>
                        <td>6.800.000 VNĐ.</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
    </section>
@endsection