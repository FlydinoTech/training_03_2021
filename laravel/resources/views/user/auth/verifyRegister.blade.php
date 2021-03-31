@extends('layouts.user.app')
@section('content')

<form action="{{route('user.auth.smRegister')}}" method="POST">
<div class="row">
<div class="container" style="margin-bottom: 20px;">
<div class="row">
    <div class="col-md-3">
   
    
        @csrf
        {{Session::get('tokenV')}}
        <label for="">Mã xác nhận</label>
        <input style="text-align: left;" id="code" name="code" type="text" class="form-control">
        <div><small style="color:red"><i>(*) Một email đã gửi đến {{$request->email}}</i></small></div>
        <input name="data" type="hidden" value='{{json_encode($request->toArray())}}'>
    </div>
        <div class="col-md-2" style="margin-top: 5px;">
            <br>
        <button disabled id="btnSM" type="submit" class="btn btn-primary "><span class="fa fa-check"></span> Xác nhận</button>
        </div>
    </div>
</div>
</div>
</div>
</form>

@endsection
@section('script')
<script>
$('#code').change(function(){
    checkCode();
});
$('#btnSM').click(function(){
    checkCode();
});
function checkCode(){
    var codeV = '{{$code}}';
    var code = $('#code').val();
    if(codeV == code){
        $('#btnSM').prop('disabled',false);
    }else{
        $('#btnSM').prop('disabled',true);
        alert('Mã xác nhận k đúng')
    }
}

</script>
@endsection