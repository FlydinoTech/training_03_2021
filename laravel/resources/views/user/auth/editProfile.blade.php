@extends('layouts.user.app')
@section('content')
<div class="row">
    <div class="container text-center">
        <div class="row">
            <!-- Login Form -->


            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{route('user.auth.smEditProfile')}}" method="POST">
                    @csrf
                    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt=""
                        width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Sửa thông tin</h1>


                    <div class="form-group text-left">
                        <label for="">Họ tên</label>
                        <input type="text" id="email" required name="name" placeholder="Nhập họ tên"
                            value="{{$user->name}}" class="form-control">
                    </div>
                    <div class="form-group text-left">
                        <label for="">Email</label>
                        <input type="text" id="email" readonly name="email" placeholder="Nhập email"
                            value="{{$user->email}}" class="form-control">

                    </div>
                    <div class="form-group text-left">
                        <label for="">Số điện thoại</label>
                        <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại"
                            value="{{$user->phone}}" class="form-control">
                            @error('phone')
                            <div>
                                <code style="color:red">{{$message}}</code>
                            </div>
                            @enderror
                    </div>
                    <div class="form-group text-left">
                        <label for="">Địa chỉ</label>
                        <input type="text" id="address" name="address" placeholder="Nhập địa chỉ " class="form-control"
                            value="{{$user->address}}">
                    </div>
                    <div class="form-group text-left">
                        <label for="">Mật khẩu</label>
                        <input type="password" id="password" name="password" placeholder="******" class="form-control">
                    </div>
                   
                            <button class="btn btn-primary"><span class="fa fa-edit"></span>Sửa thông tin</button>
                        
                </form>
            </div>
            <div class="col-md-3"></div>

        </div>
    </div>
</div>

@endsection