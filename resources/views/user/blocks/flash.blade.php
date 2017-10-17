@if(Session::has('flash_level'))

<div id="myFlash" class="alert alert-danger alert-dismissable fade in">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<b>{{ Session::get('flash_message')}}</b>
</div>
@endif