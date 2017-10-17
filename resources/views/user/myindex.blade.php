@extends('user.myLayout')

@section('title', "Index page")

@include('user.myMenuIndex')

@section('title_container')
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="nav navbar-nav navbar-left">
				<div class="active"><h3>Danh sách bài đăng</h3></div>
			</div>
			<div class="nav navbar-nav navbar-right">	
				<div class="nav navbar-nav">
					<div class="nav navbar-nav navbar-right">
						<div class="nav navbar-nav">
							<select class="form-control"  id="sltFilterNews" >

								<option value="new" {{ (request()->option=="new") ? "selected" : ""}} >Mới nhất</option>
								<option value="old" {{ (request()->option=="old") ? "selected" : ""}}>Cũ nhất</option>
								<option value="cheap" {{ (request()->option=="cheap") ? "selected" : ""}}>Giá thấp tới cao</option> 
								<option value="expensive" {{ (request()->option=="expensive") ? "selected" : ""}}>Giá cao xuống thấp</option> 
								<option value="littleViewed" {{ (request()->option=="littleViewed") ? "selected" : ""}}>Ít lượt xem nhất</option>
							</select>
						</div>   
					</div>
				</div>   
			</div>     
		</div>
	</div>
</nav>

<style type="text/css">
  .loading 
  {
    background: lightgoldenrodyellow url('{{asset('uploads/images/loading.gif')}}') no-repeat center 50%;
    height: 80px;
    width: 100px;
    position: fixed;
    border-radius: 5px;
    top: 45%;
    left: 54%;
    margin: 0 auto;
    z-index: 2000;
    display: none;

  }

</style>
<div class="loading"></div>
<script src="{{ asset('templates/js/jquery.min.js') }}"></script>
<script type="text/javascript">
	$('#sltFilterNews').on('change', function(){
		$('.loading').fadeIn();
		var root = location.href.substring(0,location.href.lastIndexOf('/'));
		switch($('#sltFilterNews').val())
		{
			case "new": window.location.href= root; break;
			case "old": window.location.href= root+ "?option=old"; break;
			case "cheap": window.location.href=root+ "?option=cheap"; break;
			case "expensive": window.location.href=root+ "?option=expensive"; break;
			case "littleViewed": window.location.href=root +"?option=littleViewed"; break;
		}
	});

</script>
@stop

@section('content')
<section id="content">
	@include('sb-admin.blocks.errors')
	@include('sb-admin.blocks.flash')
	@include('user.myshownews');

	
</section>
@stop
