@extends('layouts.user.app')
@section('content')
<div class="row">
    <div class="container text-center">
        <div class="row" style="background:#ffffff !important;">
            <div class="col-md-3"></div>
            <div class="col-md-6">


                <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt=""
                    width="72" height="72">
                   
                @if(Session::has('successReU'))
                <div class="alert alert-success" role="alert">{{Session::get('successReU')}}</div>
                @endif
                @if(Session::has('newPW'))
                <div class="alert alert-success" role="alert">Mật khẩu mới của bạn là: {{Session::get('newPW')}}
                </div>
                @endif
                <h1 class="h3 mb-3 font-weight-normal">Đăng nhập</h1>
                
                @if(Session::has('msg'))
                <div class="alert alert-danger" role="alert">{{Session::get('msg')}}</div>
                @endif
              
                <!-- Tabs Titles -->

                <form method="POST" action="{{ route('user.auth.login') }}">
                @csrf
                    <div class="form-group text-left">
                        <label for="inputEmail">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Email address" required autofocus>
                    </div>
                    <div class="form-group text-left">
                        <label for="inputPassword">Mật khẩu</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Password" required>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit"><span class="fa fa-sign-in"></span>
                        Đăng nhập </button>
                </form>
                <div id="formFooter text-left" style="margin-top: 30px;text-align:right">
                    <a class="underlineHover" href="{{route('user.auth.forgotPassword')}}">Quên mật khẩu</a>
                </div>


            </div>
            <div class="col-md-3"></div>

        </div>
    </div>
</div>



@endsection