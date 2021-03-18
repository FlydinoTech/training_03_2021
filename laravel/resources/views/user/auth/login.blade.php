@extends('layouts.user.master')
@section('content')
<div class="row">
<div class="container">

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    @if(Session::has('successReU'))
            <div class="alert alert-success" role="alert">{{Session::get('successReU')}}</div>
            @endif
            @if(Session::has('newPW'))
            <div class="alert alert-success" role="alert">Mật khẩu mới của bạn là: {{Session::get('newPW')}}</div>
            @endif
    <!-- Icon -->
    <div class="fadeIn first">
      <h2 style=""><b>Đăng nhập</b></h2>
    </div>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
        @if(Session::has('msg'))
        <code style="color:red">{{Session::get('msg')}}</code>
        @endif
        @csrf

      <input type="text" id="email" class="fadeIn second" name="email" placeholder="Nhập địa chỉ email">
     
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Nhập mật khẩu">
     <button class="btn btn-info">Đăng nhập</button>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="{{route('forgotPassword')}}">Quên mật khẩu</a>
    </div>

    </form>
  </div>
</div>

</div>
</div>
@endsection
