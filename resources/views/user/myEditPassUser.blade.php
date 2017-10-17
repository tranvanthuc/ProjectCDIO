@extends('user.myhome')

@section('title', "Sửa mật khẩu")

@include('user.blocks.errors')
@include('user.blocks.flash')


@section('content')
<div class= "row" ">
    <div class="col-md-offset-1 col-md-4" id="bgEdit">
    
    </div>
    <div class="col-md-offset-1 col-md-5" style="margin-top: 100px ; margin-right: 10px;" id="dEdit">
        <h2 class="panel panel-danger text-center " style="padding: 20px 20px 20px 10px; background-color: ste">Thay đổi mật khẩu </h2>

        <form method="POST" >
            {{ csrf_field() }}
            <div class="form-group">
                @include('user.blocks.errors')
                @include('user.blocks.flash')
                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label">Mật khẩu cũ</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" placeholder="Vui lòng nhập mật khẩu cũ" name="oldPass">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label">Mật khẩu mới</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" placeholder="Vui lòng nhập mật khẩu mới" name="newPass">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label">Xác nhận mật khẩu</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" placeholder="Vui lòng nhập lại mật khẩu mới" name="confirmPass">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-md-offset-3">
                    <input class="form-control btn btn-primary" type="submit"  value="Chỉnh sửa">
                </div>
                <div class="col-md-4 ">
                    <a href="{{ url('home/editInfo/' . Auth::user()->id) }}" class="btn btn-default form-control">Hủy</a>
                </div>
            </div>
        </form>
    </div>
    @stop