@extends('layouts.user.app')
@section('content')

<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color:#000">Form đăng ký khóa học</h2>
                </div>
                <div class="col-md-6 ">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>

                                <th>Khóa học</th>
                                <th>Niên khóa</th>
                                <th>Ngày khai giảng</th>
                                <th>Lịch học</th>
                                <th class="text-center">Chọn</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listSche as $item)
                            <tr>

                                <td class="text-info"><strong>{{ $item->course->name }}</strong></td>
                                <td class="text-danger"><strong>{{ $item->name }}</strong></td>
                                <td>{{ $item->start }}</td>
                                <td>{{ $item->calendar }}</td>
                                <td class="text-center">
                                    @if(!in_array($item->id,$arrRegis))
                                    <input type="checkbox" name="schedule[]" value="{{$item->id}}">
                                <td>
                                    @else
                                    <span class="badge badge-success">Đã đăng ký</span></h6>
                                    @endif

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <button class="btn btn-success"><span class="fa fa-sign-out"></span> Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection