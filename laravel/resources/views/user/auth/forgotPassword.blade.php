@extends('layouts.user.master')
@section('content')
<form action="{{route('verifyForgotPassWord')}}" method="POST">
<div class="row">
    <div class="container" style="margin-bottom: 20px;">
        <div class="col-md-3">
            <label for="">Nhập email đăng ký</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="col-md-2">
            <br>
            <button id="btnSM" disabled
             class="btn btn-sm btn-primary">
                Xác nhận
            </button>
        </div>
    </div>
</div>
@csrf
</form>
<script>

$('#email').change(function() {
   var _token   = $('input[name="_token"]').val();
    var email = $('#email').val();
    $.ajax({
        url: '{{route("findEmail")}}',
        type: 'post',
        dataType: 'json',
        data: {
            'email': $('#email').val(),
            '_token':_token
        },
        success: function(data) {
            if(data == false){
                $('#btnSM').prop('disabled',true);
                alert('Tài khoản không tồn tại');
            }else{
                $('#btnSM').prop('disabled',false);
            }
        }
    })
});
</script>
@endsection