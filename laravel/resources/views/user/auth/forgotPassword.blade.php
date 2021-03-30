@extends('layouts.user.app')
@section('content')
<form action="{{route('user.auth.verifyForgotPassWord')}}" method="POST">
    <div class="row">
        <div class="container" style="margin-bottom: 20px;">
            <div class="row">
                <div class="col-md-3">
                    <label for="">Nhập email đăng ký</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="col-md-2">
                    <br>
                    <button id="btnSM" disabled class="btn btn-primary" style="margin-top: 5px;"><span class="fa fa-check"></span>
                        Xác nhận
                    </button>
                </div>
            </div>
        </div>
    </div>
    @csrf
</form>

@endsection
@section('script')
<script>
    $('#email').change(function() {
        var _token = $('input[name="_token"]').val();
        var email = $('#email').val();
        $.ajax({
            url: '{{route("user.auth.findEmail")}}',
            type: 'post',
            dataType: 'json',
            data: {
                'email': $('#email').val(),
                '_token': _token
            },
            success: function(data) {
                if (data == false) {
                    $('#btnSM').prop('disabled', true);
                    alert('Tài khoản không tồn tại');
                } else {
                    $('#btnSM').prop('disabled', false);
                }
            }
        })
    });
</script>
@endsection