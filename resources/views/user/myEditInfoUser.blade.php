@extends('user.myhome')

@section('title', "Edit Information")

@section('linkLoad')
<li><a href="{{ route('getIndex') }}">Edit Information</a><i class="icon-angle-right"></i></li>
@stop

@include('user.blocks.errors')

@section('content')
<div class= "row" >
    <div class=" col-md-7" id="bgEdit">

    </div>
    <div class=" col-md-5 col-md-offset-1" style="margin-top: 10px ; margin-right: 10px;" id="dEdit">
        <h2 class="panel panel-danger text-center " style="padding: 20px 20px 20px 10px;"> Thông tin cá nhân</h2>

        <form method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                {{-- load image --}}
                <div id="avatar">
                    @if(Auth::user()->image == 'default.jpg')

                    <img id="myAvatar" src="{{ asset('uploads/avatars/default.jpg') }}" alt="default.jpg" style="width:200px; height:200px;"/>

                    @elseif(App\SocialProvider::where('user_id',Auth::user()->id)->get()->count() > 0) 
                    <img id="myAvatar" src="{{ Auth::user()->image}}" alt="" style="width:200px; height:200px;"/>
                    @else
                    <img id="myAvatar" src="{{ '/fitAvatar/'. Auth::user()->image.'/200/200' }}" alt="{{ Auth::user()->image }}" style="width:200px; height:200px;" />
                    @endif
                </div>

                <div class="image-upload row" >
                    <input id="fImage" name="fImage" type="file" onchange='openFile(event)' accept="image/*" style="display: none;">
                    <input type="button" id="browse" class="btn btn-primary col-md-offset-5 col-xs-offset-4" value="Chọn ảnh">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Họ tên</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="{{Auth::user()->name}}" id="name" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-3 col-form-label">Email</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="{{Auth::user()->email}}" id="email" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-3 col-form-label">Số điện thoại</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="{{Auth::user()->phone}}" id="phone" name="phone">
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-3 col-form-label">Chuyên ngành</label>
                <div class="col-md-9">
                    <select class="form-control" name="sltMajors" >
                        <option value=""> Chọn chuyên ngành</option>
                        @foreach($listMajors as $major)
                        @if(old('sltMajors') !=null)
                        <option value="{{ $major->id }}" {{ (old('sltMajors') == $major->id) ? "selected" : ""}}> {{ $major->name }}</option>
                        @else
                        <option value="{{ $major->id }}" {{ (Auth::user()->major_id == $major->id) ? "selected" : ""}}> {{ $major->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-3 col-form-label">Địa Chỉ</label>
                <div class="col-md-9 ">
                    <input type="text" class="form-control" value="{{Auth::user()->address}}" id="address" name="address">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-3 col-form-label">Mật Khẩu</label>
                <div class="col-md-9">
                    <a href="{{ url('/home/editPass/'. Auth::user()->id) }}"> <span class="glyphicon glyphicon-pencil form-group"></span> Chỉnh Sửa</a>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-md-offset-3  col-xs-10 col-xs-offset-1">
                    <input class="form-control btn btn-primary" type="submit"  value="Chỉnh sửa">
                </div>
                <div class="col-md-4  col-xs-10 col-xs-offset-1">
                    <a class="form-control btn btn-default" href="{{ route('getHome') }}">Hủy</a>
                </div>
            </div>
        </form>
    </div>
</div>
 
@stop