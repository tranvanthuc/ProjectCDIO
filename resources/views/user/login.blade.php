@extends('user.myLayout')

@section('title', "Login page")

@section('button')
<ul class="nav navbar-nav navbar-right">
	<li><a href="{{ route('getRegister') }}"><i class="fa fa-user" aria-hidden="true"></i> Đăng ký</a></li>
	<li><a href="{{ route('getLogin') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
</ul>
@stop

@section('content')
<div class="col-lg-12 col-md-12 col-xs-12" style="background-color: white">
	<form  method="post">
		
		{{ csrf_field() }}


		<!-- <div  class="col-md-offset-4 col-md-4"> -->
			
		
			<div class=" col-md-12">
				<div id="fLogin">
					@include('user.blocks.flash')
					@include('user.blocks.errors')
					<div class="form-group">
						<h1 align="center">Đăng nhập</h1>
					</div id="fLogin">

					<div class="form-group" >
						<label>Tên Đăng Nhập:</label>
						<input type="text" class="form-control" id="user" placeholder="Nhập tên đăng nhập" name="username" value="{{ old('username') }}">
					</div>

					<div class="form-group">
						<label>Mật Khẩu:</label>
						<input type="password" class="form-control" id="pass" placeholder="Nhập mật khẩu" name="password">
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-success form-control" value="Đăng nhập">
					</div>


					<div class="form-group">
						<a style="width: 49%" href="{{ url('login/facebook')}}" type="button" class="btn btn-primary form-control " ><i class="fa fa-facebook" aria-hidden="true" style="color: white;"></i> Facebook</a>


						<a style="width: 49%" href="{{ url('login/google')}}" type="button" class="btn btn-danger form-control" ><i class="fa fa-google-plus" aria-hidden="true"  style="color: white;"></i> Google</a> 
					</div>
				

					<div class="form-group">
						Bạn chưa có tài khoản ? <a href="{{ route('getRegister') }}" type="button" >Đăng ký</a>
					</div>

				</div>
			</div>	
		</div> 
	</form>
</div>
@stop