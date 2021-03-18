@extends('layouts.user.master')
@section('content')
<style>
    h1{
        color:#000;
        margin: 0;
    }
    h2{
        color:#444343;
        margin: 0;
    }
    p{
        margin-top: 15px;
    }

</style>
<div class="row" style="background:#ffffff;">
    <div class="container" style="margin-bottom:15px">
    <div class="col-md-6">
    <img src="{{asset('templates/libuser/images/logoCourse.jpg')}}"/>
    </div>
    <div class="col-md-6">
     
    <h1>{{$course->name}}</h1>
    <hr>
    <h2>{{$course->desc}}</h2>
    <p><b>Học phí:</b> {{number_format($course->tuition)}}</p>
    <p><b>Thời lượng</b> {{$course->time}}</p>
    <p><b>Chi tiết:</b> {{$course->detail}}</p>
    <hr>
    @if(empty($user))
        <div style="margin-top:15px"><a style="color:#337ab7" href="{{route('login')}}">Đăng nhập để đăng ký khóa học</a></div>
    @else
    <div style="margin-top:15px"><a style="color:#fff" href="{{route('user.course.register',$course->id)}}"><button class="btn btn-success btn-sm">Đăng ký</button> </div>
@endif
   

    
    </div>
    </div>
</div>
@endsection