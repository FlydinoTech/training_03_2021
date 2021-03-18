@extends('layouts.user.master')
@section('content')
<div class="row">
<div class="container">
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h2 style=""><b>Đăng ký</b></h2>
    </div>

    <!-- Login Form -->
    <form method="POST" action="{{ route('verify') }}">
    @csrf
    <input type="text" id="email" required name="name" placeholder="Nhập họ tên">

      <input type="text" id="email" required name="email" placeholder="Nhập email">
      <input type="text" id="phone"  name="phone" placeholder="Nhập số điện thoại">
      <input type="text" id="adress"  name="adress" placeholder="Nhập địa chỉ ">
      <input type="password" id="password" required  name="password" placeholder="Nhập mật khẩu">
      <input type="password" id="confirm_password" required name="confirm_password" placeholder="Nhập lại mật khẩu">
      <input type="submit"  value="Đăng ký" >  

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Quên mật khẩu</a>
    </div>
    </form>
  </div>
</div>

</div>
</div>
<script>
    $('#confirm_password').change(function(){
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        if(password != confirm_password){
            alert('Mật khẩu không trùng khớp');
            $('#confirm_password').val('');
        }
    });

</script>
@endsection
