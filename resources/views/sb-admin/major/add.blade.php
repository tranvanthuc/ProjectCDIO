@extends('sb-admin.layout')

@section('title','Add Major')
@section('header','Add Major')


@section('content')
<div style="background-color: white">
	<form method="post" class="form-inline">
		{{ csrf_field() }}
		<div class="col-md-offset-3 col-md-6">

			<div class="form-group" >
				<input type="text" class="form-control" placeholder="Enter Major" name="major" required>
			</div>
			
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Add Major">
			</div>
		</div>  
	</form>
</div>
@endsection