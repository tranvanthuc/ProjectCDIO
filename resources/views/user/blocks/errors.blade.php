@if(count($errors) > 0)

<div id="myErrors" class="alert alert-danger alert-dismissable fade in">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<ul>
		@foreach($errors->all() as $error)
			<li style="list-style: none;text-align: center;"><strong >{{ $error }}</strong></li>
		@break;
		@endforeach
	</ul>
</div>
@endif