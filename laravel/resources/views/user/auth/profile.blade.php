@extends('layouts.user.master')
@section('content')
<style>
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow: 0px 0px 0px 0px #000;
    box-shadow: 0px 0px 0px 0px #000;
}

legend {
    width: 45%;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
}
</style>
<div class="row">
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        @if(Session::has('msg'))
            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
            @endif
            <fieldset class="scheduler-border">
                <legend class="scheduler-border"> <span>{{$user->name}} <a  href="{{route('editProfile')}}" style="color:#053660"><span  class="glyphicon glyphicon-edit"></span></a></span></legend>
                <div class="control-group">
                    <div class="col-md-6">
                        <label class="control-label input-label" for="email">Email:</label>
                        <div class="controls bootstrap-timepicker" id="email">
                            {{$user->email}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label input-label" for="phone">Số điện thoại:</label>
                        <div class="controls bootstrap-timepicker" id="phone">
                            {{$user->phone}}
                        </div>
                    </div>
                    <div class="col-md-12">
                    <hr>
                    </div>
                   
                    <div class="col-md-12">
                        <label class="control-label input-label" for="phone">Địa chỉ:</label>
                        <div class="controls bootstrap-timepicker" id="phone">
                            {{$user->address}}
                        </div>
                    </div>
                    
                </div>
            </fieldset>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection