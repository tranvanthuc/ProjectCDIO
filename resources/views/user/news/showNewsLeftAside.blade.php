
@if(isset($listMajorsTop))
<div class="col-md-3">
	<!-- start div left aside -->
	<!-- List chuyen nganh hot -->
	<aside class="left-sidebar">
		<div class="widget">
			
			@if(Auth::check())
			<form class="navbar-form" role="search" id="fSearch" action="/home/" method="get">
			@else 
			<form class="navbar-form" role="search" id="fSearch" action="/" method="get">
			@endif
				<div class="input-group add-on">
				<input class="form-control" placeholder="Tìm kiếm..." name="search" id="search" type="text">
					<div class="input-group-btn">
						<button class="btn btn-default" id="submitFSearch" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
			</form>
			<script src="{{ asset('templates/js/jquery.min.js') }}"></script>
			<script src="{{ asset('templates/js/jquery-ui-1.12.1/jquery-ui.js') }}"></script>
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
			
			<button type="button" class="btn btn-default" id="btnChon" data-toggle="modal" data-target="#myModal">Danh mục chuyên ngành &thinsp;</button>

			<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Chuyên ngành</h4>
						</div>
						<div class="modal-body">
							@foreach($listMajors as $major)
							@if(Auth::check())
							<a href="{{ URL::to('/'). '/home/major/'. $major->id }}"><li>&nbsp;&nbsp;&nbsp;{{ $major->name }}</li></a>
							@else
							<a href="{{ URL::to('/'). '/major/'. $major->id }}"><li>&nbsp;&nbsp;&nbsp;{{ $major->name }}</li></a>
							@endif
							@endforeach

						</ul>
						<link href="{{ asset('templates/css/modal.css') }}" rel="stylesheet" />
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<br/> <br>
		<h5 class="widgetheading">Chuyên ngành hot</h5>
		<ul class="cat">
			@foreach($listMajorsTop as $major)
			<li>
				@if(Auth::check())
				<a href="{{ URL::to('/'). '/home/major/'. $major->id }}">{{ $major->name}}</a><span>&nbsp;({{ $major->numberOfNews }})</span>
				@else
				<a href="{{ URL::to('/'). '/major/'. $major->id }}">{{ $major->name}}</a><span>&nbsp;({{ $major->numberOfNews }})</span>
				@endif
			</li>

			@endforeach
		</ul>
	</div>
	{{-- show suggest news  --}}
	@if(Auth::check())
	@include('user.news.showSuggestNews')
	@endif
	{{-- end show suggest new  --}}
</aside>
</div>
@endif