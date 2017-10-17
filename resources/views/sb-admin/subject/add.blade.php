@extends('sb-admin.layout')

@section('title','Add Subject')
@section('header','Add Subject')


@section('content')
<div style="background-color: white">
	<form method="post" class="form-inline">
		{{ csrf_field() }}
		<div class="col-md-offset-3 col-md-6">

			<div class="form-group" >
				<input type="text" class="form-control" placeholder="Enter Subject" name="subject" required>
			</div>
			
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Add Subject">
			</div>
		</div>  
	</form>
</div>
@endsection