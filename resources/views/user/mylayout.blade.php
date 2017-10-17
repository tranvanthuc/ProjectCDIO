<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Bootstrap 3 template for corporate business" />
	<!-- css -->
	<link href="{{ asset('templates/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('templates/plugins/flexslider/flexslider.css') }}" rel="stylesheet" media="screen" />	
	<link href="{{ asset('templates/css/cubeportfolio.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('templates/css/style.css') }}" rel="stylesheet" />

	<link href="{{ asset('user/img/Iconbook.png') }}" rel="icon" type="image/png" />

	<!-- Theme skin -->
	<link id="t-colors" href="{{ asset('templates/skins/default.css') }}" rel="stylesheet" />
	<link href="{{ asset('sb-admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
	
</head>

<!-- End head -->

<!--Start body -->
<body>
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '1108002442642852',
				xfbml      : true,
				version    : 'v2.8'
			});
			FB.AppEvents.logPageView();
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<div id="wrapper">
		<!-- start header -->
		<header>
			<!-- Start div menu -->
			<div class="navbar navbar-default navbar-fixed-top" >
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{ route('getIndex')}}" style="margin-top: 4px;margin-bottom: 5px;height: 50px;"><img src="{{ asset('user/img/Book.jpg') }}" alt="" width="55" height="52" style="border: 0.5px solid grey;border-radius: 8px;"/> BOOK SHARING</a>
					</div>

					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
						
							<li><a href="{{ route('getAddNewsUser') }}"><span class="glyphicon glyphicon-pencil"></span> Đăng tin</a></li> 
							@yield('button')
						</ul>
					</div>
				</div>
			</div>
			<!-- end div menu -->
		</header>
		<!-- end header -->
	</div>
	<!-- Start div link -->
	<br/><br/>
	<div id="link" style="display: none;" >
		<section id="inner-headline">
			<div class="container">
				<div class="col-lg-12 col-md-12 col-xs-12"  >
					<div>
						<ul class="breadcrumb" >
							<li><a href="{{ route('getIndex') }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							@yield('linkLoad')
						</ul>
					</div>
					<div id="sb-search" class="sb-search" style="margin-top: 3%;">
						{{-- <div id="sb-search" class="sb-search" style="margin-top: 21px;"> --}}
						{{-- {{ url('/?search='. Request::get('search')) }} --}}
						@if(Auth::check())
							<form action="/home/" method="get" id="fSearch">
								<input class="sb-search-input" placeholder="Nhập tên sách cần tìm..." type="text" value="" name="search1" id="search1">
								<input id="submitFSearch1" class="sb-search-submit" type="submit">
								<span class="sb-icon-search" title="Click to start searching"></span>
							</form>
						@else
							<form action="/" method="get" id="fSearch">
								<input class="sb-search-input" placeholder="Nhập tên sách cần tìm..." type="text" value="" name="search1" id="search1">
								<input id="submitFSearch1" class="sb-search-submit" type="submit">
								<span class="sb-icon-search" title="Click to start searching"></span>
							</form>
						@endif
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- end div link -->

	<!-- start div content -->
	<div class="col-md-12" style="background-color: white;">
		@yield('content')
	</div>
	<!-- end div content -->
	
	<!-- start footer -->
	<div id="divFooter" class="footer col-md-12" style="background-color: #f2f2f2;" >
		<div class="container">
		<div class="row">
		<div class="col-sm-2 col-lg-2 col-md-2" >
		</div>
		<div class="col-sm-3 col-lg-3 col-md-3" >
			<ul class="social-network">
				<h4>About us</h4>
				<strong>F Team</strong><br>
			</ul>
		</div>
		<div class="col-sm-3 col-lg-3 col-md-3">
			<ul class="social-network" >
				<h4>Contact with us</h4>
				<i class="icon-phone"></i> 01285136039 <br>
				<i class="icon-envelope-alt"></i> fteam@gmail.com
			</ul>
		</div>
		{{-- <div class="col-sm-3 col-lg-3 col-md-3">
			<br/><br/>	
			<ul class="social-network" >
				<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>	
			</ul>
		</div> --}}
		<div class="col-sm-3 col-lg-3 col-md-3">
			<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>	
		</div>			
		</div>
		</div>				
	</div>
	<!-- end footer -->


<!-- javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{ asset('templates/js/jquery.min.js') }}"></script>
	<script src="{{ asset('templates/js/modernizr.custom.js') }}"></script>
	<script src="{{ asset('templates/js/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('templates/js/bootstrap.min.js') }}"></script> 
	<script src="{{ asset('templates/plugins/flexslider/jquery.flexslider-min.js') }}"></script> 
	<script src="{{ asset('templates/plugins/flexslider/flexslider.config.js') }}"></script>
	<script src="{{ asset('templates/js/jquery.appear.js') }}"></script>
	<script src="{{ asset('templates/js/stellar.js') }}"></script>
	<script src="{{ asset('templates/js/classie.js') }}"></script> 
	<script src="{{ asset('templates/js/uisearch.js') }}"></script> 
	<script src="{{ asset('templates/js/jquery.cubeportfolio.min.js') }}"></script> 
	<script src="{{ asset('templates/js/google-code-prettify/prettify.js') }}"></script> 
	<script src="{{ asset('templates/js/animate.js') }}"></script> 
	<script src="{{ asset('templates/js/custom.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('sb-admin/dist/js/myscript.js') }}"></script>
	<script src="{{ asset('templates/js/jquery-ui-1.12.1/jquery-ui.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('templates/js/jquery-ui-1.12.1/jquery-ui.css') }}">
	<script type="text/javascript">
		$('#search').autocomplete({
			source : '{!! URL::route("autocomplete") !!}',
			minlenght: 1,
			autoFocus: true,
			select:function(e,ui)
			{
    			// $('#name').val(ui.item.value);
    			// alert("Search : " + ui.item.value);
    			$('#search').val(ui.item.value);
    			$('#submitFSearch').click();
    			// window.location.href="http://booksharing.com/home/newsdetail/"+ ui.item.id; 
    		}
    	});
    </script>

</body>
</html>