@extends('layouts.user.master')
@section('content')

<form action="{{route('smEditProfile')}}" method="POST">
@csrf
<div class="row">
    <div class="container" style="margin-bottom: 20px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <div class="control-group">
                <div class="col-md-6">
                    <label class="control-label input-label" for="phone">Họ tên:</label>
                    <input type="text" name="name" value="{{$user->name}}">

                </div>
                <div class="col-md-6">
                    <label class="control-label input-label"  for="email">Email:</label>
                    <input type="text" name="email" readonly value="{{$user->email}}">

                </div>
                <div class="col-md-6">
                    <label class="control-label input-label" for="phone">Số điện thoại:</label>
                    <input type="text" name="phone" value="{{$user->phone}}">

                </div>
                <div class="col-md-6">
                    <label class="control-label input-label" for="password">Mật khẩu:</label>
                    <input type="password" name="password" value="" placeholder="******">

                </div>
                <div class="col-md-12">
                    <label class="control-label input-label" for="address">Địa chỉ:</label>
                    <textarea name="address" class="form-control">        {{$user->address}}
                        </textarea>


                </div>
                <div class="col-md-12" style="margin-top: 15px;">
                    <button class="btn btn-primary"><span class="fa fa-edit"></span>Sửa thông tin</button>
                </div>

            </div>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>
</form>
@endsection