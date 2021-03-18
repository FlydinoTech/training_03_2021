@extends('layouts.user.master')
@section('content')
<!--content-->
<div class="row" style="background:#ffffff">
    <div class="container">
        <div class="content-top">
            @if(Session::has('successReC'))
            <div class="alert alert-success" role="alert">{{Session::get('successReC')}}</div>
            @endif
            
            <h1>Danh sách khóa học</h1>
            @php
            $i=0;
            @endphp
            @foreach($listCourse as $item)

            @if($i==0 || $i%3==0)

            <div class="grid-in">
                @endif
                
                <div class="col-md-4 grid-top">
                    <a href="{{route('detailCourse',$item->id)}}" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive"
                            src="{{asset('templates/libuser/images/logoCourse.jpg')}}" alt="">
                        <div class="b-wrapper">
                            <h3 class="b-animate b-from-left    b-delay03 ">
                                <span>{{$item->desc}}</span>
                            </h3>
                        </div>
                    </a>


                    <p><a href="{{route('detailCourse',$item->id)}}">{{$item->name}}</a></p>
                </div>
				@php
                $i++;
                @endphp

                @if($i%3==0 && $i !=0)
                <div class="clearfix"> </div>
            </div>
            @endif
			
            @endforeach
            <div class="col-md-12">
            {{ $listCourse->links("pagination::bootstrap-4") }}
            </div>
        </div>
	</div>
	</div>
        <!----->
    @endsection