@extends('layouts.user.master')
@section('content')
<div class="row">
<div class="container">

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

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
     
      <input type="submit" class="fadeIn fourth" value="Đăng nhập">

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Quên mật khẩu</a>
    </div>

    </form>
  </div>
</div>

</div>
</div>
@endsection
