@extends('sb-admin.layout')

@section('title','Edit Major')
@section('header','Edit Major')


@section('content')
<div style="background-color: white">
	<form method="post" class="form-inline">
		{{ csrf_field() }}
		<div class="col-md-offset-3 col-md-6">

			<div class="form-group" >
				<input type="text" class="form-control" placeholder="Enter Major" name="major" value="{{ $major->name }}" required>
			</div>
			
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Edit Major">
			</div>
		</div>  
	</form>
</div>
@endsection