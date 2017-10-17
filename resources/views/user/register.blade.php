
@extends('user.myLayout')

@section('title', "Register page")

@section('button')
<ul class="nav navbar-nav navbar-right">
	<li><a href="{{ route('getRegister') }}"><i class="fa fa-user" aria-hidden="true"></i> Đăng ký</a></li>
	<li><a href="{{ route('getLogin') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
</ul>
@stop

@section('content')



{{-- fomr register --}}

<div class="col-lg-12 col-md-12 col-xs-12" style="background-color: white" >
	<form action="../../register" method="POST">
		{{ csrf_field() }}
		<!-- <div  class="col-md-offset-4 col-md-4"> -->
		

		<div class


		<div class="col-md-12">
			<div id="fRegister" >
				@include('user.blocks.errors')
				<div class="form-group">
					<h1 align="center">Đăng ký</h1>
				</div>
				
				<div class="form-group" >
					<label>Tên Đăng Nhập:</label>
					<input type="text" class="form-control" id="user" placeholder="Nhập tên đăng nhập" name="username" value="{{ old('username') }}">
				</div>
				<div class="form-group">
					<label>Mật Khẩu:</label>
					<input type="password" class="form-control" id="pass" placeholder="Nhập mật khẩu" name="password" >
				</div>
				<div class="form-group">
					<label>Nhập lại mật khẩu:</label>
					<input type="password" class="form-control" id="pass" placeholder="Nhập lại mật khẩu" name="confirmPassword">
				</div>
				<div class="form-group">
					<label>Tên Đầy Đủ:</label>
					<input type="text" class="form-control" id="FullName" placeholder="Nhập tên (họ và tên)" name="name" value="{{ old('name') }}">
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input type="email" class="form-control" id="Email" placeholder="Nhập email " name="email" value="{{ old('email') }}">
				</div>

				<div class="form-group ">
					<input type="submit" class="btn btn-success form-control" value="Register">

				</div>
			</div>
		</div>
	</div>  
</form>
</div>
@stop