@if(count($errors) > 0)
	<div id="errors_msg">
		<ul>
			@foreach($errors->all() as $error)
				<li style="list-style: none;" align="center">{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
