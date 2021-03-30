@extends('layouts.user.app')
@section('content')
<style>
label{
    font-weight: bold;
}
</style>
<div class="row">
    <div class="container text-center">
        <div class="row">
            <!-- Login Form -->

        
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('user.auth.verifyRegister') }}">
                @csrf
                    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt=""
                        width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Đăng ký</h1>
                    @if(Session::has('msg'))
                    <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                    @endif

                    <div class="form-group text-left">
                    <label for="">Họ tên</label>
                        <input type="text" id="email" required name="name" placeholder="Nhập họ tên"
                            class="form-control">
                    </div>
                    <div class="form-group text-left">
                    <label for="">Email</label>
                        <input type="text" id="email" required name="email" placeholder="Nhập email"
                            class="form-control">
                        @error('email')
                        <div>
                            <code style="color:red">{{$message}}</code>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                    <label for="">Số điện thoại</label>
                        <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại"
                            class="form-control">
                        @error('phone')
                        <div>
                            <code style="color:red">{{$message}}</code>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                    <label for="">Địa chỉ</label>
                        <input type="text" id="address" name="address" placeholder="Nhập địa chỉ " class="form-control">
                    </div>
                    <div class="form-group text-left">
                    <label for="">Mật khẩu</label>
                        <input type="password" id="password" required name="password" placeholder="Nhập mật khẩu"
                            class="form-control">
                    </div>
                    <div class="form-group text-left">
                    <label for="">Nhập lại mật khẩu</label>
                        <input type="password" id="confirm_password" required name="confirm_password"
                            class="form-control" placeholder="Nhập lại mật khẩu">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit"><span
                            class="fa fa-plus-circle"></span>
                        Đăng ký </button>
                </form>
            </div>
            <div class="col-md-3"></div>

        </div>
    </div>
</div>

@endsection

@section('script')
<script>
$('#confirm_password').change(function() {
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    if (password != confirm_password) {
        alert('Mật khẩu không trùng khớp');
        $('#confirm_password').val('');
    }
});
</script>
@endsection