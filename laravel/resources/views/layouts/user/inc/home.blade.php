@extends('layouts.user.app')
@section('content')
<!--content-->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap');

    body {
        background-color: #eee
    }

    

    .card {
        border: none
    }

    .card-body {
        flex: 1 1 auto;
        padding: 10px
    }

    .card-text {
        font-size: 13px
    }

    .guarantee {
        color: #05882c;
        margin-left: 4px;
        font-weight: 700
    }

    hr {
        margin: 0.2rem 0;
        color: #bfbebe
    }

    .buttons button {
        text-transform: uppercase;
        font-size: 12px;
        border-radius: 2px
    }
</style>
<div class="row">
    <div class="container" style="background:#f9f9f9">


    <div class="row">
            <div class="col-md-12">
               
                    @if(Session::has('successReC'))
                    <div class="alert alert-success" role="alert">{{Session::get('successReC')}}</div>
                    @endif

                    <h1>Danh sách khóa học</h1>
               
            </div>
            
            @foreach($listCourse as $item)
                <div class="col-md-4" style="margin-bottom:20px">

                    <div class="card"><a href="{{route('user.course.detailCourse',$item->id)}}"> <img src="http://cdn.designbeep.com/wp-content/uploads/2013/04/1.moon-logo.png" class="card-img-top"></a>
                        <div class="card-body">
                            <div class="d-flex justify-content-between"> <span class="font-weight-bold"><a href="{{route('user.course.detailCourse',$item->id)}}">{{$item->name}}</a></span></div>
                            <p class="card-text mb-1 mt-1">{{$item->desc}}</p>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="text-right buttons"><a style="color:#ffffff" href="{{route('user.course.detailCourse',$item->id)}}"><button class="btn btn-dark"><span class="fa fa-magic"></span> Chi tiết</button> </a></div>
                        </div>
                    </div>
                </div>
            

            @endforeach
          
            <div style="clear:both"></div>
            <div class="col-md-12">          
                    {{ $listCourse->links("pagination::bootstrap-4") }}          
            </div>
            </div>
        </div>
    </div>
</div>
<!----->
@endsection