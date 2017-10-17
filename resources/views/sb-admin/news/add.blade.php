@extends('sb-admin.layout')

@section('title','Add News')

@section('header','Add News')


@section('content')

<div >
	<form method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="col-md-offset-3 col-md-6">
			<div class="form-group" >
				<label>Title</label>
				<input type="text" class="form-control" placeholder="Enter title news" name="title" value="{{ old('title') }}">
			</div>
			{{-- show majors --}}
			<div class="form-group">
				<label >Choose Major</label>
				<select class="form-control" name="sltMajors" >
					<option value="">Choose Major</option>

					@foreach($listMajors as $major)
					<option value="{{ $major->id }}" {{ (old('sltMajors') == $major->id) ? "selected" : ""}}> {{ $major->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
			<label for="sltSubjects">Subject</label>
				<select class="form-control" name="sltSubjects">
					<option value="">Choose subject</option>
					@foreach($listSubjects as $subject)
					<option value="{{ $subject->id }}" {{ (old('sltSubjects') == $subject->id) ? "selected" : ""}}> {{ $subject->name }}</option>
					@endforeach
				</select>
			</div>

			{{-- description --}}
			<div class="form-group">
				<label >Description</label>
				<textarea class="form-control" name="desc" cols="30" rows="10">{{ old('desc') }}</textarea>
				{{-- <script type="text/javascript">ckfinder("desc"); </script> --}}
			</div>
			{{-- price --}}
			<div class="form-group">
				<label>Price</label>
				<input type="text" class="form-control" placeholder="Enter Price" name="price" value="{{ old('price') }}">
			</div>
			{{-- choose img --}}
			<div class="form-group">
				<label>Choose image display</label>
				<input type="file" name="fImage">
			</div>


			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Create news">
			</div>

		</div>
	</form>  
</div>
@endsection